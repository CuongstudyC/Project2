<?php

namespace App\Http\Controllers;

use App\Models\order_details;
use App\Models\orders;
use App\Models\shipping_orders;
use App\Models\User;
use Illuminate\Http\Request;

class ManagementUser extends Controller
{
    function index()
    {
        $customers = User::all();
        $cout = 1;
        return view('admin/manage_users/index', compact('customers', 'cout'));
    }

    function delete($id)
    {
        try {
            User::find($id)->delete();
            return redirect('admin/manage_users/index')->with('status', "Đã xóa thành công");
        } catch (\Exception $e) {
            return redirect('admin/manage_users/index')->with('error', "Khách hàng này có đơn hàng nên ko thể xóa");
        }
    }

    function searchUsers(Request $request)
    {
        if (!empty($request->search)) {
            $nameSearch = $request->search;
            $customers = User::where('name', 'LIKE', '%' . $nameSearch . '%')->get();

            if (count($customers) > 0) {
                $cout = 1;
                session(['status' => 'Đã tìm kiếm thành công']);
                return view('admin/manage_users/index', compact('customers', 'cout'));
            }

            $customers = User::where('email', 'LIKE', '%' . $nameSearch . '%')->get();

            if (count($customers) > 0) {
                $cout = 1;
                session(['status' => 'Đã tìm kiếm thành công']);
                return view('admin/manage_users/index', compact('customers', 'cout'));
            }

            return redirect('admin/manage_users/index')->with('error', 'Không thể tìm thấy tên bạn vừa tìm kiếm');
        } else {
            return redirect('admin/manage_users/index');
        }
    }

    function orders()
    {
        $orders = orders::all();
        $orders_detail = order_details::all();
        return view('admin/manage_users/orderUser', compact('orders', 'orders_detail'));
    }

    function delete_order($id)
    {
        try {
            $order_delete = orders::find($id);
            $shipping_order_status = shipping_orders::where('order_id',$order_delete->id)->get();
            foreach($shipping_order_status as $ship){
                if($ship->status == "Giao hàng thất bại" && $ship->reason_fail == "Khách hàng chưa thanh toán"){
                    $ship->delete();
                }
            }
            $order_delete->delete();
            return back()->with('status', "Đã xóa thành công");
        } catch (\Exception $e) {
            return back()->with('error',"Không thể xóa vì còn có thể có đơn hàng trạng thái đang giao hàng hoặc đã giao hàng thành công");
        }
    }

    function searchOrder(Request $request)
    {
        if (!empty($request->search)) {
            $nameSearch = $request->search;

            $orders = orders::where('id',$nameSearch)->get();

            if (count($orders) > 0) {
                return $this->successSearchOrder($orders);
            }


            $orders = orders::where('name', 'LIKE', '%' . $nameSearch . '%')->get();

            if (count($orders) > 0) {
                return $this->successSearchOrder($orders);
            }

            $orders = orders::where('address', 'LIKE', '%' . $nameSearch . '%')->get();

            if (count($orders) > 0) {
                return $this->successSearchOrder($orders);
            }

            $orders = orders::where('phone', $nameSearch)->get();

            if (count($orders) > 0) {
                return $this->successSearchOrder($orders);
            }

            $orders = orders::where('total', $nameSearch)->get();

            if (count($orders) > 0) {
                return $this->successSearchOrder($orders);
            }

            return redirect('admin/manage_users/orderUser')->with('error', 'Không thể tìm thấy tên bạn vừa tìm kiếm');
        } else {
            return redirect('admin/manage_users/orderUser');
        }
    }
        function successSearchOrder($orders){
                $orders_detail = order_details::all();
                $cout = 1;
                session(['status' => 'Đã tìm kiếm thành công']);
                return view('admin/manage_users/orderUser', compact('orders', 'orders_detail', 'cout'));
        }


