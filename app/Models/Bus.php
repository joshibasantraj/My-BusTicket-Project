<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $fillable=['bid','number','from','to','dtime','atime','type','yatayat','fare','image','departure_date'];


    public function getValidationRules(){
        return [
            'bid'=>'required|numeric',
            'number'=>'required|string',
            'from'=>'required|in:Mahendranagar,Dhangadi,Dadeldhura,Baitadi,Darchula,Dipayal,Achaam,Bajura,Nepaljung,Surkhet,Butwal,Pokhara,Kathmandu,Dharan',
            'to'=>'required|in:Mahendranagar,Dhangadi,Dadeldhura,Baitadi,Darchula,Dipayal,Achaam,Bajura,Nepaljung,Surkhet,Butwal,Pokhara,Kathmandu,Dharan',
            'dtime'=>'required|string',
            'departure_date'=>'required|string',
            'atime'=>'required|string',
            'type'=>'required|in:AC,Delux',
            'yatayat'=>'required|in:Mahakali,Pawandut',
            'fare'=>'required|numeric',
            'image'=>'sometimes|image|max:7000'
      ];
    }
    public function getSearchRules()
    {
        return [
            'from'=>'required|in:Mahendranagar,Dhangadi,Dadeldhura,Baitadi,Darchula,Dipayal,Achaam,Bajura,Nepaljung,Surkhet,Butwal,Pokhara,Kathmandu,Dharan',
            'to'=>'required|in:Mahendranagar,Dhangadi,Dadeldhura,Baitadi,Darchula,Dipayal,Achaam,Bajura,Nepaljung,Surkhet,Butwal,Pokhara,Kathmandu,Dharan',
            'date'=>'required|string'
        ];
    }

    public function validateBusNumber()
    {
        return [
            'number'=>'required|string'
        ];
    }
    
    public function ticketDetails()
    {
        return $this->hasMany('App\Models\Ticket','bus_number','number');
    }

    public function getBusDetails($num)
    {
        return $this->where('number',$num)->with('ticketDetails')->first();
    }
}
