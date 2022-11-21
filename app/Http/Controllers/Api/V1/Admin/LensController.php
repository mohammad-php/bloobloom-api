<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\v1\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\AdminLensService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LensController extends Controller
{

    private AdminLensService $adminLensService;

    public function __construct(AdminLensService $adminLensService)
    {
        $this->adminLensService = $adminLensService;
    }

    public function index(): JsonResponse
    {
        $response = $this->adminLensService->getAllLenses();
        return response()->json($response);

    }

    public function create(Request $request): JsonResponse
    {
        $response = $this->adminLensService->createLens($request);
        return response()->json($response);
    }

    public function update(Request $request, int $id)
    {
        $response = $this->adminLensService->updateLens($request, $id);
        return response()->json($response);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return JsonResponse|void
     */
    public function delete(Request $request, int $id)
    {
        $response = $this->adminLensService->deleteLens($request, $id);
        return response()->json($response);
    }

}
