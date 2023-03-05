<?php

namespace App\Http\Resources;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * @var Task
     */
    private $task;

    /**
     * @var int
     */
    private $httpCode;
    public function __construct(Task $task, int $httpCode)
    {
        $this->task = $task;
        $this->httpCode = $httpCode;
    }
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->task->id,
            'description' => $this->task->description,
            'due_date' => $this->task->due_date,
            'category' => $this->task->category
        ];
    }

    public function toResponse($request)
    {
        return parent::toResponse($request)->setStatusCode($this->httpCode);
    }
}
