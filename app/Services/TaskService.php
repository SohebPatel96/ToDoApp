<?php

namespace App\Services;

use App\Models\Task;
use App\Repositories\Interfaces\TaskInterface;
use App\Validators\TaskServiceValidator;

class TaskService
{
    /**
     * @var TaskInterface $taskRepository
     */
    private $taskRepository;

    /**
     * @var TaskServiceValidator
     */
    private $validator;

    /**
     * @param TaskInterface $taskRepository
     */
    public function __construct(TaskInterface $taskRepository, TaskServiceValidator $validator)
    {
        $this->taskRepository = $taskRepository;
        $this->validator = $validator;
    }

    /**
     * @param array $data
     * @throws \Illuminate\Validation\ValidationException
     * @return Task
     */
    public function create(array $data): Task
    {
        $validatedData = $this->validator->validate($data, TaskServiceValidator::TASK_CREATE);
        return $this->taskRepository->create($validatedData);
    }

    public function update(int $id, array $data)
    {
        $validatedData = $this->validator->validate(array_merge($data, ['id' => $id]), TaskServiceValidator::TASK_UPDATE);
        $this->taskRepository->update($id, $validatedData);
        return $this->taskRepository->findOrFail($id);
    }

    /**
     * @param integer $id
     * @return integer
     */
    public function delete(int $id)
    {
        return $this->taskRepository->delete($id);
    }

    /**
     * @param integer $id
     */
    public function findOrFail(int $id)
    {
        return $this->taskRepository->findOrFail($id);
    }
}
