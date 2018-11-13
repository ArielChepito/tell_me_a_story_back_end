<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class usuario
 * @package App\Models
 * @version November 13, 2018, 7:53 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection UsuarioStory
 * @property string first_name
 * @property string last_name
 * @property string email
 * @property string file
 */
class usuario extends Model
{
    use SoftDeletes;

    public $table = 'usuario';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'id',
        'first_name',
        'last_name',
        'email',
        'file'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'first_name' => 'string',
        'last_name' => 'string',
        'email' => 'string',
        'file' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function usuarioStories()
    {
        return $this->hasMany(\App\Models\UsuarioStory::class);
    }
}
