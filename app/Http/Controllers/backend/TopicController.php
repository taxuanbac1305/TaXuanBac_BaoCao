<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Topic;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Str;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function add_topic(){
        $h = view('backend.dashboard.topic.add_topic');
        return view("layouts.admin")->with('index_add_topic',$h);
    }


    public function save_topic(Request $request){
        $data = array();
        $data['name'] = $request->topic_name;
        $data['slug'] = Str::slug($request->topic_name);
        $data['sort_order'] = $request->topic_sort_order;
        $data['description'] = $request->topic_desc;
        $data['created_by'] = 1;
        $data['update_by'] = null;
        $data['status'] = $request->topic_status;
        
        Topic::create($data);
    
        Session::put('message', 'Thêm topic thành công');
        return Redirect::to('admin/add-topic');
    }

    public function unactive_topic($topic_id){
        
        topic::where('id', $topic_id)->update(['status' => 1]);
        Session::put('message','Kích hoạt topic thành công');
        return Redirect::to('admin/all-topic');
    }
    public function active_topic($topic_id){
        
        topic::where('id', $topic_id)->update(['status' => 0]);
        Session::put('message','Không kích hoạt topic thành công');
        return Redirect::to('admin/all-topic-product');
    }
    public function edit_topic($topic_id){
        $edit_topic= topic::where('id',$topic_id)->get(); 
        $manager_topic = view('backend.dashboard.topic.edit_topic')->with('edit_topic',$edit_topic); 
        return view('layouts.admin')->with('backend.dashboard.topic.edit_topic',$manager_topic);
    }
    public function update_topic(Request $request,$topic_id){
        
        $data = array();
        $data['name'] = $request->topic_name;
        $data['slug'] = Str::slug($request->topic_name);
        $data['sort_order'] = $request->topic_sort_order;
        $data['description'] = $request->topic_desc;
        topic::where('id',$topic_id)->update($data);
        Session::put('message','Cập nhật topic thành công');
        return Redirect::to('admin/all-topic');
    }
    public function delete_topic($topic_product_id){
        topic::where('id',$topic_product_id)->delete();
        Session::put('message','Xóa topic thành công');
        return Redirect::to('admin/all-topic');
    }

}
