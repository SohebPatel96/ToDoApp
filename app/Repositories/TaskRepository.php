<?php

namespace App\Repositories;

use App\Models\Task;
use App\Repositories\Interfaces\TaskInterface;

class TaskRepository implements TaskInterface
{
    /**
     *
     * @var Task
     */
    private $model;

    public function __construct()
    {
        $this->model = new Task();
    }
    /**
     *
     * @param array $data
     * @return Task
     */
    public function create(array $data): Task
    {
        return $this->model->create($data);
    }

    /**
     * @param integer $id
     * @param array $data
     * @return Task
     */
    public function update(int $id, array $data): int
    {
        return $this->model->where('id', $id)->update($data);
    }

    /**
     * @param integer $id
     * @return Task
     */
    public function findOrFail(int $id): Task
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @param integer $id
     * @return integer
     */
    public function delete(int $id)
    {
        return $this->model->destroy($id);
    }
}
