<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\CategoryPost;
use App\Models\Menu;
use App\Models\Post;
use App\Models\Product;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Brand;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

session_start();

class DashboardController extends Controller
{
    public function index()
    {
        $h = view('backend.index');
        return view("layouts.admin")->with('index', $h);
    }
    public function all_brand_product()
    {
        $all_brand_product = Brand::all(); //nó lấy dữ liệu từ bảng ra
        $manager_brand_product = view('backend.dashboard.brand.all_brand')->with('all_brand_product', $all_brand_product); // chỗ with(tên,biến) thì cái tên sẽ được sử dụng ở foreach trong trang all_brand_product
        return view('layouts.admin')->with('backend.dashboard.brand.all_brand', $manager_brand_product); // admin_layout sẽ chứa all_brand_product luôn
    }
    public function all_category_product()
    {
        $all_category_product = Category::all(); //nó lấy dữ liệu từ bảng ra
        $manager_category_product = view('backend.dashboard.category.all_category')->with('all_category_product', $all_category_product); // chỗ with(tên,biến) thì cái tên sẽ được sử dụng ở foreach trong trang all_category_product
        return view('layouts.admin')->with('backend.dashboard.category.all_category', $manager_category_product); // admin_layout sẽ chứa all_brand_product luôn
    }

    public function all_product()
    {
        $all_product = Product::join('db_category', 'db_category.id', '=', 'db_product.category_id')
            ->join('db_brand', 'db_brand.id', '=', 'db_product.brand_id')
            ->select('db_product.id', 'db_product.name', 'db_product.price', 'db_product.image', 'db_category.name AS category_name', 'db_brand.name AS brand_name', 'db_product.status')
            ->orderBy('db_product.id', 'desc')
            ->get();
        $manager_product = view('backend.dashboard.product.all_product')->with('all_product', $all_product);
        return view('layouts.admin')->with('backend.dashboard.product.all_product', $manager_product); // admin_layout sẽ chứa all_product luôn
    }
    // public function all_menu()
    // {
    //     $all_menu = Menu::join('db_brand', 'db_brand.id', '=', 'db_menu.name')
    //         ->select('db_menu.name', 'db_menu.link', 'db_menu.type')
    //         ->orderBy('db_menu.id', 'desc')
    //         ->get();

    //     $manager_menu = view('backend.dashboard.menu.all_menu')->with('all_menu', $all_menu);
    //     return view('layouts.admin')->with('backend.dashboard.menu.all_menu', $manager_menu);
    // }

    public function all_menu()
    {
        $all_menu = Menu::all(); //nó lấy dữ liệu từ bảng ra
        $manager_menu = view('backend.dashboard.menu.all_menu')->with('all_menu', $all_menu); // chỗ with(tên,biến) thì cái tên sẽ được sử dụng ở foreach trong trang all_category_product
        return view('layouts.admin')->with('backend.dashboard.menu.all_menu', $manager_menu); // admin_layout sẽ chứa all_brand_product luôn
    }

    public function all_topic()
    {
        $all_topic = Topic::all(); //nó lấy dữ liệu từ bảng ra
        $manager_topic = view('backend.dashboard.topic.all_topic')->with('all_topic', $all_topic); // chỗ with(tên,biến) thì cái tên sẽ được sử dụng ở foreach trong trang all_category_product
        return view('layouts.admin')->with('backend.dashboard.topic.all_topic', $manager_topic); // admin_layout sẽ chứa all_brand_product luôn
    }
    public function all_banner(){
        $all_banner = Banner::all(); //nó lấy dữ liệu từ bảng ra
        $manager_banner = view('backend.dashboard.banner.all_banner')->with('all_banner',$all_banner); // chỗ with(tên,biến) thì cái tên sẽ được sử dụng ở foreach trong trang all_category_product
        return view('layouts.admin')->with('backend.dashboard.banner.all_banner',$manager_banner); // admin_layout sẽ chứa all_brand_product luôn
    }
    public function all_post(){
        $all_post = Post::orderBy('id','DESC')->get(); //nó lấy dữ liệu từ bảng ra
        $manager_post = view('backend.dashboard.post.all_post')->with('all_post',$all_post); // chỗ with(tên,biến) thì cái tên sẽ được sử dụng ở foreach trong trang all_category_product
        return view('layouts.admin')->with('backend.dashboard.post.all_post',$manager_post); // admin_layout sẽ chứa all_brand_product luôn
    }
    public function all_categorypost(){
        $all_categorypost = CategoryPost::all(); //nó lấy dữ liệu từ bảng ra
        $manager_categorypost = view('backend.dashboard.categorypost.all_categorypost')->with('all_categorypost',$all_categorypost); // chỗ with(tên,biến) thì cái tên sẽ được sử dụng ở foreach trong trang all_category_product
        return view('layouts.admin')->with('backend.dashboard.categorypost.all_categorypost',$manager_categorypost); // admin_layout sẽ chứa all_brand_product luôn
    }
    public function all_user(){
        $all_user = User::all(); //nó lấy dữ liệu từ bảng ra
        $manager_user = view('backend.dashboard.user.all_user')->with('all_user',$all_user); // chỗ with(tên,biến) thì cái tên sẽ được sử dụng ở foreach trong trang all_category_product
        return view('layouts.admin')->with('backend.dashboard.user.all_user',$manager_user); // admin_layout sẽ chứa all_brand_product luôn
    }



}
