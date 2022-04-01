<?php

namespace App\Http\Controllers;

use App\Http\Resources\Triangle as TriangleResource;
use App\Models\Rectangle;
use App\Models\Triangle;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\API\BaseController as BaseController;

class CalculateAreaController extends BaseController
{
    /**
     * @param $id
     * @return JsonResponse
     */
    public function calculateAreaRectangle ($id): JsonResponse
    {
        $rectangle = Rectangle::find($id);
        $area = $rectangle->length * $rectangle->width;
        $rectangle->fill(['area' => $area]);

        return $this->sendResponse(['area_retangulo' => $area], 'Area do retangulo calculada com sucesso.');
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function calculateAreaTriangle ($id): JsonResponse
    {
        $triangle = Triangle::find($id);
        $area = $triangle->base * $triangle->height / 2;
        $triangle->fill(['area' => $area]);
        return $this->sendResponse(['area_triangulo' => $area], 'Area do triangulo calculada com sucesso.');
    }
}
