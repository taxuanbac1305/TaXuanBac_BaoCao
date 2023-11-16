<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class TimkiemController extends Controller
{
    public function search(Request $request){
        $keywords = $request->keywords_submit;
        $search_product = Product::where('name','like', '%'.$keywords.'%')->get();
        return view('frontend.product-search', compact('search_product'));
    }
}
