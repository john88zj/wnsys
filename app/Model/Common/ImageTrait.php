<?php
namespace App\Model\Common;

use Illuminate\Support\Facades\Auth;
use App\Model\ImageModel;
trait ImageTrait{
    public function image()
    {
        if ($this->id) {
            $condtion["pk_id"] = $this->id;
            $condtion["user_id"] = Auth::id();
            $image = ImageModel::Where($condtion)->get();
        } else {
            $image = new ImageModel();
        }
        return $image;
    }

}
