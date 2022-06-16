<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Display extends Component
{
    public function delProduct($id)
    {
        $product = Product::find($id)->delete();
    }
    use WithPagination;

    public function render()
    {
        $products = Product::paginate(5);
        session()->flash("message", "Save Successfully");
        return view("livewire.products.list", ["products" => $products]);
        
    }
}
