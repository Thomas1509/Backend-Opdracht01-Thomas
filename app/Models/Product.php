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

    public function productPerAllergeen()
    {
        return $this->hasOne(ProductPerAllergeen::class, 'product_id', 'Id');
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

    public function allergeen()
    {
        return $this->hasManyThrough(
            Allergeen::class,
            ProductPerAllergeen::class,
            'product_id',
            'Id',
            'Id',
            'allergeen_id'
        );
    }

}

