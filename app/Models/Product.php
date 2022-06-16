<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "products";
    protected $fillable = ['name','short_description','description','tags'];

    public function productAtrribute()
    {
        $this->belongsTo(ProductAttribute::class);
    }

    public function variant()
    {
        return $this->hasMany(ProductsVariants::class);
    }

    public function image()
    {
        return $this->hasMany(Images::class);
    }

    public function lineItems()
    {
        return $this->hasMany(LineItems::class);
    }
    public function productCategories()
    {
        return $this->belongsTo(ProductCategories::class);
    }


}
