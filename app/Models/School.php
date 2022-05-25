<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class School
 * @package App\Models
 * @version April 13, 2022, 6:32 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $teachers
 * @property string $school_name
 * @property string $school_domain
 * @property string $school_address
 */
class School extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'schools';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'school_name',
        'school_domain',
        'school_address'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'school_name' => 'string',
        'school_domain' => 'string',
        'school_address' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'school_name' => 'required|string|max:255',
        'school_domain' => 'required|string|max:255',
        'school_address' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function teachers()
    {
        return $this->hasMany(\App\Models\Teacher::class, 'school_id');
    }

    public function teachersEmailValidation($array) 
    {
        $teachers_details = $array[0];

        $teachers = [];
        foreach($teachers_details as $teacher_detail){
            $school_domain = School::where('id',auth()->user()->school_id)->first()->school_domain;
            $email = explode('@',$teacher_detail[2])[1];
            if($email != $school_domain){
                array_push($teachers,$teacher_detail[2]);
            }
        }

        if(count($teachers) != 0){
            return $teachers;
        }
    }

    public function search($request)
    {
        $schools = School::where('school_name', 'LIKE', "%{$request->school_name}%")
                            ->where('school_domain', 'LIKE', "%{$request->school_domain}%")
                            ->where('id','!=',1)
                            ->get();

        return $schools;
    }
 }
