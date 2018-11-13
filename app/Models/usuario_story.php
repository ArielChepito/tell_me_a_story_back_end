<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class usuario_story
 * @package App\Models
 * @version November 13, 2018, 7:54 pm UTC
 *
 * @property \App\Models\Usuario usuario
 * @property \App\Models\Story story
 * @property string id_usuario
 * @property integer id_story
 * @property string comentario
 * @property integer state
 */
class usuario_story extends Model
{
    use SoftDeletes;

    public $table = 'usuario_story';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_usuario',
        'id_story',
        'comentario',
        'state'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_usuario' => 'string',
        'id_story' => 'integer',
        'comentario' => 'string',
        'state' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function usuario()
    {
        return $this->belongsTo(\App\Models\Usuario::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function story()
    {
        return $this->belongsTo(\App\Models\Story::class);
    }
}
