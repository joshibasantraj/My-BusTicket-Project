@extends('layouts.admin')
               
@section('title') {{ isset($data)?'Update':'Add' }} Page @endsection
@section('msg') {{ isset($data)?'Update':'Add' }} Bus Info Form   @endsection
@section('content')
        <div class="row">
            <div class="col-sm-12">
                @if(isset($data))
                <!-- <form action="{{ route('bus.update',$data->id) }}" method="post" class="form">
                    @method('put') -->
                    {{ Form::open(['url'=>route('bus.update',$data->id),'class'=>'form','method'=>'put','enctype'=>'multipart/form-data']) }}
                @else
               {{ Form::open(['url'=>route('bus.store'),'class'=>'form','enctype'=>'multipart/form-data']) }}
                <!-- <form action="{{ route('bus.store') }}" method="post" class="form">
                    @csrf -->
               @endif
                   
                   <div class="form-group row">
                       <label for="" class="col-sm-3">Bus Id</label>
                       <div class="col-sm-7">
                           {{ Form::text('bid',@$data->bid,['class'=>'form-control','required'=>true]) }}
                           @if($errors->has('bid'))
                              <strong class="alert-danger">
                                  {{ $errors->first('bid') }}
                              </strong>
                           @endif
                       </div>
                   </div>
                   <div class="form-group row">
                       <label for="" class="col-sm-3">Plate Number</label>
                       <div class="col-sm-7">
                           {{ Form::text('number',@$data->number,['class'=>'form-control','required'=>true]) }}
                           <!-- <input type="text" class="form-control" value="{{@$data->number}}" name="number" required> -->
                            @if($errors->has('number'))
                              <strong class="alert-danger">
                                  {{ $errors->first('number') }}
                              </strong>
                           @endif
                        </div>
                   </div>
                   <div class="form-group row">
                       <label for="" class="col-sm-3">From</label>
                       <div class="col-sm-7">
                           {{
                                Form::select('from',[''=>'--select--','Mahendranagar'=>'Mahendranagar','Dhangadi'=>'Dhangadi',
                                'Dadeldhura'=>'Dadeldhura','Baitadi'=>'Baitadi','Darchula'=>'Darchula','Dipayal'=>'Dipayal',
                                'Achaam'=>'Achaam','Bajura'=>'Bajura','Nepaljung'=>'Nepaljung','Surkhet'=>'Surkhet','Butwal'=>'Butwal',
                                'Pokhara'=>'Pokhara','Kathmandu'=>'Kathmandu','Dharan'=>'Dharan'],@$data->from,['class'=>'form-control',
                                'required'=>'true']) 
                            }}
                            @if($errors->has('from'))
                              <strong class="alert-danger">
                                  {{ $errors->first('from') }}
                              </strong>
                           @endif
                           <!-- <select name="from" id="" class="form-control" required>
                               <option value="">--select--</option>
                               <option value="Mahendranagar" {{ (isset($data,$data->from) && $data->from == 'Mahendranager') ? 'selected' : '' }}>Mahendranagar</option>
                               <option value="Dhangadi" {{ (isset($data,$data->from) && $data->from == 'Dhangadi') ? 'selected' : '' }}>Dhangadi</option>
                               <option value="Dadeldhura" {{ (isset($data,$data->from) && $data->from == 'Dadeldhura') ? 'selected' : '' }}>Dadeldhura</option>
                               <option value="Baitadi" {{ (isset($data,$data->from) && $data->from == 'Baitadi') ? 'selected' : '' }}>Baitadi</option>
                               <option value="Darchula" {{ (isset($data,$data->from) && $data->from == 'Darchula') ? 'selected' : '' }}>Darchula</option>
                               <option value="Dipayal" {{ (isset($data,$data->from) && $data->from == 'Dipayal') ? 'selected' : '' }}>Dipayal</option>
                               <option value="Achaam" {{ (isset($data,$data->from) && $data->from == 'Achaam') ? 'selected' : '' }}>Achaam</option>
                               <option value="Bajura" {{ (isset($data,$data->from) && $data->from == 'Bajura') ? 'selected' : '' }}>Bajura</option>
                               <option value="Nepaljung" {{ (isset($data,$data->from) && $data->from == 'Nepaljung') ? 'selected' : '' }}>Nepaljung</option>
                               <option value="Surkhet" {{ (isset($data,$data->from) && $data->from == 'Surkhet') ? 'selected' : '' }}>Surkhet</option>
                               <option value="Butwal" {{ (isset($data,$data->from) && $data->from == 'Butwal') ? 'selected' : '' }}>Butwal</option>
                               <option value="Pokhara" {{ (isset($data,$data->from) && $data->from == 'Pokhara') ? 'selected' : '' }}>Pokhara</option>
                               <option value="Kathmandu" {{ (isset($data,$data->from) && $data->from == 'Kathmandu') ? 'selected' : '' }}>Kathmandu</option>
                               <option value="Dharan" {{ (isset($data,$data->from) && $data->from == 'Dharan') ? 'selected' : '' }}>Dharan</option>
                           </select> -->
                       </div>
                   </div>
                   <div class="form-group row">
                       <label for="" class="col-sm-3">To</label>
                       <div class="col-sm-7">
                          {{
                                Form::select('to',[''=>'--select--','Mahendranagar'=>'Mahendranagar','Dhangadi'=>'Dhangadi',
                                'Dadeldhura'=>'Dadeldhura','Baitadi'=>'Baitadi','Darchula'=>'Darchula','Dipayal'=>'Dipayal',
                                'Achaam'=>'Achaam','Bajura'=>'Bajura','Nepaljung'=>'Nepaljung','Surkhet'=>'Surkhet','Butwal'=>'Butwal',
                                'Pokhara'=>'Pokhara','Kathmandu'=>'Kathmandu','Dharan'=>'Dharan'],@$data->to,['class'=>'form-control',
                                'required'=>'true']) 
                            }}
                            @if($errors->has('to'))
                              <strong class="alert-danger">
                                  {{ $errors->first('to') }}
                              </strong>
                           @endif
                       <!-- <select name="to" id="" class="form-control" value="{{@$data->to}}" required>
                               <option value="">--select--</option>
                               <option value="Mahendranagar" {{ (isset($data,$data->to) && $data->to == 'Mahendranager') ? 'selected' : '' }}>Mahendranagar</option>
                               <option value="Dhangadi" {{ (isset($data,$data->to) && $data->to == 'Dhangadi') ? 'selected' : '' }}>Dhangadi</option>
                               <option value="Dadeldhura" {{ (isset($data,$data->to) && $data->to == 'Dadeldhura') ? 'selected' : '' }}>Dadeldhura</option>
                               <option value="Baitadi" {{ (isset($data,$data->to) && $data->to == 'Baitadi') ? 'selected' : '' }}>Baitadi</option>
                               <option value="Darchula" {{ (isset($data,$data->to) && $data->to == 'Darchula') ? 'selected' : '' }}>Darchula</option>
                               <option value="Dipayal" {{ (isset($data,$data->to) && $data->to == 'Dipayal') ? 'selected' : '' }}>Dipayal</option>
                               <option value="Achaam" {{ (isset($data,$data->to) && $data->to == 'Achaam') ? 'selected' : '' }}>Achaam</option>
                               <option value="Bajura" {{ (isset($data,$data->to) && $data->to == 'Bajura') ? 'selected' : '' }}>Bajura</option>
                               <option value="Nepaljung" {{ (isset($data,$data->to) && $data->to == 'Nepaljung') ? 'selected' : '' }}>Nepaljung</option>
                               <option value="Surkhet" {{ (isset($data,$data->to) && $data->to == 'Surkhet') ? 'selected' : '' }}>Surkhet</option>
                               <option value="Butwal" {{ (isset($data,$data->to) && $data->to == 'Butwal') ? 'selected' : '' }}>Butwal</option>
                               <option value="Pokhara" {{ (isset($data,$data->to) && $data->to == 'Pokhara') ? 'selected' : '' }}>Pokhara</option>
                               <option value="Kathmandu" {{ (isset($data,$data->to) && $data->to == 'Kathmandu') ? 'selected' : '' }}>Kathmandu</option>
                               <option value="Dharan" {{ (isset($data,$data->to) && $data->to == 'Dharan') ? 'selected' : '' }}>Dharan</option>
                           </select> -->
                       </div>
                   </div>
                   <div class="form-group row">
                       <label for="" class="col-sm-3">Departure Date</label>
                       <div class="col-sm-7">
                           {{ Form::date('departure_date',@$data->departure_date,['id'=>'date','class'=>'form-control','required'=>'true']) }}
                           <!-- <input type="time" class="form-control" name="date" value="{{@$data->date}}" required> -->
                           @if($errors->has('date'))
                              <strong class="alert-danger">
                                  {{ $errors->first('date') }}
                              </strong>
                           @endif
                        </div>
                   </div>
                   <div class="form-group row">
                       <label for="" class="col-sm-3">Departure Time</label>
                       <div class="col-sm-7">
                           {{ Form::time('dtime',@$data->dtime,['class'=>'form-control','required'=>'true']) }}
                           <!-- <input type="time" class="form-control" name="dtime" value="{{@$data->dtime}}" required> -->
                           @if($errors->has('dtime'))
                              <strong class="alert-danger">
                                  {{ $errors->first('dtime') }}
                              </strong>
                           @endif
                        </div>
                   </div>
                   <div class="form-group row">
                       <label for="" class="col-sm-3">Arrival Time</label>
                       <div class="col-sm-7">
                       {{ Form::time('atime',@$data->atime,['class'=>'form-control','required'=>'true']) }}
                       @if($errors->has('atime'))
                              <strong class="alert-danger">
                                  {{ $errors->first('atime') }}
                              </strong>
                           @endif
                    </div>
                   </div>
                   <div class="form-group row">
                       <label for="" class="col-sm-3">Type</label>
                       <div class="col-sm-7">
                           {{ Form::select('type',[''=>'--select--','AC'=>'AC','Delux'=>'Delux'],@$data->type,['class'=>'form-control','required'=>true]) }}
                           <!-- <select name="type" id="" class="form-control" required>
                               <option value="">--select--</option>
                              <option value="AC" {{ (isset($data,$data->type) && $data->type == 'AC') ? 'selected' : '' }}>AC</option>
                              <option value="Delux"  {{ (isset($data,$data->type) && $data->type == 'Delux') ? 'selected' : '' }}>Delux</option>
                           </select> -->
                       </div>
                   </div>
                   <div class="form-group row">
                       <label for="" class="col-sm-3">Yatayat Category</label>
                       <div class="col-sm-7">
                       {{ Form::select('yatayat',[''=>'--select--','Mahakali'=>'Mahakali','Pawandut'=>'Pawandut'],@$data->yatayat,['class'=>'form-control','required'=>true]) }}
                           <!-- <select name="yatayat" id="" class="form-control" required>
                              <option value="">--select--</option>
                              <option value="Mahakali"  {{ (isset($data,$data->yatayat) && $data->yatayat == 'Mahakali') ? 'selected' : '' }}>Mahakali</option>
                              <option value="Pawandut" {{ (isset($data,$data->yatayat) && $data->yatayat == 'Pawandut') ? 'selected' : '' }}>Pawandut</option>
                           </select> -->
                       </div>
                   </div>
                   <div class="form-group row">
                       <label for="" class="col-sm-3">Fare</label>
                       <div class="col-sm-7">
                           {{ Form::number('fare',@$data->fare,['class'=>'form-control','required'=>true]) }}
                           <!-- <input type="number" class="form-control" name="fare" value="{{@$data->fare}}" required> -->
                       </div>
                   </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3"></label>
                        <div class="col-sm-7">
                            {{ Form::button('<em>Submit</em>',['class'=>'btn btn-success','type'=>'submit']) }}
                            {{ Form::button('<em>Reset</em>',['class'=>'btn btn-danger','type'=>'reset']) }}
                            <!-- <button class="btn btn-success" type="submit">Submit</button>
                            <button class="btn btn-danger" type="reset">Reset</button> -->
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
@endsection