<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailConfirmationCSV extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token, $email, $first_name,$password)
    {
        $this->token = $token;
        $this->email = $email;
        $this->first_name = $first_name;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('Email.emailVerify')->subject('Account Registerd in TTT')->with([
            'token' => $this->token,
            'email' => $this->email,
            'first_name' => $this->first_name,
            'password' => $this->password
        ]);
    }
}