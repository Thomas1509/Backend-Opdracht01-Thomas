<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Allergeen extends Model
{
    protected $table = 'allergeen';
    
    public function productPerAllergeen()
    {
        return $this->hasMany(ProductPerAllergeen::class, 'allergeen_id', 'Id');
    }
}

