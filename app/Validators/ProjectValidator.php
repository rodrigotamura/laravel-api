<?php

namespace laravelAPI\Validators;

use \Prettus\Validator\LaravelValidator;

class ProjectValidator extends LaravelValidator
{

    protected $rules = [
        'owner_id' => 'required|integer',
        'client_id' => 'required|integer',
        'name' => 'required',
        'description' => 'required',
        'progress' => 'required|integer|min:0|max:100',
        'status' => 'required|integer|min:1|max:3',
        'due_date' => 'required|date'
   ];

   
    protected $messages = [
        'owner_id.required' => 'É necessário informar o responsável do projeto',
        'owner_id.integer' => 'Valor inválido para o responsável do projeto',
        'client_id.required' => 'É necessário informar o cliente do projeto',
        'client_id.integer' => 'Valor inválido para o cliente do projeto',
        'name.required' => 'É necessário informar o nome do projeto',
        'description.required' => 'É necessário informar a descrição deste projeto',
        'progress.required' => 'Informe corretamente o progresso - entre 0 e 100 - deste projeto',
        'progress.integer' => 'Informe corretamente o progresso - entre 0 e 100 - deste projeto',
        'progress.min' => 'Informe corretamente o progresso - entre 0 e 100 - deste projeto',
        'progress.max' => 'Informe corretamente o progresso - entre 0 e 100 - deste projeto',
        'status.required' => 'Informe o status entre 1 a 3',
        'status.integer' => 'Informe o status entre 1 a 3',
        'status.min' => 'Informe o status entre 1 a 3',
        'status.max' => 'Informe o status entre 1 a 3',
        'due_date.required' => 'Informe corretamente a data de validade',
        'due_date.date' => 'Informe corretamente a data de validade'
    ];

    /**
     * Pass the data and the rules to the validator
     *
     * @param string $action
     * @return bool
     */
    public function passes($action = null)
    {
        $rules     = $this->getRules($action);
        $validator = $this->validator->make($this->data, $rules,$this->messages);

        if( $validator->fails() )
        {
            $this->errors = $validator->messages();
            return false;
        }

        return true;
    }
}
