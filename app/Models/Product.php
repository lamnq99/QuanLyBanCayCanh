<?php

namespace App\Models;

use GuzzleHttp\Handler\Proxy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'height',
        'width',
        'product_type_id'
    ];

    public function billDetails()
    {
        return $this->hasMany(BillDetail::class);
    }

    public function productType()
    {
        return $this->belongsTo(ProductType::class);
    }

    public function scopeProducts($query, $request)
    {
        if ($request->has('type')) {
            $query->where('product_type_id', 'LIKE', '%' . $request->type . '%');
        }

        if ($request->has('name')) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }

        return $query;
    }
}
