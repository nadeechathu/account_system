<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    use HasFactory;
    protected $fillable = ['branch_id','center_code','center_name','center_status','center_allocate_date','executive_person'];

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }

}
