<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Question;
use App\Models\SelectedQuestion;

class SelectQuestionsJobs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable;

    /**
     * The order instance.
     *
     * @var \Modules\ProductCategory\Entities\ProductCategory
     */
    public $id;

    /**
     * Create a new job instance.
     *
     * @param \Modules\ProductCategory\Entities\ProductCategory  $ProductCategory
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()  
    {
        $question = Question::where('id',$this->id)->first();
        $selected_question = new SelectedQuestion;
        $selected_question->question_id             = $question->id;
        $selected_question->question_type_id        = $question->question_type_id;
        $selected_question->question                = $question->question;
        $selected_question->answer_one              = $question->answer_one;
        $selected_question->answer_two              = $question->answer_two;
        $selected_question->answer_three            = $question->answer_three;
        $selected_question->answer_four             = $question->answer_four;
        $selected_question->correct_answer          = $question->correct_answer;
        $selected_question->save();
    }
}
