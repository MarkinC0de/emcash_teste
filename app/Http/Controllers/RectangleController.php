<?php

namespace App\Http\Controllers;

use App\Http\Requests\RectangleRequest;
use Illuminate\Http\JsonResponse;
use App\Models\Rectangle;
use App\Http\Resources\Rectangle as RectangleResource;
use App\Http\Controllers\API\BaseController as BaseController;

class RectangleController extends BaseController
{
    public function index(): JsonResponse
    {
        $rectangles = Rectangle::all();

        return $this->sendResponse(RectangleResource::collection($rectangles), 'Todos os retangulos foram exibidos.');
    }

    public function store(RectangleRequest $request): JsonResponse
    {
        $input = $request->validated();
        $rectangle = Rectangle::create($input);

        return $this->sendResponse(new RectangleResource($rectangle), 'Retangulo criado com sucesso.');
    }

    public function destroy(Rectangle $rectangle): JsonResponse
    {
        $rectangle->delete();

        return $this->sendResponse([], 'Retangulo deletado.');
    }
}
