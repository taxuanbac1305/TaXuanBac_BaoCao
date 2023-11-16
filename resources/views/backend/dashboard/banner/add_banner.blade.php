@extends('layouts.admin')
@section('content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm banner
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
                                <form role="form" action="{{URL::to('/admin/save-banner')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên tiêu đề Banner</label>
                                    <input type="text" name="banner_name" class="form-control" id="exampleInputEmail1" placeholder="Tên tiêu đề Banner">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh Banner</label>
                                    <input type="file" name="image" class="form-control"  >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Đường link</label>
                                    <input type="text" name="banner_link" class="form-control" id="exampleInputEmail1" placeholder="Đường link Banner">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Vị trí Banner</label>
                                    <select name="banner_position" class="form-control input-sm m-bot15">
                                        <option value="0">Header</option>
                                        <option value="1">Footer</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả Banner</label>
                                    <textarea style="resize: none" rows="5" class="form-control" name="banner_desc" id="exampleInputPassword1" placeholder="Mô tả Banner"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                    <select name="banner_status" class="form-control input-sm m-bot15">
                                        <option value="1">Hiển thị</option>
                                        <option value="0">Ẩn</option>
                                    </select>
                                </div>
                                
                                <button type="submit" name="add_banner" class="btn btn-info">Thêm Banner</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>

@endsection