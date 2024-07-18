@extends('adminlayout.layout.header_footer')
@section('content')
<h1>Update Password</h1>
<br>

    <input type="text" value="{{session('email')}}" class="form-control" readonly>
    <br>
    <h6>Because this email is linked with your account. <b>We will send an OTP on this email to confirm</b></h6>
    <a href="updateemail" class="btn btn-primary">Verify Email</a>
    <br>
    <br>

    @if(@session('emailmessage'))
    <b>Check Your Inbox. {{session('emailmessage')}} !</b>
    <br>
    <br>
    <form action="verifyotp" method="post">
    @csrf
  
    <input type="text" placeholder="Enter the OTP here" class="w-50 form-control" name="otp">
    <br>
    <button class="btn btn-primary" type="submit">Verify OTP</button>
    </form>
    @endif


    @if(@session('matched'))
        <div class="modal fade" id="myModal1" role="dialog">
  <div class="modal-dialog"> 

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    
    @endif
@endsection