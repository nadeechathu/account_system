<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Brian2694\Toastr\Facades\Toastr;

use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // public function login()
    // {
    //     return view('auth.login');
    // }
    // public function create()
    // {
    //     return view('auth.login');
    // }


    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        $dt = Carbon::now();
        $todayDate = $dt->toDayDateTimeString();

        $activityLog = [
            'name' => $email,
            'email' => $email,
            'description' => 'Log In',
            'date_time' => $todayDate,
        ];

        return dd($activityLog);

        try {
            if (Auth::attempt(['email' => $email, 'password' => $password, 'status' => 'Active'])) {
                DB::table('activity__logs')->insert($activityLog);
                return redirect()->intended('dashboard');
            } elseif (Auth::attempt(['email' => $email, 'password' => $password, 'status' => null])) {
                DB::table('activity__logs')->insert($activityLog);
                return redirect()->intended('dashboard');
            } else {
                return redirect('login');
            }
        } catch (\Exception $e) {
            return redirect('login')->with('error', 'An error occurred during login.');
        }
    }

    public function logout()
    {
        $user = Auth::User();
        Session::put('user', $user);
        $user=Session::get('user');

        $name       = $user->name;
        $email      = $user->email;
        $dt         = Carbon::now();
        $todayDate  = $dt->toDayDateTimeString();

        $activityLog = [

            'name'        => $name,
            'email'       => $email,
            'description' => 'Logged out',
            'date_time'   => $todayDate,
        ];
        //return dd($activityLog);
        DB::table('activity__logs')->insert($activityLog);
        Auth::logout();
        //Toastr::success('Logout successfully :)','Success');
        return redirect('login');
    }
}
