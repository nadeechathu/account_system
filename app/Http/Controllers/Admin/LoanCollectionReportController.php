<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Center;
use App\Models\Member;
use App\Models\Loan;
use App\Models\Collect;
use App\Models\LoanCategory;
use PDF;

class LoanCollectionReportController extends Controller
{
    public function loanCollectionReport(Request $request){

        $centers = Center::where('center_status', 1)->get();
        $branches = Branch::where('branch_status',1)->get();
        $loanCollections = array();

        if($request->download == 0){
            //load view
            $fromDate = $request->from_date;
            $toDate = $request->to_date;
            $branchId = $request->branch_id;
            $centerId = $request->center_id;
            $collectPersonId = $request->collect_person;
            $collectDateId = $request->collectDate;
            $collectStatusId = $request->collect_status;

            $loanCollections = Collect::getAllCollect($request);
            $loanCollections->withQueryString()->links();

            return view('reports.collection_report',compact('centers','branches','fromDate','toDate','branchId','centerId','loanCollections','collectPersonId','collectDateId','collectStatusId'));

        }else{
            //download csv
            $response = Collect::downloadCollectDetails($request);
            return $response;
        }

    }

    public function downloadloanCollectionReportPDF($id){

        $loanCollection = Loan::with('member','loanAmount')->where('id',$id)->get()->first();

        if($loanCollection != null){

            $logo = "data:image/png;base64,".base64_encode(file_get_contents('app-assets/images/report-logo-type.png'));
            $pdf = PDF::loadView('loans/templates/collect_loan_details_pdf',compact('loanCollection','logo'));
            $pdf->setPaper('A4', 'potrait');
            // return view('members/templates/member_details_pdf',compact('member','logo'));

            // return $pdf->stream("dompdf_out.pdf", array("Attachment" => false));
            // dd($pdf);
            return $pdf->download($loanCollection->member->member_nic.'_details.pdf');

        }else{
            return back()->with('error','Could not find the member');
        }
    }

    public function loanCollectionReportView(){
        return view('reports.member_report_view');
    }

    public function loanCollectionReportPassData(Request $request)
    {
        $branch_id = $request->input('branch_id');
        //$email = $request->input('email');
        //return redirect()->back()->with('success', 'Form submitted successfully');
    }

    public function bulkReport(Request $request){



        $centers = Center::where('center_status', 1)->get();
        $branches = Branch::where('branch_status',1)->get();
        // $loanAmounts = Loan::pluck('loan_rental')->toArray();

        $loanCollections = array();

        if($request->download == 0){
            //load view
            $fromDate = $request->from_date;
            $toDate = $request->to_date;
            $branchId = $request->branch_id;
            $centerId = $request->center_id;
            $collectPersonId = $request->collect_person;
            $collectDateId = $request->collectDate;

        //     $loanCollections = Loan::getAllBulkLoanCollect($request);

            //$loanCollections->withQueryString()->links();
        //     $loanCollections->all();

            $loanCollections = Loan::getAllBulkLoanCollect($request)->get();

            // foreach ($loanCollections as $loanCheck){

            //  $collectLastLoans = Collect::where('loan_id',$loanCheck->member_id)->latest();

            // }

            // dd($loanCollections);

           // dd($loanCollections);

            return view('bulk-reports.bulk_report_view',compact('collectPersonId','collectDateId','centers','branches','fromDate','toDate','branchId','centerId','loanCollections'));
        }
    }

    function bulkReportStore(Request $request) {

        $count = 0;
        // dd( $loanAmounts = $request->loanAmounts);
        $loanAmounts = $request->loanAmounts;
        $loanIds = $request->loanIds;
        $memberIds = $request->memberIds;
        $collectDates = $request->collectDates;
        $collectStatus = $request->collect_status;
        $loanamountarres = $request->loanamountarres;

        foreach($loanIds as $loanId){

            $collectionRecord = Collect::where('loan_id',$loanId)->where('member_id',$memberIds[$count])->orderBy('id','desc')->first();

            $loan = Loan::with('loanCategory')->where('id',$loanId)->get()->first();

            $loan_rental_amount =$loan->loan_rental;
            $currentBalance = $loan->loanCategory->loan_category_amount;

            if($collectionRecord == null){

                $collectionRecord = new Collect();
                $collectionRecord->member_id = $memberIds[$count];
                $collectionRecord->loan_id = $loanId;
                $currentBalance = $loan->loan_collected;
                $collectionRecord->collect_loan_paid_balnce = $loanAmounts[$count];
                $collectionRecord->collect_settle_week = $loan->loanCategory->loan_duration - 1;
                $collectionRecord->collect_person = $loan->executive_person;


            }else{

                $collectionRecord = $collectionRecord->replicate();
                $currentBalance = $collectionRecord->collect_loan_balnce;
                $collectionRecord->collect_loan_paid_balnce = $collectionRecord->collect_loan_paid_balnce + $loanAmounts[$count];
                $collectionRecord->collect_settle_week = $collectionRecord->collect_settle_week - 1;
            }

            $collectionRecord->collect_amount = $loanAmounts[$count];
            $collectionRecord->collect_date = $collectDates[$count];
            $collectionRecord->collect_loan_balnce = $currentBalance - $loanAmounts[$count];
            $collectionRecord->collect_status  = $collectStatus[$count];
            $collectionRecord->collect_arreas =  0;
            $collectLoanBalance =  $collectionRecord->collect_loan_balnce;

        //   dd($loanAmounts[$count]);
          if ($collectLoanBalance == 0) {
            Loan::where('id',$loanId)->where('loan_status', '!=', 5)->update(['loan_status' => 5]);
            $collectionRecord->collect_status = 5;

          }

        else {
            if($collectionRecord->collect_status == 7){

               $underPayament = $loan_rental_amount - $loanAmounts[$count];
               $collectionRecord->collect_amount =  $loanAmounts[$count];
               $collectionRecord->collect_arreas =  $underPayament;

            }elseif($collectionRecord->collect_status == 4){

                $underPayament = $loan_rental_amount;
                $collectionRecord->collect_amount =  0;
                $collectionRecord->collect_arreas =   $loanamountarres[$count];
                $collectionRecord->collect_loan_balnce = $currentBalance;

            }
            else{
                $collectionRecord->collect_status  = $collectStatus[$count];
            }
          }
          $collectionRecord->save();
          $count++;
        }
        return back()->with('success','Bulk updated successfully !');
    }
    // mobile function

