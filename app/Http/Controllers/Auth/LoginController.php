<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request,[
            'email'=> 'required|email|',
            'password'=> 'required'
        ]);
        // $validator = validator::make($request->all(), [
        //     'email' => 'required|email',
        //     'password' => 'reqired'
        // ]);


        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {

            return redirect()->route('users/Home');

        } else {
            return redirect()->route('login')->with('error', 'Email-address and Password');

            // if ($validator->passes()) {
            //     if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            //     } else {
            //         return redirect()->route('login')->with('Either email or password is uncorrect');
            //     }

            // } else {
            //     return redirect()->route('accout.login')
            //         ->withInput()->withErrors($validator);
            // }
        }
    }
}