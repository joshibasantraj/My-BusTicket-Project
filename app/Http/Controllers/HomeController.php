<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(request()->user()->role == 'admin')
        {
            return redirect()->route('admin');
        }else{   
            return redirect()->route('passenger');
        }
       //return view('home');
    }


    public function admin(){
     return view('admin.index');
    }
    public function passenger(){
        return view('home');
    }
}
