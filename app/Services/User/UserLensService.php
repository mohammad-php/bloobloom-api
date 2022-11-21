<?php
declare(strict_types=1);

namespace App\Services\User;

use App\Interfaces\User\UserLensServiceInterface;
use App\Models\Lens;
use Exception;

class UserLensService implements UserLensServiceInterface
{
    /**
     * @var Lens
     */
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
    public function getAll(): array
    {
        try {
            $lenses = $this->lensModel::all();
            return [
                'data' => ['lenses' => $lenses]
            ];
        } catch(Exception $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        }
    }
}
