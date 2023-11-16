<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Brand;
use Session;
use Illuminate\Support\Str;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class UserController extends Controller
{ 
     public function AuthLogin(){
        $id =  Session::get('id');
        if ($id){
            return Redirect::to('admin');

        }else{
            return Redirect::to('login')->send();
        }
    }
    public function index(){
        return view('backend.admin_login');
    }
    public function dashboard(Request $request){
        $email = $request->email;
        $password = $request->password;

        $result = User::where('email', $email)->where('password', $password)->first();
        if($result){
            Session::put('username',$result->username);
            Session::put('id',$result->id);
            Session::put('image',$result->image);
            return Redirect::to('/admin');
        }else{
            Session::put('message','Your password or email is incorrect. Please enter again');
            return Redirect::to('/login');
        }
    }
    public function logout(){
        $this->AuthLogin();
        Session::put('username',null);
        Session::put('id',null);
        Session::put('image',null);
        return Redirect::to('/login');        
    }

    public function add_user(){
        $h = view('backend.dashboard.user.add_user');
        return view("layouts.admin")->with('index_add_user',$h);
    }

    public function save_user(Request $request){
        $data = array();
        $data['name'] = $request->name;
        $data['username'] = $request->username;
        $data['password'] = $request->password;
        $data['gender'] = $request->gender;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['status'] = $request->status;
        $data['roles'] = $request->roles;
        $data['created_by'] = 1;
        $data['update_by'] = null;
        $get_image = $request->file('image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move(public_path('uploads/user'), $new_image);
            $data['image'] = $new_image;
            User::create($data);
            Session::put('message','Thêm thành viên thành công');
            return Redirect::to('admin/add-user');
        }
        $data['image'] = 'free_image.gif';
        User::create($data);
        Session::put('message','Thêm thành viên thành công');
        return Redirect::to('admin/add-user');
    }

    public function unactive_user($user_id){
        
        User::where('id', $user_id)->update(['status' => 1]);
        Session::put('message','Kích hoạt hiển thị user thành công');
        return Redirect::to('admin/all-user');
    }
    public function active_user($user_id){
        
        User::where('id', $user_id)->update(['status' => 0]);
        Session::put('message','Không kích hoạt hiển thị user thành công');
        return Redirect::to('admin/all-user');
    }
    public function unactive_admin_user($user_id){
        
        User::where('id', $user_id)->update(['roles' => 1]);
        Session::put('message','Kích hoạt quyền Admin thành công');
        return Redirect::to('admin/all-user');
    }
    public function active_admin_user($user_id){
        
        User::where('id', $user_id)->update(['roles' => 0]);
        Session::put('message','Kích hoạt quyền User thành công');
        return Redirect::to('admin/all-user');
    }
    public function edit_user($user_id){
        $edit_user = User::where('id',$user_id)->get(); 
        $manager_user = view('backend.dashboard.user.edit_user')->with('edit_user',$edit_user); 
        return view('layouts.admin')->with('backend.dashboard.user.edit_user',$manager_user);
    }
    public function update_user(Request $request,$user_id){
        $data = array();
        $data['name'] = $request->name;
        $data['username'] = $request->username;
        $data['password'] = $request->password;
        $data['gender'] = $request->gender;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['created_by'] = 1;
        $data['update_by'] = null;
        $get_image = $request->file('image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move(public_path('uploads/user'), $new_image);
            $data['image'] = $new_image;
            User::where('id',$user_id)->update($data);
            Session::put('message','Cập nhật thành viên thành công');
            return Redirect::to('admin/all-user');
        }
        else {
            // Giữ nguyên bức hình cũ
            $user = User::find($user_id);
            $data['image'] = $user->image;
        }
        

        User::where('id',$user_id)->update($data);
        Session::put('message','Cập nhật thành viên thành công');
        return Redirect::to('admin/all-user');
    }
    public function delete_user($user_id){
        User::where('id',$user_id)->delete();
        Session::put('message','Xóa thành viên thành công');
        return Redirect::to('admin/all-user');
    }

}




 // public function AuthLogin(){
    //     $user_id =  Session::get('user_id');
    //     if ($user_id){
    //         return Redirect::to('admin.dashboard');

    //     }else{
    //         return Redirect::to('user')->send();
    //     }
    // }
    // public function index(){
    //     return view('login');
    // }
    // public function show_dashboard(){
    //     $this->AuthLogin();
    //     return view('user.dashboard');
    // }
    // public function dashboard(Request $request){
    //     $email = $request->email;
    //     $password = md5($request->password);

    //     $result = DB::table('tbl_user')->where('email', $email)->where('password', $password)->first();
    //     if($result){
    //         Session::put('user_name',$result->user_name);
    //         Session::put('user_id',$result->user_id);
    //         return Redirect::to('/dashboard');
    //     }else{
    //         Session::put('message','Your password or email is incorrect. Please enter again');
    //         return Redirect::to('/user');
    //     }
    // }
    // public function logout(){
    //     $this->AuthLogin();
    //     Session::put('user_name',null);
    //     Session::put('user_id',null);
    //     return Redirect::to('/user');        
    // }