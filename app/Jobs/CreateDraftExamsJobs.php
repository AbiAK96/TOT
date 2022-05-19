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

class CreateDraftExamsJobs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable;

    /**
     * The order instance.
     *
     * @var \Modules\ProductCategory\Entities\ProductCategory
     */
    public $teacher_id;
    public $model;

    /**
     * Create a new job instance.
     *
     * @param \Modules\ProductCategory\Entities\ProductCategory  $ProductCategory
     * @return void
     */
    public function __construct($teacher_id,$model)
    {
        $this->teacher_id = $teacher_id;
        $this->model = $model;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()  
    {
        DB::table('draft_exams')->insert([
            'teacher_id' => $this->teacher_id,
            'start_time' => $this->model->start_time,
            'end_time' => $this->model->end_time,
            'name' => $this->model->name,
        ]);    
    }
}
