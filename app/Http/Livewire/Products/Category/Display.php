<?php

namespace App\Http\Livewire\Products\Category;

use App\Models\ProductCategories;
use Livewire\Component;

class Display extends Component
{
   
    public function delProduct($id)
    {
        
        $product = ProductCategories::find($id)->delete();
       
      
    }

      
    public function render()
    {
     
        $productCategories = ProductCategories::paginate(10);
        return view("livewire.products.categories.list", [
            "productCategories" => $productCategories,
        ]);
    }
}
