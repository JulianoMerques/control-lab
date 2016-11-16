<?php

namespace App\Domains\Laboratorios\Validators;

use Prettus\Validator\LaravelValidator;
use Prettus\Validator\Contracts\ValidatorInterface;

class LaboratorioValidator extends LaravelValidator
{
    public $rules = [
        ValidatorInterface::RULE_CREATE => [
            'nome' => ['required', 'string'],
            'capacidade' => ['required', 'integer'],

        ],
        ValidatorInterface::RULE_UPDATE => [
            'nome' => ['string'],
            'capacidade' => ['integer'],
        ]
    ];


}