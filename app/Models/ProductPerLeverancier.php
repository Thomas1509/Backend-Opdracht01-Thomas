<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPerLeverancier extends Model
{
    use HasFactory;
    protected $table = 'productperleverancier';

    public function products()
    {
        return $this->hasManyThrough(
            Product::class,
            ProductPerLeverancier::class,
            'leverancier_id',
            'Id',
            'Id',
            'product_id'
        );
    }
    
    public function leverancier()
    {
        return $this->belongsTo(Leverancier::class, 'leverancier_id');
    }
    
    

}
