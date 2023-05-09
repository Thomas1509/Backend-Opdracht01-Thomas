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
        $magazijn = Magazijn::with('product')->get()->sortBy('product.Barcode');
        
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
    
            return view('magazijn.leverancier')->with('product', $product)->withErrors($errorMessage)->with('redirectToOverview', true);
        }
    
        return view('magazijn.leverancier')->with('product', $product);
    }
    
    public function allergeen($id)
    {
        $product = Product::with(['allergeen', 'magazijn', 'productPerAllergeen'])->findOrFail($id);
        $magazijn = $product->magazijn;
        $allergeen = $product->allergeen;

        if ($allergeen->IsEmpty()) {
            $errorMessage = "In dit product zitten geen stoffen die een allergische reactie kunnen veroorzaken";
    
            return view('magazijn.allergeen')->with('product', $product)->withErrors($errorMessage)->with('redirectToOverview', true);
        }
    
        return view('magazijn.allergeen')->with('product', $product, 'allergeen');
    }  
}
