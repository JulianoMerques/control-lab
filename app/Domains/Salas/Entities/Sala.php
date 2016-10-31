<?php

namespace App\Domains\Salas\Entities;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{

    protected $table = 'laboratorios';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'nome', 'capacidade','descricao'
    ];


}
