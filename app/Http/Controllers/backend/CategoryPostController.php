<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\CategoryPost;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
session_start();
class CategoryPostController extends Controller
{
    public function add_categorypost(){
        $h = view('backend.dashboard.categorypost.add_categorypost');
        return view("layouts.admin")->with('index_add_categorypost',$h);
    }

    public function save_categorypost(Request $request){
        $data = array();
        $data['name'] = $request->name;
        $data['slug'] = Str::slug($request->name);
        $data['description'] = $request->description;
        $data['created_by'] = 1;
        $data['update_by'] = null;
        $data['status'] = $request->status;
        
        CategoryPost::create($data);
    
        Session::put('message', 'Thêm danh mục bài viết thành công');
        return Redirect::to('admin/add-categorypost');
    }
    public function unactive_categorypost($categorypost_id){
        
        CategoryPost::where('id', $categorypost_id)->update(['status' => 1]);
        Session::put('message','Kích hoạt danh mục bài viết thành công');
        return Redirect::to('admin/all-categorypost');
    }
    public function active_categorypost($categorypost_id){
        
        CategoryPost::where('id', $categorypost_id)->update(['status' => 0]);
        Session::put('message','Không kích hoạt danh mục bài viết thành công');
        return Redirect::to('admin/all-categorypost');
    }
    public function edit_categorypost($categorypost_id){
        $edit_categorypost = CategoryPost::where('id',$categorypost_id)->get(); 
        $manager_categorypost = view('backend.dashboard.categorypost.edit_categorypost')->with('edit_categorypost',$edit_categorypost); 
        return view('layouts.admin')->with('backend.dashboard.categorypost.edit_categorypost',$manager_categorypost);
    }
    public function update_categorypost(Request $request,$categorypost_id){
        
        $data = array();
        $data['name'] = $request->name;
        $data['slug'] = Str::slug($request->name);
        $data['description'] = $request->description;
        $data['created_by'] = 1;
        $data['update_by'] = null;
        CategoryPost::where('id',$categorypost_id)->update($data);
        Session::put('message','Cập nhật danh mục bài viết thành công');
        return Redirect::to('admin/all-categorypost');
    }
    public function delete_categorypost($categorypost_id){
        CategoryPost::where('id',$categorypost_id)->delete();
        Session::put('message','Xóa danh mục bài viết thành công');
        return Redirect::to('admin/all-categorypost');
    }

}
