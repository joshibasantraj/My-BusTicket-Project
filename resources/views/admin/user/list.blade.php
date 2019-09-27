@extends('layouts.admin')          
@section('title') List Page @endsection
@section('msg') All Admins  @endsection
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
              <a class="btn btn-primary" href="{{ route('admin.create') }}" style="float:right;">
                    <i class="fas fa-plus"></i>  Add User
            </a>
              <table class="table jambo_table">
                  <thead>
                      <th>Sno</th>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone Number</th>
                      <th>Role</th>
                      <th>Status</th>
                      <th>Gender</th>
                      <th>Address</th>
                      <th>Action</th>
                  </thead>
                  <tbody>
                     @if(isset($data) && $data->count() > 0)
                       @foreach($data as $key=>$data)
                          <tr>
                              <td>{{ $key+1 }}</td>
                              <td>
                                  <img src="{{ asset('Uploads/user/Thumb-'.$data->image) }}" alt="" class="img img-responsive img-thumbnail">
                              </td>
                              <td>{{ $data->name }}</td>
                              <td>{{ $data->email }}</td>
                              <td>{{ $data->phone }}</td>
                              <td>{{ $data->role }}</td>
                              <td>{{ $data->status }}</td>
                              <td>{{ $data->gender }}</td>
                              <td>{{ $data->address }}</td>
                              <td>
                                  <a href="{{ route('admin.edit',$data->id) }}" style="border-radius:50%;" class="btn btn-success">
                                      <i class="fas fa-pencil-alt"></i>
                                </a>
                                  <form action="{{ route('admin.destroy',$data->id) }}" method="post">
                                  @method('DELETE')
                                  @csrf
                                    
                                      <button class="btn btn-danger" style="border-radius:50%;" type="submit" onclick="return confirm('Are you sure to delete this user ?')">
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