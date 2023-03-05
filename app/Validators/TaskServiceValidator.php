<?php

namespace App\Validators;

class TaskServiceValidator extends BaseValidator
{

    public const TASK_CREATE = 'create';
    public const TASK_UPDATE = 'update';

    public $rules = [
        self::TASK_CREATE => [
            'name' => 'required|string|min:3',
            'description' => 'nullable|string|max:255',
            'due_date' => "nullable|date|after_or_equal:yesterday",
            'category_id' => 'nullable|integer|exists:categories,id'
        ],
        self::TASK_UPDATE => [
            'id' => 'required|integer|exists:tasks,id',
            'name' => 'required|string|min:3',
            'description' => 'nullable|string|max:255',
            'due_date' => "nullable|date|after_or_equal:yesterday",
            'category_id' => 'nullable|integer|exists:categories,id'
        ],
    ];

    public $messages = [
        self::TASK_CREATE => [
            'name.required' => 'The :attribute field is required'
        ],
        self::TASK_UPDATE => []
    ];
}
