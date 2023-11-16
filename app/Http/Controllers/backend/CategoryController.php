<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Session;
use Illuminate\Support\Str;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

    public function add_category_product(){
        $h = view('backend.dashboard.category.add_category');
        return view("layouts.admin")->with('index_add_category',$h);
    }


    public function save_category_product(Request $request){
        $data = array();
        $data['name'] = $request->category_product_name;
        $data['slug'] = Str::slug($request->category_product_name);
        $data['sort_order'] = $request->category_sort_order;
        $data['parent_id'] = $request->category_parent_id;
        $data['description'] = $request->category_product_desc;
        $data['created_by'] = 1;
        $data['update_by'] = null;
        $data['status'] = $request->category_product_status;
        
        Category::create($data);
    
        Session::put('message', 'Thêm danh mục thành công');
        return Redirect::to('admin/add-category-product');
    }

    public function unactive_category_product($category_product_id){
        
        Category::where('id', $category_product_id)->update(['status' => 1]);
        Session::put('message','Kích hoạt thương hiệu sản phẩm thành công');
        return Redirect::to('admin/all-category-product');
    }
    public function active_category_product($category_product_id){
        
        category::where('id', $category_product_id)->update(['status' => 0]);
        Session::put('message','Không kích hoạt thương hiệu sản phẩm thành công');
        return Redirect::to('admin/all-category-product');
    }
    public function edit_category_product($category_product_id){
        $edit_category_product = Category::where('id',$category_product_id)->get(); 
        $manager_category_product = view('backend.dashboard.category.edit_category')->with('edit_category_product',$edit_category_product); 
        return view('layouts.admin')->with('backend.dashboard.category.edit_category',$manager_category_product);
    }
    public function update_category_product(Request $request,$category_product_id){
        
        $data = array();
        $data['name'] = $request->category_product_name;
        $data['slug'] = Str::slug($request->category_product_name);
        $data['sort_order'] = $request->category_sort_order;
        $data['parent_id'] = $request->category_parent_id;
        $data['description'] = $request->category_product_desc;
        Category::where('id',$category_product_id)->update($data);
        Session::put('message','Cập nhật thương hiệu sản phẩm thành công');
        return Redirect::to('admin/all-category-product');
    }
    public function delete_category_product($category_product_id){
        category::where('id',$category_product_id)->delete();
        Session::put('message','Xóa thương hiệu sản phẩm thành công');
        return Redirect::to('admin/all-category-product');
    }
}
