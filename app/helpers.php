<?php

namespace App\helpers;

use App\Models\ProductType;

class Helper
{
    public static function typeProduct($product_type_id)
    {
        $type = ProductType::find($product_type_id)->name;
        return $type;
    }
}
