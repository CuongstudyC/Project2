<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\admin_remember;
use App\Models\report;
use Brick\Math\BigInteger;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    function index(){
        $reports = report::all();
        $cout = 1;
        return view('admin/report/index',compact('reports','cout'));
    }

    function create(){
        return view('admin/report/create');
    }

    function submitCreate(Request $request){
        $type = $request->type;
        $content = $request->content;

        if(session('id')){
            $id = session('id');
        } else {
          $adminRemember = admin_remember::all();

          foreach($adminRemember as $re){
            $id = $re->admin_id;
            break;
          }
        }
        $report = new report();

        $report->type = $type;
        $report->content = $content;
        $report->admin_id = $id;
        $report->save();

        return back()->with('status',"Đã tạo báo cáo thành công");
    }

    function delete_report($id) {
        report::find($id)->delete();

        return back()->with('status',"Đã xóa thành công");
    }

    function searchReport(Request $request) {
        if (!empty($request->search)) {
            $nameSearch = $request->search;
            $reports = report::where('type', 'LIKE', '%' . $nameSearch . '%')->get();

            if (count($reports) > 0) {
                $cout = 1;
                session(['status' => 'Đã tìm kiếm thành công']);
                return view('admin/report/index', compact('reports', 'cout'));
            }

            $admins = admin::where('user_name', 'LIKE', '%' . $nameSearch . '%')->get();

            if (count($admins) > 0) {
                foreach($admins as $admin){
                    $reports = report::where('admin_id',$admin->id)->get();
                    if(count($reports) > 0){
                        $cout = 1;
                        session(['status' => 'Đã tìm kiếm thành công']);
                        return view('admin/report/index', compact('reports', 'cout'));
                    }

                }
            }

            $dateConvent = strtotime(str_replace('/','-',$nameSearch));
            if($dateConvent){
                $nameSearch = date('Y-m-d',$dateConvent);
                $reports = report::all();
                foreach($reports as $report){
                    $date = Carbon::parse($report->created_at);
                    $dateConvent = $date->format('Y-m-d');
                    if($dateConvent == $nameSearch){
                        $reports = report::where('created_at',$report->created_at)->get();
                        if( count($reports) > 0){
                            $cout = 1;
                            session(['status' => 'Đã tìm kiếm thành công']);
                            return view('admin/report/index', compact('reports', 'cout'));
                        }
                    }
                }
            }

            return redirect('admin/report/index')->with('error', 'Không thể tìm thấy tên bạn vừa tìm kiếm');
        } else {
            return redirect('admin/report/index');
        }
    }
}
