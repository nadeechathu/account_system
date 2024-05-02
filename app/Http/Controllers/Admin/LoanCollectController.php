<?php

namespace App\Http\Controllers\Admin;

use App\Models\Member;
use App\Models\Branch;
use App\Models\Center;
use App\Models\LoanCategory;
use App\Models\Loan;
use App\Models\Collect;
use App\Models\User;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Gate;

use function PHPUnit\Framework\isEmpty;

class LoanCollectController extends Controller
{



    public function getLoanCollectData(){
        $collects = DB::table('collects')
            ->join('members', 'members.id', '=', 'collects.member_id')
            ->join('centers', 'centers.id', '=', 'members.center_id')
            ->join('branches', 'branches.id', '=', 'centers.branch_id')
            ->select('collects.id AS collect_id', 'members.id AS member_id', 'centers.id AS center_id', 'branches.id AS branch_id', 'collects.*', 'members.*', 'centers.*', 'branches.*')
            ->orderBy('collects.id', 'DESC')
            ->get();

        return DataTables::of($collects)
            ->addColumn('DT_RowIndex', function () {
                static $index = 1;
                return $index++;
            })
            ->addColumn('center_name', function ($collect) {
                return $collect->center_name; // Replace with the actual field name from the 'centers' table
            })
            ->addColumn('actions', function ($collect) {
                $buttons = '';


    //             $DeleteUrl = route('member.remove', $data->id);
    //             $ViewUrl = route('member.view', $data->id);
    //             $UpdateUrl = route('members.update', $data->id);

                if (Gate::any(['Collections access'])) {
                    $buttons .= '<a href="' . route('collects.view', $collect->collect_id) . '"><button type="button" class="btn btn-sm btn-primary waves-effect waves-float waves-light" data-toggle="tooltip" data-placement="top" data-original-title="View"><i class="fa fa-eye" aria-hidden="true"></i></button></a>';
                }

                if (Gate::any(['Collections access', 'Collections edit'])) {
                    $buttons .= '<a href="' . route('collects.viewUI', $collect->collect_id) . '"><button type="button" class="btn btn-sm btn-warning waves-effect waves-float waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>';
                }

                if (Gate::any(['Collections access', 'Collections edit', 'Collections delete'])) {
                    $buttons .= '<button type="button" class="btn btn-sm btn-danger waves-effect waves-float waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Delete" onClick="openDeleteConfirmation(' . $collect->collect_id . ')" data-target="#delectCenter" data-toggle="modal"><i class="fa fa-trash" aria-hidden="true"></i></button>';
                }


                return '<div class="ActionBtnList text-center">' . $buttons . '</div>';
            })
            ->rawColumns(['DT_RowIndex','branch_name','center_name','initial_name','member_code','collect_amount','collect_arreas','collect_date','collect_person','actions'])
            ->toJson();
    }

    public function loanCollects (Request $request)
{

    $searchKey = $request->searchKey;
    $users = User::where('user_type', 'like', '%exofficers%')->get();
    $collectsQuery = DB::table('collects')
                    ->join('members', 'members.id', '=', 'collects.member_id')
                    ->join('centers', 'centers.id', '=', 'members.center_id')
                    ->join('branches', 'branches.id', '=', 'centers.branch_id')
                    ->select('collects.id AS collect_id','members.id AS member_id','centers.id AS center_id','branches.id AS branch_id', 'collects.*', 'members.*', 'centers.*', 'branches.*')
                    ->orderBy('collects.id', 'DESC');


                    if ($searchKey) {
                        $collectsQuery->where(function ($query) use ($searchKey) {
                            $query->where('members.member_code', 'like', '%'.$searchKey.'%')
                                  ->orWhere('members.initial_name', 'like', '%'.$searchKey.'%');
                        });
                    }


      $collects = $collectsQuery->paginate()
                    ->appends(['searchKey' => $searchKey]);

    return view('collects.all_loan_collects', compact('collects', 'searchKey','users'));
}

    public function loanCollectCreate(){
        $users = User::where('user_type', 'like', '%exofficers%')->get();
        
        $members = Member::where('member_status', 1)->get();
        $loan_catgories = LoanCategory::where('loan_category_status', 1)->get();
        return view('collects.new_loan_collect',compact('members','loan_catgories','users'));
    }

    public function removeLoanCollect($id){
        try {
            $loanCollectRemove = Collect::find($id);
            //$loanCollectRemove->collect_status = 0;
            if ($loanCollectRemove->delete()) {
                return back()->with('success', 'Loan Collect deleted successfully !');
            } else {
                return back()->with('error', 'Could not Loan Collect !');
            }
        } catch (\Exception $exception) {
            return back()->with('error', 'Error occured - ' . $exception->getMessage());
        }
    }

    public function viewLoanCollect($id){
        $users = User::where('user_type', 'like', '%exofficers%')->get();
        $loanCollect = Collect::with('member','loanPrice')->where('id', $id)->get()->first();
        return view('collects.loan_collect_single',compact('loanCollect','users'));
    }

    public function LoanCollectUpdateUI($id){
        $users = User::where('user_type', 'like', '%exofficers%')->get();
        $members = Member::where('member_status', 1)->get();
        $loanCollect = Collect::with('member','loanPrice')->where('id', $id)->get()->first();
        return view('collects.loan_collect_update',compact('loanCollect','members','users'));
    }

