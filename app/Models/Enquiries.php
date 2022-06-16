<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
class Enquiries extends Model
{
    use HasFactory;
    protected $fillable = ['lead_id','caller_id','for_id','call_breif','call_status'];


    
}
