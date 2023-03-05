<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Category;
use Tests\TestCase;

class CreateTaskTest extends TestCase
{

    public function test_success_create_task(): void
    {
        $response =  $this->post('/api/task/create', $this->getTaskCreationData(), []);
        $response->assertStatus(201);
    }

    public function test_failure_create_task_without_name()
    {
        $response =  $this->post('/api/task/create', $this->getTaskCreationDataWithoutName(), []);
        $response->assertStatus(422);
    }

    private function getTaskCreationData()
    {
        return [
            'name' => 'Dummy Task',
            'description' => 'Dummy description',
            'due_date' => date('Y-m-d'),
            'category_id' => Category::first()->id
        ];
    }

    private function getTaskCreationDataWithoutName()
    {
        return [
            'description' => 'Dummy description',
            'due_date' => date('Y-m-d'),
            'category_id' => Category::first()->id
        ];
    }
}
