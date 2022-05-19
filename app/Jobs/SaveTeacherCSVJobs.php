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

class SaveTeacherCSVJobs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable;

    /**
     * The order instance.
     *
     * @var \Modules\ProductCategory\Entities\ProductCategory
     */
    public $teacher;
    public $school_id;

    public function __construct($teacher,$school_id)
    {
        $this->teacher = $teacher;
        $this->school_id = $school_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()  
    {
        $user = new User;
        $user->first_name = $this->teacher[0];
        $user->last_name = $this->teacher[1];
        $user->email = $this->teacher[2];
        $user->password = $this->teacher[3];
        $user->school_id = $this->school_id;
        $user->role_id = 3;
        $user->save();
    }
}
