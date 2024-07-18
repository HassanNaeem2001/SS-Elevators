@extends('adminlayout.layout.header_footer')
@section('content')
<h2>Update Your Password</h2>
<b>Your password will be edited for this email</b>
<br>
<hr>
<br>
@if(@session('upd'))
<div
    class="alert alert-success alert-dismissible fade show"
    role="alert"
>
    <button
        type="button"
        class="btn-close"
        data-bs-dismiss="alert"
        aria-label="Close"
    ></button>
    <strong>Password Updated !</strong>
    <a href="/profile">Go back to my profile</a> 
</div>
@endif
<br>

<script>
    var alertList = document.querySelectorAll(".alert");
    alertList.forEach(function (alert) {
        new bootstrap.Alert(alert);
    });
</script>

<form action="pass_update" method="post">
@csrf
<input type="email" readonly value="{{session('email')}}" class="form-control">
<br>
<input type="text" class="form-control" name="password">
<br>
<button type="submit" class="btn btn-primary" required>Save New Password</button>
</form>
@endsection