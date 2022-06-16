<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use App\Models\Product;
use App\Models\ProductCategories;
use App\Models\ProductsVariants;
use App\Models\Images;
use Illuminate\Contracts\Cache\Store;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

use function PHPUnit\Framework\isNull;

class Add extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $message,
        $product_id,
        $name,
        $short_description,
        $description,
        $product_categories_id,
        $tags,
        $image,
        $price,
        $delProduct;


    public $product_variants = [["title" => ""]];
    public $images = [];

    public function mount($product_id = null)
    {
        if (intval($product_id) > 0) {
            $this->product_id = $product_id;
            $product = Product::find($product_id)->first();
            $this->name = $product->name;
            $this->short_description = $product->short_description;
            $this->description = $product->description;
            $this->product_categories_id = $product->product_categories_id;
            $this->tags = $product->tags;
            $this->image = $product->image()->first()->src ?? null;
            $this->price = $product->price;
            $this->product_variants = $product->variant()->get()->toArray();
        }
    }
    public function removeProductImage()
    {
        $this->image = null;
    }
    public function addVariant()
    {
        $this->product_variants[] = [];
    }



    public function deleteVariant($index)
    {
        if (count($this->product_variants) == 1) {
            $this->message = "Cannot delete variant";
            return false;
        } else {
            unset($this->product_variants[$index]);
        }
    }



    public function save()
    {
        $this->validate([
            "name" => "required",
            "short_description" => "required",
            "description" => "required",
            "product_categories_id" => "required",
            "tags" => "required",
            "image" => "required",
            "product_categories_id" => "required",
        ]);

        if ($this->product_id) {
            $product = Product::find($this->product_id)->first();
        } else {
            $product = new product();
        }
        $product->name = $this->name;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->product_categories_id = $this->product_categories_id;
        $product->tags = $this->tags;
       
        $product->save();
        
        // if (!$this->image) {
            $product->image()->save(new Images(['src' => $this->image->store("uploads", "public")]));
        // }
   
            
        if (count($this->product_variants) > 0) {
            foreach ($this->product_variants as $index => $var) {
                if (isset($var['id'])) {
                    $variant = ProductsVariants::where("id", $var['id'])->first()->update([
                        'title' => $var['title'], 'price' => $var['price']
                    ]);
                } else {
                    $variant = $product->variant()->save(new ProductsVariants(['title' => $var['title'], 'price' => $var['price'], 'slug' => strtolower($var["title"])]));
                }

                if (!is_null($var['image'])) {
                    $variant->image()->save(new Images(['src' => $var['image']->store("uploads", "public")]));
                }
                session()->flash("message", "Save Successfully");
            }
        }
    }

    public function render()
    {
        return view("livewire.products.add", [
            'categories' => ProductCategories::all(),
            'variants' => ProductsVariants::all()
        ]);
    }
}
