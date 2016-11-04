<?php

namespace App\Domains\Usuario\Validators;

use Prettus\Validator\LaravelValidator;
use Prettus\Validator\Contracts\ValidatorInterface;

class UsuarioValidator extends LaravelValidator
{
    public $rules = [
        ValidatorInterface::RULE_CREATE => [
            'turno_id'=>['required', 'integer'],
            'tipo_user_id'=>['required', 'integer'],
            'nome' => ['required','string'],
            'sobrenome' => ['string'],
            'telefone' => ['string'],
            'funcao' => ['required','string'],
            'password' => ['required','string'],
        ],
        ValidatorInterface::RULE_UPDATE => [
            'turno_id'=>['integer'],
            'tipo_user_id'=>['integer'],
            'nome' => ['string'],
            'sobrenome' => ['string'],
            'telefone' => ['string'],
            'funcao' => ['string'],
        ]
    ];


}