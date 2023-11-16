<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\CategoryPost;
use App\Models\Post;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
session_start();
class PostController extends Controller
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
    public function add_post(){
        $cate_post = CategoryPost::orderBy('id','DESC')->get();
        $h = view('backend.dashboard.post.add_post')->with('cate_post', $cate_post);
        return view("layouts.admin")->with('index_add_post',$h);
    }
    public function save_post(Request $request){
        $data = array();
        $data['cate_post_id'] = $request->cate_post_id;
        $data['title'] = $request->title;
        $data['slug'] = Str::slug($request->title);
        $data['content'] = $request->content;
        $data['description'] = $request->description;
        $data['meta_keywords'] = $request->meta_keywords;
        $data['meta_desc'] = $request->meta_desc;
        $data['created_by'] = 1;
        $data['update_by'] = null;
        $data['status'] = $request->status;
        $get_image_banner = $request->file('image');
    
        if($get_image_banner){
            $get_name_image = $get_image_banner->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image_banner = $name_image.rand(0,99).'.'.$get_image_banner->getClientOriginalExtension();
            $get_image_banner->move(public_path('uploads/post'), $new_image_banner);
            $data['image'] = $new_image_banner;
            Post::create($data);
            Session::put('message','Thêm bài viết thành công');
            return Redirect::to('admin/add-post');
        }
    
        Post::create($data);
        Session::put('message','Thêm bài viết thành công');
        return Redirect::to('admin/add-post');
    }
    public function unactive_post($post_id){
        
        Post::where('id', $post_id)->update(['status' => 1]);
        Session::put('message','Kích hoạt bài viết thành công');
        return Redirect::to('admin/all-post');
    }
    public function active_post($post_id){
        
        Post::where('id', $post_id)->update(['status' => 0]);
        Session::put('message','Không kích hoạt bài viết thành công');
        return Redirect::to('admin/all-post');
    }
    public function delete_post($post_id){
        $post = Post::find($post_id);
        $post_image= $post->image;
        unlink('../public/uploads/post/'. $post_image);
        Post::where('id',$post_id)->delete();
        Session::put('message','Xóa bài viết thành công');
        return Redirect::to('admin/all-post');
    }
    public function edit_post($post_id){
        $edit_post = Post::where('id',$post_id)->get();
        $cate_post = CategoryPost::orderBy('id','DESC')->get(); 
        $manager_post = view('backend.dashboard.post.edit_post')->with('edit_post',$edit_post)->with('cate_post',$cate_post); 
        return view('layouts.admin')->with('backend.dashboard.post.edit_post',$manager_post);
    }
    public function update_post(Request $request,$post_id){
        $data = array();
        $data['cate_post_id'] = $request->cate_post_id;
        $data['title'] = $request->title;
        $data['slug'] = Str::slug($request->title);
        $data['content'] = $request->content;
        $data['description'] = $request->description;
        $data['meta_keywords'] = $request->meta_keywords;
        $data['meta_desc'] = $request->meta_desc;
        $data['created_by'] = 1;
        $data['update_by'] = null;
        $get_image = $request->file('image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move(public_path('uploads/post'), $new_image);
            $data['image'] = $new_image;
            Post::where('id',$post_id)->update($data);
            Session::put('message','Cập nhật bài viết thành công');
            return Redirect::to('admin/all-post');
        }
        else {
            // Giữ nguyên bức hình cũ
            $post = Post::find($post_id);
            $data['image'] = $post->image;
        }
        

        Post::where('id',$post_id)->update($data);
        Session::put('message','Cập nhật bài viết thành công');
        return Redirect::to('admin/all-post');
    }
}
