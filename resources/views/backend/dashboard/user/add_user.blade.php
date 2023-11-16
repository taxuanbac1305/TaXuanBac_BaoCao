@extends('layouts.admin')
@section('content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm thành viên
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
                                <form role="form" action="{{URL::to('/admin/save-user')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thành viên</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Tên thành viên">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên đăng nhập</label>
                                    <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Tên đăng nhập">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mật khẩu</label>
                                    <input type="text" name="password" class="form-control" id="exampleInputEmail1" placeholder="Mật khẩu">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giới tính</label>
                                    <input type="text" name="gender" class="form-control" id="exampleInputEmail1" placeholder="Giới tính">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số điện thoại</label>
                                    <input type="text" name="phone" class="form-control" id="exampleInputEmail1" placeholder="Số điện thoại">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Địa chỉ</label>
                                    <textarea style="resize: none" rows="5" class="form-control" name="address" id="exampleInputPassword1" placeholder="Địa chỉ"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh thành viên</label>
                                    <input type="file" name="image" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Phân quyền</label>
                                    <select name="roles" class="form-control input-sm m-bot15">
                                        <option value="0">User</option>
                                        <option value="1">Admin</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                    <select name="status" class="form-control input-sm m-bot15">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiển thị</option>
                                    </select>
                                </div>
                                
                                <button type="submit" name="add_product" class="btn btn-info">Thêm sản phẩm</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection