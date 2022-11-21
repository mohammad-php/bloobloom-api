<?php

namespace App\Http\Controllers\Api\V1\User;


use App\Http\Controllers\Controller;
use App\Services\User\GlassService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GlassController extends Controller
{

    /**
     * @var GlassService
     */
    private GlassService $glassService;

    /**
     * @param GlassService $glassService
     */
    public function __construct(GlassService $glassService)
    {
        $this->glassService = $glassService;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws Exception
     */
    public function createGlass(Request $request): JsonResponse
    {
        $response = $this->glassService->createGlass($request);
        return response()->json($response);

    }

}
