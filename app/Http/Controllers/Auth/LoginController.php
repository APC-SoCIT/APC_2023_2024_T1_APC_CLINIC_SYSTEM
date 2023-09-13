<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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

    public function login(Request $request)
    {   
        $input = $request->all();
     
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
     
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->role->role == 'Student') {          //if User's role is Student
                return redirect()->route('studentHome');
            }else if (auth()->user()->role->role == 'Faculty') {    //if User's role is Faculty
                return redirect()->route('facultyHome');
            }else if (auth()->user()->role->role == 'Staff') {      //if User's role is Staff
                return redirect()->route('staffHome');
            }else if (auth()->user()->role->role == 'Nurse') {      //if User's role is Nurse
                return redirect()->route('nurseHome');
            }else if (auth()->user()->role->role == 'Doctor') {     //if User's role is Doctor
                return redirect()->route('doctorHome');
            }else if (auth()->user()->role->role == 'Dentist') {    //if User's role is Dentist
                return redirect()->route('dentistHome');
            }else if (auth()->user()->role->role == 'Admin') {      //if User's role is Admin
                return redirect()->route('adminHome');
            }
        }else{
            return redirect()->route('login')
                ->with('error','Email-Address And Password Are Wrong.');
        }
          
    }
}
