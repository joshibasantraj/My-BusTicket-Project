@extends('layouts.admin')   
@section('title') (isset($user)?'Update':'Add') Page @endsection
@section('msg')(isset($user)?'Update':'Add') Admin Page @endsection
@section('scripts')
  <script>
     $('#change_password').change(function(){
       $checked=$('#change_password').prop('checked');
  
     if($checked){
       $('#password').attr('required');
       $('#confirm_password').attr('required');
       $('#change_password_div').removeClass('hidden');
     }else{
       $('#password').removeAttr('required');
       $('#confirm_password').removeAttr('required');
       $('#change_password_div').addClass('hidden');
     }

    });
  </script>
@endsection


@section('content')
   <div class="container">
       <div class="row">
            <div class="col-sm-12">
              @if(isset($user) && $user->count()>0)
                 {{ Form::open(['url'=>route('admin.update',$user->id),'class'=>'form','method'=>'put','enctype'=>'multipart/form-data']) }}
              @endif
                {{ Form::open(['url'=>route('admin.store'),'class'=>'form','enctype'=>'multipart/form-data']) }}

                <div class="form-group row">
                        <label for="name" class="col-sm-3">Name</label>
                          <div class="col-sm-9">
                            {{ Form::text('name',@$user->name,['class'=>'form-control','id'=>'name','required'=>true])}}
                            @if($errors->has('name'))
                               <span class="alert-danger">{{ $errors->first('name') }}</span>
                            @endif
                          </div>
                </div>
                <div class="form-group row">
                        <label for="email" class="col-sm-3">Email</label>
                          <div class="col-sm-9">
                            {{ Form::email('email',@$user->email,['class'=>'form-control','id'=>'email','required'=>true])}}
                            @if($errors->has('email'))
                               <span class="alert-danger">{{ $errors->first('email') }}</span>
                            @endif
                          </div>
                </div>
                <div class="form-group row">
                        <label for="phone" class="col-sm-3">Phone</label>
                          <div class="col-sm-9">
                            {{ Form::number('phone',@$user->phone,['class'=>'form-control','id'=>'phone','required'=>true])}}
                            @if($errors->has('phone'))
                               <span class="alert-danger">{{ $errors->first('phone') }}</span>
                            @endif
                          </div>
                </div>
                @if(isset($user))
                  <div class="form-group row">
                    {{ Form::label('change_password','Change Password',['class'=>'col-sm-3']) }}
                      <div class="col-sm-9">
                          {{  Form::checkbox('change_password',1,false,['id'=>'change_password']) }}
                          @if($errors->has('change_password'))
                              <span class="alert-danger">
                                {{ $errors->first('change_password') }}
                              </span>
                          @endif
                      </div>
                  </div>
                @endif
                <div  class="{{ isset($user)?'hidden':'' }}" id="change_password_div">
                     <div class="form-group row">
                        <label for="password" class="col-sm-3">Password</label>
                          <div class="col-sm-9">
                            {{ Form::password('password',['class'=>'form-control','id'=>'password'])}}
                            @if($errors->has('password'))
                               <span class="alert-danger">{{ $errors->first('password') }}</span>
                            @endif
                          </div>
                      </div>
                      <div class="form-group row">
                              <label for="confirm_password" class="col-sm-3">Confirm Password</label>
                                <div class="col-sm-9">
                                  {{ Form::password('password_confirmation',['class'=>'form-control','id'=>'confirm_password' ])}}
                                  @if($errors->has('confirm_password'))
                                    <span class="alert-danger">{{ $errors->first('confirm_password') }}</span>
                                  @endif
                                </div>
                      </div>
                </div>

                <div class="form-group row">
                        <label for="status" class="col-sm-3">Status</label>
                          <div class="col-sm-9">
                            {{ Form::select('status',['active'=>'Active','inactive'=>'Inactive'],@$user->status,['class'=>'form-control','id'=>'status','required'=>true])}}
                            @if($errors->has('status'))
                               <span class="alert-danger">{{ $errors->first('status') }}</span>
                            @endif
                          </div>
                </div>
                <div class="form-group row">
                       <label for="gender" class="col-sm-3">Gender</label>
                       <div class="col-sm-9">
                            <input type="radio" name="gender" value="Male" {{ @($user->gender == 'Male')?'checked':'' }}>Male
                            <input type="radio" name="gender" value="Female" {{ @($user->gender == 'Female')?'checked':'' }}>Female
                       </div>
                </div>
                <div class="form-group row">
                        <label for="name" class="col-sm-3">Address</label>
                          <div class="col-sm-9">
                            {{ Form::text('address',@$user->address,['class'=>'form-control','id'=>'address','required'=>true])}}
                            @if($errors->has('address'))
                               <span class="alert-danger">{{ $errors->first('address') }}</span>
                            @endif
                          </div>
                </div>

                <div class="form-group row">
                        <label for="image" class="col-sm-3">Image</label>
                          <div class="col-sm-5">
                            {{ Form::file('image',['id'=>'image','accept'=>'multipart/form-data',isset($user)?'':'required']) }}

                              

                            @if($errors->has('image'))
                               <span class="alert-danger">{{ $errors->first('image') }}</span>
                            @endif
                          </div>
                          @if(isset($user))
                          <div class="col-sm-4">
                          <img src="{{ asset('Uploads/user/Thumb-'.$user->image) }}" alt=""  class="img img-responsive img-thumbnail"><br>
                              <input type="checkbox" name="delete">DELETE
                          </div>
                          @endif
                </div>
                                
                <div class="form-group row">
                          {{ Form::label('','',['class'=>'col-sm-3']) }}
                          <div class="col-sm-9">
                            {{ Form::button('<i class="fas fa-paper-plane"></i> Submit',['class'=>'btn btn-success','id'=>'submit','type'=>'submit']) }}
                            {{ Form::button('<i class="fas fa-trash"></i> Reset',['class'=>'btn btn-danger','id'=>'cancel','type'=>'reset']) }}
                          </div>
                        </div>
                {{ Form::close() }}
            </div>    
           </div>
       </div>
   </div>
@endsection