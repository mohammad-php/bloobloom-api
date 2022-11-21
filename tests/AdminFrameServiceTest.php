<?php

namespace Tests;

use App\Models\Frame;

class AdminFrameServiceTest extends TestCase
{

    /**
     * @return void
     */
    public function testAdminCanAddFrame()
    {
        $frameModel = new Frame();
        $frameModel->name = 'Test Frame';
        $frameModel->description = 'Frame Desc..';
        $frameModel->status = 'active';
        $frameModel->stock = 55;
        $frameModel->price = 99.2;
        $this->assertEquals(
            true, $frameModel->save()
        );
    }
}
