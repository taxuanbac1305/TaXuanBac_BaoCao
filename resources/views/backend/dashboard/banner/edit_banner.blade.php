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
                            @foreach($edit_banner as $key => $edit_value)
                                <form role="form" action="{{URL::to('/admin/update-banner/'.$edit_value->id)}}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên tiêu đề Banner</label>
                                    <input type="text" name="banner_name" class="form-control" value="{{$edit_value->name}}" id="exampleInputEmail1" placeholder="Tên tiêu đề Banner">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh banner</label>
                                    <input type="file" name="image" class="form-control" id="exampleInputEmail1" >
                                    <img src="{{ asset('uploads/banner/' . $edit_value->image) }}" height="100" width="100">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Đường link</label>
                                    <input type="text" name="banner_link" class="form-control" value="{{$edit_value->link}}" id="exampleInputEmail1" placeholder="Đường link Banner">
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
                                    <textarea style="resize: none" rows="5" class="form-control" name="banner_desc"  id="exampleInputPassword1" placeholder="Mô tả Banner">{{$edit_value->description}}</textarea>
                                </div>
 
                                <button type="submit" name="update_brand_product" class="btn btn-info">Cập nhật banner</button>
                            </form>
                            @endforeach
                            </div>

                        </div>
                    </section>

            </div>

@endsection