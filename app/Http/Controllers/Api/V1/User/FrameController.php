<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Services\User\UserFrameService;
use Illuminate\Http\JsonResponse;


class FrameController extends Controller
{

    private UserFrameService $userFrameService;

    public function __construct(UserFrameService $userFrameService)
    {
        $this->userFrameService = $userFrameService;
    }

    /**
     * @return JsonResponse
     */
    public function viewActive(): JsonResponse
    {
        $response = $this->userFrameService->getActive();
        return response()->json($response);
    }

}
