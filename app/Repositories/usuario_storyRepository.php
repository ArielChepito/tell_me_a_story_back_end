<?php

namespace App\Repositories;

use App\Models\usuario_story;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class usuario_storyRepository
 * @package App\Repositories
 * @version November 13, 2018, 7:54 pm UTC
 *
 * @method usuario_story findWithoutFail($id, $columns = ['*'])
 * @method usuario_story find($id, $columns = ['*'])
 * @method usuario_story first($columns = ['*'])
*/
class usuario_storyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_usuario',
        'id_story',
        'comentario',
        'state'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return usuario_story::class;
    }
}
