<?php

namespace App\Domains\Turno\Entities;

use App\Domains\Usuario\Entities\Usuario;
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

    public function manutencao(){
        return $this->hasMany(Manutencao::class);
    }
    public function usuario(){
        return $this->hasMany(Usuario::class);
    }


}
