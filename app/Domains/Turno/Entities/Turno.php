<?php

namespace App\Domains\Turno\Entities;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{

    protected $table = 'turno';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'turno'
    ];


}
