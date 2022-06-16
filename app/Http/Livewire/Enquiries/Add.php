<?php

namespace App\Http\Livewire\Enquiries;

use App\Models\Enquiries;
use App\Models\LineItems;
use App\Models\Orders;
use Livewire\Component;
use App\Models\Product;
use App\Models\ProductsVariants;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class Add extends Component
{
    use WithPagination;
    public $selected_product, $line_items, $variant_Title, $grandTotals, $birthdayMessage, $for_id, $selected_variant, $selected_quantity, $sections, $user_id, $caller_id, $call_lead, $enquiry, $user,
        $cart = [], $delivery, $total_price = [], $caller_name, $instruction, $count = 0, $i = 0, $payment_status, $transaction_status, $deliver_status, $delivery_instruction, $lead_id;
    // public $queryString=['delivery'];
    

    public $totalPrice;
    public $delete_Order = [["title" => ""]];

    public function mount($user_id)
    {
        $this->user_id = $user_id;
        $this->for_id = $user_id;
        $this->caller_name = Auth::user()->name;
    }
    public function show()
    {
        // dd($this->delivery);
        // dd($this->grandTotal);

    }
    public function selectLead($lead_id)
    {
        $this->call_lead = User::find($lead_id);
    }

    public function saveCall()
    {
        $this->enquiry['caller_id'] = Auth::user()->id;
        $this->enquiry['lead_id'] = $this->call_lead->id;
        $this->enquiry['for_id'] = $this->user_id;
        session()->flash('message', 'successfully Saved Called Information.');
        Enquiries::create($this->enquiry);
    }
    public function saveOrder()
    {
        $order = new Orders();
        $order->user_id = $this->call_lead->id;
        $order->payment_status = 'pending';
        $order->order_status = 'confirmed';
        $order->deliver_status = 'pending';
        $order->delivery_instruction = $this->instruction;
        $order->order_total = $this->grandTotals;
        $order->delivery_charge = $this->dcharge;
        // dd($this->cart);
        // dd($order);
        $order->save();

        $order->line_items()->createMany($this->cart);
        //     $this->
        session()->flash('message', 'successfully Saved Orders.');
    }
    // public function deleteOrder($index)
    // {
    //     if (count($this->delete_Order) == 1) {
    //         $this->message = "Cannot delete variant";
    //         return false;
    //     } else {
    //         unset($this->delete_Order[$index]);
    //     }
    // }
    public function addToCart()
    {
        $this->count++;
        $variant = Product::find($this->selected_product)->variant()->where('id', $this->selected_variant)->first();
        $this->cart[] = [
            'product_id' => $this->selected_product,
            'variant_id' => $this->selected_variant,
            'title' => Product::find($this->selected_product)->name,
            'variant_title' => $variant->title,
            'line_price' => $variant->price,
            'qty' => $this->selected_quantity,
            'total_price' => ($this->selected_quantity * $variant->price),
        ];
        foreach ($this->cart as $item) {
            $this->totalPrice = $item['total_price'];
        }
        for ($this->i; $this->i < $this->count; $this->i++)
        $this->grandTotals += $this->totalPrice;
    }
    public $dcharge = 0;
    public function addDelivery()
    {
        $this->grandTotals -= $this->dcharge;
        $this->dcharge = number_format(intval($this->delivery));
        $this->grandTotals += $this->dcharge;
    }
    public function render()
    {
        // dd($this->user_id);
        $enquires = Enquiries::select('*')->where('for_id', $this->for_id)->get();
        // $order_history = Orders::select('*')->where('user_id', 3)->get();
        // dd($order_history);
        //    $tommorw = date('Y-m-d',strtotime('+1 days'));
        //    $birthday = User::select('name')->where('date_of_birth',$tommorw)->get();
        //   dd($birthday);
        //     $birthday= User::find($this->user_id, ['date_of_birth']);
        //     if ($tommorw >= $birthday)
        //         {
        //                 dd('same');
        //         }
        //         else
        //              { 
        //                     dd('Different');
        //             }
        return view('livewire.enquiries.add', [
            'caller_name' => $this->caller_name,
            'current_user' => User::find($this->user_id),
            'products' => Product::all(),
            'enquires' => $enquires,            
            'grandTotals' => $this->grandTotals,
            'birthdayMessage' => $this->birthdayMessage,
            'variants' =>  ProductsVariants::where('product_id', $this->selected_product)->get(),
        ]);
    }
}
