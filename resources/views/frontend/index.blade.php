@extends('layouts.frontend')
@section('content')
  <div id="content">
    	<div id="rotator">
              <ul>
                    <li class="show"><img src="{{ asset('assets/frontend/xres/images/jb2/011.jpg') }}" width="961" height="279"  alt="" /></li>
                    <li><img src="{{ asset('assets/frontend/xres/images/jb2/022.jpg') }}" width="961" height="279"  alt="" /></li>
                    <li><img src="{{ asset('assets/frontend/xres/images/jb2/033.jpg') }}" width="961" height="279"  alt="" /></li>
                    <li><img src="{{ asset('assets/frontend/xres/images/jb2/044.jpg') }}" width="961" height="279"  alt="" /></li>
              </ul>
			  
        </div>
		
      </div>

	<div class="btn-bar" style="position:fixed;top:400px;z-index:50;margin-left:600px;">
          
       <a href="{{ route('book') }}" class="btn btn-danger" style="float-right:300px;font-size:40px;">Reserve Now</a>
       
<div class="conatiner" style="margin-top:10px;z-index:60px; color:brown;">
<div class="row" style="width:100%;" >
  <div class="col-sm-12">
  <marquee direction="right" scrolldelay="300">
  <table >
     <tr>
		 <td>
           <div class="blog_desc">
			  
			  <div class="blog_heading">
					<span style="font-weight:bold">
							<b>
								heeeeeee
							</b>
							
							<p>
								vgjfiwydcnbdvwiywbjd
							</p>
					</span>						
			  </div>	
                 <br />
				
		   </div>
		</td>
	 </tr>
  </table>
</marquee>  
                  </div>
            </div>
      </div>
	
</div>
@endsection