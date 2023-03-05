<?php

namespace App\Http\Resources;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;


class UnprocessableResource extends JsonResource
{
    /**
     * @var Task
     */
    private $validationException;
    public function __construct(ValidationException $validationException)
    {
        $this->validationException = $validationException;
    }
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            $this->validationException->errors()
        ];
    }

    public function toResponse($request)
    {
        return parent::toResponse($request)->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
