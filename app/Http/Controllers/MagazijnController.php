<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Magazijn;
use App\Models\Persoon;
use App\Models\Leverancier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class MagazijnController extends Controller
{
    public function index()
    {
        $magazijn = Magazijn::with('product')->get();
        
        return view('magazijn.index', compact('magazijn'));
    }
    
    public function leverancier($id)
    {
        $product = Product::with(['leveranciers', 'magazijn', 'productPerLeveranciers'])->findOrFail($id);
    
        $magazijn = $product->magazijn;
        $productPerLeveranciers = $product->productPerLeveranciers;

        if ($magazijn && $magazijn->AantalAanwezig === null) {
            $expectedDelivery = $productPerLeveranciers->first()->DatumEerstVolgendeLevering;
            $errorMessage = "Er is van dit product op dit moment geen voorraad aanwezig, de verwachte eerstvolgende levering is: $expectedDelivery";
    
            return redirect()->back()->withErrors($errorMessage);
        }
    
        return view('magazijn.leverancier')->with('product', $product);
    }
    
    
    
    
    
    
    
        
    public function allergeen(Product $product)
    {
        $allergenen = $product->allergeen;
        return view('magazijn.allergeen', compact('allergenen'));
    }
}
