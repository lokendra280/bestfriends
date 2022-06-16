<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Livewire\Component;

class Trashbin extends Component
{
    public function restore($id)
    {
        $product = Product::withTrashed()
            ->find($id)
            ->restore();
    }
    public function render()
    {
        $products = Product::onlyTrashed()->get();
        return view("livewire.products.trashbin", ["products" => $products]);
    }
}
