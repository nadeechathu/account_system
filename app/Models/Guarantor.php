<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guarantor extends Model
{
    use HasFactory;
    protected $fillable = ['loan_category_id','guarantor_member_1','guarantor_member_2','guarantor_status','member_id','guarantor_01_name','guarantor_01_nic','guarantor_01_phone','guarantor_01_address','guarantor_01_birthday','guarantor_01_age','guarantor_01_job','guarantor_02_name','guarantor_02_nic','guarantor_02_phone','guarantor_02_address', 'guarantor_02_birthday', 'guarantor_02_age', 'guarantor_02_job', 'member_relationship', 'member_relationship_pserson_name', 'member_relationship_pserson_nic', 'member_relationship_pserson_phone'];


    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }
}
