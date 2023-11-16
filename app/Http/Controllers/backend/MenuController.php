<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Str;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
class MenuController extends Controller
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

    public function add_menu(){
        $cate_menu = Category::orderBy('id','desc')->get();
        $brand_menu = Brand::orderBy('id','desc')->get();
        return view("backend.dashboard.menu.add_menu")->with('cate_menu',$cate_menu)->with('brand_menu',$brand_menu);
    }

    public function save_menu(Request $request){
        $data = array();
        $data['name'] = $request->menu_name; // brand_name là tên cột, còn brand_menu_name là tên trong form
        $data['link'] = $request->menu_link;
        $data['sort_order'] = $request->menu_sort_order;
        $data['table_id'] = $request->menu_table_id;
        $data['parent_id'] = $request->menu_parent_id;
        $data['type'] = $request->menu_type;
        $data['description'] = $request->menu_desc;
        $data['created_by'] = 1;
        $data['update_by'] = null;

        Menu::create($data);
        Session::put('message','Thêm menu thành công');
        return Redirect::to('admin/add-menu');
    }

    public function unactive_menu($menu_id){
        
        menu::where('id',$menu_id)->update(['status'=>1]);
        Session::put('message','Kích hoạt menu thành công');
        return Redirect::to('admin/all-menu');
    }
    public function active_menu($menu_id){
        
        menu::where('id',$menu_id)->update(['status'=>0]);
        Session::put('message','Không kích hoạt menu thành công');
        return Redirect::to('admin/all-menu');
    }

    public function edit_menu($menu_id){
        $cate_menu = Category::orderBy('id','desc')->get();
        $brand_menu = Brand::orderBy('id','desc')->get();

        $edit_menu = menu::where('id',$menu_id)->get(); 
        $manager_menu = view('backend.dashboard.menu.edit_menu')->with('edit_menu',$edit_menu)->with('cate_menu',$cate_menu)
        ->with('brand_menu',$brand_menu); 
        return view('layouts.admin')->with('admin.edit_menu',$manager_menu);
    }

    public function update_menu(Request $request,$menu_id){
        $data = array();
        $data['name'] = $request->menu_name; // brand_name là tên cột, còn brand_menu_name là tên trong form
        $data['link'] = $request->menu_link;
        $data['sort_order'] = $request->menu_sort_order;
        $data['table_id'] = $request->menu_cate;
        $data['parent_id'] = $request->menu_brand;
        $data['type'] = $request->menu_type;
        $data['description'] = $request->menu_desc;
        $data['created_by'] = 1;
        $data['update_by'] = null;
        

        Menu::where('id',$menu_id)->update($data);
        Session::put('message','Cập nhật menu thành công');
        return Redirect::to('admin/all-menu');
    }

    public function delete_menu($menu_id){
        menu::where('id',$menu_id)->delete();
        Session::put('message','Xóa menu thành công');
        return Redirect::to('admin/all-menu');
    }

}
