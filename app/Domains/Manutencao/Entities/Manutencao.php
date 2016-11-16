<?php

namespace App\Domains\Manutencao\Entities;

use App\Domains\Maquina\Entities\Maquina;
use App\Domains\Pedido\Entities\Pedido;
use App\Domains\Problema\Entities\Problema;
use App\Domains\Salas\Entities\Sala;
use App\Domains\Turno\Entities\Turno;
use App\Domains\Usuario\Entities\Usuario;
use Illuminate\Database\Eloquent\Model;

class Manutencao extends Model
{

    protected $table = 'manutencao';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
       'usuario_id','turno_id','pedido_id','solucao'
    ];

    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }
    public function turno(){
        return $this->belongsTo(Turno::class);
    }
    public function pedido(){
        return $this->hasMany(Pedido::class);
    }
    public function problemas(){
        return $this->belongsTo(Problema::class);
    }




}
