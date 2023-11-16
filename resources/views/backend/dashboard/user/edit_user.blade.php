@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật thành viên
                </header>
                <div class="panel-body">
                    <?php
                    $message = Session::get('message');
                    if ($message) {
                        echo '<span class="text-alert">' . $message . '</span>';
                        Session::put('message', null);
                    }
                    ?>
                    <div class="position-center">
                        @foreach ($edit_user as $key => $user)
                            <form role="form" action="{{ URL::to('/admin/update-user/' . $user->id) }}" method="post"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thành viên</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                        placeholder="Tên thành viên" value="{{ $user->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên đăng nhập</label>
                                    <input type="text" name="username" class="form-control" id="exampleInputEmail1"
                                        placeholder="Tên đăng nhập" value="{{ $user->username }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh thành viên</label>
                                    <input type="file" name="image" class="form-control" id="exampleInputEmail1">
                                    <img src="{{ asset('uploads/user/' . $user->image) }}" height="100" width="100">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mật khẩu</label>
                                    <input type="text" name="password" class="form-control" id="exampleInputEmail1"
                                        placeholder="Mật khẩu" value="{{ $user->password }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giới tính</label>
                                    <input type="text" name="gender" class="form-control" id="exampleInputEmail1"
                                        placeholder="Giới tính" value="{{ $user->gender }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" name="email" class="form-control" id="exampleInputEmail1"
                                        placeholder="Email" value="{{ $user->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số điện thoại</label>
                                    <input type="text" name="phone" class="form-control" id="exampleInputEmail1"
                                        placeholder="Số điện thoại" value="{{ $user->phone }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Địa chỉ</label>
                                    <textarea style="resize: none" rows="5" class="form-control" name="address" id="exampleInputPassword1"
                                        placeholder="Địa chỉ">{{ $user->address }}</textarea>
                                </div>
                                
                                
                                <button type="submit" name="add_user" class="btn btn-info">Cập nhật thành viên</button>
                            </form>
                        @endforeach
                    </div>

                </div>
            </section>

        </div>
    @endsection
