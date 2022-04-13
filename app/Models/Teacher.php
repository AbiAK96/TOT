<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Teacher
 * @package App\Models
 * @version April 8, 2022, 2:01 am UTC
 *
 * @property \App\Models\Account $account
 * @property \App\Models\Role $role
 * @property \App\Models\TeacherType $teacherType
 * @property integer $school_id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $first_name
 * @property string $last_name
 * @property string $mobile_number
 * @property string $profile_image
 * @property string $city
 * @property integer $zip_code
 * @property boolean $is_activated
 * @property boolean $tfa_enabled
 * @property integer $email_verified_at
 * @property integer $mobile_verified_at
 * @property integer $role_id
 * @property integer $teacher_type_id
 */
class Teacher extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'teachers';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'school_id',
        'username',
        'email',
        'password',
        'first_name',
        'last_name',
        'mobile_number',
        'profile_image',
        'city',
        'zip_code',
        'is_activated',
        'tfa_enabled',
        'email_verified_at',
        'mobile_verified_at',
        'role_id',
        'teacher_type_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'school_id' => 'integer',
        'username' => 'string',
        'email' => 'string',
        'password' => 'string',
        'first_name' => 'string',
        'last_name' => 'string',
        'mobile_number' => 'string',
        'profile_image' => 'string',
        'city' => 'string',
        'zip_code' => 'integer',
        'is_activated' => 'boolean',
        'tfa_enabled' => 'boolean',
        'email_verified_at' => 'integer',
        'mobile_verified_at' => 'integer',
        'role_id' => 'integer',
        'teacher_type_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'school_id' => 'required',
        'username' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'password' => 'required|string|max:255',
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'mobile_number' => 'required|string|max:255',
        'profile_image' => 'string|max:255',
        'city' => 'required|string|max:255',
        'zip_code' => 'required|integer',
        'is_activated' => 'boolean',
        'tfa_enabled' => 'boolean',
        'email_verified_at' => 'integer',
        'mobile_verified_at' => 'integer',
        'role_id' => 'required',
        'teacher_type_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function account()
    {
        return $this->belongsTo(\App\Models\Account::class, 'account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function role()
    {
        return $this->belongsTo(\App\Models\Role::class, 'role_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function teacherType()
    {
        return $this->belongsTo(\App\Models\TeacherType::class, 'teacher_type_id');
    }
}
