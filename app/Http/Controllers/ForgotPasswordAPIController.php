<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\ForgotPassword;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordAPIController extends AppBaseController
{
    public function forgotPassword(Request $request)
    {
        $this->processData($request->email);
        $message = 'Please check your email inbox for instructions to reset your password';
        return view('auth.login',compact('message'));
    }    

    public function processData($email)
    {
        $token = $this->createToken($email);
        $this->sendEmail($token, $email); 
    }

    public function sendEmail($token, $email){
        Mail::to($email)->send(new ForgotPassword($token, $email));
    }    

    public function createToken($email)
    {    
        $token = Str::random(40);
        $this->saveToken($token, $email);

        return $token;
    }    

    public function saveToken($token, $email)
    {
        DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);    
    }

    public function passwordResetProcess(PasswordResetRequest $request)
    {
        return $this->updatePasswordRow($request)->count() > 0 ? $this->resetPassword($request) : $this->tokenNotFoundError();
    }
  
    public function resetPasswordView(Request $request)
    {
        return view('password_reset')->with('request',$request);
    }

      // Verify if token is valid
    private function updatePasswordRow($request)
    {
        return DB::table('password_resets')->where([
            'email' => $request->email,
            'token' => $request->token
        ]);
    }

    // Token not found response  
    private function tokenNotFoundError() 
    {
        print_r('Your token is wrong.');die();
    }

    // Reset password
    private function resetPassword($request)
    {
        // find email
        $customerData = Customer::whereEmail($request->email)->first();
        // update password
        $customerData->update([
          'password'=>bcrypt($request->password)
        ]);
        // remove verification data from db
        $this->updatePasswordRow($request)->delete();
        print_r('Password has been updated');die();
    }
}
