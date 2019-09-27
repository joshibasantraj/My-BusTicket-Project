@extends('layouts.admin')
@section('title') Buses Listing Page @endsection
@section('msg') All Buses @endsection
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
   <div class="row">
       <div class="col-sm-12">
           @include('admin.section.notification')
          <a href="{{ route('bus.create') }}" class="btn btn-success pull-right"><i class="fas fa-plus"></i> Add Bus Info</a>
           <table class="table jambo_table"> 
               <thead>
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
                   <th>Action</th>
               </thead>
               <tbody>
                  @if($data) 
                   @foreach($data as $key=>$values)
                      <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ $values['number'] }}</td>
                          <td>{{ $values['from'] }}</td>
                          <td>{{ $values['to'] }}</td>
                          <td>{{ $values['departure_date'] }}</td>
                          <td>{{ $values['dtime'] }}</td>
                          <td>{{ $values['atime'] }}</td>
                          <td>{{ $values['type'] }}</td>
                          <td>{{ $values['yatayat'] }}</td>
                          <td>{{ $values['fare'] }}</td>
                          <td>
                              <a href="{{ route('bus.edit',$values->id) }}" style="border-radius:50%" class="btn btn-success">
                                  <i class="fas fa-pencil-alt"></i>
                              </a>
                              <form action="{{ route('bus.destroy',$values->id) }}" onsubmit="return confirm('Are You Sure You Want to Delete This Bus Information')" method="post">
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
@endsection