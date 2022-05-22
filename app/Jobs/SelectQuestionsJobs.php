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
        $question->status = true;
        $question->update();
    }
}
