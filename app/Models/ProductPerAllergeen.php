<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPerAllergeen extends Model
{
    protected $table = 'productperallergeen';

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

