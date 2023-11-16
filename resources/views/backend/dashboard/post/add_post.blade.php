@extends('layouts.admin')
@section('content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm bài viết
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
                                <form role="form" action="{{URL::to('/admin/save-post')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên tiêu đề bài viết</label>
                                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Tên tiêu đề bài viết">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh bài viết</label>
                                    <input type="file" name="image" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tóm tắt bài viết</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="description" id="ckeditor1" placeholder="Nội dung bài viết"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung bài viết</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="content" id="ckeditor2" placeholder="Tóm tắt bài viết"></textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Meta từ khóa</label>
                                    <textarea style="resize: none" rows="5" class="form-control" name="meta_keywords" id="exampleInputEmail1" placeholder="Meta từ khóa"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Meta nội dung</label>
                                    <textarea style="resize: none" rows="5" class="form-control" name="meta_desc" id="exampleInputEmail1" placeholder="Meta nội dung"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Danh mục bài viết</label>
                                    <select name="cate_post_id" class="form-control input-sm m-bot15">
                                        @foreach($cate_post as $key => $cate)
                                            <option value="{{$cate->id}}">{{$cate->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                    <select name="status" class="form-control input-sm m-bot15">
                                        <option value="1">Hiển thị</option>
                                        <option value="0">Ẩn</option>
                                    </select>
                                </div>
                                
                                <button type="submit" name="add_post" class="btn btn-info">Thêm bài viết</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
</div>

@endsection
