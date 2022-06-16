<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineItems extends Model
{
    use HasFactory;
    protected $table="line_items";
    protected $fillable = ['product_id','variant_id','title','variant_title','line_price','total_price','qty'];


    public function orders()
    {
        $this->hasMany(LineItems::class);
    }

    public function product()
    {
        $this->hasMany(LineItems::class);
    }
}
