<?php

namespace App\Http\Livewire\Order;
use App\Models\Orders;
use App\Models\User;
use Livewire\Component;

class Display extends Component
{
  
   
    public function render()
    { 
      $orders= Orders::all();
    //   dd($orders);
    
        return view('livewire.order.display',[
            'orders' => $orders,
            // 'orders_detail'=>$orders_detail,  
        ]); 
    }
}
