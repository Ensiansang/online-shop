<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliverTownship extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function ward(){
        return $this->belongsTo(DeliverWard::class,'ward_id','id');
    }
}
