<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable=['name','email','number','subject'];
    
    public function getValidationRules()
    {
         return [
             'name'=>'required|string',
             'email'=>'required|email',
             'number'=>'required|numeric',
             'subject'=>'required|string'
         ];
    }
}