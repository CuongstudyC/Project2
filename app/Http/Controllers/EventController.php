<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Products;
use Illuminate\Http\Request;

class EventController extends Controller
{
    function index()
    {

        $events = Events::all();
        $cout = 1;
        return view('admin/event/index', compact('events', 'cout'));
    }

    function create()
    {
        return view('admin/event/create');
    }

    function submitCreate(Request $request)
    {
        $name = $request->name;
        $code = $request->code;
        $discount = $request->discount;
        $start = $request->start;
        $end = $request->end;
        $radio = $request->check;

        if ($end < $start) {
            return redirect('admin/event/create')->with('errors', 'Thời gian kết thúc không được sớm hơn thời gian bắt đầu')
                ->with('name', $name)
                ->with('code', $code)
                ->with('discount', $discount)
                ->with('start', $start)
                ->with('end', $end);
        }
        $event = Events::where('time_start', '<', $end)
            ->where('time_end', '>=', $end)->first();
        if ($event) {
           return $this->returnEventError($event, $name, $code, $discount, $start, $end);
        }
        $event = Events::where('time_start', '>=', $start)
            ->where('time_end', '<=', $end)->first();
        if ($event) {
           return $this->returnEventError($event, $name, $code, $discount, $start, $end);
        }
        $event = Events::where('time_start', '<=', $start)
            ->where('time_end', '>=', $start)->first();
        if ($event) {
            return $this->returnEventError($event, $name, $code, $discount, $start, $end);
        }


        $table_event = new Events();

        $table_event->name = $name;
        $table_event->code = $code;
        $table_event->discount = $discount;
        $table_event->time_end = $end;
        $table_event->time_start = $start;
        $table_event->save();

        if ($radio == "yes") {
            $table_products = Products::all();
            if (!empty($table_products)) {
                $currentDate = date('Y-m-d');
                foreach ($table_products as $product) {
                    $product->event_id = $table_event->id;
                    if ($table_event->time_start <= $currentDate && $table_event->time_end >= $currentDate) {
                        $product->subPrice = $product->price * (float)(1 - ((float)(((float)$table_event->discount) / 100)));
                    }
                    $product->save();
                }
            }
        }

        return redirect('admin/event/index')->with('status', "Đã thêm thành công");
    }

    //---------------------------
    function returnEventError($event, $name, $code, $discount, $start, $end)
    {
        return redirect('admin/event/create')->with('errors', 'Bị trùng lặp thời gian với sự kiện ' . $event->name)
            ->with('name', $name)
            ->with('code', $code)
            ->with('discount', $discount)
            ->with('start', $start)
            ->with('end', $end);
    }
    //-------------------------------

    function updateEvent($id)
    {
        $event = Events::find($id);

        return view('admin/event/update', compact('event'));
    }

    function submitUpdate(Request $request)
    {
        $id = $request->id;
        $name = $request->name;
        $code = $request->code;
        $discount = $request->discount;
        $start = $request->start;
        $end = $request->end;
        $radio = $request->check;
        if ($end < $start) {
            return redirect('admin/event/update')->with('errors', 'Thời gian kết thúc không được sớm hơn thời gian bắt đầu')
                ->with('name', $name)
                ->with('code', $code)
                ->with('discount', $discount)
                ->with('start', $start)
                ->with('end', $end);
        }

        $table_event = Events::where('id', '!=', $id)->get();
        if (!empty($table_event)) {
            foreach ($table_event as $event) {
                if ($event->time_start < $end && $end <= $event->time_end) {
                    return redirect('admin/event/create')->with('errors', 'Bị trùng lặp thời gian với sự kiện ' . $event->name)
                        ->with('name', $name)
                        ->with('code', $code)
                        ->with('discount', $discount)
                        ->with('start', $start)
                        ->with('end', $end);
                }
            }
        }

        $table_event = Events::find($id);

        $table_event->name = $name;
        $table_event->code = $code;
        $table_event->discount = $discount;
        $table_event->time_end = $end;
        $table_event->time_start = $start;
        $table_event->save();

        if ($radio == "yes") {
            $table_products = Products::all();
            if (!empty($table_products)) {
                $currentDate = date('Y-m-d');
                foreach ($table_products as $product) {
                    $product->event_id = $table_event->id;
                    if ($table_event->time_start <= $currentDate && $currentDate <= $table_event->time_end) {
                        $product->subPrice = $product->price * (float)(1 - ((float)(((float)$table_event->discount) / 100)));
                    }
                    $product->save();
                }
            }
        }

        return redirect('admin/event/index')->with('status', "Đã cập nhật thành công");
    }

    function deleteEvent($id)
    {
        $table_event = Events::find($id);

        $table_event->delete();

        $table_products = Products::where('event_id', null)->get();

        foreach ($table_products as $product) {
            $product->subPrice = $product->price;
            $product->save();
        }

        return redirect('admin/event/index')->with('status', "Đã xóa thành công");
    }

    function searchEvent(Request $request)
    {
        if (!empty($request->search)) {
            $nameSearch = $request->search;
            $events = Events::where('name', 'LIKE', '%' . $nameSearch . '%')->get();
            if (count($events) > 0) {
                $cout = 1;
                session(['status' => 'Đã tìm kiếm thành công']);
                return view('admin/event/index', compact('events', 'cout'));
            }

            return redirect('admin/event/index')->with('error', 'Không thể tìm thấy tên bạn vừa tìm kiếm');
        } else {
            return redirect('admin/event/index');
        }
    }
}
