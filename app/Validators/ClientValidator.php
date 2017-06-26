<?php

namespace laravelAPI\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ClientValidator extends LaravelValidator
{

    protected $rules = [
        'name' => 'required|max:255',
        'responsable' => 'required|max:255',
        'email' => 'required|email',
        'phone' => 'required',
        'address' => 'required',
   ];

   protected $messages = [
            'name.required' => 'É necessário informar o NOME',
            'name.max' => 'É necessário informar o NOME',
            'responsable.required'  => 'Favor informar o responsável',
            'email.required'  => 'Favor informar um endereço de e-mail válido',
            'email.email'  => 'Favor informar um endereço de e-mail válido'
        ];
}