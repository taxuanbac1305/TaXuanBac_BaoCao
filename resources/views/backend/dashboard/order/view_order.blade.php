@extends('layouts.admin')
@section('content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
        <?php 
        $user_name = Session::get('khachhang')
        ?>
      Thông tin khách hàng
    </div>
    
    <div class="table-responsive">
      <?php
        $message = Session::get('message');
        if($message){
            echo '<span class="text-alert">'.$message.'</span>';
            Session::put('message',null);
        }
      ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            
            <th>Tên khách hàng</th>
            <th>Số điện thoại</th>
            <th>Dịa chỉ</th>
            
          </tr>
        </thead>
        <tbody>
          
          <tr>
            
            <td>{{ $order_by_id->delivery_name }}</td>
            <td>{{ $order_by_id->delivery_phone }}</td>
            <td>{{ $order_by_id->delivery_address }}</td>

          </tr>
          
        </tbody>
      </table>
    </div>
    
  </div>
</div>
<br><br>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
        <?php 
        $user_name = Session::get('khachhang')
        ?>
      Liệt kê chi tiết đơn hàng
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <?php
        $message = Session::get('message');
        if($message){
            echo '<span class="text-alert">'.$message.'</span>';
            Session::put('message',null);
        }
      ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Tổng tiền</th>
            
          </tr>
        </thead>
        <tbody>
          @foreach($ordetail_product as $v_content)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $v_content->product_name }}</td>
            <td>{{ $v_content->product_quantity }}</td>
            <td>{{ number_format($v_content->product_price) }}</td>
            <td>{{ number_format($v_content->product_price *  $v_content->product_quantity). ' '. 'VNĐ'}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">-------------</small>
          <p>Tổng thành tiền có tính cả thuế: {{ number_format($order_by_id->order_total). ' '. 'VNĐ' }}</p>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection