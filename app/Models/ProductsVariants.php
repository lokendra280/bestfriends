<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ProductsVariants extends Model
{
    use HasFactory;
    protected $table = "products_variants";
    protected $fillable = ['title','slug','price','name'];

    
    public function image()
    {
        return $this->hasMany(Images::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
