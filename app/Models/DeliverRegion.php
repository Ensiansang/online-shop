<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliverRegion extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function ward(){
        return $this->belongsTo(DeliverWard::class,'ward_id','id');
        
    }
    public function township(){
        return $this->belongsTo(DeliverTownship::class,'township_id','id');
    }
}
