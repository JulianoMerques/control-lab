<?php

namespace App\Domains\Pedido\Entities;

use App\Domains\Manutencao\Entities\Manutencao;
use App\Domains\Maquina\Entities\Maquina;
use App\Domains\Problema\Entities\Problema;
use App\Domains\Salas\Entities\Sala;
use App\Domains\TipoManutencao\Entities\TipoManutencao;
use App\Domains\Usuario\Entities\Usuario;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{

    protected $table = 'pedido';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
       'id', 'usuario_id', 'laboratorios_id','maquinas_id', 'problema_id','tipo_manutencao_id','descricao', 'situacao'
    ];


    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }
    public function laboratorios(){
        return $this->belongsTo(Sala::class);
    }
    public function maquinas(){
        return $this->belongsTo(Maquina::class);
    }
    public function problema(){
        return $this->belongsTo(Problema::class);
    }
    public function tipo_manutencao(){
        return $this->belongsTo(TipoManutencao::class);
    }


}
