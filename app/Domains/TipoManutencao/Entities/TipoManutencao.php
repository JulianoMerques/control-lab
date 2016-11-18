<?php

namespace App\Domains\TipoManutencao\Entities;

use App\Domains\Pedido\Entities\Pedido;
use Illuminate\Database\Eloquent\Model;

class TipoManutencao extends Model
{

    protected $table = 'tipo_manutencao';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'tipo_manutencao'
    ];

    public function pedido(){
        return $this->hasMany(Pedido::class);
    }


}
