<?php

namespace App\Domains\Problema\Entities;

use App\Domains\Manutencao\Entities\Manutencao;
use App\Domains\Pedido\Entities\Pedido;
use Illuminate\Database\Eloquent\Model;

class Problema extends Model
{

    protected $table = 'problema';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'problema'
    ];

    public function pedido(){
        return $this->hasMany(Pedido::class);
    }
    public function manutencao(){
        return $this->hasMany(Manutencao::class);
    }


}
