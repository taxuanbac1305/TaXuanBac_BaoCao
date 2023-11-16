<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function category($category_id)
    {
        $category = Category::where('id', $category_id)->first();
        $category_name = $category->name;
        $product_category = Product::where('db_product.category_id', $category_id)
            ->join('db_category', 'db_category.id', '=', 'db_product.category_id')
            ->select('db_product.id', 'db_product.name', 'db_product.price', 'db_product.image', 'db_product.status')
            ->get();
        return view('frontend.product-category', compact('category_name', 'product_category'));
    }
    public function brand($brand_id)
    {
        $brand = Brand::where('id', $brand_id)->first();
        $brand_name = $brand->name;
        $product_brand = Product::join('db_brand', 'db_brand.id', '=', 'db_product.brand_id')
            ->where('db_product.brand_id', $brand_id)
            ->select('db_product.id', 'db_product.name', 'db_product.price', 'db_product.image', 'db_product.status')
            ->get();
        return view('frontend.product-brand', compact('brand_name', 'product_brand'));
    }
    public function detail($product_id)
    {
        $product = Product::join('db_category', 'db_category.id', '=', 'db_product.category_id')
            ->join('db_brand', 'db_brand.id', '=', 'db_product.brand_id')
            ->where('db_product.id', $product_id)
            ->select('db_product.id', 'db_product.name', 'db_product.price', 'db_product.image', 'db_category.name AS category_name', 'db_brand.name AS brand_name', 'db_product.status', 'db_product.detail', 'db_product.description', 'db_product.category_id', 'db_product.brand_id')
            ->first();

        $relate = Product::join('db_category', 'db_category.id', '=', 'db_product.category_id')
            ->join('db_brand', 'db_brand.id', '=', 'db_product.brand_id')
            ->where('db_category.id', $product->category_id)
            ->select('db_product.id', 'db_product.name', 'db_product.price', 'db_product.image', 'db_category.name AS category_name', 'db_brand.name AS brand_name', 'db_product.status', 'db_product.detail', 'db_product.description')
            ->whereNotIn('db_product.id', [$product_id])
            ->get();

        return view('frontend.product-detail', compact('product', 'relate'));
    }
}
 