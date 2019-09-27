<?php
namespace App\Http\Controllers;
use App\Models\Bus;
use App\Models\Ticket;
use Illuminate\Http\Request;
use DB;

class TicketController extends Controller
{
    protected $ticket=null;
    protected $bus=null;

    public function __construct(Ticket $ticket,Bus $bus)
    {
        $this->ticket=$ticket;
        $this->bus=$bus;
    }
    public function storeTicket(Request $request)
    {
        //dd($request);
        $temp=$request->all();
        $bus_info=$this->bus->where('number',$temp['bus_number'])->first();
       //dd($temp['seats_selected']);
       $seats=explode("|",$temp['seats_selected']);
   
       return view('frontend.gateway')->with('data',$temp)->with('bus_info',$bus_info)->with('seats',$seats);
    }

    public function printTickets(Request $request)
    {
         // dd($request);
         $temp=$request->all();
         $bus_info=$this->bus->where('number',$temp['number'])->first();
         $seats=explode("|",$temp['seats_selected']);
         $payment_method=$temp['payment_method'];
            foreach($seats as $key=>$seat)
                {
                    $data=[
                        'seat_no'=>$seat,
                        'bus_number'=>$temp['number'],
                        'payment_method'=>$payment_method,
                        'payed_amount'=>$bus_info->fare,
                    ];
                    DB::table('tickets')->insert($data);
                }
        return view('frontend.tickets')->with('bus_info',$bus_info)->with('seats',$seats)->with('payment_method',$payment_method);  
    }
}