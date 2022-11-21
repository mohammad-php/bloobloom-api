<?php
declare(strict_types=1);

namespace App\Interfaces\User;

interface UserLensServiceInterface
{
    /**
     * @return array
     */
    public function getAll(): array;

}
