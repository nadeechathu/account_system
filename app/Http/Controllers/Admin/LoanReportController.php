<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Center;
use App\Models\Branch;
use App\Models\Loan;
use App\Models\Member;
use PDF;


class LoanReportController extends Controller
{
    
    public function loanReport(Request $request){

        $centers = Center::where('center_status', 1)->get();
        $branches = Branch::where('branch_status',1)->get();

        $members = array();

        if($request->download == 0){

            //load view
            $fromDate = $request->from_date;
            $toDate = $request->to_date;
            $branchId = $request->branch_id;
            $centerId = $request->center_id;
            $loanStatusId = $request->loanStatus;        

            $loans = Loan::getAllLoanReportDetails($request);
       

            $loans->withQueryString()->links();

            return view('reports.loan_report',compact('centers','branches','loans','fromDate','toDate','branchId','centerId','loanStatusId'));

        }else{
            //download csv
            $response = Loan::downloadLoanDetails($request);
            return $response;
        }

    }

    public function downloadLoanDetailsPDF($id){

        $loan = Loan::with('member','loanAmount')->where('id',$id)->get()->first();

        if($loan != null){

            $logo = "data:image/png;base64,".base64_encode(file_get_contents('app-assets/images/report-logo-type.png'));
            $pdf = PDF::loadView('loans/templates/loan_pdf',compact('loan','logo'));
            $pdf->setPaper('A4', 'potrait');
            // return view('members/templates/member_details_pdf',compact('member','logo'));

            // return $pdf->stream("dompdf_out.pdf", array("Attachment" => false));
            // dd($pdf);
            return $pdf->download($loan->member->member_nic.'_details.pdf');

        }else{
            return back()->with('error','Could not find the loan');
        }
    }

}
