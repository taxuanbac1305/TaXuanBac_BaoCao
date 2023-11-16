@extends('layouts.admin')
@section('content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm danh mục bài viết
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
                            @foreach($edit_categorypost as $key => $edit_value)
                                <form role="form" action="{{URL::to('/admin/update-categorypost/'.$edit_value->id)}}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục bài viết</label>
                                    <input type="text" name="name" value="{{$edit_value->name}}" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục bài viết">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục bài viết</label>
                                    <textarea style="resize: none" rows="5" class="form-control" name="description" id="exampleInputPassword1" placeholder="Mô tả danh mục">{{$edit_value->description}}</textarea>
                                </div>
                                
                                <button type="submit" name="update_categoryPost" class="btn btn-info">Cập nhật danh mục bài viết</button>
                            </form>
                            @endforeach
                            </div>

                        </div>
                    </section>

            </div>
@endsection