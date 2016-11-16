<?php

namespace App\Domains\Pedido\Validators;

use Prettus\Validator\LaravelValidator;
use Prettus\Validator\Contracts\ValidatorInterface;

class PedidoValidator extends LaravelValidator
{
    public $rules = [
        ValidatorInterface::RULE_CREATE => [

            'id' => ['required'],
            'usuario_id' => ['required', 'integer'],
            'laboratorios_id'=> ['required', 'integer'],
            'maquinas_id'=> ['required', 'integer'],
            'problema_id'=> ['required', 'integer'],
            'tipo_manutencao_id'=> ['required', 'integer'],
            'descricao'=> ['required', 'string'],


        ],
        ValidatorInterface::RULE_UPDATE => [
            'situacao'=> ['integer']
        ]
    ];


}