<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected $contact=null;

    public function __construct(Contact $contact)
    {
        $this->contact=$contact;
    }
    public function create()
    {
        return view('frontend.contact-us');
    }

    public function store(Request $request)
    {
        $rules=$this->contact->getValidationRules();
        $request->validate($rules);
       // dd($request);
       $data=$request->all();
       $this->contact->fill($data);
       $success=$this->contact->save();
       if($success)
       {
           echo "<script> alert('Record Saved Successfully') </script>";
       }else{
           echo "<script> alert('Problem while saving record') </script>";
       }
       return view('frontend.index');
    }
}
