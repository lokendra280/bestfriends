<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\ProductsVariants;

class Images extends Model
{
    use HasFactory;
    protected $table = "images";
    protected $fillable = ["src","driveid"];
   
    public function product()
    {
       return $this->belongsTo(Product::class);
    }

    public function productVariants()
    {
       return $this->belongsTo(productsVariants::class);
    }
    

}
