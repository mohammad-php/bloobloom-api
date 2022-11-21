<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\AdminFrameService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class FrameController extends Controller
{
    /**
     * @var AdminFrameService
     */
    private AdminFrameService $adminFrameService;

    /**
     * @param AdminFrameService $adminFrameService
     */
    public function __construct(AdminFrameService $adminFrameService)
    {
        $this->adminFrameService = $adminFrameService;
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $response = $this->adminFrameService->getAllFrames();
        return response()->json($response);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        $response = $this->adminFrameService->createFrame($request);
        return response()->json($response);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $response = $this->adminFrameService->updateFrame($request, $id);
        return response()->json($response);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function delete(Request $request, int $id): JsonResponse
    {
        $response = $this->adminFrameService->deleteFrame($request, $id);
        return response()->json($response);
    }

}
