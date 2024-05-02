<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Loan extends Model
{
    use HasFactory;
    protected $fillable = ['executive_person','member_id','loan_category_id','loan_amount','loan_rate','loan_settle_week','loan_documt_charg','loan_collected','loan_rental','loan_issus_date','loan_status'];

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id')->with('center','loanCategory');
    }

    public function loanAmount()
    {
        return $this->belongsTo(LoanCategory::class, 'loan_category_id', 'id');
    }

    public function collections()
    {
        return $this->hasMany(Collect::class)->orderBy('id','desc');
    }

    public function loanCategory()
    {
        return $this->belongsTo(LoanCategory::class, 'loan_category_id', 'id');
    }

    public static function getAllLoanCollect(Request $request)
    {

        $fromDate = $request->from_date;
        $toDate = $request->to_date;
        $branchId = $request->branch_id;
        $centerId = $request->center_id;
        $collectPersonId = $request->collect_person;
        $collectDateId = $request->collectDate;
        $collectStatusId = $request->collect_status;

        $loanCollect = Loan::with('member','loanAmount','collections')
           //->where('loan_status',1)

            ->where(function ($query) use ($fromDate) {

                if ($fromDate != null) {

                    $query->where('loan_issus_date', '>=', $fromDate);
                } else {

                    $query;
                }
            })
            ->where(function ($query) use ($toDate) {

                if ($toDate != null) {

                    $query->where('loan_issus_date', '<=', $toDate);
                } else {

                    $query;
                }
            })

            ->whereHas('collections', function ($query) use ($collectStatusId) {
                if ($collectStatusId != null) {
                    $query->where('collect_status', $collectStatusId);
                } else {
                    $query;
                }
            })

            ->whereHas('member', function ($query) use ($centerId) {
                if ($centerId != null) {
                    $query->where('members.center_id', $centerId);
                } else {
                    $query;
                }
            })


            ->whereHas('member.center', function ($query) use ($branchId, $collectDateId) {
                if ($branchId != null) {
                    $query->where('centers.branch_id', $branchId);
                } else {
                    $query;
                }

                if ($collectDateId != null) {
                    $query->where('centers.center_allocate_date', $collectDateId);
                } else {
                    $query;
                }
            })
            ->where(function ($query) use ($collectPersonId) {

                if ($collectPersonId != null) {

                    $query->where('executive_person', $collectPersonId);
                } else {

                    $query;
                }
            })

           ->orderBy('id', 'ASC')->paginate(env("RECORDS_PER_PAGE"));

        return $loanCollect;
    }

    public static function getAllBulkLoanCollect(Request $request)
    {

        $fromDate = $request->from_date;
        $toDate = $request->to_date;
        $branchId = $request->branch_id;
        $centerId = $request->center_id;
        $collectPersonId = $request->collect_person;
        $collectDateId = $request->collectDate;

        $collectStatusId = $request->collect_status;
        // dd( $fromDate, $toDate);

        $loanCollect = Loan::with('member','loanAmount','collections')
              ->where('loan_status', 1)
                          ->whereNotIn('loan_status', [5])

            ->where(function ($query) use ($fromDate) {

                if ($fromDate != null) {

                    $query->where('loan_issus_date', '>=', $fromDate);
                } else {

                    $query;
                }
            })
            ->where(function ($query) use ($toDate) {

                if ($toDate != null) {

                    $query->where('loan_issus_date', '<=', $toDate);
                } else {

                    $query;
                }
            })


            ->whereHas('member', function ($query) use ($centerId) {
                if ($centerId != null) {
                    $query->where('members.center_id', $centerId);
                } else {
                    $query;
                }
            })


            ->whereHas('member.center', function ($query) use ($branchId, $collectDateId) {
                if ($branchId != null) {
                    $query->where('centers.branch_id', $branchId);
                } else {
                    $query;
                }

                if ($collectDateId != null) {
                    $query->where('centers.center_allocate_date', $collectDateId);
                } else {
                    $query;
                }
            })
            ->where(function ($query) use ($collectPersonId) {

                if ($collectPersonId != null) {

                    $query->where('executive_person', $collectPersonId);
                } else {

                    $query;
                }
            })

           //->orderBy('id', 'DESC')->paginate();
           //->orderBy('id', 'ASC');
           ->orderBy('member_id', 'ASC');

         //  dd($loanCollect->get()[105]);

        return $loanCollect;
    }

    public static function downloadCollectDetails(Request $request){

        $fromDate = $request->from_date;
        $toDate = $request->to_date;
        $branchId = $request->branch_id;
        $centerId = $request->center_id;
        $collectPersonId = $request->collect_person;
        $collectDateId = $request->collectDate;
        $collectStatusId = $request->collect_status;

        $loanCollections = Loan::with('member','loanAmount','collections')

            ->where(function ($query) use ($fromDate) {

                if ($fromDate != null) {

                    $query->where('loan_issus_date', '>=', $fromDate);
                } else {

                    $query;
                }
            })
            ->where(function ($query) use ($toDate) {

                if ($toDate != null) {

                    $query->where('loan_issus_date', '<=', $toDate);
                } else {

                    $query;
                }
            })
            ->whereHas('member', function ($query) use ($centerId) {
                if ($centerId != null) {
                    $query->where('members.center_id', $centerId);
                } else {
                    $query;
                }
            })
            ->whereHas('collections', function ($query) use ($collectStatusId) {

                if ($collectStatusId != null) {
                    $query->where('collect_status', $collectStatusId);

                } else {
                    $query;
                }

            })

            ->whereHas('member.center', function ($query) use ($branchId, $collectDateId) {
                if ($branchId != null) {
                    $query->where('centers.branch_id', $branchId);
                } else {
                    $query;
                }

                if ($collectDateId != null) {
                    $query->where('centers.center_allocate_date', $collectDateId);
                } else {
                    $query;
                }
            })
            ->where(function ($query) use ($collectPersonId) {

                if ($collectPersonId != null) {

                    $query->where('executive_person', $collectPersonId);
                } else {

                    $query;
                }
            })


            ->orderBy('id', 'DESC')->get();



            $fileName = date('Y_m_d') . '_members.csv';

            $headers = array(
                "Content-type"        => "text/csv",
                "Content-Disposition" => "attachment; filename=$fileName",
                "Pragma"              => "no-cache",
                "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                "Expires"             => "0"
            );

            $columns = array('COLLECT DATE','MEMBER CODE', 'MEMBER NAME', 'MEMBER PHONE', 'NIC', 'MEMBER ADDRESS', 'GROUP NUMBER', 'LOAN AMOUNT', 'INSTALLMENT', 'LOAN BALANCE', 'CENTER NAME', 'BRANCH NAME');

            $callback = function () use ($loanCollections, $columns) {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);

                foreach ($loanCollections as $loanCollection) {
                    $row['COLLECT DATE']  = $loanCollection->member->collect_date;
                    $row['MEMBER CODE']  = $loanCollection->member->member_code;
                    $row['MEMBER NAME']  = $loanCollection->member->initial_name;
                    $row['MEMBER PHONE']    = $loanCollection->member->member_phone_no;
                    $row['MEMBER ADDRESS']    = $loanCollection->member->member_address;
                    $row['GROUP NUMBER']  = $loanCollection->member->member_group_no;
                    $row['LOAN AMOUNT']  = $loanCollection->member->loanCategory->loan_category_amount;
                    $row['INSTALLMENT']  = $loanCollection->loan_rental;
                    $row['LOAN BALANCE']  = sizeof($loanCollection->collections) > 0 ? $loanCollection->collections[0]->collect_loan_balnce : $loanCollection->member->loanCategory->loan_category_amount;
                    $row['CENTER NAME']    = $loanCollection->member->center != null ? $loanCollection->member->center->center_name : 'N/A';
                    $row['BRANCH NAME']    = $loanCollection->member->center != null ? ($loanCollection->member->center->branch != null ? $loanCollection->member->center->branch->branch_name : 'N/A') : 'N/A';
                    $row['NIC']    = $loanCollection->member->member_nic;
                    fputcsv($file, array($row['COLLECT DATE'], $row['MEMBER CODE'], $row['MEMBER NAME'], $row['MEMBER PHONE'], $row['NIC'],  $row['MEMBER ADDRESS'], $row['GROUP NUMBER'], $row['LOAN AMOUNT'], $row['INSTALLMENT'], $row['LOAN BALANCE'], $row['CENTER NAME'], $row['BRANCH NAME']));

                }

                fclose($file);
            };

            return response()->stream($callback, 200, $headers);


    }
