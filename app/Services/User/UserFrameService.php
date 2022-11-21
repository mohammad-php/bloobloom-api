<?php
declare(strict_types=1);

namespace App\Services\User;

use App\Interfaces\User\UserFrameServiceInterface;
use App\Models\Frame;
use Exception;

class UserFrameService implements UserFrameServiceInterface
{
    /**
     * @var Frame
     */
    private Frame $frameModel;

    /**
     * @param Frame $frameModel
     */
    public function __construct(Frame $frameModel)
    {
        $this->frameModel = $frameModel;
    }

    /**
     * @return array|array[]
     */
    public function getActive(): array
    {
        try {
            $frames = $this->frameModel::where('status', 'active')->get();
            return [
                'data' => ['frames' => $frames]
            ];
        } catch(Exception $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        }
    }
}
