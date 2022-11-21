<?php
declare(strict_types=1);

namespace App\Interfaces\Admin;

use App\Models\Frame;
use Illuminate\Http\Request;

interface AdminFrameServiceInterface
{
    /**
     * @param Frame $frameModel
     */
    public function __construct(Frame $frameModel);

    /**
     * @return array|array[]
     */
    public function getAllFrames(): array;

    /**
     * @param Request $request
     * @return array[]|string[][]
     */
    public function createFrame(Request $request): array;

    /**
     * @param Request $request
     * @param int $frameId
     * @return array[]|string[][]
     */
    public function updateFrame(Request $request, int $frameId): array;

    /**
     * @param Request $request
     * @param int $frameId
     * @return array[]|string[][]
     */
    public function deleteFrame(Request $request, int $frameId): array;

}
