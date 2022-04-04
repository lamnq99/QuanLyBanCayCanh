<?php

namespace App\helpers;

use App\Models\ProductType;
use App\Models\StaffInformation;

class Helper
{
    public static function typeProduct($product_type_id)
    {
        $type = ProductType::find($product_type_id)->name;
        return $type;
    }

    public static function nameStaff($staff_id)
    {
        $name = StaffInformation::find($staff_id)->name;
        return $name;
    }

    public static function priceTotal($unit_number, $price)
    {
        $price = $unit_number * $price;

        return $price;
    }
}
