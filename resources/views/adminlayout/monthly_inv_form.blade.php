@extends('adminlayout.layout.header_footer')
@section('content')
<h3>Monthly Invoice Generate</h3>
<hr>
<div class="container">
    @if(@session('success'))
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
        <strong>Alert </strong> <span>{{session('success')}}</span>
    </div>
    
    <script>
        var alertList = document.querySelectorAll(".alert");
        alertList.forEach(function (alert) {
            new bootstrap.Alert(alert);
        });
    </script>
    
    @endif
<form action="ins_invoice" method="post">
    @csrf
    <div class="row">
        <div class="col-lg-6 mt-2">
        <b>Enter Client Name</b>
        <input type="text" name="clientname" class="form-control" required>
        </div>
        <div class="col-lg-6 mt-2">
        <b>Enter Project Address</b>
        <input type="text" name="address" class="form-control" required>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 mt-2">
        <b>Enter No of Elevators</b>
        <input type="number" name="noofelev" class="form-control" required>
        </div>
        <div class="col-lg-6 mt-2">
        <b>Enter Price for Each Lift</b>
        <input type="number" name="priceind" class="form-control" required>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 mt-2">
        <b>Detail of Bill</b>
        <input type="text" name="detail" class="form-control" required>
        </div>
        <div class="col-lg-6 mt-2">
        <b>Enter Tax Percentage - <span style="color:green">Optional</span></b>
        <input type="number" name="taxpercent" class="form-control" value="0">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 mt-2">
            <button class="btn btn-primary w-100" type="submit">Generate Report</button>
        </div>
    </div>

</form>
</div>
@endsection