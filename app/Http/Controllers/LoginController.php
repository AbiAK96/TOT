<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class LoginController extends AppBaseController
{
    public function loginView()
    {
        $message = null;
        return view('auth.login')->with('message',$message);
    }

    public function login(Request $request)
    {
        try{
            $email = User::checkRegister($request['email']);
            if(true != $email) {
                $message = 'Email not found. Please register';
                return view('auth.login',compact('message'));
            } else {
                $credential = User::checkCreditials($request['email'], $request['password']);
                $response = [];
                if (false == $credential) {
                    $message = 'Invalid credentials';
                    return view('auth.login',compact('message'));
                } else {
                    $emailVerified = User::emailVerified($request['email']);
                    if (false == $emailVerified) {
                        $message = 'Email not verified. Please verify your email';
                        return view('auth.login',compact('message'));
                    } else{
                        $user = User::where('email', $request->email)->first();
                        $token = $user->createToken('LoginToken')->plainTextToken;
                        $response['token'] = $token;
                        $response['user'] = $user;
                        if ($user->role_id == 1) {
                            return view('super_admin');
                        } else if ($user->role_id == 2) {
                            return view('admin');
                        } else if ($user->role_id == 3) {
                            return view('teacher');
                        }
                    }
                }
            }
        } catch (\Exception $e){
            $message = 'Invalid credentials.';
            return view('auth.login',compact('message'));
        }
    }
}
