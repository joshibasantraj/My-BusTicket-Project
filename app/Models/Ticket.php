<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable=['seat_no','bus_number','payment_method','payed_amount'];
}
