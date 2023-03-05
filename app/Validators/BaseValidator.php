<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;

class BaseValidator
{
    protected $rules = [];
    protected $messages = [];

    /**
     * @param array $data
     * @param string $key
     * @throws \Illuminate\Validation\ValidationException
     * @return array
     */
    public function validate(array $data, string $key): array
    {
        $validator = Validator::make($data, $this->rules[$key], $this->messages[$key]);
        $validator->validate();
        return $validator->validated();
    }
}
