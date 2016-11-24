<?php

namespace App\Domains\TipoUser\Validators;

use Prettus\Validator\LaravelValidator;
use Prettus\Validator\Contracts\ValidatorInterface;

class TipoUserValidator extends LaravelValidator
{
    public $rules = [
        ValidatorInterface::RULE_CREATE => [
            'tipo' => ['required', 'string'],

        ],
        ValidatorInterface::RULE_UPDATE => [
            'tipo' => ['string'],
        ]
    ];


}