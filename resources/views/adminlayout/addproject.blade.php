@extends('adminlayout.layout.header_footer')
@section('content')
<h3>Upload Your Project</h3>
<hr>
<br>
@if(@session('projectuploaded'))
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
    <strong>Success !</strong> {{ session('projectuploaded') }}
</div>

<script>
    var alertList = document.querySelectorAll(".alert");
    alertList.forEach(function (alert) {
        new bootstrap.Alert(alert);
    });
</script>

@endif
<form action="updproject" method="post" enctype="multipart/form-data">
    @csrf
   <div class="row">
    <div class="col-lg-6">
    <input type="text" name="projectname" placeholder="Project Name" class="form-control my-2">
    </div>
    <div class="col-lg-6">
    <input type="text" name="projectcategory" placeholder="Project Category" class="form-control my-2">  
    
    </div>
  
   </div>
   <br>
   
   <div class="col-lg-12">
       <b>Upload Image</b>
       <br>
       

       <input type="file" name="projectimage" class="form-control my-2">
    </div>
   <br> 
   <div class="col-lg-12">
        <textarea name="projectdescription" id="" cols="10" rows="5" class="my-2 form-control" placeholder="Write few words about your project"></textarea>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Upload Project</button>
</form>
@endsection