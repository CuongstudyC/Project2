<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\admin_remember;
use App\Models\Events;
use App\Models\orders;
use App\Models\Products;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController_admin extends Controller
{
    function index()
    {
        $re = admin_remember::all();
        $cout = 0;
        foreach ($re as $r) {
            $cout += 1;
        }
        if ($cout > 0 ) {
            if (session('id')) {
                session()->forget('id');
            }
            return redirect('admin/layouts/layout');
        } else if (session('login_many_time')){
            session()->forget('login_many_time');
            return redirect('admin/layouts/layout');
        }
         else {
            if (session('id')) {
                session()->forget('id');
            }
            return view('admin/login/index');
        }
    }

    function gotoMainPage(){
        $admin_remember =admin_remember::all();
        foreach($admin_remember as $ADMIN){
            $ADMINS = admin::where('id',$ADMIN->admin_id)->where('position','!=','nhân viên')->get();
            if(count($ADMINS) > 0){
                session(['Unshow' =>1]);
            } else{
                if(session('Unshow')){
                    session()->forget('Unshow');
                }
            }
        }

        $orders = orders::all();
        $now = date('Y-m-d');
        $orders_newInDay = 0;
        $sum_ordersInDay = 0;
        $sum_total = 0;
        $array_sum = [];
        $tempDate = 0;
        $temp = -1;
        $array_date = [];
        foreach($orders as $order){
            $sum_total+=$order->total;
                $date = Carbon::parse($order->created_at);
                $dateConvert = $date->format('Y-m-d');
                if($dateConvert == $now){
                    $orders_newInDay+=1;
                    $sum_ordersInDay+=$order->total;
                }
                if($tempDate != $dateConvert){
                    $tempDate = $dateConvert;
                    $array_date [] = $tempDate;
                    $array_sum [] = $order->total;
                    $temp++;
                } else{
                    $array_sum [$temp]+= $order->total;
                }
        }
        $this->formatNumber($sum_total);
        $this->formatNumber($sum_ordersInDay);

        $users = User::all();
        $usersNumber = count($users);
        return view('admin/layouts/layout',compact('orders_newInDay','sum_ordersInDay','sum_total','usersNumber','array_sum','array_date'));
    }

    function formatNumber(&$sum_total){
        if($sum_total != 0){
            $sum_total = (String) $sum_total;
            $charSum = str_split($sum_total);
            $sum_total = "";
            $a = 1;
            $dem = 0;
            for($i = count($charSum) -1 ; $i >=0; $i--){
                if($dem == 3*$a){
                    $sum_total = $sum_total .".".$charSum[$i];
                    $a+=1;
                } else{
                    $sum_total = $sum_total .$charSum[$i];
                }
                $dem+=1;
            }
            $charSum = str_split($sum_total);
            $sum_total = "";
            for($i = count($charSum)-1; $i >=0; $i--){
                $sum_total = $sum_total .$charSum[$i];
            }
        }
    }


    function submitConfirmEmail($email){
        $validateAdmin = admin::where('email',$email)->where('position','quản lí')->first();
        if(!empty($validateAdmin)){
            return response()->json([
                'check'=>1
            ]);
        }

        return response()->json([
            'check'=>0
        ]);
    }

    function register1(){
        return view('admin/login/register');
    }

    function register()
    {
        if (session('name')) {
            session()->forget(['name', 'email']);
        }
        return redirect('admin/login/register1');
    }

    function submitRegister(Request $request)
    {
        $fullname = $request->full_name;
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $position = $request->position;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = date('Y-m_d') . $file->getClientOriginalName();
        }
        try {
            $table_admin = new admin();
            $table_admin->full_name = $fullname;
            $table_admin->position = $position;
            $table_admin->user_name = $name;
            $table_admin->email = $email;
            $table_admin->password = Hash::make($password);
            if (isset($filename)) {
                $file->move("avatar_admin", $filename);
                $table_admin->image = $filename;
            }
            $table_admin->save();
            return redirect('admin/login/')->with('name', $name)->with('status',"Đã đăng ký quản lí thàng công")
                ->with('email', $email);
        } catch (\Exception $e) {

            return back()->with('error_email', 'Email đã được sử dụng')
                ->with('fullname', $fullname)
                ->with('name', $name)
                ->with('email', $email)
                ->with('position', $position)
                ->with('email', $email);
        }
    }

    function submitLogin(Request $request)
    {
        $user_name = $request->user_name;
        $email = $request->email;
        $password = $request->password;
        $checkUsername = admin::where('user_name', $user_name)->first();
        if (!$checkUsername) {
            return back()->with('error_username', 'Tên người dùng ko tồn tại')
                ->with('name', $user_name)
                ->with('email', $email);
        }
        $checkEmail = admin::where('email', $email)->first();

        if (!$checkEmail) {
            return back()->with('error_email', 'Email không tồn tại')
                ->with('name', $user_name)
                ->with('email', $email);
        }

        $check = admin::where('user_name', $user_name)->where('email', $email)->first();
        if ($check && Hash::check($password, $check->password)) {
            if (isset($check->image)) {
                session(['image' => $check->image]);
            }
            $id = $check->id;
            if ($request->has('remember')) {
                $adminRemember = admin_remember::all();
                $cout = 0;
                foreach ($adminRemember as $re) {
                    $cout += 1;
                }
                if ($cout > 0) {
                    foreach ($adminRemember as $re) {
                        $re->admin_id = $id;
                        $re->save();
                    }
                } else {
                    $adminRemember = new admin_remember();
                    $adminRemember->admin_id = $id;
                    $adminRemember->save();
                }
            } else {
                session(['id' => $id]);
                session(['login_many_time'=>1]);
                $adminRemember = admin_remember::all();
                foreach ($adminRemember as $re) {
                    $re->delete();
                }
            }

            if(session('id')){
                $ADMINS = admin::where('id',session('id'))
                  -> where('position','!=','nhân viên')->get();
                if(count($ADMINS) > 0){
                    session(['Unshow' =>1]);
                } else{
                    if(session('Unshow')){
                        session()->forget('Unshow');
                    }
                }
            } else{
                $admin_remember =admin_remember::all();
                foreach($admin_remember as $ADMIN){
                    $ADMINS = admin::where('id',$ADMIN->admin_id)->where('position','!=','nhân viên')->get();
                    if(count($ADMINS) > 0){
                        session(['Unshow' =>1]);
                    } else{
                        if(session('Unshow')){
                            session()->forget('Unshow');
                        }

                    }
                }
            }
            return redirect('admin/login/');
        } else {
            return back()->with('error_password', 'Mật khẩu không tồn tại')
                ->with('name', $user_name)
                ->with('email', $email);
        }
    }

    function validateForgot()
    {
        return view('admin/login/submit_email_forgot');
    }

    function submitEmailForgot(Request $request)
    {
        $name = $request->user_name;
        $email = $request->email;

        $check = admin::where('user_name', $name)->first();
        if (!$check) {
            return back()->with('error_name', 'Tên người dùng ko tồn tại')
                ->with('name', $name)
                ->with('email', $email);
        }

        $check = admin::where('email', $email)->first();
        if (!$check) {
            return back()->with('error_email', 'Email không tồn tại')
                ->with('name', $name)
                ->with('email', $email);
        }

        $check = admin::where('user_name', $name)->where('email', $email)->first();
        if ($check) {
            $id = $check->id;
            session(['id' => $id]);
            return view('admin/login/resetPassword');
        } else {
            return back()->with('error_all', 'Tên người hoặc email nhập sai không hợp lệ')
                ->with('name', $name)
                ->with('email', $email);
        }
    }

    function submitResetPass(Request $request)
    {
        $id = $request->id;
        $password = $request->password;

        $table_admin = admin::find($id);
        $table_admin->password = Hash::make($password);
        $table_admin->save();
        return redirect('admin/login')->with('name', $table_admin->user_name)
            ->with('email', $table_admin->email)
            ->with('password', $password);
    }

    function logout()
    {
        $getID = admin_remember::all();
        if (!empty($getID)) {
            foreach ($getID as $id) {
                $id->delete();
            }
        }
        return redirect('admin/login/');
    }

    function dashboard(){
        return redirect('admin/layouts/layout');
    }
}
