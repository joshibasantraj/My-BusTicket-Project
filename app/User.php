<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','image','role','status','gender','address','phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getRules($option = "update"){
        return [
            'name'=>(($option=='update')?'sometimes':'required').'|string',
            'email'=>(($option=='update')?'sometimes':'required').'|email',
            'phone'=>(($option=='update')?'sometimes':'required').'|numeric',
            'image'=>'sometimes|image|max:5000',
            'status'=>(($option=='update')?'sometimes':'required').'|in:active,inactive',
            'gender'=>(($option=='update')?'sometimes':'required').'|in:Male,Female',
            'address'=>(($option=='update')?'sometimes':'required').'|string',
            'password'=>(($option=='update')?'nullable':'required').'|string|confirmed|min:8|max:16',
          
        ];

    }

}
