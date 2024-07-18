@extends('adminlayout.layout.header_footer')
@section('content')
<h3>Requests for Approval</h3>
<hr>
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
    <strong>Success </strong><span>{{session('success')}}</span>
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
                <th scope="col">User Name</th>
                <th scope="col">Designation Now</th>
                <th scope="col">Request Sent</th>
                <td>Approve</td>
            </tr>
        </thead>
        <tbody>
           @foreach($rec as $r)
           <tr>
            <td>{{$r->username}}</td>
            <td>{{$r->userrole}}</td>
            <td>{{$r->created_at}}</td>
            <td>
                <form action="approveuser/{{$r->user_id}}" method="post">
                    @csrf
                    <button class="btn btn-primary" type="submit">Approve</button>
                </form>
            </td>
           </tr>
           @endforeach
        </tbody>
    </table>
</div>

@endsection