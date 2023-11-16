@extends('layouts.admin')
@section('content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm menu
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
                                <form role="form" action="{{URL::to('/admin/save-menu')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên menu</label>
                                    <input type="text" name="menu_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>     
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Sắp xếp</label>
                                    <select name="menu_sort_order" class="form-control input-sm m-bot15">
                                        <option value="0">Trước:</option>
                                        <option value="1">Sau:</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea style="resize: none" rows="5" class="form-control" name="menu_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Link</label>
                                    <input  style="text" name="menu_link" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>  

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Type</label>
                                    <select name="menu_type" class="form-control input-sm m-bot15">
                                        @foreach($brand_menu as $key => $brand)
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Parent_id</label>
                                    <select name="menu_parent_id" class="form-control input-sm m-bot15">
                                        <option value="0">Cha</option>
                                        <option value="1">Mẹ</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                    <select name="menu_status" class="form-control input-sm m-bot15">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiển thị</option>
                                    </select>
                                </div>
                                
                                <button type="submit" name="add_menu" class="btn btn-info">Thêm menu</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection