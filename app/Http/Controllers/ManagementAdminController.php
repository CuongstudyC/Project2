<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\admin_remember;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManagementAdminController extends Controller
{
    function index()
    {
        $admins = admin::where('position', 'nhân viên')->get();

        return view('admin/manage_admin/index', compact('admins'));
    }

    // function updatePosition($id, Request $request)
    // {
    //     $admin = admin::find($id);

    //     $position = $request->position;

    //     $admin->position = $position;
    //     $admin->save();

    //     return back()->with('status', "Cập nhật vị trí cho nhân viên thành công");
    // }

    function update()
    {
        if (session('id')) {
            $id = session('id');
        } else {
            $admins = admin_remember::all();
            foreach ($admins as $admin) {
                $id = $admin->admin_id;
                break;
            }
        }
        $admin = admin::where('id', $id)->first();
        return view('admin/manage_admin/update', compact('admin'));
    }

    function submitUpdate(Request $request)
    {
        $id = $request->id;
        $admin = admin::find($id);

        $full_name = $request->full_name;

        $user_name = $request->name;

        $email = $request->email;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = date('Y-m-d') . $file->getClientOriginalName();
            $file->move('avatar_admin', $filename);
            $haveFile = 1;
        }

        if ($request->has('notUseImage')) {
            $filename = null;
            $haveFile = 1;
        }

        $admin->full_name = $full_name;
        $admin->user_name =  $user_name;
        $admin->email = $email;
        if(!empty($haveFile) && $haveFile == 1){
            $admin->image = $filename;
        }

        $admin->save();

        return back()->with('status', "Đã cập nhật tài khoản của bạn thành công");
    }

    function searchAdmin(Request $request)
    {
        if (!empty($request->search)) {
            $nameSearch = $request->search;
            $admins = admin::where('full_name', 'LIKE', '%' . $nameSearch . '%')
                ->where('position', 'nhân viên')->get();
            if (count($admins) > 0) {
                session(['status' => 'Đã tìm kiếm thành công']);
                return view('admin/manage_admin/index', compact('admins'));
            }
            $admins = admin::where('user_name', 'LIKE', '%' . $nameSearch . '%')
                ->where('position', 'nhân viên')->get();
            if (count($admins) > 0) {
                session(['status' => 'Đã tìm kiếm thành công']);
                return view('admin/manage_admin/index', compact('admins'));
            }
            $adminsStaff = admin::where('position', 'nhân viên')->get();
            if (count($adminsStaff) > 0) {
                foreach($adminsStaff as $admin){
                    if(strtolower(trim($admin->email)) == strtolower(trim($nameSearch))){
                        $admins = admin::where('email', $admin->email)
                        ->where('position', 'nhân viên')->get();
                        if(count($admins) > 0){
                            session(['status' => 'Đã tìm kiếm thành công']);
                            return view('admin/manage_admin/index', compact('admins'));
                        }
                    }
                }
            }

            $dateConvent = strtotime(str_replace('/','-',$nameSearch));
            if($dateConvent){
                $nameSearch = date('Y-m-d',$dateConvent);
                $adminsStaff = admin::where('position','nhân viên')->get();
                foreach($adminsStaff as $admin){
                    $date = Carbon::parse($admin->created_at);
                    $dateConvent = $date->format('Y-m-d');
                    if($dateConvent == $nameSearch){
                        $admins = admin::where('created_at',$admin->created_at)->where('position','nhân viên')->get();
                        if( count($admins) > 0){
                            $cout = 1;
                            session(['status' => 'Đã tìm kiếm thành công']);
                            return view('admin/manage_admin/index', compact('admins'));
                        }
                    }
                }
            }


            return redirect('admin/manage_admin/index')->with('error', 'Không thể tìm thấy tên bạn vừa tìm kiếm');
        } else {
            return redirect('admin/manage_admin/index');
        }
    }

    function registerStaff(){

        return view('admin/manage_admin/registerForStaff');
    }

    function submitCreateStaff(Request $request){
        $fullname = $request->full_name;
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $position = "nhân viên";


        $findAdmin = admin::where('email',$email)->first();
        if(!empty($findAdmin)){
            return back()->with('error','Email đã có người đăng ký, vui lòng chọn 1 email khác')
                         ->with('full_name',$fullname)
                         ->with('name',$name)
                         ->with('email',$email);
        }

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = date('Y-m-d') .$file->getClientOriginalName();
        }

        $table_admin = new admin();
        $table_admin->full_name = $fullname;
        $table_admin->position = $position;
        $table_admin->user_name= $name;
        $table_admin->email = $email;
        $table_admin->password = Hash::make($password);
        if(!empty($filename)){
            $file->move('avatar_admin',$filename);
            $table_admin->image = $filename;
        }
        $table_admin->save();

        return back()->with('status','Chúc mừng bạn đã đăng ký thành công');
    }
}
