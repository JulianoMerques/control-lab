<?php

namespace App\Domains\Manutencao\Validators;

use Prettus\Validator\LaravelValidator;
use Prettus\Validator\Contracts\ValidatorInterface;

class ManutencaoValidator extends LaravelValidator
{
    public $rules = [
        ValidatorInterface::RULE_CREATE => [
            'usuario_id' => ['required', 'integer'],
            'turno_id' => ['required', 'integer'],
            'pedido_id' => ['required', 'integer'],
            'solucao' => ['required','string'],

        ],
        ValidatorInterface::RULE_UPDATE => [
            'usuario_id' => ['required', 'integer'],
            'turno_id' => ['required', 'integer'],
            'pedido_id' => ['required', 'integer'],
            'solucao' => ['required','string'],
        ]
    ];


}