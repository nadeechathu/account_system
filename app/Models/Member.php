<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Member extends Model
{
    use HasFactory;
    protected $fillable = ['center_id', 'loan_category_id', 'member_code', 'member_name','initial_name' ,'member_phone_no', 'member_nic', 'member_address', 'member_group_no', 'member_register_date', 'member_status'];


    public function center()
    {
        return $this->belongsTo(Center::class, 'center_id', 'id')->with('branch');
    }

    public function loanCategory()
    {
        return $this->belongsTo(LoanCategory::class, 'loan_category_id', 'id');
    }
    public function collect()
    {
        return $this->hasOne(Collect::class, 'member_id', 'id');
        
    }
   




    public static function getAllMembersForFilters($request)
    {
        return Member::with('center')
            ->where(function ($query) use ($request) {
                if ($request->selectedCategory != null) {

                    $query->where('center_id', $request->selectedCategory);
                } else {
                    $query;
                }
            })
            ->orderBy('id', 'desc');
    }

    public static function getAllMemberDetails(Request $request)
    {

        $fromDate = $request->from_date;
        $toDate = $request->to_date;
        $branchId = $request->branch_id;
        $centerId = $request->center_id;

        $members = Member::with('center')
            ->where('member_status', 1)
            ->where(function ($query) use ($fromDate) {

                if ($fromDate != null) {

                    $query->where('member_register_date', '>=', $fromDate);
                } else {

                    $query;
                }
            })
            ->where(function ($query) use ($toDate) {

                if ($toDate != null) {

                    $query->where('member_register_date', '<=', $toDate);
                } else {

                    $query;
                }
            })
            ->whereHas('center', function ($query) use ($branchId) {

                if ($branchId != null) {

                    $query->where('centers.branch_id', $branchId);
                } else {

                    $query;
                }
            })

            ->where(function ($query) use ($centerId) {

                if ($centerId != null) {

                    $query->where('center_id', $centerId);
                } else {

                    $query;
                }
            })
            ->orderBy('id', 'DESC')->paginate(env("RECORDS_PER_PAGE"));
// dd($members);
        return $members;
    }

    public static function downloadMemberDetails(Request $request)
    {

        $fromDate = $request->from_date;
        $toDate = $request->to_date;
        $branchId = $request->branch_id;
        $centerId = $request->center_id;

        $members = Member::with('center')
            ->where('member_status', 1)
            ->where(function ($query) use ($fromDate) {

                if ($fromDate != null) {

                    $query->where('member_register_date', '>=', $fromDate);
                } else {

                    $query;
                }
            })
            ->where(function ($query) use ($toDate) {

                if ($toDate != null) {

                    $query->where('member_register_date', '<=', $toDate);
                } else {

                    $query;
                }
            })
            ->whereHas('center', function ($query) use ($branchId) {

                if ($branchId != null) {

                    $query->where('centers.branch_id', $branchId);
                } else {

                    $query;
                }
            })

            ->where(function ($query) use ($centerId) {

                if ($centerId != null) {

                    $query->where('center_id', $centerId);
                } else {

                    $query;
                }
            })
            ->orderBy('id', 'DESC')->get();


        //populating csv file

        $fileName = date('Y_m_d') . '_members.csv';

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('MEMBER CODE', 'MEMBER NAME', 'MEMBER PHONE', 'NIC', 'MEMBER ADDRESS', 'GROUP NUMBER', 'REGISTERED DATE', 'STATUS', 'CENTER NAME', 'BRANCH NAME');

        $callback = function () use ($members, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($members as $member) {
                
                $row['MEMBER CODE']  = $member->member_code;
                $row['MEMBER NAME']  = $member->member_name;
                $row['MEMBER PHONE']    = $member->member_phone_no;
                $row['NIC']    = $member->member_nic;
                $row['MEMBER ADDRESS']    = $member->member_address;
                $row['GROUP NUMBER']  = $member->member_group_no;
                $row['REGISTERED DATE']  = $member->member_register_date;
                $row['STATUS']  = $member->member_status == 1 ? 'Active':'Inactive';
                $row['CENTER NAME']    = $member->center != null ? $member->center->center_name : 'N/A';
                $row['BRANCH NAME']    = $member->center != null ? ($member->center->branch != null ? $member->center->branch->branch_name : 'N/A') : 'N/A';

                fputcsv($file, array($row['MEMBER CODE'], $row['MEMBER NAME'], $row['MEMBER PHONE'], $row['NIC'],  $row['MEMBER ADDRESS'], $row['GROUP NUMBER'], $row['REGISTERED DATE'], $row['STATUS'], $row['CENTER NAME'], $row['BRANCH NAME']));
            
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
