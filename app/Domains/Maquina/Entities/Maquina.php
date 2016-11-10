<?php

namespace App\Domains\Maquina\Entities;

use App\Domains\Pedido\Entities\Pedido;
use Illuminate\Database\Eloquent\Model;

class Maquina extends Model
{

    protected $table = 'maquinas';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'mac', 'laboratorios_id', 'patrimonio','nome','configuracao','created_at','updated_at'
    ];

    public function pedido(){
        return $this->hasMany(Pedido::class);
    }

}