// getAllLoanDetails

    public static function getAllLoanReportDetails(Request $request)
    {

        $fromDate = $request->from_date;
        $toDate = $request->to_date;
        $branchId = $request->branch_id;
        $centerId = $request->center_id;
        $loanStatusId = $request->loanStatus;
 //   dd( $loans->members->center->branch->branch_name);
        $loans = Loan::with('member','loanAmount')

            ->where(function ($query) use ($fromDate) {

                if ($fromDate != null) {

                    $query->where('loan_issus_date', '>=', $fromDate);
                } else {

                    $query;
                }
            })
            ->where(function ($query) use ($toDate) {

                if ($toDate != null) {

                    $query->where('loan_issus_date', '<=', $toDate);
                } else {

                    $query;
                }
            })

            ->where(function ($query) use ($loanStatusId) {

                if ($loanStatusId != null) {

                    $query->where('loan_status', $loanStatusId);
                } else {

                    $query;
                }
            })
            // ->where(function ($query) use ($branchId) {

            //     if ($branchId != null) {

            //         $query->where('member_id', $branchId);
            //     } else {

            //         $query;
            //     }
            // })

            ->whereHas('member.center', function ($query) use ($branchId) {

                if ($branchId != null) {

                    $query->where('centers.branch_id', $branchId);
                } else {

                    $query;
                }
            })
            ->whereHas('member', function ($query) use ($centerId) {

                if ($centerId != null) {

                    $query->where('members.center_id', $centerId);
                } else {

                    $query;
                }
            })

            // ->whereHas('member', function ($query) use ($branchId) {

            //     if ($branchId != null) {

            //         $query->where('members.center.branch_id', $branchId);

            //     } else {

            //         $query;
            //     }
            // })
            ->orderBy('id', 'DESC')->paginate(env("RECORDS_PER_PAGE"));

        return $loans;
    }

    public static function downloadLoanDetails(Request $request)
    {

        $fromDate = $request->from_date;
        $toDate = $request->to_date;
        $branchId = $request->branch_id;
        $centerId = $request->center_id;
        $loanStatusId = $request->loanStatus;

        $loans = Loan::with('member','loanAmount')
            ->where(function ($query) use ($fromDate) {

                if ($fromDate != null) {

                    $query->where('loan_issus_date', '>=', $fromDate);
                } else {

                    $query;
                }
            })
            ->where(function ($query) use ($toDate) {

                if ($toDate != null) {

                    $query->where('loan_issus_date', '<=', $toDate);
                } else {

                    $query;
                }
            })

            ->where(function ($query) use ($loanStatusId) {

                if ($loanStatusId != null) {

                    $query->where('loan_status', $loanStatusId);
                } else {

                    $query;
                }
            })
            ->whereHas('member', function ($query) use ($centerId) {

                if ($centerId != null) {

                    $query->where('members.center_id', $centerId);
                } else {

                    $query;
                }
            })

            ->whereHas('member.center', function ($query) use ($branchId) {

                if ($branchId != null) {

                    $query->where('centers.branch_id', $branchId);
                } else {

                    $query;
                }
            })
            // ->orderBy('id', 'DESC')->paginate(env("RECORDS_PER_PAGE"));
            ->orderBy('id', 'DESC')->get();

        //populating csv file

        $fileName = date('Y_m_d') . '_loans.csv';

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('C/NO', 'Center Name','Member NO','Member Name','Phone Number','Group Number','NIC','Address','Issues Date','Loan Amount','Loan Rental','Loan Collecte','Loan Rate','Doc Charge','Settle Week');

        $callback = function () use ($loans, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($loans as $loan) {

                $row['C/NO']  = $loan->member->center->center_code;
                $row['Center Name']  = $loan->member->center->center_name;
                $row['Member NO']  = $loan->member->member_code;
                $row['Member Name']  = $loan->member->initial_name;
                $row['Phone Number']  = $loan->member->member_phone_no;
                $row['Group Number']  = $loan->member->member_group_no;
                $row['NIC']  = $loan->member->member_nic;
                $row['Address']  = $loan->member->member_address;
                $row['Issues Date']  = $loan->loan_issus_date;

                $row['Loan Amount']  = $loan->loanAmount->loan_category_amount;
                $row['Loan Rental']  = $loan->loan_rental;
                $row['Loan Collecte']  = $loan->loan_collected;
                $row['Loan Rate']  = $loan->loan_rate;
                $row['Doc Charge']  = $loan->loan_documt_charg;
                $row['Settle Week']  = $loan->loan_settle_week;

                fputcsv($file, array($row['C/NO'], $row['Center Name'], $row['Member NO'], $row['Member Name'], $row['Phone Number'], $row['Group Number'], $row['NIC'], $row['Address'] , $row['Issues Date'],$row['Loan Amount'],$row['Loan Rental'], $row['Loan Collecte'], $row['Loan Rate'], $row['Doc Charge'], $row['Settle Week']));

            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

}
