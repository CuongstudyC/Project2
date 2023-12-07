<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Goods;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    function index(){
        $cates = Categories::all();
        $cout = 1;
        return view('admin/categories/index',compact('cates','cout'));
    }

    function create(){
        $goods = Goods::all();
        return view('admin/categories/create',compact('goods'));
    }

    function submitCreate(Request $request){
        $name = $request->name;
        $goods_id = $request->goods_id;
        $Category = Categories::where(strtolower('name'),strtolower($name))->where('goods_id',$goods_id)->first();
        if(!empty($Category)){
            return redirect('admin/categories/create')->with('errors',"Tên thể loại " .$name . " của " .$Category->relatedGoods->goods_from ." đã tồn tại");
        }

        $table_category = new Categories();

        $table_category->name = $name;
        $table_category->goods_id = $goods_id;
        $table_category->save();

        return redirect('admin/categories/index')->with('status','Đã thêm mới thành công');
    }

    function updateCategories($id){
        $cate= Categories::find($id);

        $goods = Goods::where('id','!=',$cate->goods_id)->get();

        return view('admin/categories/update',compact('cate','goods'));
    }

    function submitUpdateCategory(Request $request){
        $name = $request->name;
        $goods_id = $request->goods_id;
        $id = $request->id;

        $Category = Categories::where(strtolower('name'),strtolower($name))->where('goods_id',$goods_id)->where('id','!=',$id)->first();
        if(!empty($Category)){
            return redirect('admin/categories/create')->with('errors',"Tên thể loại " .$name . " của " .$Category->relatedGoods->goods_from ." đã tồn tại");
        }
        $table_category = Categories::find($id);

        $table_category->name = $name;
        $table_category->goods_id = $goods_id;
        $table_category->save();

        return redirect('admin/categories/index')->with('status','Đã cập nhật thành công');
    }

    function deleteCategories($id){
        $table_category = Categories::find($id);

        $table_category->delete();
        return redirect('admin/categories/index')->with('status','Đã xóa thành công');
    }

    function searchCategories(Request $request){
        if(!empty($request->search)){
            if (!empty($request->search)) {
                $nameSearch = $request->search;
                    $cates = Categories::where('name','LIKE','%'.$nameSearch .'%')->get();
                    if(count($cates) >0){
                        $cout = 1;
                        session(['status' => 'Đã tìm kiếm thành công']);
                        return view('admin/categories/index', compact('cates', 'cout'));
                    }
                    return redirect('admin/categories/index')->with('error', 'Không thể tìm thấy tên bạn vừa tìm kiếm');

            } else {
                return redirect('admin/categories/index');
            }
        } else{
            return redirect('admin/categories/index');
        }
    }
}
