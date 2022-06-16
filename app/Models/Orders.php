<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $fillable = ['payment_status','order_status','deliver_status','delivery_instruction','order_total','delivery_charge'];
    public function user()
    {
      return $this->belongsTo(User::class);
    }
    public function line_items()
    {
        return $this->hasMany(LineItems::class);
    }
}
