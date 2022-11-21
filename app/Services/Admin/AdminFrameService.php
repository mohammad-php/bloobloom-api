<?php

namespace App\Services\Admin;

use App\Interfaces\Admin\AdminFrameServiceInterface;
use App\Models\Frame;
use Exception;
use Illuminate\Http\Request;

class AdminFrameService implements AdminFrameServiceInterface
{
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
    public function getAllFrames(): array
    {
        try {
            $frames = $this->frameModel::all();
            return ['data' => ['frames' => $frames]];
        } catch(Exception $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        }
    }

    /**
     * @param Request $request
     * @return array[]|string[][]
     */
    public function createFrame(Request $request): array
    {
        try {
            $this->frameModel->name = $request->name;
            $this->frameModel->description = $request->description;
            $this->frameModel->status = $request->status;
            $this->frameModel->stock = $request->stock;
            $this->frameModel->price = $request->price;

            if($this->frameModel->save()) {
                return [
                    'data' => [
                        'status' => 'success',
                        'message' => 'Frame created successfully'
                    ]
                ];
            }
        } catch (Exception $e) {
            return [
                'data' => [
                    'status' => 'error',
                    'message' => $e->getMessage()
                ]
            ];
        }
    }

    /**
     * @param Request $request
     * @param int $frameId
     * @return array[]|string[][]
     */
    public function updateFrame(Request $request, int $frameId): array
    {
        try {
            $frame = $this->frameModel::findOrFail($frameId);
            $frame->name = $request->name;
            $frame->description = $request->description;
            $frame->status = $request->status;
            $frame->stock = $request->stock;
            $frame->price = $request->price;

            if($frame->save()) {
                return [
                    'data' => [
                        'status' => 'success',
                        'message' => 'Frame updated successfully'
                    ]
                ];
            }
        } catch (Exception $e) {
            return [
                'data' => [
                    'status' => 'error',
                    'message' => $e->getMessage()
                ]
            ];
        }
    }

    /**
     * @param Request $request
     * @param int $frameId
     * @return array[]|string[][]
     */
    public function deleteFrame(Request $request, int $frameId): array
    {
        try {
            $frame = $this->frameModel::findOrFail($frameId);
            if($frame->delete()) {
                return [
                    'data' => [
                        'status' => 'success',
                        'message' => 'Frame deleted successfully'
                    ]
                ];
            }
        } catch (Exception $e) {
            return [
                'data' => [
                    'status' => 'error',
                    'message' => $e->getMessage()
                ]
            ];
        }
    }
}
