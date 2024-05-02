<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Member;
use App\Models\Branch;
use App\Models\Center;
use App\Models\Collect;
use App\Models\LoanCategory;
use App\Models\Loan;
use Illuminate\Support\Facades\DB;

class SingalMemberReportController extends Controller
{

    public function singalMemberReport(){

        //return view('loans.all_loan');
        $loans = DB::table('loans')
                    ->join('loan_categories', 'loan_categories.id', '=', 'loans.loan_amount')
                    ->join('members', 'members.id', '=', 'loans.member_id')
                    ->join('centers', 'centers.id', '=', 'members.center_id')
                    ->join('branches', 'branches.id', '=', 'centers.branch_id')
                    ->select('loans.id AS loan_id','members.id AS member_id','centers.id AS center_id','branches.id AS branch_id', 'loans.*','loan_categories.*', 'members.*', 'centers.*', 'branches.*')
                    // ->where('loan_status',1)
                    ->orderByDesc('loans.id')
                    ->get();

                   // dd($loans);

                   $loan_categories = DB::table('loan_categories')
                   ->get();

        $members = DB::table('members')
                    ->get();

        $centers = DB::table('centers')
                    ->get();

        $branches = DB::table('branches')
                    ->get();

        return view('reports.singal_member_report', ['loans' => $loans ,'loan_categories' => $loan_categories , 'members' => $members , 'centers' => $centers , 'branches' => $branches]);

    }

    // public function singalMemberReportView(){
    //     return view('reports.singal_member_report_view');
    // }

    public function singalMemberReportView($id)
    
    {
        
        $loan = Loan::with('member')->where('id', $id)->get()->first();
        $loanCollect = Collect::where('id',$loan->member_id)->get()->first();
        $loanSet_member_Id = Member::where('id',$loan->member_id)->get()->first();
        $loanSet_center_Id =Center::where('id',$loanSet_member_Id->center_id)->get()->first();
        $loanSet_branch_Id =Branch::where('id',$loanSet_center_Id->branch_id)->get()->first();

        $allLoanCollects = Collect::where('loan_id',$id)->orderBy('id', 'asc')->get();

        $loanCollectAmount = LoanCategory::where('id',$loan->loan_amount)->get()->first();
      
        //$loanCollect = Collect::with('member','loanPrice')->where('id', $id)->get()->first();
        // return view('collects.loan_collect_single',compact('loanCollect'));

        return view('reports.singal_member_report_view', compact('loan','loanSet_center_Id','loanSet_branch_Id','loanCollect','allLoanCollects','loanCollectAmount'));
    }


    public function singalMembeReportPdf($id)
    {
        $loan = Loan::with('member')->where('id', $id)->get()->first();
        $loanCollect = Collect::where('id',$loan->member_id)->get()->first();
        $loanSet_member_Id = Member::where('id',$loan->member_id)->get()->first();
        $loanSet_center_Id =Center::where('id',$loanSet_member_Id->center_id)->get()->first();
        $loanSet_branch_Id =Branch::where('id',$loanSet_center_Id->branch_id)->get()->first();

        $allLoanCollects = Collect::where('loan_id',$id)->orderBy('id', 'asc')->get();
        $loanCollectAmount = LoanCategory::where('id',$loan->loan_amount)->get()->first();

        return view('reports.singal-member-report-pdf', compact('loan','loanSet_center_Id','loanSet_branch_Id','loanCollect','allLoanCollects','loanCollectAmount'));

    }
}
