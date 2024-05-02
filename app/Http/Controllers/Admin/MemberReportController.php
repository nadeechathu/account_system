<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;
use App\Models\Center;
use App\Models\Member;
use PDF;

class MemberReportController extends Controller
{
    public function memberReport(Request $request){

        $centers = Center::where('center_status', 1)->get();
        $branches = Branch::where('branch_status',1)->get();

        $members = array();

        if($request->download == 0){

            //load view
            $fromDate = $request->from_date;
            $toDate = $request->to_date;
            $branchId = $request->branch_id;
            $centerId = $request->center_id;

            $members = Member::getAllMemberDetails($request);

            $members->withQueryString()->links();

            return view('reports.member_report',compact('centers','branches','members','fromDate','toDate','branchId','centerId'));

        }else{
            //download csv
            $response = Member::downloadMemberDetails($request);
            return $response;
        }

    }

    public function downloadMemberDetailsPDF($id){

        $member = Member::with('center','loanCategory')->where('id',$id)->get()->first();

        if($member != null){

            $logo = "data:image/png;base64,".base64_encode(file_get_contents('app-assets/images/report-logo-type.png'));
            $pdf = PDF::loadView('members/templates/member_details_pdf',compact('member','logo'));
            $pdf->setPaper('A4', 'potrait');
            // return view('members/templates/member_details_pdf',compact('member','logo'));

            // return $pdf->stream("dompdf_out.pdf", array("Attachment" => false));
            // dd($pdf);
            return $pdf->download($member->member_nic.'_details.pdf');

        }else{
            return back()->with('error','Could not find the member');
        }
    }

    // public function memberReportView(){
    //     return view('reports.member_report_view');
    // }

    public function memberReportPassData(Request $request)
    {
        $branch_id = $request->input('branch_id');
        //$email = $request->input('email');
        //return redirect()->back()->with('success', 'Form submitted successfully');
    }
}
