<?php

namespace App\Console;

use App\Models\admin;
use App\Models\admin_remember;
use App\Models\Events;
use App\Models\Products;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function(){
            $currentDate = date('Y-m-d');
            $events =Events::where('time_start', '<=',$currentDate)
                            ->where('time_end', '>=',$currentDate)->get();
            if(count($events) >0){
                foreach($events as $event){
                    $products = Products::where('event_id',$event->id)->get();
                    if(count($products) > 0){
                        foreach($products as $product){
                            $product->subPrice = $product->price * (float)(1- ((float)(((float)$event->discount)/100)));
                            $product->save();
                        }
                    }
                }
            } else{
                Events::where('time_end','<',$currentDate)->delete();
                $products = Products::where('event_id',null)->get();
                if(count($products) > 0){
                    foreach ($products as $product){
                        $product->subPrice = $product->price;
                        $product->save();
                    }
                }
            }
        })->everySecond();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
