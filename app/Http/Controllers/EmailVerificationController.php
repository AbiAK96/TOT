<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Mail\EmailConfirmation;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Http\Requests\EmailVerificationRequest;

class EmailVerificationController extends AppBaseController
{
    public function processData($email,$first_name,$password)
    {
        $token = $this->createToken($email);
        $this->sendEmail($token, $email, $first_name,$password); 
    }

    public function sendEmail($token, $email, $first_name, $password)
    {
        Mail::to($email)->send(new EmailConfirmation($token, $email, $first_name, $password));
    }    
    
    public function createToken($email)
    {    
        $oldToken = DB::table('email_verifications')->where('email', $email)->first();

        $token = Str::random(40);
        $this->saveToken($token, $email);

        return $token;
    }    
    
    public function saveToken($token, $email)
    {
        DB::table('email_verifications')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);    
    }

    public function emailVerifyProcess(EmailVerificationRequest $request)
    {
        return $this->verifyEmailRow($request)->count() > 0 ? $this->verifyEmail($request) : $this->tokenNotFoundError();
    }
  
    private function verifyEmailRow($request)
    {
        return DB::table('email_verifications')->where([
            'email' => $request->email,
            'token' => $request->token
        ]);
    }

    private function tokenNotFoundError() 
    {
        return view('auth.passwords.verified_failed');
    }

    private function verifyEmail($request)
    {
        $userData = User::whereEmail($request->email)->first();

        $userData->update([
          'email_verified_at' => $request->email_verified_at = time()
        ]);

        $this->verifyEmailRow($request)->delete();
        return view('auth.passwords.verified_success');
    }

    //Resend email for Email Verification
    public function resendEmailVerification(ResendEmailRequest $request)
    {
        $email = $request->email;
        $token = $this->generateToken($email);
        $this->resendEmail($token, $email);

        $message = 'Please check your email inbox for instructions to verify your email';    
        return $this->sendResponse(null, $message, null);
        
    }

    public function resendEmail($token, $email)
    {
        $first_name = User::getFirstNameByEmail($email);
        Mail::to($email)->send(new EmailConfirmation($token, $email, $first_name));
    }    
    
    public function generateToken($email)
    {    
        //$oldToken = DB::table('email_verifications')->where('email', $email)->first();

        $token = Str::random(40);
        $this->updateToken($token, $email);

        return $token;
    }    
    
    public function updateToken($token, $email)
    {
        DB::table('email_verifications')->where('email', $email)->update([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);    
    }
}
