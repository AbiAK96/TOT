<?php

namespace App\Repositories;

use App\Models\School;
use App\Repositories\BaseRepository;

/**
 * Class SchoolRepository
 * @package App\Repositories
 * @version April 13, 2022, 6:32 am UTC
*/

class SchoolRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'school_name',
        'school_domain',
        'school_address'
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
        return School::class;
    }
}
