<?php
declare(strict_types=1);

namespace App\Interfaces\User;

interface UserFrameServiceInterface
{
    /**
     * @return array
     */
    public function getActive(): array;

}
