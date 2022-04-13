<?php

namespace App\Repositories;

use App\Models\Teacher;
use App\Repositories\BaseRepository;

/**
 * Class TeacherRepository
 * @package App\Repositories
 * @version April 8, 2022, 2:01 am UTC
*/

class TeacherRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'account_id',
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
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Teacher::class;
    }
}
