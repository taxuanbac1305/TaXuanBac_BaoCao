<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $cate_product = Category::where('status','1')->orderBy('id','desc')->get();
        $brand_product = Brand::where('status','1')->orderBy('id','desc')->get();

        // $all_product = DB::table("tbl_product")
        // ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        // ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        // ->orderBy('tbl_product.product_id','desc')->get();

        $all_product = Product::where('status','1')->orderBy('id','desc')->limit(4)->get();
        return view('frontend.home')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product);
    }

    public function show_category_home($category_id){
        $cate_product = Category::where('status','1')->orderBy('id','desc')->get();
        $brand_product = Brand::where('status','1')->orderBy('id','desc')->get();

        $category_by_id = Product::join('db_category','db_category.id','=','db_product.category_id')
        ->where('db_product.category_id',$category_id)
        ->select('db_product.id', 'db_product.name', 'db_product.price', 'db_product.image','db_product.status')
        ->get();

        $category_name = Category::where('db_category.id',$category_id)->limit(1)->get();
        return view('frontend.category.show_category')->with('category',$cate_product)->with('brand',$brand_product)->with('category_by_id',$category_by_id)
        ->with('category_name',$category_name);
    }

    public function show_brand_home($brand_id)
    {
        $cate_product = Category::where('status', '1')->orderBy('id', 'desc')->get();
        $brand_product = Brand::where('status', '1')->orderBy('id', 'desc')->get();

        $brand_by_id = Product::join('db_brand', 'db_brand.id', '=', 'db_product.brand_id')
            ->where('db_product.brand_id', $brand_id)
            ->select('db_product.id', 'db_product.name', 'db_product.price', 'db_product.image', 'db_product.status')
            ->get();

        $brand_name = Brand::where('db_brand.id', $brand_id)->limit(1)->get();

        return view('frontend.brand.show_brand')->with('category', $cate_product)->with('brand', $brand_product)->with('brand_by_id', $brand_by_id)
            ->with('brand_name', $brand_name);
    }
}
