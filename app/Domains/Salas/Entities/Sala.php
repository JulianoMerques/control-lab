<?php

namespace App\Domains\Salas\Entities;

use App\Domains\Maquina\Entities\Maquina;
use App\Domains\Pedido\Entities\Pedido;
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

    public function pedido(){
        return $this->hasMany(Pedido::class);
    }
    public function maquinas(){
        return $this->hasMany(Maquina::class);
    }

}
