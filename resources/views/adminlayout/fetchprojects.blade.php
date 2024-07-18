@extends('adminlayout.layout.header_footer')
@section('content')
<h3>Uploaded Projects | Active </h3>
@if(@session('deleteproject'))
<div
    class="alert alert-danger alert-dismissible fade show"
    role="alert"
>
    <button
        type="button"
        class="btn-close"
        data-bs-dismiss="alert"
        aria-label="Close"
    ></button>
    <strong>Deactivated</strong> {{ session('deleteproject') }}
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
                <th scope="col">Project Name</th>
                <th scope="col">Project category</th>
                <th scope="col">Project Descrtiption</th>
                <th scope="col">Project Image</th>
                <th scope="col">Project Status</th>
                <th>Deactivate</th>

            </tr>
        </thead>
        <tbody>
         @foreach ($data as $d)
         <tr class="">
                <td scope="row">{{$d->projectname}}</td>
                <td>{{$d->projectcategory}}</td>
                <td>{{$d->projectdescription}}</td>
                <td>
                <img src="{{ asset('storage/' . $d->projectimage) }}" alt="" height="80px" width="80px">

                </td>
                <td>{{$d->projectstatus}}</td>
                <td>
                    <form action="deleteproject" method="post">
                        @csrf
                        <input type="hidden" value="{{$d->id}}" name="projectid">
                        <button class="btn btn-danger" type="submit">De-Activate</button>
                    </form>
                </td>
            </tr>
         @endforeach
        </tbody>
    </table>
</div>

@endsection