    public function getLoanCollect($id)
    {
 
        $loan = Loan::with('collections')
    ->select('id', 'loan_collected', 'loan_rental', 'loan_rate', 'loan_settle_week')
    ->where('member_id', $id)
    ->orderBy('id', 'desc') // Order by loan ID in descending order to get the last inserted loan first
    ->first();

         $loanId =$loan->id;
         $collectionTotal = 0.0;
         $loan_rental = $loan->loan_rental;

         foreach($loan->collections as $collection){
            $collectionTotal = $collectionTotal + $collection->collect_amount;
         }

         $loanBalance = $loan->loan_collected - $collectionTotal ;
         $latestCollection = Collect::where('member_id',$id)->where('loan_id',$loan->id)->orderBy('id','desc')->first();

         $loanDetails =  array(

        'loan_id' => $loanId,
        'collect_amount' => $loan_rental,
        'collect_loan_balnce' => $loanBalance,
        'collect_loan_paid_balnce' => $collectionTotal,
        'collect_settle_week' => $latestCollection != null ? $latestCollection->collect_settle_week : $loan->loan_settle_week,
        );

        return response([ 'status' => 'success', 'loanDetails' => $loanDetails, 'message' => "success"], 200);
    }

    public function loanCollectStore(Request $request)
    {

        try {
            $validated = $request->validate([
                'loan_member_id' => 'required',
                'loan_id' => 'required',
                'collect_amount' => 'required',
                'collect_loan_balnce' => 'required',
                'collect_loan_paid_balnce' => 'required',
                'collect_date' => 'required',
                'collect_settle_week' => 'required',
                'collect_person' => 'required',
                'collect_status' => 'required',
            ]);

            $loanId = $request->loan_id;

            $loan = Loan::with('loanCategory')->where('id',$loanId)->get()->first();
            $loan_rental_amount =$loan->loan_rental;

            $loanCollect = new Collect;
            $loanCollect->member_id = $request->loan_member_id;
            $loanCollect->loan_id = $request->loan_id;
            $loanCollect->collect_amount = $request->collect_amount;
            $loanCollect->collect_status = $request->collect_status;

            $setLoanCollect =  $request->collect_amount;
            $setCollectLoanBalnce =  $request->collect_loan_balnce;
            $passLoanBalance = $setCollectLoanBalnce - $setLoanCollect;
            $loanCollect->collect_loan_balnce = $passLoanBalance;

            $setLoanPaidBalance = $request->collect_loan_paid_balnce;
            $loanCollect->collect_loan_paid_balnce = $setLoanCollect + $setLoanPaidBalance;
            $loanCollect->collect_date = $request->collect_date;

            $setWeek = $request->collect_settle_week;
            $loanCollect->collect_settle_week = $setWeek - 1;

            $loanCollect->collect_person = $request->collect_person;
            $collectAmount = $loanCollect->collect_loan_balnce;
            $loanCollect->collect_arreas =  0;

            if ($collectAmount == 0) {
                $loan_status_completed = Loan::where('id',$loanCollect->loan_id)->where('loan_status', '!=', 5)->update(['loan_status' => 5]);

                $loanCollect->collect_status = 5;
                //loan completes status = 5
            } else {


                if($loanCollect->collect_status == 7){

                    $underPayament = $loan_rental_amount - $loanCollect->collect_amount;
                    $loanCollect->collect_arreas =  $underPayament;
                    $loanCollect->collect_amount = $request->collect_amount;

                 }elseif($loanCollect->collect_status == 4){

                    $loanCollect->collect_loan_balnce =  $request->collect_loan_balnce;
                    $loanCollect->collect_loan_paid_balnce = $request->collect_loan_paid_balnce;

                    $underPayament = $loan_rental_amount;
                    $loanCollect->collect_amount =  0;
                    $loanCollect->collect_arreas =  $underPayament;
                    //$passLoanBalance = $setCollectLoanBalnce;
                }
                 else{
                    $loanCollect->collect_status = $request->collect_status;
                 }
            }

            $loanCollect->save();

            return redirect('dashboard/loanCollects')->with('success', "Loan Collect created successfully !");
        } catch (\Exception $exception) {
            return redirect('dashboard/loanCollects')->with('error', $exception->getMessage());
        }
    }


    public function updateLoanCollect(Request $request,$id)
    {

        try {
            $validated = $request->validate([
                'loan_member_id' => 'required',
                'collect_amount' => 'required',
                'collect_loan_balnce' => 'required',
                'collect_loan_paid_balnce' => 'required',
                'collect_date' => 'required',
                'collect_settle_week' => 'required',
                'collect_person' => 'required',
            ]);

            $loanCollect = Collect::where('id',$id)->get()->first();

            if($loanCollect != null){


            $loanCollect->member_id = $request->loan_member_id;
            $loanCollect->loan_id = $request->loan_id;
            $loanCollect->collect_amount = $request->collect_amount;


            $setLoanCollect =  $request->collect_amount;
            $setCollectLoanBalnce =  $request->collect_loan_balnce;
            $passLoanBalance = $setCollectLoanBalnce - $setLoanCollect;
            $loanCollect->collect_loan_balnce = $passLoanBalance;

            $setLoanPaidBalance = $request->collect_loan_paid_balnce;
            $loanCollect->collect_loan_paid_balnce = $setLoanCollect + $setLoanPaidBalance;
            $loanCollect->collect_date = $request->collect_date;

             $setWeek = $request->collect_settle_week;

            $loanCollect->collect_settle_week = $setWeek;

            $loanCollect->collect_person = $request->collect_person;
            $loanCollect->collect_status = 1;

            $loanCollect->save();

            }
            return redirect('dashboard/loanCollects')->with('success', "Loan Collect created successfully !");
        } catch (\Exception $exception) {
            return redirect('dashboard/loanCollects')->with('error', $exception->getMessage());
        }
    }
}
