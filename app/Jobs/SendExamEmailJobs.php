<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\ExamCreation;


class SendExamEmailJobs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable;

    public $teacher_id;
    public $model;

    public function __construct($teacher_id,$model)
    {
        $this->teacher_id = $teacher_id;
        $this->model = $model;
    }

    public function handle()  
    {   
        $teacher = User::where('id',$this->teacher_id)->first();
        Mail::to($teacher->email)->send(new ExamCreation($this->model, $teacher));
    }
}
