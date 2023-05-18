<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function ward(){
        return $this->belongsTo(DeliverWard::class,'ward_id','id');
        
    }
    public function township(){
        return $this->belongsTo(DeliverTownship::class,'township_id','id');
    }
    public function region(){
        return $this->belongsTo(DeliverRegion::class,'region_id','id');
        
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
        
    }
}
