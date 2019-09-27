@extends('layouts.frontend')
@section('content')
  <div class="container" style="position:fixed;top:130px;z-index:40;height:500px;margin-left:100px;">
     <div class="row">
         <div class="col-sm-12">
             <form class="form">
                    <div class="form-group row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-1" style="color:tomato;font-size:20px;">From</div>
                        <div class="col-sm-4">
                            <select name="from" id="from" class="form-control" required>
                                <option value="">--select--</option>
                                <option value="Mahendranagar">Mahendranagar</option>
                                <option value="Dhangadi">Dhangadi</option>
                                <option value="Dadeldhura">Dadeldhura</option>
                                <option value="Baitadi">Baitadi</option>
                                <option value="Dipayal">Dipayal</option>
                            </select>
                        </div>
                        <div class="col-sm-1" style="color:tomato;font-size:20px;">To</div>
                        <div class="col-sm-4">
                            <select name="to" id="to" class="form-control" required>
                                <option value="">--select--</option>
                                <option value="Mahendranagar">Mahendranagar</option>
                                <option value="Dhangadi">Dhangadi</option>
                                <option value="Dadeldhura">Dadeldhura</option>
                                <option value="Baitadi">Baitadi</option>
                                <option value="Kathmandu">Kathmandu</option>
                                <option value="Pokhara">Pokhara</option>
                            </select>
                        </div>
                        <div class="col-sm-1"></div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-1" style="color:tomato;font-size:20px;">Date</div>
                        <div class="col-sm-4">
                            <input type="date" name="date" id="date" class="form-control" required=true>
                        </div>
                        <div class="col-sm-4"></div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6"></div>
                        <div class="col-sm-2">
                            <button class="btn btn-danger" style="font-size:20px;" id="btn1" onclick="fetchRecord()" type="button">Search</button>
                        </div>
                        <div class="col-sm-4"></div>
                    </div>
            </form>
         </div>
     </div>

     <div class="row" style="z-index:45;">
         <div class="col-sm-12" id="table">
           
         </div>
     </div>

     <div class="row">
         <div class="col-sm-12">
         <form class="form" action="{{ route('bus-detail') }}" method="post">
                   @csrf
                    <div class="form-group row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-1" style="color:tomato;font-size:20px;">Bus Number</div>
                        <div class="col-sm-4">
                            <input type="text" placeholder="please enter bus number from table ..." name="number" id="bus_num" class="form-control" required>
                        </div>
                        <div class="col-sm-4"></div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6"></div>
                        <div class="col-sm-2">
                            <button class="btn btn-danger" style="font-size:20px;" type="submit">Submit</button>
                        </div>
                        <div class="col-sm-4"></div>
                    </div>
            </form>
         </div>
     </div>

  </div>
   
@endsection