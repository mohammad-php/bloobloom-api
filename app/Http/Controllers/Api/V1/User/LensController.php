<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\v1\User;

use App\Http\Controllers\Controller;
use App\Services\User\UserLensService;
use Illuminate\Http\JsonResponse;

class LensController extends Controller
{
    /**
     * @var UserLensService
     */
    private UserLensService $userLensService;

    /**
     * @param UserLensService $userLensService
     */
    public function __construct(UserLensService $userLensService)
    {
        $this->userLensService = $userLensService;
    }

    /**
     * @return JsonResponse
     */
    public function viewAll(): JsonResponse
    {
        $response = $this->userLensService->getAll();
        return response()->json($response);
    }
}
