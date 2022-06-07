<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ExamCreation extends Mailable
{
    use Queueable, SerializesModels;

    public $model;
    public $teacher;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($model,$teacher)
    {
        $this->model = $model;
        $this->teacher = $teacher;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('Email.examCreation')->subject('Exam has been created')->with([
            'model' => $this->model,
            'teacher' => $this->teacher
        ]);
    }
}
