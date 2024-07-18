@extends('adminlayout.layout.header_footer')
@section('content')
<h3>Insert Feedback</h3>

<hr>
<br>
@if(@session('feedback'))
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
    <strong>Uploaded !</strong> {{ session('feedback') }}
</div>

<script>
    var alertList = document.querySelectorAll(".alert");
    alertList.forEach(function (alert) {
        new bootstrap.Alert(alert);
    });
</script>

@endif

<br>

<form action="insertfeedback" method="post">
    @csrf
    <b>Enter Client Name :</b>
    <input type="text" name="testname" class="form-control">
    <br>
    <b>Enter Company Name :</b>
    <input type="text" name="testcompany" class="form-control">
    <br>
    <b>Enter Feedback :</b>
    <textarea name="testmessage" id="" cols="30" rows="5" placeholder="Enter message" class="form-control">

    </textarea>
    <br>
    <button type="submit" class="btn btn-primary">Upload Feedback</button>
</form>
@endsection