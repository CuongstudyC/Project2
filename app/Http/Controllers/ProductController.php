<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Events;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index(){
        $products = Products::all();
        $cout =1;
        return view('admin/products/index',compact('products','cout'));
    }

    function create(){
        $categories = Categories::all();
        $events = Events::all();
        return view('admin/products/create',compact('categories','events'));
    }

    function submitCreate(Request $request){
        $name = $request->name;
        $price = $request->price;
        $category_id = $request->category_id;
        $product = Products::where(strtolower('name'),strtolower($name))->where('category_id',$category_id)->first();
        if(!empty($product)){
            return redirect('admin/products/create')->with('errors',"Tên sản phẩm ".$name ." của " .$product->relatedCategory->relatedGoods->goods_from ." đã tồn tại");
        }
        $table_product = new Products();
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = date('Y-m-d') .$file->getClientOriginalName();
            $file->move('images',$filename);
            $table_product->image = $filename;
        }
        if(!empty($request->decription)){
            $decription = $request->decription;
            $table_product->decription = $decription;
        }
        if(!empty($request->event_id)){
            $event_id = $request->event_id;
            $table_event = Events::find($event_id);
            $currentDate = date('Y-m-d');
            $table_product->event_id = $event_id;
            if($table_event->time_start <= $currentDate && $currentDate <= $table_event->time_end){
                $table_product->subPrice = $price * (float)(1- ((float)(((float)$table_event->discount)/100)));
            } else{
                $table_product->subPrice = $price;
            }
        } else{
            $table_product->subPrice = $price;
        }

        $table_product->name = $name;
        $table_product->price = $price;
        $table_product->category_id = $category_id;
        $table_product->save();

        return redirect('admin/products/index')->with('status',"Đã thêm thành công");
    }

    function updateProduct($id){
        $product = Products::find($id);
        $categories = Categories::where('id','!=',$product->category_id)->get();
        $events = Events::where('id','!=',$product->event_id)->get();

        return view('admin/products/update',compact('product','categories','events'));
    }

    function submitUpdate(Request $request){
        $id = $request->id;
        $name = $request->name;
        $price = $request->price;
        $category_id = $request->category_id;
        $product = Products::where(strtolower('name'),strtolower($name))->where('category_id',$category_id)->where('id','!=',$id)->first();
        if(!empty($product)){
            return redirect('admin/products/edit/'.$id)->with('errors',"Tên sản phẩm ".$name ." của " .$product->relatedCategory->relatedGoods->goods_from ." đã tồn tại");
        }
        $table_product = Products::find($id);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = date('Y-m-d') .$file->getClientOriginalName();
            $file->move('images',$filename);
            $table_product->image = $filename;
        }
        if(!empty($request->decription)){
            $decription = $request->decription;
            $table_product->decription = $decription;
        }
        if(!empty($request->event_id)){
            $event_id = $request->event_id;
            $table_event = Events::find($event_id);
            $currentDate = date('Y-m-d');
            $table_product->event_id = $event_id;
            if($table_event->time_start <= $currentDate && $currentDate <= $table_event->time_end){
                $table_product->subPrice = $price * (float)(1- ((float)(((float)$table_event->discount)/100)));
            } else{
                $table_product->subPrice = $price;
            }
        }
        $table_product->name = $name;
        $table_product->price = $price;
        $table_product->category_id = $category_id;
        $table_product->save();

        return redirect('admin/products/index')->with('status',"Đã cập nhật thành công");
    }

    function deleteProduct($id){
        $table_product = Products::find($id);

        $table_product->delete();

        return redirect('admin/products/index')->with('status',"Đã xóa thành công");
    }

    function searchProduct(Request $request){
        if (!empty($request->search)) {
            $nameSearch = $request->search;
                $products= Products::where('name','LIKE','%'.$nameSearch .'%')->get();
                if(count($products) >0){
                    $cout = 1;
                    session(['status' => 'Đã tìm kiếm thành công']);
                    return view('admin/products/index', compact('products', 'cout'));
                }
                return redirect('admin/products/index')->with('error', 'Không thể tìm thấy tên bạn vừa tìm kiếm');

        } else {
            return redirect('admin/products/index');
        }
    }
}
