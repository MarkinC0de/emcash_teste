<?php

namespace App\Http\Controllers;

use App\Http\Requests\TriangleRequest;
use Illuminate\Http\JsonResponse;
use App\Models\Triangle;
use App\Http\Resources\Triangle as TriangleResource;
use App\Http\Controllers\API\BaseController as BaseController;

class TriangleController extends BaseController
{
    public function index(): JsonResponse
    {
        $triangle = Triangle::all();

        return $this->sendResponse(TriangleResource::collection($triangle), 'Todos os triangulos foram exibidos.');
    }

    public function store(TriangleRequest $request): JsonResponse
    {
        $input = $request->validated();
        $triangle = Triangle::create($input);

        return $this->sendResponse(new TriangleResource($triangle), 'Triangulo criado com sucesso.');
    }

    public function destroy(Triangle $triangle): JsonResponse
    {
        $triangle->delete();

        return $this->sendResponse([], 'Triangulo deletado.');
    }
}
