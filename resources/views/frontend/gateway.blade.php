@extends('layouts.frontend')
@section('style')
   <style>
       .ticket
       {
           font-size: 30px;
       }
   </style>
@endsection
@section('content')
   <div class="container">
       <div class="row">
           <div class="col-sm-12" style="background:lemonchiffon;z-index:45;height:900px;width:100%;margin-top:80px;background-size:cover;border-radius:25px;">
                
           <div style="margin-top:60px;margin-left:400px;font-size:40px;">
               Reservation Information
           </div>

                  <table style="margin-left:50px;margin-top:70px;">
                      <tr>
                          <td class="ticket">Bus Number :</td>
                          <td class="ticket">{{ $bus_info->number }}</td>
                      </tr>
                      <tr>
                          <td class="ticket">Route :</td>
                          <td class="ticket">{{ $bus_info->from }} To {{ $bus_info->to }}</td>
                      </tr>
                      <tr>
                          <td class="ticket">Date :</td>
                          <td class="ticket">{{ $bus_info->departure_date }}</td>
                      </tr>
                      <tr>
                          <td class="ticket">Time :</td>
                          <td class="ticket">{{ $bus_info->dtime }}</td>
                      </tr>
                      <tr>
                          <td class="ticket">Seats Selected :</td>
                          <td class="ticket">{{ $data['seats_selected'] }}</td>
                      </tr>
                      <tr>
                          <td class="ticket">Fare :</td>
                          <td class="ticket">{{ $bus_info->fare }}</td>
                      </tr>
                      <tr>
                         <td class="ticket">Yatayat :</td>
                          <td class="ticket">{{ $bus_info->yatayat }}</td>
                      </tr>
                      <tr>
                          <td class="ticket">Quantity :</td>
                          <td class="ticket">{{ count($seats) }}</td>
                      </tr>
                      <tr>
                          <td class="ticket">Total Amount :</td>
                          <td class="ticket">{{ $bus_info->fare * count($seats) }}</td>
                      </tr>
                  </table>
                  <form action="{{ route('reservation') }}" class="form" method="post" style="font-size:40px;margin-top:60px;margin-left:40px;">
                    @csrf
                     <input type="hidden" name="seats_selected" value="{{ $data['seats_selected'] }}" id="seats_selected" required>
                     <input type="hidden"  name="bus_number" id="bus_num" value="{{ $bus_info->number }}" class="form-control" required>
                     <input type="hidden" name="quantity" value="{{ count($seats) }}" >
                     <input type="hidden" name="payed_amount" value="{{ $bus_info->fare * count($seats) }}">
                     <div class="row">
                          <div class="col-sm-12">
                              <div class="form-group row">
                                 <div class="col-sm-2">Payment Method</div>
                                 <div class="col-sm-10">
                                     <select name="payment_method" id="payment_method">
                                         <option value="">-- select --</option>
                                         <option value="PayPal">PayPal</option>
                                         <option value="Esewa">Esewa</option>
                                         <option value="Paytm">Paytm</option>
                                     </select>
                                 </div>
                              </div>
                          </div>
                      </div>
                     <button class="btn btn-danger" style="font-size:40px;margin-left:400px;border-radius:30px;" type="submit" style="border-radius:10px;">
                       Confirm Booking
                     </button> 
                  </form>
           </div>
       </div>
   </div>
@endsection