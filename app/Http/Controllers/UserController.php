<?php

namespace App\Http\Controllers;

use App\User;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $user=null;


    public function __construct(User $user)
    {
        $this->user=$user;
    }

    public function index()
    {
        $data=$this->user->orderBy('id','DESC')->where('id','!=',request()->user()->id)->get();
        return view('admin.user.list')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.form');
    }



    public function editProfile($id)
    {
        $this->user=$this->user->find($id);
        if(!$this->user){
            request()->session()->flash('error','User Not Found.');
            return redirect()->route('user.index')->with('user',$this->user);
        }

        return view('admin.user.profile-form')->with('user',$this->user);
    }


    public function updateProfile(Request $request,$id)
    {
        // dd($request);
        $this->user=$this->user->find($id);
        $rules=$this->user->getRules("update");
        $request->validate($rules);
        //dd($request);
        $data=$request->all();
        $data['role']="admin";
        if ($request->change_password) {
            $data['password']=Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
      
        if ($request->image) {
            $file_name="Image-".date('Ymdhis').rand(0, 999).".".$request->image->getClientOriginalExtension();
            //dd($file_name);
            $path=public_path()."/Uploads/user";
            if (!File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            Image::make($request->image)->resize(200, 100, function ($constraints) {
                $constraints->aspectRatio();
            })->save($path.'/Thumb-'.$file_name);
            $success=$request->image->move($path, $file_name);
            if ($success) {
                $data['image']=$file_name;
                if (file_exists(public_path().'/Upoads/user/'.$this->user->image)) {
                    unlink(public_path().'/Upoads/user/'.$this->user->image);
                    unlink(public_path().'/Upoads/user/Thumb-'.$this->user->image);
                }
            }
        }

        if($request->delete == 'on')
        {
            if (file_exists(public_path().'/Upoads/user/'.$this->user->image)) {
                unlink(public_path().'/Upoads/user/'.$this->user->image);
                unlink(public_path().'/Upoads/user/Thumb-'.$this->user->image);
            }
        }
           $this->user->fill($data);
           $success=$this->user->save();
           if ($success) {
               $request->session()->flash('success', 'Profile Updated Successfully.');
           } else {
               $request->session()->flash('error', 'Problem while Updating Profile');
           }
           return redirect()->route('admin.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request);
       $rules=$this->user->getRules();
       $request->validate($rules);
       //dd($request);
       $data=$request->all();
       $data['role']="admin";
       $data['password']=Hash::make($data['password']);
       if($request->image){
           $file_name="Image-".date('Ymdhis').rand(0,999).".".$request->image->getClientOriginalExtension();
           //dd($file_name);
           $path=public_path()."/Uploads/user";
           if(!File::exists($path)){
                 File::makeDirectory($path,0777,true,true);
           }
           Image::make($request->image)->resize(200,100,function($constraints){
                $constraints->aspectRatio();
           })->save($path.'/Thumb-'.$file_name);
           $success=$request->image->move($path,$file_name);
           if($success){
               $data['image']=$file_name;
           }
           $this->user->fill($data);
           $success=$this->user->save();
           if($success){
               $request->session()->flash('success','User Saved Successfully.');
           }else{
               $request->session()->flash('error','Problem while saving user');
           }
           return redirect()->route('admin.index');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->user=$this->user->find($id);
        // if(!$this->user){
        //     request()->session()->flash('error','User Not Found.');
        //     return redirect()->route('user.index')->with('user',$this->user);
        // }

        return view('admin.user.form')->with('user',$this->user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $this->user=$this->user->find($id);
        $rules=$this->user->getRules("update");
        $request->validate($rules);
        //dd($request);
        $data=$request->all();
        $data['role']="admin";
        if ($request->change_password) {
            $data['password']=Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
      
        if ($request->image) {
            $file_name="Image-".date('Ymdhis').rand(0, 999).".".$request->image->getClientOriginalExtension();
            //dd($file_name);
            $path=public_path()."/Uploads/user";
            if (!File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            Image::make($request->image)->resize(200, 100, function ($constraints) {
                $constraints->aspectRatio();
            })->save($path.'/Thumb-'.$file_name);
            $success=$request->image->move($path, $file_name);
            if ($success) {
                $data['image']=$file_name;
                if (file_exists(public_path().'/Upoads/user/'.$this->user->image)) {
                    unlink(public_path().'/Upoads/user/'.$this->user->image);
                    unlink(public_path().'/Upoads/user/Thumb-'.$this->user->image);
                }
            }
        }

        if($request->delete == 'on')
        {
            if (file_exists(public_path().'/Upoads/user/'.$this->user->image)) {
                unlink(public_path().'/Upoads/user/'.$this->user->image);
                unlink(public_path().'/Upoads/user/Thumb-'.$this->user->image);
            }
        }
           $this->user->fill($data);
           $success=$this->user->save();
           if ($success) {
               $request->session()->flash('success', 'User Updated Successfully.');
           } else {
               $request->session()->flash('error', 'Problem while Updating user');
           }
           return redirect()->route('admin.index');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->user=$this->user->find($id);
        $success=$this->user->delete();
        if($success){
            if(file_exists(public_path().'/uploads/user/'.$this->user->image))
            {
                unlink(public_path().'/uploads/user/'.$this->user->image);
                unlink(public_path().'/uploads/user/Thumb-'.$this->user->image);
            }
            request()->session()->flash('success','User Deleted Sucssessfully');
        }else{
            request()->session()->flash('error','Problem while deleting user');
        }
         return redirect()->route('admin.index');
    }
}
