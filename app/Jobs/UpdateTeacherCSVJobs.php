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

class UpdateTeacherCSVJobs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable;

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
        $user = User::where('email',$this->teacher[2])->first();
        $user->first_name = $this->teacher[0];
        $user->last_name = $this->teacher[1];
        $user->email = $this->teacher[2];
        $user->password = $this->teacher[3];
        $user->school_id = $this->teacher[4];
        $user->role_id = 3;
        $user->update();
    }
}
