@extends('layouts.frontend')
@section('style')
 <style>
  .title
   {
       font-size:30px;
       margin-top: 200px;
   }
   .field
   {
       height:50px;
       width:400px;
       border-radius:10px;
       font-size:30px;
       line-height: 30px;
      
   }
</style>
@endsection
@section('content')
  <div class="container">
      <div class="row">
          <div class="col-sm-12" style="background:silver;margin-top:100px;width:70%;height:700px;border-radius:20px;margin-left:200px;">
            <h1 style="font-size:50px;color:green;">Contact Us</h1>
    <form action="{{ route('contact-save') }}" enctype="multipart/form-data" method="post">
    @csrf
          <table style="z-index:50;margin-left:50px;margin-top:50px; line-height: 40px;">
                  <tr>
                      <td class="title">Name</td>
                      @for($i=0;$i<10;$i++)
                         <td>&nbsp;&nbsp;&nbsp;</td>
                      @endfor
                      <td>
                          <input type="text" name="name" class="field">
                      </td>
                  </tr>
                  <tr>
                      <td>&nbsp;</td>
                  </tr>
                  <tr>
                      <td class="title">Email</td>
                      @for($i=0;$i<10;$i++)
                         <td>&nbsp;&nbsp;&nbsp;</td>
                      @endfor
                      <td>
                          <input type="email" name="email" class="field">
                      </td>
                  </tr>
                  <tr>
                      <td>&nbsp;</td>
                  </tr>
                  <tr>
                      <td class="title">Mobile Number</td>
                      @for($i=0;$i<10;$i++)
                         <td>&nbsp;&nbsp;&nbsp;</td>
                      @endfor
                      <td>
                          <input type="number" name="number" class="field">
                      </td>
                  </tr>
                  <tr>
                      <td>&nbsp;</td>
                  </tr>
                  <tr>
                      <td class="title">Subject</td>
                      @for($i=0;$i<10;$i++)
                         <td>&nbsp;&nbsp;&nbsp;</td>
                      @endfor
                      <td>
                          <textarea name="subject" id="subject" style="width:400px;resize:none;font-size:30px;" rows="4"></textarea>
                      </td>
                  </tr>
                  <tr>
                      <td>&nbsp;</td>
                  </tr>
                  <tr>
                      <td class="title"></td>
                      @for($i=0;$i<10;$i++)
                         <td>&nbsp;&nbsp;&nbsp;</td>
                      @endfor
                      <td>
                          <button class="btn btn-success" type="submit" style="font-size:40px;">Send Us</button>
                      </td>
                  </tr>
                  
              </table>
    </form>
          </div>
      </div>
  </div>
@endsection