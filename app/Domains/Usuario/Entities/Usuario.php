<?php
namespace App\Domains\Usuario\Entities;

use App\Domains\Manutencao\Entities\Manutencao;
use App\Domains\Pedido\Entities\Pedido;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $table = 'usuario';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'turno_id','tipo_user_id','nome','sobrenome','telefone','funcao', 'email', 'password','img'
    ];

    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function pedido(){
        return $this->hasMany(Pedido::class);
    }
    public function manutencao(){
        return $this->hasMany(Manutencao::class);
    }
}