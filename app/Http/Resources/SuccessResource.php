<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\Response;


class SuccessResource extends JsonResource
{
    /**
     * @var string
     */
    private $message;
    public function __construct(string $message)
    {
        $this->message = $message;
    }
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'message' => $this->message
        ];
    }

    public function toResponse($request)
    {
        return parent::toResponse($request)->setStatusCode(Response::HTTP_OK);
    }
}
