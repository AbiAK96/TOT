<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use App\Jobs\CreateDraftExamsJobs;

class Exam extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'exams';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'teacher_group_id',
        'start_time',
        'end_time'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'teacher_group_id' => 'string',
        'start_time' => 'string',
        'end_time' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'teacher_group_id' => 'required|string|max:255',
        'start_time' => 'required|string|max:255',
        'end_time' => 'string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            foreach(json_decode($model->teacher_group_id) as $id) {
                $teachers_ids = DB::table('group_targets')
                ->select('group_targets.teacher_id')
                ->where('group_id', $id)
                ->get();

                 foreach($teachers_ids as $teacher_id) {
                    $createDraftExam = (new CreateDraftExamsJobs($teacher_id->teacher_id,$model));
                    dispatch($createDraftExam);
             }
            }
        });
    }
}
