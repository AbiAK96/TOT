<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;

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

//     public function login(Request $request)
//     {
//         //$user = User::where('email',$request->email)->first();
//         // if ($user->email_verified_at == null) {
//         //     print_r('Null');die();
//         // }
//         // print_r('Not Null');die();

//         try{
//             $email = User::checkRegister($request['email']);
//             if(true != $email) {
//                 $message = 'Email not found. Please register';
//                 print_r('Email not found. Please register');die();
//                 return view('login',compact('message'));
//             } else {
//                 $credential = User::checkCreditials($request['email'], $request['password']);
//                 $response = [];
//                 if (false == $credential) {
//                     print_r('Invalid credentials');die();
//                     $message = 'Invalid credentials';
//                     return view('login',compact('message'));
//                 } else {
//                     $emailVerified = User::emailVerified($request['email']);
//                     if (false == $emailVerified) {
//                         print_r('Email not verified. Please verify your email');die();
//                         $message = 'Email not verified. Please verify your email';
//                         return view('login',compact('message'));
//                     } else{
//                         //print_r('LogIn');die();
//                         $user = User::where('email', $request->email)->first();
//                         // // $token = $user->createToken('LoginToken')->plainTextToken;
//                         // $response['token'] = $token;
//                         // $response['user'] = $user;
//                         if ($user->role_id == 1) {
//                             return view('super_admin');
//                         } else if ($user->role_id == 2) {
//                             return view('admin');
//                         } else if ($user->role_id == 3) {
//                             return view('teacher');
//                         }
//                     }
//                 }
//             }
//         } catch (\Exception $e){
//             $message = 'Invalid credentials.';
//             return view('auth.login',compact('message'));
//         }
//     }
}
