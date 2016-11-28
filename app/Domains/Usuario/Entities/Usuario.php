<?php
namespace App\Domains\Usuario\Entities;

use App\Domains\Manutencao\Entities\Manutencao;
use App\Domains\Pedido\Entities\Pedido;
use App\Domains\Turno\Entities\Turno;
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

    public function turno(){
        return $this->belongsTo(Turno::class);
    }


    public function isAdm()
    {
        $nivel_access = Usuario::getAttribute('tipo_usuario_id');

        if($nivel_access === 1){
            return true;
        }
        if($nivel_access === 2){
            return true;
        }

        return false;
    }

//    public function isEstag(){
//        $nivel_access = Usuario::getAttribute('tipo_user_id');
//        if($nivel_access === 2){
//            return true;
//        }
//    }
}