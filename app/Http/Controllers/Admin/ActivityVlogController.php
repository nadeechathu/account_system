<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivityVlogController extends Controller
{
    public function activityLog(){
        $activityLogs = DB::table('activity__logs')->orderBy('id', 'DESC')->get();
        return view('dashboard.activity_log',compact('activityLogs'));
    }
}
