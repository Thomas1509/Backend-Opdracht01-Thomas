<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Product extends Model
{
    protected $table = 'product';

    public function magazijn()
    {
        return $this->hasOne(Magazijn::class, 'product_id', 'Id');
    }
    

    public function productPerLeveranciers()
    {
        return $this->hasOne(ProductPerLeverancier::class, 'product_id', 'Id');
    }
    
    public function leveranciers()
    {
        return $this->hasManyThrough(
            Leverancier::class,
            ProductPerLeverancier::class,
            'product_id',
            'Id',
            'Id',
            'leverancier_id'
        );
    }

    public function allergeens()
    {
        return $this->belongsToMany(Allergeen::class, 'ProductPerAllergeen', 'product_id', 'allergeen_id');
    }
}

