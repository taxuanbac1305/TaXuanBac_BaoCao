<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class BannerController extends Controller
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

    public function add_banner(){
        $h = view('backend.dashboard.banner.add_banner');
        return view("layouts.admin")->with('index_add_banner',$h);
    }

    public function save_banner(Request $request){
        $data = array();
        $data['name'] = $request->banner_name;
        $data['link'] = $request->banner_link;
        $data['position'] = $request->banner_position;
        $data['description'] = $request->banner_desc;
        $data['status'] = $request->banner_status;
        $data['created_by'] = 1;
        $data['update_by'] = null;
        $get_image_banner = $request->file('image');
    
        if($get_image_banner){
            $get_name_image = $get_image_banner->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image_banner = $name_image.rand(0,99).'.'.$get_image_banner->getClientOriginalExtension();
            $get_image_banner->move(public_path('uploads/banner'), $new_image_banner);
            $data['image'] = $new_image_banner;
            Banner::create($data);
            Session::put('message','Thêm banner thành công');
            return Redirect::to('admin/add-banner');
        }
    
        Banner::create($data);
        Session::put('message','Thêm banner thành công');
        return Redirect::to('admin/add-banner');
    }

    public function unactive_banner($banner_id){
        
        Banner::where('id', $banner_id)->update(['status' => 1]);
        Session::put('message','Kích hoạt banner thành công');
        return Redirect::to('admin/all-banner');
    }
    public function active_banner($banner_id){
        
        Banner::where('id', $banner_id)->update(['status' => 0]);
        Session::put('message','Không kích hoạt banner thành công');
        return Redirect::to('admin/all-banner');
    }
    public function edit_banner($banner_id){
        $edit_banner = Banner::where('id',$banner_id)->get(); 
        $manager_banner = view('backend.dashboard.banner.edit_banner')->with('edit_banner',$edit_banner); 
        return view('layouts.admin')->with('backend.dashboard.banner.edit_banner',$manager_banner);
    }

    public function update_banner(Request $request,$banner_id){
        $data = array();
        $data['name'] = $request->banner_name;
        $data['link'] = $request->banner_link;
        $data['position'] = $request->banner_position;
        $data['description'] = $request->banner_desc;
        $data['created_by'] = 1;
        $data['update_by'] = null;
        $get_image = $request->file('image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move(public_path('uploads/banner'), $new_image);
            $data['image'] = $new_image;
            Banner::where('id',$banner_id)->update($data);
            Session::put('message','Cập nhật banner thành công');
            return Redirect::to('admin/all-banner');
        }
        else {
            // Giữ nguyên bức hình cũ
            $banner = Banner::find($banner_id);
            $data['image'] = $banner->image;
        }
        

        Banner::where('id',$banner_id)->update($data);
        Session::put('message','Cập nhật banner thành công');
        return Redirect::to('admin/all-banner');
    }
    public function delete_banner($banner_id){
        Banner::where('id',$banner_id)->delete();
        Session::put('message','Xóa banner thành công');
        return Redirect::to('admin/all-banner');
    }
}
