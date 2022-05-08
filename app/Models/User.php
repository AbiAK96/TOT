<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
/**
 * Class User
 * @package App\Models
 * @version May 4, 2022, 5:59 am UTC
 *
 * @property \App\Models\Role $role
 * @property \App\Models\School $school
 * @property integer $school_id
 * @property string $email
 * @property string $password
 * @property string $first_name
 * @property string $last_name
 * @property string $mobile_number
 * @property string $city
 * @property integer $zip_code
 * @property boolean $tfa_enabled
 * @property integer $email_verified_at
 * @property integer $mobile_verified_at
 * @property integer $role_id
 */
class User extends Authenticatable
{
    use SoftDeletes;
    use HasApiTokens;
    use HasFactory;

    public $table = 'users';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'school_id',
        'email',
        'password',
        'first_name',
        'last_name',
        'mobile_number',
        'city',
        'zip_code',
        'tfa_enabled',
        'email_verified_at',
        'mobile_verified_at',
        'role_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'school_id' => 'integer',
        'email' => 'string',
        'password' => 'string',
        'first_name' => 'string',
        'last_name' => 'string',
        'mobile_number' => 'string',
        'city' => 'string',
        'zip_code' => 'integer',
        'tfa_enabled' => 'boolean',
        'email_verified_at' => 'integer',
        'mobile_verified_at' => 'integer',
        'role_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'school_id' => 'required|integer|max:255',
        'email' => 'required|string|max:255',
        'password' => 'required|string|max:255',
        'first_name' => 'nullable|string|max:255',
        'last_name' => 'nullable|string|max:255',
        'mobile_number' => 'nullable|string|max:255',
        'city' => 'nullable|string|max:255',
        'zip_code' => 'nullable|integer',
        'tfa_enabled' => 'boolean',
        'email_verified_at' => 'integer',
        'mobile_verified_at' => 'integer',
        'role_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function getExistingEmail($email)
    {
        $user = User::where('email', $email)->first();

        if(null == $user){
            return true;
        }
        return false;
    }

    public function checkRegister($email)
    {
        $user = User::where('email', $email)->first();

        if(null != $user){
            return $email;
        }
        return false;
    }

    public function checkCreditials($email, $password) 
    {
        $user = User::where('email', $email)->first();
        if (null != $user && Hash::check($password, $user->password)) {
            return $user;
        } else {
            return false;
        }
    }

    public function emailVerified($email) 
    {
        $email = User::where('email', $email)->first()->email_verified_at;
        if ($email != null) {
            return $email;
        } else {
            return false;
        }
    }
}
