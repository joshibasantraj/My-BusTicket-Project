<body>
<div id="wrapper" class="container-fluid">
	<div id="header" class="noprint">
        <div class="row">
                <div  class="col-sm-5">
                    <h2 style="color:lawngreen !important;">Book Bus Tickets</h2>
                </div>
                <div id="mainnav" class="col-sm-7">
                        <ul>
                            <li class="{{ (request()->route()->getName() == 'my-home') ? 'current' : '' }}"><a href="{{ route('my-home') }}">Home</a></li>
                            <li class="{{ (request()->route()->getName() == 'about-us') ? 'current' : '' }}"><a href="{{ route('about-us') }}" >About Us</a></li>
                            <li class="{{ (request()->route()->getName() == 'book') ? 'current' : '' }}"><a href="{{ route('book') }}">Book Ticket</a></li>
                            <li class="{{ (request()->route()->getName() == 'view-booking') ? 'current' : '' }}"><a href="{{ route('view-booking') }}">View Booking</a></li>
                          
                            <li class="{{ (request()->route()->getName() == 'contact-us') ? 'current' : '' }}"><a href="{{ route('contact-us') }}">Contact Us</a></li>
                             @guest
                             <li class="{{ (request()->route()->getName() == 'login') ? 'current' : '' }}"><a href="{{ route('login') }}">Login</a></li>
                             @else
                             <li class="{{ (request()->route()->getName() == 'admin') ? 'current' : '' }}"><a href="{{ route('admin') }}">{{ request()->user()->role }}</a></li>
                             @endguest
                        </ul>
                </div>
        </div>
	</div>