    function order_status()
    {
        $shipping_orders = shipping_orders::all();
        $orders = orders::all();

        return view('admin/manage_users/order_status', compact('shipping_orders', 'orders'));
    }
    function updateShipping($id, Request $request)
    {
        $shipping_orders = shipping_orders::find($id);

        $phone = $request->phone;
        $type = $request->type;
        $fee = $request->fee;
        $status = $request->status;
        $order_id = $request->order_id;
        $date_start = $request->date_start;
        if(!empty($request->confirm_reason)){
            $reason = $request->confirm_reason;
        }

        $shipping_orders->date = $date_start;
        $shipping_orders->fee = $fee;
        $shipping_orders->type = $type;
        $shipping_orders->status = $status;
        $shipping_orders->phone = $phone;
        $shipping_orders->order_id = $order_id;
        if(!empty($request->confirm_reason)){
            $shipping_orders->reason_fail = $reason;
        }
        $shipping_orders->save();

        return redirect('admin/manage_users/order_status')->with('status', "Đã cập nhật thành công");
    }

    function createShippingOrder()
    {
        $orders = orders::all();
        return view('admin/manage_users/create', compact('orders'));
    }

    function submitCreate(Request $request)
    {
        $phone = $request->phone;
        $type = $request->type;
        $fee = $request->fee;
        $status = $request->status;
        $order_id = $request->order_id;
        $date = $request->date;

        $shipping_orders = new shipping_orders();
        $shipping_orders->date = $date;
        $shipping_orders->fee = $fee;
        $shipping_orders->type = $type;
        $shipping_orders->status = $status;
        $shipping_orders->phone = $phone;
        $shipping_orders->order_id = $order_id;

        $shipping_orders->save();

        return redirect('admin/manage_users/order_status')->with('status', "Đã tạo thành công");
    }

    // function delete_shipping($id){
    //     shipping_orders::find($id)->delete();

    //     return back()->with('status',"Đã xóa thành công");
    // }

    function searchShipping(Request $request){
        if (!empty($request->search)) {
            $nameSearch = $request->search;

            $shipping_orders = shipping_orders::where('order_id',$nameSearch)->get();

            if (count($shipping_orders) > 0) {
               return $this->sucessShippingSearch($shipping_orders);
            }


            $shipping_orders = shipping_orders::where('phone',$nameSearch)->get();

            if (count($shipping_orders) > 0) {
               return $this->sucessShippingSearch($shipping_orders);
            }

            $shipping_orders = shipping_orders::where('fee',$nameSearch)->get();

            if (count($shipping_orders) > 0) {
                return $this->sucessShippingSearch($shipping_orders);
            }

            $shipping_orders = shipping_orders::where('type','LIKE', '%' .$nameSearch .'%')->get();

            if (count($shipping_orders) > 0) {
                return $this->sucessShippingSearch($shipping_orders);
            }

            $shipping_orders = shipping_orders::where('status','LIKE', '%' .$nameSearch .'%')->get();

            if (count($shipping_orders) > 0) {
                return $this->sucessShippingSearch($shipping_orders);
            }

            $orders = orders::where('name','LIKE', '%' .$nameSearch .'%')->get();

            if(count($orders) >0){
                foreach($orders as $order){
                    $shipping_orders = shipping_orders::where('order_id', $order->id)->get();
                    if(count($shipping_orders) > 0){
                        return $this->sucessShippingSearch($shipping_orders);
                    }
                }
            }

            $dateConvent = strtotime(str_replace('/','-',$nameSearch));
            if($dateConvent){
                $nameSearch = date('Y-m-d',$dateConvent);
                $shipping_orders = shipping_orders::where('date',$nameSearch)->get();
                if(count($shipping_orders) > 0){
                    return $this->sucessShippingSearch($shipping_orders);
                }
            }
            return redirect('admin/manage_users/order_status')->with('error', 'Không thể tìm thấy tên bạn vừa tìm kiếm');
        } else {
            return redirect('admin/manage_users/order_status');
        }
    }

    function sucessShippingSearch($shipping_orders){
        $orders = orders::all();
        session(['status' => 'Đã tìm kiếm thành công']);
        return view('admin/manage_users/order_status', compact('shipping_orders', 'orders'));
    }
}
