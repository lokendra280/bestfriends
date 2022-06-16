<?php

namespace App\Http\Livewire\Products\Category;

use App\Models\ProductCategories;


use Livewire\Component;

use function Livewire\invade;

class Add extends Component
{
    public $showEditmodal = false;
    public $message, $title, $description, $icon, $parent_id,$category_id;


    public function mount($category_id = null){
     
       $this->showEditmodal = true;
        if(intval($category_id)>0){
            $this->category_id = $category_id;
            $category_id = ProductCategories::find($category_id);
            $this->title = $category_id->title;
            $this->description = $category_id->description;
            $this->icon = $category_id->icon;
            $this->parent_id = $category_id->parent_id;
        }
    }
    public function save()
    {
            $this->validate([
            "title" => "required",
            "description" => "required",
            "icon" => "required",
        ]);
        if($this->category_id){
            $category = ProductCategories::find($this->category_id);
        }else{
            $category = new ProductCategories();
        }
        $category->title = $this->title;
      
        $category->description = $this->description;
        $category->icon = $this->icon;
        $category->parent_id = $this->parent_id;
        $category->save();
        session()->flash('message', 'Save successfully.');
    }
    public function render()
    { 

        $categories = ProductCategories::all();
        return view("livewire.products.categories.add", [
            "categories" => $categories,
        ]);
        
    }
}
