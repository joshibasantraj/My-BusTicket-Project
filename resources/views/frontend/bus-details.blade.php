@extends('layouts.frontend')
@section('style')
   <style>
			.btn{
			height:100%;
			width:100%;
			}
			.seat
			{
				height:80px;
				width:20px;
				border:solid black 1px;
				text-align:center;
			}
			
			.seat1
			{
				height:80px;
				width:10px;
				border:solid black 1px;
				text-align:center;
				margin-left:10px;
			}
			.side
			{
				height:20px;
				width:5px;
				background-color: brown !important;
				border:solid black 1px;
				text-align:center;
			}
            th
            {
                text-align: center;
            }
	
	</style>
@endsection


@section('content')

<div class="container" style="z-index:50;">
    <div class="row">
        <div class="col-sm-12">
            <form action="{{ route('store-ticket') }}" method="post">
                @csrf
                <div class="form-group row" style="z-index:50;margin-top:80px;margin-bottom:0px;">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-2" style="color:tomato;font-size:20px;">Total Seats</div>
                    <div class="col-sm-1">
                    </div>
                    <div class="col-sm-4">  
                        <span style="font-size:30px;">44</span>
                    </div>
                </div>
                <div class="form-group row" style="z-index:50;margin-top:10px;margin-bottom:0px;">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-2" style="color:tomato;font-size:20px;">Remaining Seats</div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-4">
                      <span style="font-size:30px;">{{ 44-$bus->ticketDetails->count() }}</span>
                    </div>
                </div>
                <div class="form-group row" style="z-index:50;margin-top:10px;margin-bottom:0px;">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-4" style="color:tomato;font-size:20px;">Number of Seats To Be Booked</div>
                    <div class="col-sm-4">
                    <input type="number" name="seat_no" min="1" max="{{ 44-$bus->ticketDetails->count() }}" id="seat_no" value="0" class="form-control" required=true>
                    </div>
                    
                </div>
                    <table border="solid black 1px"  cellspacing="0px" style="background-color:blueviolet !important;margin-top:10px;margin-left:100px;">
                        <thead style="background-color:blue;">
                        <th style="width:300px;height:30px;">Cabin</th>
                        <th style="width:800px;height:30px;">Normal seats</th>
                        <th style="width:100px;height:30px;">Back Seats</th>
                        </thead>
                        <tbody>
                                <tr>
                                <td>
                                    <table style="width:100%;height:100%;margin-bottom:0px;">
                                        <tr>
                                            <td class="seat1"><button class="btn"  type="button" id="Cabin Seat 3"  onclick='return fillSeat("Cabin Seat 3")'>3</button></td>
                                            <td class="seat1"><button class="btn"  type="button" id="Cabin Seat 8" onclick='return fillSeat("Cabin Seat 8")'>8</button></td>
                                            <td class="seat1"><button class="btn"  type="button"  id="Cabin Seat 11" onclick='return fillSeat("Cabin Seat 11")'>11</button></td>
                                        </tr>
                                        <tr>
                                            <td class="seat1"><button class="btn"  type="button" id="Cabin Seat 2"  onclick='return fillSeat("Cabin Seat 2")'>2</button></td>
                                            <td class="seat1"><button class="btn"  type="button" id="Cabin Seat 7"  onclick='return fillSeat("Cabin Seat 7")'>7</button></td>
                                            <td class="seat1"><button class="btn"  type="button"  id="Cabin Seat 10"  onclick='return fillSeat("Cabin Seat 10")'>10</button></td>
                                        </tr>
                                        <tr>
                                            <td class="seat1"><button class="btn"  type="button"  id="Cabin Seat 01"  onclick='return fillSeat("Cabin Seat 01")'>1</button></td>
                                            <td class="seat1"><button class="btn"  type="button"  id="Cabin Seat 6"  onclick='return fillSeat("Cabin Seat 6")'>6</button></td>
                                            <td class="seat1"><button class="btn"  type="button" id="Cabin Seat 9"  onclick='return fillSeat("Cabin Seat 9")'>9</button></td>
                                        </tr>
                                        <tr>
                                        <td class="seat1" rowspan="2"></td>
                                            <td class="seat1" ><button class="btn"  type="button" id="Cabin Seat 5" onclick='return fillSeat("Cabin Seat 5")'>5</button></td>
                                            <td class="seat1" style="visibility:hidden;">9</td>
                                        </tr>
                                        <tr>
                                            
                                            <td class="seat1"><button class="btn"  type="button" id="Cabin Seat 4"  onclick='return fillSeat("Cabin Seat 4")'>4</button></td>
                                            <td class="seat1" style="visibility:hidden;">1</td>
                                            
                                        
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                        <table style="width:100%;height:50%;margin-bottom:50px;">
                                                <tr>
                                                    <td class="side" rowspan="2">A</td>
                                                    <td class="seat"><button class="btn"  type="button" id="seat A 01"  onclick='return fillSeat("seat A 01")'>1</button></td>
                                                    <td class="seat"><button class="btn"  type="button" id="seat A 03"  onclick='return fillSeat("seat A 03")'>3</button></td>
                                                    <td class="seat"><button class="btn"  type="button" id="seat A 5"  onclick='return fillSeat("seat A 5")'>5</button></td>
                                                    <td class="seat"><button class="btn"  type="button" id="seat A 7"  onclick='return fillSeat("seat A 7")'>7</button></td>
                                                    <td class="seat"><button class="btn"  type="button" id="seat A 9" onclick='return fillSeat("seat A 9")'>9</button></td>
                                                    <td class="seat"><button class="btn"  type="button" id="seat A 11"  onclick='return fillSeat("seat A 11")'>11</button></td>
                                                    <td class="seat"><button class="btn"  type="button" id="seat A 13" onclick='return fillSeat("seat A 13")'>13</button></td>				 
                                                </tr>
                                                <tr>
                                                    <td class="seat"><button class="btn"  type="button"  id="seat A 02" onclick='return fillSeat("seat A 02")'>2</button></td>
                                                    <td class="seat"><button class="btn"  type="button"  id="seat A 04" onclick='return fillSeat("seat A 04")'>4</button></td>
                                                    <td class="seat"><button class="btn"  type="button" id="seat A 6"  onclick='return fillSeat("seat A 6")'>6</button></td>
                                                    <td class="seat"><button class="btn"  type="button" id="seat A 8"  onclick='return fillSeat("seat A 8")'>8</button></td>
                                                    <td class="seat"><button class="btn"  type="button"  id="seat A 10" onclick='return fillSeat("seat A 10")'>10</button></td>
                                                    <td class="seat"><button class="btn"  type="button" id="seat A 12"  onclick='return fillSeat("seat A 12")'>12</button></td>
                                                    <td class="seat"><button class="btn"  type="button" id="seat A 14" onclick='return fillSeat("seat A 14")'>14</button></td>					 
                                                </tr>
                                        </table>
                                    <table style="width:100%;height:50%;">
                                        
                                        <tr>
                                        <td class="side" rowspan="2">B</td>
                                            <td class="seat"><button class="btn"  type="button"  id="seat B 02" onclick='return fillSeat("seat B 02")'>2</button></td>
                                            <td class="seat"><button class="btn"  type="button" id="seat B 04"  onclick='return fillSeat("seat B 04")'>4</button></td>
                                            <td class="seat"><button class="btn"  type="button"  id="seat B 6" onclick='return fillSeat("seat B 6")'>6</button></td>
                                            <td class="seat"><button class="btn"  type="button"  id="seat B 8" onclick='return fillSeat("seat B 8")'>8</button></td>
                                            <td class="seat"><button class="btn"  type="button"  id="seat B 10" onclick='return fillSeat("seat B 10")'>10</button></td>
                                            <td class="seat"><button class="btn"  type="button"  id="seat B 12" onclick='return fillSeat("seat B 12")'>12</button></td>
                                            <td class="seat"><button class="btn"  type="button"  id="seat B 14" onclick='return fillSeat("seat B 14")'>14</button></td>					 
                                        </tr>
                                        <tr>
                                            
                                            <td class="seat"><button class="btn"  type="button"  id="seat B 01" onclick='return fillSeat("seat B 01")'>1</button></td>
                                            <td class="seat"><button class="btn"  type="button" id="seat B 03"  onclick='return fillSeat("seat B 03")'>3</button></td>
                                            <td class="seat"><button class="btn"  type="button" id="seat B 5"  onclick='return fillSeat("seat B 5")'>5</button></td>
                                            <td class="seat"><button class="btn"  type="button"  id="seat B 7" onclick='return fillSeat("seat B 7")'>7</button></td>
                                            <td class="seat"><button class="btn"  type="button" id="seat B 9"  onclick='return fillSeat("seat B 9")'>9</button></td>
                                            <td class="seat"><button class="btn"  type="button" id="seat B 11" onclick='return fillSeat("seat B 11")'>11</button></td>
                                            <td class="seat"><button class="btn"  type="button" id="seat B 13"  onclick='return fillSeat("seat B 13")'>13</button></td>				 
                                        </tr>
                                    </table>
                                    </td>
                                <td>
                                    <table style="width:100%;">
                                    <tr>
                                        <td class="seat"><button class="btn"  type="button" id="Back seat 5" onclick='return fillSeat("Back seat 5")'>5</button></td>
                                    </tr>
                                    <tr>
                                        <td class="seat"><button class="btn"  type="button"  id="Back seat 4" onclick='return fillSeat("Back seat 4")'>4</button></td>
                                    </tr>
                                    <tr>
                                        <td class="seat"><button class="btn"  type="button" id="Back seat 3" onclick='return fillSeat("Back seat 3")'>3</button></td>
                                    </tr>
                                    <tr>
                                        <td class="seat"><button class="btn"  type="button" id="Back seat 2"  onclick='return fillSeat("Back seat 2")'>2</button></td>
                                    </tr>
                                    <tr>
                                        <td class="seat"><button class="btn"  type="button" id="Back seat 1" onclick='return fillSeat("Back seat 1")'>1</button></td>
                                    </tr>
                                    
                                    </table>
                                </td>
                                </tr>
                        </tbody>
                    </table>
                <div class="form-group row" style="z-index:50;margin-top:10px;margin-bottom:0px;">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-2" style="color:tomato;font-size:20px;">Seats Selected</div>
                    <div class="col-sm-7">
                    <input type="hidden" name="seats_selected" style="height:70px;" id="seats_selected" class="form-control" required=true>
                    </div>
                    <div class="col-sm-1"></div>
                </div>
                <input type="hidden" name="bus_number" value="{{ $bus->number }}">
                <div class="form-group row" style="margin-top:20px;">
                        <div class="col-sm-6"></div>
                            <div class="col-sm-2">
                                <button class="btn btn-danger" style="font-size:30px;" id="btn1" type="submit">Submit</button>
                            </div>
                        <div class="col-sm-4"></div>
                    </div>
            </form>
  </div>
 </div>
