<?php

namespace App\Http\Controllers;

use App\Http\Resources\ServerErrorResource;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\TaskResource;
use App\Http\Resources\UnprocessableResource;
use App\Services\TaskService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Throwable;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TaskController extends Controller
{
    private $taskService;
    public function __construct(TaskService $service)
    {
        $this->taskService = $service;
    }

    /**
     * Create task
     *
     * @param Request $request
     * @return UnprocessableResource|ServerErrorResource|CreateTaskResource
     */
    public function create(Request $request)
    {
        try {
            $task = $this->taskService->create($request->all());
        } catch (ValidationException $e) {
            return (new UnprocessableResource($e));
        } catch (Throwable $e) {
            return (new ServerErrorResource($e));
        }
        return (new TaskResource($task, Response::HTTP_CREATED));
    }


    /**
     * @param $id
     * @return TaskResource|NotFoundHttpException
     */
    public function show($id)
    {
        return new TaskResource($this->taskService->findOrFail($id), Response::HTTP_ACCEPTED);
    }

    /**
     * @param int $id
     * @param Request $request
     * @return void
     */
    public function update(int $id, Request $request)
    {
        try {
            $task = $this->taskService->update($id, $request->all());
        } catch (ValidationException $e) {
            return (new UnprocessableResource($e));
        } catch (Throwable $e) {
            return (new ServerErrorResource($e));
        }
        return (new TaskResource($task, Response::HTTP_OK));
    }

    /**
     *
     * @param integer $id
     * @return SuccessResource
     */
    public function destroy(int $id)
    {
        $this->taskService->delete($id);
        return (new SuccessResource('Task deleted successfully'));
    }
}
