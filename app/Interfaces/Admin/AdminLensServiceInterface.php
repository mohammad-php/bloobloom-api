<?php
declare(strict_types=1);

namespace App\Interfaces\Admin;

use App\Models\Lens;
use Illuminate\Http\Request;

interface AdminLensServiceInterface
{

    /**
     * @param Lens $lensModel
     */
    public function __construct(Lens $lensModel);

    /**
     * @return array|array[]
     */
    public function getAllLenses(): array;

    /**
     * @param Request $request
     * @return array[]|string[][]
     */
    public function createLens(Request $request): array;

    /**
     * @param Request $request
     * @param int $lensId
     * @return array[]|string[][]
     */
    public function updateLens(Request $request, int $lensId): array;

    /**
     * @param Request $request
     * @param int $lensId
     * @return array[]|string[][]
     */
    public function deleteLens(Request $request, int $lensId): array;

}
