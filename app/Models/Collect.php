<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class Collect extends Model
{
    use HasFactory;
    protected $fillable = ['member_id','loan_id','collect_amount','collect_loan_balnce','collect_loan_paid_balnce','collect_date','collect_settle_week','collect_person','collect_status'];

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id')->with('center','loanCategory');
    }

    public function loanPrice()
    {
        return $this->belongsTo(Loan::class, 'loan_id', 'id');
    }

    public static function getAllCollect(Request $request)
    {

        $fromDate = $request->from_date;
        $toDate = $request->to_date;
        $branchId = $request->branch_id;
        $centerId = $request->center_id;
        $collectPersonId = $request->collect_person;
        $collectDateId = $request->collectDate;
        $collectStatusId = $request->collect_status;

        $loanCollect = Collect::with('member')

        ->where(function ($query) use ($fromDate) {

           if ($fromDate != null) {

              $query->where('collect_date', '>=', $fromDate);

            } else {

                        $query;
                    }
                })

                ->where(function ($query) use ($toDate) {

                            if ($toDate != null) {

                                $query->where('collect_date', '<=', $toDate);
                            } else {

                                $query;
                            }
                        })

            ->where(function ($query) use ($collectStatusId) {

                if ($collectStatusId != null) {

                                $query->where('collect_status', $collectStatusId);
                            } else {

                                $query;
                            }
                        })

                        ->where(function ($query) use ($collectPersonId) {

                                    if ($collectPersonId != null) {

                                        $query->where('collect_person', $collectPersonId);
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
                                                })


           ->orderBy('id', 'ASC')->paginate();

        return $loanCollect;
    }

    public static function downloadCollectDetails(Request $request){

        $fromDate = $request->from_date;
        $toDate = $request->to_date;
        $branchId = $request->branch_id;
        $centerId = $request->center_id;
        $collectPersonId = $request->collect_person;
        $collectStatusId = $request->collect_status;

        // Start building the query for loan collections
        $loanCollectionsQuery = Collect::query()->with('member');

        // Apply date range filters
        if ($fromDate) {
            $loanCollectionsQuery->where('collect_date', '>=', $fromDate);
        }

        if ($toDate) {
            $loanCollectionsQuery->where('collect_date', '<=', $toDate);
        }

        // Apply collect status filter
        if ($collectStatusId) {
            $loanCollectionsQuery->where('collect_status', $collectStatusId);
        }

        // Apply collect person filter
        if ($collectPersonId) {
            $loanCollectionsQuery->where('collect_person', $collectPersonId);
        }

        // Apply center filter using relationship
        if ($centerId) {
            $loanCollectionsQuery->whereHas('member', function ($query) use ($centerId) {
                $query->where('center_id', $centerId);
            });
        }

        // Apply branch filter using nested relationship
        if ($branchId) {
            $loanCollectionsQuery->whereHas('member.center', function ($query) use ($branchId) {
                $query->where('branch_id', $branchId);
            });
        }

        // Fetch loan collections with applied filters and ordering
        $loanCollections = $loanCollectionsQuery->orderBy('id', 'ASC')->get();

        // Prepare CSV file headers and filename
        $fileName = date('Y_m_d') . '_members.csv';
        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        // Define CSV columns
        $columns = [
            'BRANCH NAME',
            'CENTER NAME',
            'COLLECT DATE',
            'MEMBER NAME',
            'MEMBER CODE',
            'COLLECT AMOUNT',
            'ARREAS AMOUNT',
            'COLLECT LOAN BALANCE',
            'COLLECT LOAN PAID BALANCE',
            'COLLECT STATUS'
        ];

        // Prepare the CSV data generation callback
        $callback = function () use ($loanCollections, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($loanCollections as $loanCollection) {
                $row = [
                    $loanCollection->member->center->branch->branch_name,
                    $loanCollection->member->center->center_name,
                    $loanCollection->collect_date,
                    $loanCollection->member->initial_name,
                    $loanCollection->member->member_code,
                    $loanCollection->collect_amount,
                    $loanCollection->collect_arreas,
                    $loanCollection->collect_loan_balnce,
                    $loanCollection->collect_loan_paid_balnce,
                ];

                // Map collect status to human-readable value
                $statusMapping = [
                    0 => 'Delete',
                    1 => 'Active',
                    3 => 'De Active',
                    4 => 'Arrears',
                    5 => 'Loan settlement',
                    7 => 'Under Payment',
                ];
                $statusValue = $loanCollection->collect_status;
                $row[] = isset($statusMapping[$statusValue]) ? $statusMapping[$statusValue] : 'Hold';

                fputcsv($file, $row);
            }

            fclose($file);
        };

        // Return a streamed response with the CSV data
        return response()->stream($callback, 200, $headers);

    }

}
