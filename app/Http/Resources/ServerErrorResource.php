<?php

namespace App\Http\Resources;

use App\Models\Task;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class ServerErrorResource extends JsonResource
{
    private $exception;
    public function __construct(Throwable $e)
    {
        $this->exception = $e;
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //Add logic to notify devs about this error
        return [
            'Something went wrong'
        ];
    }

    public function toResponse($request)
    {
        return parent::toResponse($request)->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
