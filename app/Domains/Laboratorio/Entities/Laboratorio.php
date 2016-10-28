<?php

namespace App\Domains\Laboratorio\Entities;

use Illuminate\Database\Eloquent\Model;

class Laboratorio extends Model
{

    protected $table = 'laboratorios';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'nome', 'capacidade'
    ];


}
