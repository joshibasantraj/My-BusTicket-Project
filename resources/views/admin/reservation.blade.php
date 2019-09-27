@extends('layouts.admin')
@section('title')Reservation Listing Page @endsection
@section('msg') All Reservations @endsection
@section('links')
 <link rel="stylesheet" href="{{ asset('assets/frontend/css/jquery.dataTables.min.css') }}">
@endsection
@section('scripts')
<script src="{{ asset('/assets/frontend/js/jquery.dataTables.min.js') }}"></script>
<script>
$('.table').dataTable();
</script>
@endsection
@section('content')
   <div class="container">
       <div class="row">
           <div class="col-sm-12">
           @include('admin.section.notification')
               <table class="table jambo_table" >
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
                       <th>Action</th>
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
                                 <td>
                                    <form action="{{ route('delete-reservation',$reservation->id) }}" onsubmit="return confirm('Are You Sure You Want to Delete This Bus Information')" method="post">
                                        @method('DELETE')
                                        @csrf
                                    <button style="border-radius:50%" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    </form>
                                 </td>
                             </tr>
                          @endforeach
                       @endif
                   </tbody>
               </table>
           </div>
       </div>
   </div>
@endsection