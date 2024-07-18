@extends('adminlayout.layout.header_footer')
@section('content')
<h3>Add Inspector</h3>
<hr>
<br>
@if(@session('admincreated'))
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
    <strong>Registeration </strong> Successfull !
</div>

@endif
<script>
    var alertList = document.querySelectorAll(".alert");
    alertList.forEach(function (alert) {
        new bootstrap.Alert(alert);
    });
</script>

<br>
<form action="/add_admin" class="w-100" method="post">
    @csrf
    <input type="text" class="form-control" name="username" required placeholder="Enter name">
    <br>
    <input type="email" class="form-control" name="useremail" required placeholder="Enter email">
    <br>
    <input type="password" class="form-control" name="userpassword" required value="12345" placeholder="Enter password">
    <br>
    
    <button type="submit" class="btn btn-primary">Add Admin</button>
</form>
    <hr>
    <br>
    <span>Once you made someone the admin ,</span><b>we will send them their credentials on their email</b>
    @endsection