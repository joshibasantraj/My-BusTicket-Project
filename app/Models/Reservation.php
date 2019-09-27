<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable=['seats_selected','bus_number','quantity','payed_amount','payment_method'];


    public function getValidationRules(){
        return [
            'seats_selected'=>'required|string',
            'bus_number'=>'required|string',
            'quantity'=>'required|numeric',
            'payed_amount'=>'required|numeric',
            'payed_method'=>'required|string'
        ];
    }

    public function bus_info()
    {
       return $this->hasOne('App\Models\Bus','number','bus_number');
    }
}
