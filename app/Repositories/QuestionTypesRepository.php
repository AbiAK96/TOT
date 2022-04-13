<?php

namespace App\Repositories;

use App\Models\QuestionTypes;
use App\Repositories\BaseRepository;

/**
 * Class QuestionTypesRepository
 * @package App\Repositories
 * @version April 8, 2022, 2:43 am UTC
*/

class QuestionTypesRepository extends BaseRepository
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
        return QuestionTypes::class;
    }
}
