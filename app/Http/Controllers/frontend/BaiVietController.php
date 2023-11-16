<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\CategoryPost;
use App\Models\Post;
use Illuminate\Http\Request;

class BaiVietController extends Controller
{
    public function danh_muc_bai_viet(Request $request,$post_slug){
        $catepost = CategoryPost::where('slug', $post_slug)->take(1)->get();
        foreach ($catepost as $key => $value) {
            $meta_desc= $value->description;
            $meta_keywords= $value->slug;
            $meta_title= $value->name;
            $cate_id = $value->id;
            $url_canonial= $request->url();
        }
        $post = Post::with('cate_post')->where('status',1)->where('cate_post_id',$cate_id)->paginate(10);
        return view('frontend.post-category')->with('post',$post)->with('meta_title',$meta_title);
    }
    public function bai_viet(Request $request,$post_slug){
        
        $post = Post::with('cate_post')->where('status',1)->where('slug',$post_slug)->take(1)->get();
        foreach ($post as $key => $p) {
            $meta_desc= $p->meta_desc;
            $meta_keywords= $p->meta_keywords;
            $meta_title= $p->title;
            $cate_id = $p->id;
            $url_canonial= $request->url();
        }
        
        return view('frontend.post-detail')->with('post',$post)->with('meta_title',$meta_title);
    }
}
