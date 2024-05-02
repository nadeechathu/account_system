<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Branch;
use App\Models\Center;
use App\Models\LoanCategory;
use App\Models\Loan;
use App\Models\Collect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalBrnach = Branch::count();
        $totalCenter = Center::count();
        $totalMember = Member::count();
        $totalLoan = Loan::count();

        return view('dashboard.index',compact('totalBrnach','totalCenter','totalMember','totalLoan'));
    }
}
