@extends('adminlayout.layout.header_footer');
@section('content')
<h3>Contact Queries</h3>
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
                <th scope="col">Reply</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
            <tr class="">
                <td scope="row">{{$d->contactName}}</td>
                <td scope="row">{{$d->contactEmail}}</td>
                <td scope="row">{{$d->contactSubject}}</td>
                <td scope="row">{{$d->contactMessage}}</td>
                <td scope="row">
                    <!-- Modal trigger button -->
                    <button
                        type="button"
                        class="btn btn-primary"
                        data-bs-toggle="modal"
                        data-bs-target="#modalId{{$d->id}}"
                    >
                        Reply 
                    </button>
                    
                    <!-- Modal Body -->
                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                    <div
                        class="modal fade"
                        id="modalId{{$d->id}}"
                        tabindex="-1"
                        data-bs-backdrop="static"
                        data-bs-keyboard="false"
                        
                        role="dialog"
                        aria-labelledby="modalTitleId"
                        aria-hidden="true"
                    >
                        <div
                            class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                            role="document"
                        >
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalTitleId">
                                        Type in your message
                                    </h5>
                                    <button
                                        type="button"
                                        class="btn-close"
                                        data-bs-dismiss="modal"
                                        aria-label="Close"
                                    ></button>
                                </div>
                                <form action="contacted_admin" method="post">
                                    @csrf
                                <div class="modal-body">
                                  
                                        <input readonly type="text" name="resemail" value="{{$d->contactEmail}}" class="form-control">
                                        <br>
                                        <input type="text" name="message" class="form-control" placeholder="type in your message">
                                        <br>

                                        
                                    
                                </div>
                                <div class="modal-footer">
                                    <button
                                        type="button"
                                        class="btn btn-secondary"
                                        data-bs-dismiss="modal"
                                    >
                                        Close
                                    </button>
                                    <button type="submit" class="btn btn-primary">Send Response</button>
                                    
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Optional: Place to the bottom of scripts -->
                    <script>
                        const myModal = new bootstrap.Modal(
                            document.getElementById("modalId"),
                            options,
                        );
                    </script>
                    
                </td>
               
            </tr>
           
            @endforeach
        </tbody>
     
        
    </table>
</div>
{{ $data->links() }}
@endsection