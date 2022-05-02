<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;


    public function buyer(){
        return $this->belongsTo('App\Models\Buyer', 'buyer_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function Items(){
        return $this->hasMany('App\Models\Items','invoice_id');
    }
}
