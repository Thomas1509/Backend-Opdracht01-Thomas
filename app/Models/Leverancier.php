<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Leverancier extends Model
{
    protected $table = 'Leverancier';

    public function productPerLeveranciers()
    {
        return $this->hasMany(ProductPerLeverancier::class, 'leverancier_id', 'Id');
    }

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
    
    
}
