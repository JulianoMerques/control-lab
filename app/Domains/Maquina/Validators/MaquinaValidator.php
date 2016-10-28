<?php

namespace App\Domains\Maquina\Validators;

use Prettus\Validator\LaravelValidator;
use Prettus\Validator\Contracts\ValidatorInterface;

class MaquinaValidator extends LaravelValidator
{
    public $rules = [
        ValidatorInterface::RULE_CREATE => [
            'mac' => ['required', 'string'],
            'laboratorios_id' => ['required', 'integer'],
            'patrimonio' => ['integer'],
            'nome' => ['string'],
            'configuracao' => ['string']
        ],
        ValidatorInterface::RULE_UPDATE => [
            'mac' => ['required', 'string'],
            'laboratorio_id' => ['required', 'integer'],
            'patrimonio' => ['integer'],
            'nome' => ['string'],
            'configuracao' => ['string',  'max:255']
        ]
    ];


}