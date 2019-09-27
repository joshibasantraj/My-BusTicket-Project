@extends('layouts.frontend')
@section('style')
   <style>
       .ticket
       {
           font-size: 20px;
       }
   </style>
   <style type="text/css" media="print">
            .printbutton {
            visibility: hidden;
            display: none;
            }
            .noprint{
                display:none;
            }
   </style>
@endsection
@section('script')
    <!-- <script>
        document.write("<input type='button' " +
        "onClick='window.print()' " +
        "class='printbutton' " +
        "value='Print This Page'/>");
    </script> -->
  

@endsection
@section('content')
   <div class="container">
       <div class="row">
           <div class="col-sm-12"  style="z-index:45;margin-left:500px;height:40px;width:20%;margin-top:70px;">
                  <input type="button" class="printbutton" onclick="window.print()" style="font-size:40px;border-radius:20px;" value="Print Tickets">
           </div>
       </div>
       <div class="row">
          @foreach($tickets as $key=>$ticket) 
           <div class="col-sm-12" style="background:lemonchiffon;z-index:45;margin-left:220px;height:400px;width:60%;margin-top:10px;background-size:cover;border-radius:25px;">
           
                  
           <div style="margin-top:30px;margin-left:200px;font-size:30px;">
               Ticket {{ $key+1 }}
           </div>

                <table style="margin-left:20px;margin-top:20px;">
                            <tr>
                                <td class="ticket">Reservation Id :</td>
                                <td class="ticket">{{ $ticket->reservation_id }}</td>
                            </tr> 
                            <tr>
                                <td class="ticket">Bus Number :</td>
                                <td class="ticket">{{ $ticket->bus_number }}</td>
                            </tr>
                            <tr>
                                <td class="ticket">Route :</td>
                                <td class="ticket">{{ $bus_info['from'] }} To {{ $bus_info['to'] }}</td>
                            </tr>
                            <tr>
                                <td class="ticket">Date :</td>
                                <td class="ticket">{{ $bus_info['departure_date'] }}</td>
                            </tr>
                            <tr>
                                <td class="ticket">Time :</td>
                                <td class="ticket">{{ $bus_info['dtime'] }}</td>
                            </tr>
                            <tr>
                                <td class="ticket">Seat Number :</td>
                                <td class="ticket">{{ $ticket->seat_no }}</td>
                            </tr>
                            <tr>
                                <td class="ticket">Fare :</td>
                                <td class="ticket">{{ $bus_info['fare'] }}</td>
                            </tr>
                            <tr>
                                <td class="ticket">Yatayat :</td>
                                <td class="ticket">{{ $bus_info['yatayat'] }}</td>
                            </tr>
                            <tr>
                                <td class="ticket">Payment Method :</td>
                                <td class="ticket">{{ $ticket->payment_method }}</td>
                            </tr>
                            <tr>
                                <td class="ticket">Payed Amount :</td>
                                <td class="ticket">{{ $bus_info['fare'] }}</td>
                            </tr>
                </table>
           </div>
           @endforeach
       </div>
</div>
@endsection