<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanCategory extends Model
{
    use HasFactory;
    protected $fillable = ['categories_id','loan_category_amount','loan_interst_rate','loan_duration','loan_category_def_docharg','loan_category_status'];
 
   
}
