<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use App\Jobs\CreateDraftExamsJobs;

class Result extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'results';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'teacher_id',
        'school_id',
        'result',
        'date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'teacher_id' => 'integer',
        'school_id' => 'integer',
        'result' => 'string',
        'date' => 'datetime:d/m/Y H:i:s'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'teacher_id' => 'max:255',
        'school_id' => 'max:255',
        'result' => 'string|max:255',
        'date' => 'string|max:255',
    ];

    public function getDateAttribute($value)
    {
        return date('y-m-d',$value); 
    }
}
