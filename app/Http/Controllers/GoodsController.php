<?php

namespace App\Http\Controllers;

use App\Models\Goods;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    function index(){
        $goods = Goods::all();
        $cout = 1;
        return view('admin/goods/index',compact('goods','cout'));
    }

    function create(){

        return view('admin/goods/create');
    }

    function submitCreate(Request $request){
        $name = $request->name;

        $Goods = Goods::where(strtolower('goods_from'),$name)->first();
        if(!empty($Goods)){
            return redirect('admin/goods/create')->with('errors',"Tên nguồn nhập hàng " .$name ." Đã tồn tại");
        }

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = date('Y-m-d') .$file->getClientOriginalName();
            $file->move('images',$filename);
        }

        $table_goods = new Goods();

        $table_goods->goods_from = $name;
        $table_goods->image = $filename;
        $table_goods->save();
        return redirect('admin/goods/index')->with('status','Tạo mới tên hàng nhập về thành công');
    }

    function updateGoods($id){
        $good = Goods::find($id);

        return view('admin/goods/update',compact('good'));
    }

    function submitUpdate(Request $request){
        $name = $request->name;
        $id = $request->id;
        $Goods = Goods::where(strtolower('goods_from'),strtolower($name))->where('id','!=',$id)->first();
        if(!empty($Goods)){
            return redirect('admin/goods/edit/'.$id)->with('errors',"Tên nguồn nhập hàng " .$name ." Đã tồn tại");
        }
        $table_goods = Goods::find($id);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = date('Y-m-d') .$file->getClientOriginalName();
            $file->move('images',$filename);
            $table_goods->image = $filename;
        }

        $table_goods->goods_from = $name;
        $table_goods->save();

        return redirect('admin/goods/index')->with('status','Đã cập nhật hàng nhập thành công');
    }

    function deleteGoods($id){
        $table_goods = Goods::find($id);

        $table_goods->delete();

        return redirect('admin/goods/index')->with('status','Đã xóa thành công');
    }

    function searchGoods(Request $request){
        if(!empty($request->search)){
            // $nameSearch = strtolower($request->search);
            // $table_goods = Goods::all();
            // $charSearch = str_split($nameSearch);
            // $cout = 0;
            // $getName = [];
            // foreach($table_goods as $good){
            //     $chars = strtolower($good->goods_from);
            //     $listCharts = str_split($chars);
            //     foreach($charSearch as $chSearch){
            //         foreach($listCharts as $char=>$charValue){
            //             if($chSearch == $charValue){
            //                 unset($listCharts[$char]);
            //                 $cout++;
            //                 break;
            //             }
            //         }
            //     }
            //     if($cout == count($charSearch)){
            //         $getName [] = $good->goods_from;
            //     }
            //     $cout = 0;
            // }
            // if(!empty($getName)){
            //     $goods = Goods::whereIn('goods_from',$getName)->get();
            //     $cout = 1;
            //     session(['status'=>'Đã tìm kiếm thành công']);
            //     return view('admin/goods/index',compact('goods','cout'));
            // } else{
            //     return redirect('admin/goods/index')->with('error','Không thể tìm thấy tên bạn vừa tìm kiếm');
            // }
            $nameSearch = $request->search;
            $goods= Goods::where('goods_from','LIKE','%'.$nameSearch .'%')->get();
            if(count($goods) >0){
                $cout = 1;
                session(['status' => 'Đã tìm kiếm thành công']);
                return view('admin/goods/index', compact('goods', 'cout'));
            }
            return redirect('admin/goods/index')->with('error', 'Không thể tìm thấy tên bạn vừa tìm kiếm');
        } else{
            return redirect('admin/goods/index');
        }
    }
}
