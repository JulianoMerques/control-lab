<?php

namespace App\Domains\TipoUser\Entities;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{

    protected $table = 'tipo_user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'nome'
    ];


}