</div>
 
@endsection


@section('script')
<script>
	 function fillSeat(seatno)
 {
	 var len=document.getElementById("seat_no").value;
	 var val=document.getElementById("seats_selected").value; 
	 var elem=val.split("|");
     if(val == ""){
        var count=elem.length-1;
      }else{
        var count=elem.length;
     }


    if(len == 0){
          alert('Please enter Number of seats to be Booked');
        }
        else{
		    if(count < len){
				if(find(seatno,elem)){
	 			     alert('You cannot select same seat twice');
	 		       }else{
                            if(val == ""){
                                document.getElementById("seats_selected").value=seatno;
                                document.getElementById(seatno).style.backgroundColor="green";
                            }else{
                                document.getElementById("seats_selected").value=val+"|"+seatno;
                                document.getElementById(seatno).style.backgroundColor="green";
                            }  
		     	}
          }
            else{
                alert("You cannot select more than "+len+" Seats");
            }
	}
 }
  
   @if(isset($bus->ticketDetails))
     @foreach($bus->ticketDetails as $ticketDetail)
          document.getElementById("{{ $ticketDetail->seat_no }}").disabled=true;
	      document.getElementById("{{ $ticketDetail->seat_no }}").style.backgroundColor="red";
     @endforeach
   @endif
   
</script>
     
@endsection