    public function mobileBulkReport(Request $request){
        $centers = Center::where('center_status', 1)->get();
        $branches = Branch::where('branch_status',1)->get();

        $loanCollections = array();

        if($request->download == 0){
            //load view
            $fromDate = $request->from_date;
            $toDate = $request->to_date;
            $branchId = $request->branch_id;
            $centerId = $request->center_id;
            $collectPersonId = $request->collect_person;
            $collectDateId = $request->collectDate;

            $loanCollections = Loan::getAllBulkLoanCollect($request)->get();

            return view('mobile-view.bulk-reports.bulk_report_view',compact('collectPersonId','collectDateId','centers','branches','fromDate','toDate','branchId','centerId','loanCollections'));
        }
    }

    function mobileBulkReportStore(Request $request) {

        $count = 0;
        // dd( $loanAmounts = $request->loanAmounts);
        $loanAmounts = $request->loanAmounts;
        $loanIds = $request->loanIds;
        $memberIds = $request->memberIds;
        $collectDates = $request->collectDates;
        $collectStatus = $request->collect_status;
        $loanamountarres = $request->loanamountarres;

        foreach($loanIds as $loanId){

            $collectionRecord = Collect::where('loan_id',$loanId)->where('member_id',$memberIds[$count])->orderBy('id','desc')->first();

            $loan = Loan::with('loanCategory')->where('id',$loanId)->get()->first();

            $loan_rental_amount =$loan->loan_rental;
            $currentBalance = $loan->loanCategory->loan_category_amount;

            if($collectionRecord == null){

                $collectionRecord = new Collect();
                $collectionRecord->member_id = $memberIds[$count];
                $collectionRecord->loan_id = $loanId;
                $currentBalance = $loan->loan_collected;
                $collectionRecord->collect_loan_paid_balnce = $loanAmounts[$count];
                $collectionRecord->collect_settle_week = $loan->loanCategory->loan_duration - 1;
                $collectionRecord->collect_person = $loan->executive_person;


            }else{

                $collectionRecord = $collectionRecord->replicate();
                $currentBalance = $collectionRecord->collect_loan_balnce;
                $collectionRecord->collect_loan_paid_balnce = $collectionRecord->collect_loan_paid_balnce + $loanAmounts[$count];
                $collectionRecord->collect_settle_week = $collectionRecord->collect_settle_week - 1;
            }

            $collectionRecord->collect_amount = $loanAmounts[$count];
            $collectionRecord->collect_date = $collectDates[$count];
            $collectionRecord->collect_loan_balnce = $currentBalance - $loanAmounts[$count];
            $collectionRecord->collect_status  = $collectStatus[$count];
            $collectionRecord->collect_arreas =  0;
            $collectLoanBalance =  $collectionRecord->collect_loan_balnce;

        //   dd($loanAmounts[$count]);
          if ($collectLoanBalance == 0) {
            Loan::where('id',$loanId)->where('loan_status', '!=', 5)->update(['loan_status' => 5]);
            $collectionRecord->collect_status = 5;

          }

        else {
            if($collectionRecord->collect_status == 7){

               $underPayament = $loan_rental_amount - $loanAmounts[$count];
               $collectionRecord->collect_amount =  $loanAmounts[$count];
               $collectionRecord->collect_arreas =  $underPayament;

            }elseif($collectionRecord->collect_status == 4){

                $underPayament = $loan_rental_amount;
                $collectionRecord->collect_amount =  0;
                $collectionRecord->collect_arreas =   $loanamountarres[$count];
                $collectionRecord->collect_loan_balnce = $currentBalance;

            }
            else{
                $collectionRecord->collect_status  = $collectStatus[$count];
            }
          }
          $collectionRecord->save();
          $count++;
        }
        return back()->with('success','Bulk updated successfully !');
    }
}
