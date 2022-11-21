<?php

namespace App\Services\User;

use App\Entity\Frame;
use App\Entity\Frame as FrameEntity;
use App\Entity\Glass;
use App\Entity\Lens as LensEntity;
use App\Models\Frame as FrameModel;
use App\Models\Lens as LensModel;
use Exception;
use Illuminate\Http\Request;
use RuntimeException;


class GlassService
{

    /**
     * @var string
     */
    private string $userCurrency = 'JOD';


    /**
     * @param Request $request
     * @return array[]
     * @throws Exception
     */
    public function createGlass(Request $request): array
    {
        $frame = FrameModel::findOrFail($request->frame_id);
        $this->validateFramesStock($frame);

        $frameItem = new FrameEntity(
            $frame->id,
            $frame->name,
            $frame->description,
            $frame->status,
            $frame->stock,
            $frame->price,
            $frame->currency
        );

        $lens = LensModel::findOrFail($request->lens_id);
        $this->validateLensesStock($lens);

        $lensItem__1 = new LensEntity(
            $lens->id,
            $lens->colour,
            $lens->description,
            $lens->prescription_type,
            $lens->lens_type,
            $lens->stock,
            $lens->price,
            $lens->currency
        );

        $lensItem__2 = new LensEntity(
            $lens->id,
            $lens->colour,
            $lens->description,
            $lens->prescription_type,
            $lens->lens_type,
            $lens->stock,
            $lens->price,
            $lens->currency
        );

        $glass = new Glass([$frameItem, $lensItem__1, $lensItem__2], $this->userCurrency);

        $this->removeFrameFromStock($frame);
        $this->removeLensFromStock($lens);

        $shoppingBasket = new ShoppingBasket();
        $shoppingBasket->add($frameItem);
        $shoppingBasket->add($lensItem__1);
        $shoppingBasket->add($lensItem__2);

        return [
            'data' => [
                'status' => true,
                'price' => $glass->getPrice().$this->userCurrency,
                'shopping_basket' => $shoppingBasket->getAll(),
            ]
        ];
    }

    /**
     * @param FrameModel $frameModel
     * @return void
     */
    public function validateFramesStock(FrameModel $frameModel): void
    {
        if(empty($frameModel->stock))
        {
            throw new RuntimeException('Frames Out Of Stock!');
        }
    }

    /**
     * @param LensModel $lensModel
     * @return void
     */
    public function validateLensesStock(LensModel $lensModel): void
    {
        if(empty($lensModel->stock))
        {
            throw new RuntimeException('Lenses Out Of Stock!');
        }
    }

    /**
     * @param FrameModel $frame
     * @return bool
     */
    private function removeFrameFromStock(FrameModel $frame)
    {
        $frame->stock -= 1;
        if($frame->save()) {
            return true;
        }
        return false;
    }

    /**
     * @param LensModel $lens
     * @return bool
     */
    private function removeLensFromStock(LensModel $lens)
    {
        $lens->stock -= 1;
        if($lens->save()) {
            return true;
        }
        return false;
    }

}
