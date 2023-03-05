<?php

namespace App\Repositories\Interfaces;

use App\Models\Task;

interface TaskInterface
{
    /**
     * @param array $data
     * @return Task
     */
    public function create(array $data): Task;

    /**
     * @param integer $id
     * @param array $data
     * @return int
     */
    public function update(int $id, array $data): int;

    /**
     * @param integer $id
     * @return Task
     */
    public function findOrFail(int $id): Task;

    /**
     * @param integer $id
     */
    public function delete(int $id);
}
