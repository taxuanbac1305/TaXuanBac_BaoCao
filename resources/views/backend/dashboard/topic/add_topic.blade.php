@extends('layouts.admin')
@section('content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm topic 
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
                                <form role="form" action="{{URL::to('/admin/save-topic')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên topic</label>
                                    <input type="text" name="topic_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>     
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Sắp xếp</label>
                                    <select name="topic_sort_order" class="form-control input-sm m-bot15">
                                        <option value="0">Trước:</option>
                                        <option value="1">Sau:</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea style="resize: none" rows="5" class="form-control" name="topic_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                                </div>                        
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                    <select name="topic_status" class="form-control input-sm m-bot15">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiển thị</option>
                                    </select>
                                </div>
                                
                                <button type="submit" name="add_topic" class="btn btn-info">Thêm topic</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection