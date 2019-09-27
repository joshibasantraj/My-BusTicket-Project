<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Ticket;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    protected $reservation=null;

    public function __construct(Reservation $reservation,Ticket $ticket,Bus $bus)
    {
        $this->reservation=$reservation;
        $this->ticket=$ticket;
        $this->bus=$bus;
    }

    public function displayReservations()
    {
        $data=$this->reservation->orderBy('id','DESC')->get();
        return view('frontend.viewbooking')->with('reservations',$data);
    }

    public function index()
    {
        $content=$this->reservation->orderBy('id','DESC')->first();
        $bus_info=$this->bus->where('number',$content->bus_number)->first();
        $tickets=$this->ticket->where('reservation_id',$content->id)->get();
        return view('frontend.tickets')->with('tickets',$tickets)->with('bus_info',$bus_info);
    }

    public function admin()
    {
      
        $data=$this->reservation->orderBy('id','DESC')->get();
        return view('admin.reservation')->with('reservations',$data);
    }

    public function saveReservation(Request $request)
    {
        //dd($request);
        // $rules=$this->reservation->getValidationRules();
        // $request->validate($rules);
        //dd($request);
        $data=$request->all();
        $this->reservation->fill($data);
        $success=$this->reservation->save();
        if($success){
            //dd($data['seats_selected']);
            $content=$this->reservation->orderBy('id','DESC')->first();
            $bus_info=$this->bus->where('number',$content['bus_number'])->first();
            $seats=explode("|",$content['seats_selected']);
            foreach($seats as $seat)
            {
                $fillticket=[
                      'reservation_id'=>$content['id'],
                      'seat_no'=>$seat,
                      'bus_number'=>$content['bus_number'],
                      'payment_method'=>$content['payment_method'],
                      'payed_amount'=>$bus_info->fare
                ];
                DB::table('tickets')->insert($fillticket);
            }
            return redirect()->route('receive-ticket')->with('reservation_info',$content);
        }
    }

    public function delete($id)
    {
          $this->reservation=$this->reservation->find($id);
          $success=$this->reservation->delete();
          if($success){
              request()->session()->flash('success','Reservation Deleted Successfully');
          }else{
              request()->session()->flash('error','Problem while Deleting Reservation');
          }
          return redirect()->route('reservation-admin');
    }
}
