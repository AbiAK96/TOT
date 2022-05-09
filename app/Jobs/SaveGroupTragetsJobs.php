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

class SaveGroupTragetsJobs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable;

    /**
     * The order instance.
     *
     * @var \Modules\ProductCategory\Entities\ProductCategory
     */
    public $id;
    public $teacher_group_id;

    /**
     * Create a new job instance.
     *
     * @param \Modules\ProductCategory\Entities\ProductCategory  $ProductCategory
     * @return void
     */
    public function __construct($id,$teacher_group_id)
    {
        $this->id = $id;
        $this->teacher_group_id = $teacher_group_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()  
    {
        $teacher = User::where('id',$this->id)->first();
        DB::table('group_targets')->insert([
            'group_id' => $this->teacher_group_id,
            'teacher_id' => $teacher->id,
            'first_name' => $teacher->first_name,
            'last_name' => $teacher->last_name
        ]);    
    }
}
