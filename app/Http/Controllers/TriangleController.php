<?php

namespace App\Http\Controllers;

use App\Http\Requests\TriangleRequest;
use App\Http\Resources\Triangle as TriangleResource;
use App\Models\Triangle;
use Illuminate\Http\JsonResponse;

class TriangleController extends Controller
{
    public function index(): JsonResponse
    {
        $triangle = Triangle::all();
        return $this->sendResponse(TriangleResource::collection($triangle), 'Todos os triangulos foram exibidos.');
    }

    public function store(TriangleRequest $request): JsonResponse
    {
        $input = $request->validated();

        $rectangle = Triangle::create($input);
        return $this->sendResponse(new TriangleResource($rectangle), 'Triangulo criado com sucesso.');
    }

    public function destroy(Triangle $rectangle): JsonResponse
    {
        $rectangle->delete();
        return $this->sendResponse([], 'Retangulo deletado.');
    }

    public function calculateArea ($id): JsonResponse
    {
        $triangle = Triangle::find($id);
        $area = $triangle->length * $triangle->width;
        $triangle->fill(['area' => $area]);
        return $this->sendResponse(new TriangleResource($triangle), 'Area do triangulo calculada com sucesso.');
    }
}
