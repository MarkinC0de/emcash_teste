<?php

namespace App\Http\Controllers;

use App\Http\Resources\Triangle as TriangleResource;
use App\Models\Triangle;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TriangleController extends Controller
{
    public function index(): JsonResponse
    {
        $triangle = Triangle::all();
        return $this->sendResponse(TriangleResource::collection($triangle), 'Todos os triangulos foram exibidos.');
    }

    public function store(Request $request): JsonResponse
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'length' => 'required',
            'width' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }
        if ($request->area) {
            return $this->sendResponse(406,'Não é possivel setar a area.');
        }
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
        $rectangle = Triangle::find($id);
        $area = $rectangle->length * $rectangle->width;
        $rectangle->fill(['area' => $area]);
        return $this->sendResponse(new TriangleResource($rectangle), 'Area do triangulo calculada com sucesso.');
    }
}
