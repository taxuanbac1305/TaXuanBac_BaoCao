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
                                <form role="form" action="{{URL::to('/admin/save-categorypost')}}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục bài viết</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục bài viết">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục bài viết</label>
                                    <textarea style="resize: none" rows="5" class="form-control" name="description" id="exampleInputEmail1" placeholder="Mô tả danh mục bài viết"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                    <select name="status" class="form-control input-sm m-bot15">
                                        <option value="1">Hiển thị</option>
                                        <option value="0">Ẩn</option>
                                    </select>
                                </div>
                                
                                <button type="submit" name="add_categorypost" class="btn btn-info">Thêm danh mục bài viết</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection