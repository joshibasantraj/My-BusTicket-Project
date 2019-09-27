<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;
use File;
use Image;

class BusController extends Controller
{

    protected $bus=null;

    public function __construct(Bus $bus)
    {
        $this->bus=$bus;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Bus=new Bus;
        $data=$Bus->orderBy('id','DESC')->get();
        //dd($data);
        return view('admin.list')->with('data',$data);
    }

    public function displayBus(Request $request)
    {
           // dd($request->request);
           $rules=$this->bus->getSearchRules();
           $request->validate($rules);
           $data=$request->all();
           // print_r($data['from']);
          // $buses=$this->bus->get();
          // print_r($buses);
          $buses=$this->bus->where('from',$data['from'])->where('to',$data['to'])->where('departure_date',$data['date'])->get();
         // print_r($buses);
           $num=$buses->count();
            if ($num>0) {

           $data= '<table class="table jambo_table">
                 <thead style="z-index:46;background:cyan;">
                   <th>Sno</th>
                   <th>Bus Number</th>
                   <th>From</th>
                   <th>To</th>
                   <th>Departure Date</th>
                   <th>Departure Time</th>
                   <th>Arrival Time</th>
                   <th>Type</th>
                   <th>Yatayat Category</th>
                   <th>Fare</th>
                 </thead>
                 <tbody style="background:silver;">';
                     if(isset($buses) && !empty($buses))
                     {
                         foreach($buses as $key=>$bus)
                         {
                            $key=$key+1;
                                $data .='<tr>
                                            <td>'.$key.'</td>
                                            <td>'.$bus['number'].'</td>
                                            <td>'.$bus['from'].'</td>
                                            <td>'.$bus['to'].'</td>
                                            <td>'.$bus['departure_date'].'</td>
                                            <td>'.$bus['dtime'].'</td>
                                            <td>'.$bus['atime'].'</td>
                                            <td>'.$bus['type'].'</td>
                                            <td>'.$bus['yatayat'].'</td>
                                            <td>'.$bus['fare'].'</td>
                                        </tr>';
                           
                         }

                     }
                  
                 $data .='</tbody>
                </table>';
                echo $data;
            }else{
                $data='<h1 style="background:red;" class="text-center">Sorry No Bus Found At that time</h1>';
                echo $data;
            }
          
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.form');
    }

    public function displayBusDetails(Request $request)
    {
        $rules=$this->bus->validateBusNumber();
        $request->validate($rules);
           //dd($request);
           $data=$request->all();
           $bus_info=$this->bus->getBusDetails($data['number']);
           //dd($bus_info);
           if(count($bus_info) == 0){
               return redirect()->route('book');
           }else{
               return view('frontend.bus-details')->with('bus',$bus_info);
           }
           
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Bus=new Bus();
        $rules=$Bus->getValidationRules();
        $request->validate($rules);
        //dd($request);
        $data=$request->all();
        //dd($data);
      
        if($request->image)
        {
            $path=public_path().'/image';
            $file_name="Image-".date('Ymdhis').rand(0,999).".".$request->image->getClientOriginalExtension();
            Image::make($request->image)->resize(200,100,function($constraints){
                $constraints->aspectRatio();
            })->save($path.'/Thumb-'.$file_name);
            if(!File::exists($path))
            {
                File::makeDirectory($path,0777,true,true);
            }
           $success=$request->image->move($path,$file_name);
           if($success){
               $data['image']=$file_name;
           }
        }
       
        $Bus->fill($data);
        $success=$Bus->save();
        if($success){
            $request->session()->flash('success','Bus Added Successfully');
        }else{
            $request->session()->falsh('error','Problem while adding bus');
        }
        return redirect()->route('bus.index');
        //dd($success);
       // dd($request);
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
        //dd($id);
        $Bus=new Bus();
        $Bus=$Bus->where('id',$id)->first();
        return view('admin.form')->with('data',$Bus);
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
        //dd($request);
        $Bus=new Bus();
        $rules=$Bus->getValidationRules();
        //dd($request);
        $data=$request->all();
        //dd($data);
        
        $Bus=$Bus->find($id);
        $Bus->fill($data);
        $success=$Bus->save();
        if($success){
            $request->session()->flash('success','Bus Updated Successfully');
        }else{
            $request->session()->falsh('error','Problem while Updating Bus');
        }
        return redirect()->route('bus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Bus=new Bus();
        $Bus=$Bus->where('id',$id)->first();
        $success=$Bus->delete();
        if($success){
            request()->session()->flash('success','Bus Deleted Successfully');
        }else{
            request()->session()->falsh('error','Problem while Deleting Bus');
        }
        return redirect()->route('bus.index');
    }
}
