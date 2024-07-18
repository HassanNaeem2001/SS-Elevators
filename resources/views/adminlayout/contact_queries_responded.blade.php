@extends('adminlayout.layout.header_footer');
@section('content')
<h3>Responded Queries</h3>
@if(@session('emailresponse'))
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
    <strong>Response has been sent to </strong>{{session('email')}}
</div>

<script>
    var alertList = document.querySelectorAll(".alert");
    alertList.forEach(function (alert) {
        new bootstrap.Alert(alert);
    });
</script>

@endif
<div
    class="table-responsive"
>
    <table
        class="table table-striped"
    >
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Subject</th>
                <th scope="col">Message</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
            <tr class="">
                <td scope="row">{{$d->contactName}}</td>
                <td scope="row">{{$d->contactEmail}}</td>
                <td scope="row">{{$d->contactSubject}}</td>
                <td scope="row">{{$d->contactMessage}}</td>
                <td>Responded</td>
               
            </tr>
           
            @endforeach
        </tbody>
    </table>
</div>

@endsection