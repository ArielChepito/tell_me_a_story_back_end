<?php

namespace App\Repositories;

use App\Models\usuario;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class usuarioRepository
 * @package App\Repositories
 * @version November 13, 2018, 7:53 pm UTC
 *
 * @method usuario findWithoutFail($id, $columns = ['*'])
 * @method usuario find($id, $columns = ['*'])
 * @method usuario first($columns = ['*'])
*/
class usuarioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'first_name',
        'last_name',
        'email',
        'file'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return usuario::class;
    }
}
