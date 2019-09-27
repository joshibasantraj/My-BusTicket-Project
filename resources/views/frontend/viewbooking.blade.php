@extends('layouts.frontend')
@section('style')
 <link rel="stylesheet" href="{{ asset('assets/datatables/css/jquery.dataTables.min.css') }}">
@endsection
@section('script')
        <script src="{{ asset('/assets/datatables/js/jquery.dataTables.js') }}"></script>
        <script>
        $('.table').dataTable();
        </script>
@endsection
@section('content')
   <div class="container">
       <div class="row" style="margin-top:80px;z-index:45;background:silver;height:900px;border-radius:20px;">
           <div class="col-sm-12">
               <table class="table jambo_table" style="margin-top:40px;z-index:55;">
                   <thead>
                       <th>Sno</th>
                       <th>Reservation Id</th>
                       <th>Yatayat</th>
                       <th>Bus Number</th>
                       <th>Booked Seats</th>
                       <th>Fare</th>
                       <th>Quantity</th>
                       <th>Payment Method</th>
                       <th>Payed Amount</th>
                   </thead>
                   <tbody>
                       @if(isset($reservations) && $reservations->count() != 0)
                          @foreach($reservations as $key=>$reservation)
                             <tr>
                                 <td>{{ $key+1 }}</td>
                                 <td>{{ $reservation->id }}</td>
                                 <td>{{ $reservation->bus_info->yatayat }}</td>
                                 <td>{{ $reservation->bus_number }}</td>
                                 <td>{{ $reservation->seats_selected }}</td>
                                 <td>{{ $reservation->bus_info->fare }}</td>
                                 <td>{{ $reservation->quantity }}</td>
                                 <td>{{ $reservation->payment_method }}</td>
                                 <td>{{ $reservation->payed_amount }}</td>
                             </tr>
                          @endforeach
                       @endif
                   </tbody>
               </table>
           </div>
       </div>
   </div>
@endsection