<?php

namespace App\Repositories;

use App\Models\memberimages;
use App\Repositories\BaseRepository;

/**
 * Class memberimagesRepository
 * @package App\Repositories
 * @version February 15, 2023, 7:54 pm UTC
*/

class memberimagesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'memberid',
        'description',
        'imagefile'
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
        return memberimages::class;
    }
}
