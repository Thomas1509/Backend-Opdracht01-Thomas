<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Allergeen extends Model
{
    protected $table = 'Allergeen';

    public function products()
    {
        return $this->belongsToMany(Product::class, 'ProductPerAllergeen', 'allergeen_id', 'product_id');
    }
    
}

