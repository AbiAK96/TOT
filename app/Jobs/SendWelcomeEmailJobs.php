<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Mail\EmailConfirmationCSV;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmailJobs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable;

    /**
     * The order instance.
     *
     * @var \Modules\ProductCategory\Entities\ProductCategory
     */
    public $teacher;

    public function __construct($teacher)
    {
        $this->teacher = $teacher;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()  
    {
        $email = $this->teacher[2];
        $first_name = $this->teacher[0];
        $password = $this->teacher[3];
        $token = null;
        Mail::to($email)->send(new EmailConfirmationCSV($token, $email, $first_name, $password));
    }
}
