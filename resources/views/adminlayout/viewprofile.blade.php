@extends('adminlayout.layout.header_footer')
@section('content')
<h3>Profile Page</h3>
<hr>
<div
    class="table-responsive"
>
    <table
        class="table table-striped"
    >
        <thead>
            <tr>
                <th scope="col">User Id</th>
                <th scope="col">User Name</th>
                <th scope="col">User Email</th>
                <th scope="col">User Role</th>
                <th scope="col">User Profile</th>
                <th scope="col">Role Upgrade</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $u)
            <tr class="">
                <td scope="row">{{$u->id}}</td>
                <td scope="row">{{$u->username}}</td>
                <td scope="row">{{$u->useremail}}</td>
                <td scope="row">{{$u->userrole}}</td>
                <td scope="row">No Profile</td>
                <td>
                   @if($u->userrole == 'admin')
                   <span style="color:grey">Already Admin</span>
                   @else
                   <button class="btn btn-primary" onclick="sendrequest('{{$u->id}}')">Update My Role</button>
                   @endif
                </td>
              
            </tr>
            @endforeach
          
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function sendrequest(id)
    {
       $.ajax({
        url:"updaterolenotify",
        type:"POST",
        data:{
            id:id,
            "_token":"{{csrf_token()}}"
        },
        success:function(data){
            Swal.fire({
                title: 'Request Sent!',
                text: data,
                icon: 'success',
                confirmButtonText: 'Close'
                })
        }
       })
    }
</script>

@endsection