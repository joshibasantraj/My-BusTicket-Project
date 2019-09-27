
	<div id="footer" class="noprint" style="background:lawngreen !important; width:100%;margin-left:0px;position:absolute;top:1000px;">
                <p>Hours of Operation&nbsp;&nbsp;&bull;&nbsp;&nbsp;Mon - Sun: 10:00 am - 12:00 am</p>
                
                <p>&copy; Copyright {{date('Y')}} Mahakali Yatayat Bus <br /></p>
       </div>
</div>
</body>
</html>

<script type="text/javascript" src="{{ asset('assets/frontend/xres/js/saslideshow.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/xres/js/slideshow.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery-1.5.min.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('assets/frontend/vallenato/vallenato.js') }}" type="text/javascript" charset="utf-8"></script>
<!-- <script type="text/javascript" src="{{ asset('assets/frontend/js/datepicker.js') }}"></script> -->



<script type="text/javascript">
		$("#slideshow > div:gt(0)").hide();

		setInterval(function() { 
		  $('#slideshow > div:first')
			.fadeOut(1000)
			.next()
			.fadeIn(1000)
			.end()
			.appendTo('#slideshow');
		},  3000);
    </script>
    <!-- <script type="text/javascript">
                    function makeTwoChars(inp) {
                            return String(inp).length < 2 ? "0" + inp : inp;
                    }

                    function initialiseInputs() {
                        
                            document.getElementById("sd").value = "";
                            document.getElementById("ed").value = "";

                            datePickerController.addEvent(document.getElementById("sd"), "change", setReservationDates);
                    }

                    var initAttempts = 0;

                    function setReservationDates(e) {
                        
                            try {
                                    var sd = datePickerController.getDatePicker("sd");
                                    var ed = datePickerController.getDatePicker("ed");
                            } catch (err) {
                                    if(initAttempts++ < 10) setTimeout("setReservationDates()", 50);
                                    return;
                            }

                        
                            var dt = datePickerController.dateFormat(this.value, sd.format.charAt(0) == "m");

                    
                            if(dt == 0) return;

                        
                            var edv = datePickerController.dateFormat(document.getElementById("ed").value, ed.format.charAt(0) == "m");

                            
                            ed.setRangeLow( dt );
                            
                            
                            if(edv < dt) {
                                    document.getElementById("ed").value = "";
                            }
                    }

                    function removeInputEvents() {
                            
                            datePickerController.removeEvent(document.getElementById("sd"), "change", setReservationDates);
                    }

                    datePickerController.addEvent(window, 'load', initialiseInputs);
                    datePickerController.addEvent(window, 'unload', removeInputEvents);
    </script>  -->

 
    <script>
    function fetchRecord(){
             var from=$('#from').val();
             var to=$('#to').val();
             var date=$('#date').val();
             $.ajax({
                url: "{{ route('display-bus') }}",
                type: "post",
                data: {
                    _token: "{{ csrf_token() }}",
                    from: from,
                    to: to,
                    date: date
                },
                success: function(data,success){
                  $('#table').html(data);
                }
             });
    }
</script>

@yield('script')
