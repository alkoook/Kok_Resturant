<?php

namespace App\Listeners;

use App\Events\Old_Orders;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Carbon\Carbon;


class Old_orders_Listeners
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
    public function handle(Old_Orders $event)
    {
     
    }
}
