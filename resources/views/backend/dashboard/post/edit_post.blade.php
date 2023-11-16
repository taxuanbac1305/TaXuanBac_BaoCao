@extends('layouts.admin')
@section('content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật bài viết
                        </header>
                        <div class="panel-body">
                            <?php
                                $message = Session::get('message');
                                if($message){
                                    echo '<span class="text-alert">'.$message.'</span>';
                                    Session::put('message',null);
                                }
                            ?>
                            <div class="position-center">
                                @foreach($edit_post as $key => $post)
                                <form role="form" action="{{URL::to('/admin/update-post/'.$post->id)}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên tiêu đề bài viết</label>
                                        <input type="text" name="title" class="form-control" value="{{ $post->title }}" id="exampleInputEmail1" placeholder="Tên tiêu đề bài viết">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Hình ảnh bài viết</label>
                                        <input type="file" name="image" class="form-control" id="exampleInputEmail1" >
                                        <img src="{{ asset('uploads/post/' . $post->image) }}" height="100" width="100">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Tóm tắt bài viết</label>
                                        <textarea style="resize: none" rows="8" class="form-control" name="description" id="ckeditor2" placeholder="Nội dung bài viết">{{ $post->description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nội dung bài viết</label>
                                        <textarea style="resize: none" rows="8" class="form-control" name="content" id="ckeditor1" placeholder="Tóm tắt bài viết">{{ $post->content }}</textarea>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Meta từ khóa</label>
                                        <textarea style="resize: none" rows="5" class="form-control" name="meta_keywords" id="exampleInputEmail1" placeholder="Meta từ khóa">{{ $post->meta_keywords }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Meta nội dung</label>
                                        <textarea style="resize: none" rows="5" class="form-control" name="meta_desc" id="exampleInputEmail1" placeholder="Meta nội dung">{{ $post->meta_desc }}</textarea>
                                    </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Danh mục bài viết</label>
                                    <select name="cate_post_id" class="form-control input-sm m-bot15">
                                        @foreach($cate_post as $key => $cate)
                                            @if($cate->id==$post->cate_post_id)
                                            <option selected value="{{$cate->id}}">{{$cate->name}}</option>
                                            @else
                                            <option value="{{$cate->id}}">{{$cate->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                
                                
                                
                                <button type="submit" name="add_product" class="btn btn-info">Cập nhật bài viết</button>
                            </form>
                            @endforeach
                            </div>

                        </div>
                    </section>

            </div>
@endsection