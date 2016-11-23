<?php

namespace App\Domains\Problema\Validators;

use Prettus\Validator\LaravelValidator;
use Prettus\Validator\Contracts\ValidatorInterface;

class ProblemaValidator extends LaravelValidator
{
    public $rules = [
        ValidatorInterface::RULE_CREATE => [
            'problema' => ['required', 'string'],

        ],
        ValidatorInterface::RULE_UPDATE => [
            'problema' => ['string'],
        ]
    ];


}