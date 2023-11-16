<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Session;
use Illuminate\Support\Str;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function add_brand_product(){
        $h = view('backend.dashboard.brand.add_brand');
        return view("layouts.admin")->with('index_add_brand',$h);
    }


    public function save_brand_product(Request $request){
        $data = [
            'name' => $request->brand_product_name,
            'slug' => Str::slug($request->brand_product_name),
            'sort_order' => $request->brand_sort_order,
            'description' => $request->brand_product_desc,
            'created_by' => 1,
            'update_by' => 1,
            'status' => $request->brand_product_status,
        ];
    
        Brand::create($data);
    
        Session::put('message', 'Thêm Thương hiệu sản phẩm thành công');
        return Redirect::to('admin/add-brand-product');
    }

    public function unactive_brand_product($brand_product_id){
        
        Brand::where('id', $brand_product_id)->update(['status' => 1]);
        Session::put('message','Kích hoạt thương hiệu sản phẩm thành công');
        return Redirect::to('admin/all-brand-product');
    }
    public function active_brand_product($brand_product_id){
        
        Brand::where('id', $brand_product_id)->update(['status' => 0]);
        Session::put('message','Không kích hoạt thương hiệu sản phẩm thành công');
        return Redirect::to('admin/all-brand-product');
    }
    public function edit_brand_product($brand_product_id){
        $edit_brand_product = Brand::where('id',$brand_product_id)->get(); 
        $manager_brand_product = view('backend.dashboard.brand.edit_brand')->with('edit_brand_product',$edit_brand_product); 
        return view('layouts.admin')->with('backend.dashboard.brand.edit_brand',$manager_brand_product);
    }
    public function update_brand_product(Request $request,$brand_product_id){
        
        $data = [
            'name' => $request->brand_product_name,
            'slug' => Str::slug($request->brand_product_name),
            'sort_order' => $request->brand_sort_order,
            'description' => $request->brand_product_desc,
            
        ];
        Brand::where('id',$brand_product_id)->update($data);
        Session::put('message','Cập nhật thương hiệu sản phẩm thành công');
        return Redirect::to('admin/all-brand-product');
    }
    public function delete_brand_product($brand_product_id){
        Brand::where('id',$brand_product_id)->delete();
        Session::put('message','Xóa thương hiệu sản phẩm thành công');
        return Redirect::to('admin/all-brand-product');
    }
}
