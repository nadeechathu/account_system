<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Member;
use App\Models\Branch;
use App\Models\Center;
use App\Models\LoanCategory;
use App\Models\Loan;
use Illuminate\Support\Facades\DB;

use Yajra\DataTables\DataTables;

class LoanController extends Controller
{
    public function loans(){

        //return view('loans.all_loan');
        $loans = DB::table('loans')
                    ->join('loan_categories', 'loan_categories.id', '=', 'loans.loan_amount')
                    ->join('members', 'members.id', '=', 'loans.member_id')
                    ->join('centers', 'centers.id', '=', 'members.center_id')
                    ->join('branches', 'branches.id', '=', 'centers.branch_id')
                    ->select('loans.id AS loan_id','members.id AS member_id','centers.id AS center_id','branches.id AS branch_id', 'loans.*','loan_categories.*', 'members.*', 'members.*', 'centers.*', 'branches.*')
                    // ->where('loan_status',1)
                    ->orderByDesc('loans.id')
                    // ->select(
                    //     'loans.id AS loan_id',
                    //     'members.id AS member_id',
                    //     'centers.id AS center_id',
                    //     'branches.id AS branch_id',
                    //     // Add other columns as needed
                    // )
                    ->get();
                    //dd($loans);

                    $loan_categories = DB::table('loan_categories')
                   ->get();

        $members = DB::table('members')
                    ->get();

        $centers = DB::table('centers')
                    ->get();

        $branches = DB::table('branches')
                    ->get();

        return view('loans.all_loan', ['loans' => $loans ,'loan_categories' => $loan_categories , 'members' => $members , 'centers' => $centers , 'branches' => $branches]);

    }

    public function loanStoreUI(){

        $members = Member::whereNotIn('id', function ($query) {
            $query->select('member_id')
                  ->from('loans')
                  ->where('loan_status', 1);
        })->get();

        $loan_catgories = LoanCategory::where('loan_category_status', 1)->get();
        return view('loans.new_loan',compact('members','loan_catgories'));
    }

    public function getLoanAmount($id)
    {
        $loan_catgories = LoanCategory::select('id','loan_category_amount',)
                                     ->where('categories_id',$id)
                                    ->get();
        return response([ 'status' => 'success', 'loan_amount' => $loan_catgories, 'message' => "success"], 200);
    }

    public function getLoanRate($id)
    {
        $loan_rate = LoanCategory::select('id','loan_interst_rate','loan_duration','loan_category_def_docharg',)
                                     ->where('id',$id)
                                    ->first();
        return response([ 'status' => 'success', 'loan_interst_rate' => $loan_rate, 'message' => "success"], 200);
    }

    public function loanStore(Request $request)
    {

        try {
            $validated = $request->validate([
                'member_id' => 'required',
                'loan_category_id' => 'required',
                'loan_amount' => 'required',
                'loan_rate' => 'required',
                'loan_settle_week' => 'required',
                'loan_documt_charg' => 'required',
                'loan_collected' => 'required',
                'loan_rental' => 'required',
                'loan_issus_date' => 'required',
                'executive_person' => 'required',

            ]);

            $loan = new Loan;
            $loan->member_id = $request->member_id;
            $loan->loan_category_id = $request->loan_category_id;
            $loan->loan_amount = $request->loan_amount;
            $loan->loan_rate = $request->loan_rate;
            $loan->loan_settle_week = $request->loan_settle_week;
            $loan->loan_documt_charg = $request->loan_documt_charg;
            $loan->loan_collected = $request->loan_collected;
            $loan->loan_rental = $request->loan_rental;
            $loan->loan_issus_date = $request->loan_issus_date;
            $loan->executive_person = $request->executive_person;
            $loan->loan_status = 2;

            $loan->save();

            return redirect('dashboard/loans')->with('success', "Loan created successfully !");
        } catch (\Exception $exception) {
            return redirect('dashboard/loans')->with('error', $exception->getMessage());
        }
    }

