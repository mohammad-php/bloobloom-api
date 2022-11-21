<?php

namespace App\Services\Admin;

use App\Interfaces\Admin\AdminLensServiceInterface;
use App\Models\Lens;
use Exception;
use Illuminate\Http\Request;

class AdminLensService implements AdminLensServiceInterface
{
    private Lens $lensModel;

    /**
     * @param Lens $lensModel
     */
    public function __construct(Lens $lensModel)
    {
        $this->lensModel = $lensModel;
    }

    /**
     * @return array|array[]
     */
    public function getAllLenses(): array
    {
        try {
            $lenses = $this->lensModel::all();
            return ['data' => ['lenses' => $lenses]];
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
    public function createLens(Request $request): array
    {
        try {
            $this->lensModel->colour = $request->colour;
            $this->lensModel->description = $request->description;
            $this->lensModel->prescription_type = $request->prescription_type;
            $this->lensModel->lens_type = $request->lens_type;
            $this->lensModel->stock = $request->stock;
            $this->lensModel->price = $request->price;

            if($this->lensModel->save()) {
                return [
                    'data' => [
                        'status' => 'success',
                        'message' => 'Lens created successfully'
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
     * @param int $lensId
     * @return array[]|string[][]
     */
    public function updateLens(Request $request, int $lensId): array
    {

        try {
            $lens = $this->lensModel::findOrFail($lensId);
            $lens->colour = $request->colour;
            $lens->description = $request->description;
            $lens->prescription_type = $request->prescription_type;
            $lens->lens_type = $request->lens_type;
            $lens->stock = $request->stock;
            $lens->price = $request->price;

            if($lens->save()) {
                return [
                    'data' => [
                        'status' => 'success',
                        'message' => 'Lens updated successfully'
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
     * @param int $lensId
     * @return array[]|string[][]
     */
    public function deleteLens(Request $request, int $lensId): array
    {
        try {
            $lens = $this->lensModel::findOrFail($lensId);
            if($lens->delete()) {
                return [
                    'data' => [
                        'status' => 'success',
                        'message' => 'Lens deleted successfully'
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
