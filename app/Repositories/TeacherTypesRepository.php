<?php

namespace App\Repositories;

use App\Models\TeacherType;
use App\Repositories\BaseRepository;

/**
 * Class TeacherTypesRepository
 * @package App\Repositories
 * @version April 13, 2022, 6:56 am UTC
*/

class TeacherTypesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return TeacherType::class;
    }
}
