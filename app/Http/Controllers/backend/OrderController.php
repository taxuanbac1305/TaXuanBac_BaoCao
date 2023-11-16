<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Orderdetail;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function manage_other(){
        $all_order = Order::join('db_user', 'db_user.id', '=', 'db_order.user_id')
        ->select('db_order.*','db_user.name as user_name')
        ->orderBy('db_order.id', 'desc')
        ->get();
        $manager_order = view('backend.dashboard.order.manage_order')->with('all_order', $all_order);
        return view('layouts.admin')->with('backend.dashboard.order.manage_order',$manager_order);

    }
    public function unactive_order($order_id){
        
        Order::where('id', $order_id)->update(['status' => 1]);
        Session::put('message','Kích hoạt đơn hàng thành công');
        return Redirect::to('admin/manage-order');
    }
    public function active_order($order_id){
        
        Order::where('id', $order_id)->update(['status' => 0]);
        Session::put('message','Không kích hoạt đơn hàng thành công');
        return Redirect::to('admin/manage-order');
    }
    public function delete_order($order_id){
        Order::where('id',$order_id)->delete();
        Orderdetail::where('order_id', $order_id)->delete();
        Session::put('message','Xóa đơn hàng thành công');
        return Redirect::to('admin/manage-order');
    }
    public function view_order($order_id){
        $order_by_id = Order::where('db_order.id', $order_id)
        ->join('db_orderdetail', 'db_orderdetail.order_id', '=', 'db_order.id')
        ->select('db_order.*','db_orderdetail.*')->first();
        $ordetail_product = Order::where('db_order.id', $order_id)
        ->join('db_orderdetail', 'db_orderdetail.order_id', '=', 'db_order.id')
        ->select('db_orderdetail.*')->get();
        $manager_order_by_id = view('backend.dashboard.order.view_order')->with('order_by_id', $order_by_id)->with('ordetail_product',$ordetail_product);
        return view('layouts.admin')->with('backend.dashboard.order.view_order',$manager_order_by_id);
    }
}