    public function getLoans()
    {

        // $datas = Loan::orderBy('id', 'DESC')->get();

        // $datas = Loan::select('organizations.*','organizations_type.name')->join('organizations_type','organizations_type.id','=','organizations.org_type')->orderBy('id', 'DESC')->get();


        // return DataTables::of($datas)
        //     ->addColumn('DT_RowIndex', function () {

        //         static $index = 1;
        //         return $index++;
        //     })
        //     ->editColumn('member_id', function (Loan $data) {
        //         $memberName = Member::find($data->member_id);

        //         return $memberName->member_name;
        //     })
        //     ->editColumn('member_id.firstname', function ($model) {
        //         return $model->patient->name;
        //     })
        //     ->editColumn('member_id', function (Loan $data) {
        //         $memberName = Member::find($data->member_id);

        //         return $memberName->member_name;
        //     })
        //      ->addColumn('loan_status', function (Loan $data) {
        //         $statusUI = "";

        //         if ($data->loan_status == 0) {
        //             $statusUI = '<span class="badge badge-glow badge-danger">Delect</span>';
        //           } else if ($data->loan_status == 1) {
        //             $statusUI = '<span class="badge badge-glow badge-success">Active</span>';
        //           }
        //          else if ($data->loan_status == 2) {
        //             $statusUI = '<span class="badge badge-glow badge-warning">Pending </span>';
        //           }
        //           else {
        //             $statusUI = '<span class="badge badge-glow badge-primary">Diactivate</span>';
        //           }
        //           return $statusUI;
        //         })
        //     ->addColumn('loan_category_id', function (Loan $data) {
        //         $loan_category = "";

        //         if ($data->loan_category_id == 0) {
        //             $loan_category = 'Speed Loan';
        //           } else if ($data->loan_category_id == 1) {
        //             $loan_category = 'Business Loan';
        //           }

        //           else {
        //             $loan_category = 'Micro Loan';
        //           }

        //         return $loan_category;
        //     })

        //     ->addColumn('actions', function (Loan $data) {
        //         $ViewUrl = route('loan.view', $data->id);
        //         $DeleteUrl = route('loan.remove', $data->id);
        //         $UpdateUrl = route('loans.update', $data->id);

        //         return '<div class="ActionBtnList text-center">

        //             <a href="' . $ViewUrl . '"  class="btn btn-primary  waves-effect waves-float waves-light">View</a>
        //             <a href="' . $UpdateUrl . '"  class="btn btn-info waves-effect waves-float waves-light">Edit</a>
        //             <button type="button" class="btn btn-danger  waves-effect waves-float waves-light" onClick="openDeleteConfirmation(' . $data->id . ')" data-target="#delectLoan" data-toggle="modal" >Delete</button>
        //             </div>';
        //     })
        //     ->rawColumns(['DT_RowIndex', 'member_name', 'loan_category_id', 'loan_amount','loan_rate' ,'loan_status' ,'actions'])
        //     ->toJson();
    }


    public function removeLoan($id)
    {
        try {

            $loanRemove = Loan::find($id);
            $loanRemove->loan_status = 0;
            if ($loanRemove->save()) {
                return back()->with('success', 'Loan  deleted successfully !');
            } else {
                return back()->with('error', 'Could not Loan !');
            }
        } catch (\Exception $exception) {
            return back()->with('error', 'Error occured - ' . $exception->getMessage());
        }
    }

    public function viewLoan($id)
    {
        $loan = Loan::with('member')->where('id', $id)->get()->first();
        $loanSet_member_Id = Member::where('id',$loan->member_id)->get()->first();
        $loanSet_center_Id =Center::where('id',$loanSet_member_Id->center_id)->get()->first();
        $loanSet_branch_Id =Branch::where('id',$loanSet_center_Id->branch_id)->get()->first();
        $loanCollectAmount = LoanCategory::where('id',$loan->loan_amount)->get()->first();

        return view('loans.loan_single', compact('loan','loanSet_center_Id','loanSet_branch_Id','loanCollectAmount'));
    }

    public function viewLoanSingle($id)
    {
        $loanIds = Loan::whereNotIn('loan_status', [5])->pluck('member_id');
        $members = Member::whereIn('id', $loanIds)->get();
        $loan = Loan::with('member')->where('id', $id)->get()->first();
        $loan_catgories = LoanCategory::where('loan_category_status',1)->get();

        return view('loans.loan_update', compact('loan','members','loan_catgories'));
    }

    public function updateLoan(Request $request, $id)

    {
        try{
                $validated = $request->validate([
                    'member_id' => 'required',
                    'loan_category_id' => 'required',
                    'loan_amount' => 'required',
                    'loan_rate' => 'required',
                    'loan_settle_week' => 'required',
                    'loan_documt_charg' => 'required',
                    'loan_collected' => 'required',
                    'loan_rental' => 'required',
                    'loan_issus_date' => 'required',
                    'executive_person' => 'required',
                ] );

                $loan = Loan::where('id',$id)->get()->first();

                if($loan != null){

                    $loan->member_id = $request->member_id;
                    $loan->loan_category_id = $request->loan_category_id;
                    $loan->loan_amount = $request->loan_amount;
                    $loan->loan_rate = $request->loan_rate;
                    $loan->loan_settle_week = $request->loan_settle_week;
                    $loan->loan_documt_charg = $request->loan_documt_charg;
                    $loan->loan_collected = $request->loan_collected;
                    $loan->loan_rental = $request->loan_rental;
                    $loan->loan_issus_date = $request->loan_issus_date;
                    $loan->executive_person = $request->executive_person;
                    $loan->loan_status = $request->loan_status;
                    //$loan->loan_status = 2;

                    $loan->save();

                    return redirect('dashboard/loans')->with('success',"Loan updated successfully !");

                }else{

                    return redirect('dashboard/loans')->with('error',"Could not find the Loan !");
                }




        }catch(\Exception $exception){

            return back()->with('error',$exception->getMessage());
        }
    }

}
