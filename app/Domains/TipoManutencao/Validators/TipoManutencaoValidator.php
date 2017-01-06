<?php

namespace App\Domains\TipoManutencao\Validators;

use Prettus\Validator\LaravelValidator;
use Prettus\Validator\Contracts\ValidatorInterface;

class TipoManutencaoValidator extends LaravelValidator
{
    public $rules = [
        ValidatorInterface::RULE_CREATE => [
            'nome' => ['required', 'string'],

        ],
        ValidatorInterface::RULE_UPDATE => [
            'nome' => ['string'],
        ]
    ];


}