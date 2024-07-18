@extends('adminlayout.layout.header_footer')
@section('content')
<h3>View Feedback</h3>
<hr>
<div
    class="table-responsive"
>
    <table
        class="table table-striped"
    >
        <thead>
            <tr>
                <th scope="col">Client Name</th>
                <th scope="col">Client Message</th>
                <th scope="col">Feedback Status</th>
                <th scope="col">Company Name</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
          @foreach($data as $d)
          <tr class="">
               
                <input type="hidden" value="{{$d->feedbackstatus}}" class="status">
                <td scope="row">{{$d->clientname}}</td>
                <td>{{$d->clientmessage}}</td>
                <td>{{$d->feedbackstatus}}</td>
                <td>{{$d->clientcompany}}</td>
             
                <td>
                    <select name="" id="" class="p-1 optlist bg-primary text-white">
                       
                        <option selected disabled>Change Status</option>
                        <option value="Published" data-id="{{$d->id}}">Publish</option>
                        <option value="De-Activated" data-id="{{$d->id}}">Not Published</option>
                      
                      
                        
                    </select>
                </td>
            </tr>          
          @endforeach
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<script>
    $('.optlist').change(function(){
        var option = $(this).val();
        var messageid = $(this).find(':selected').data('id');
       
        if(option == "Published"){
            $.ajax({
                url:"updfeedback",
                type:"POST",
                data:{
                    messageid:messageid,
                    option:option,
                    "_token":"{{ csrf_token() }}"
                },
                success:function(){
                    Toastify({
  text: "Status Updated for Feedback",
  className: "success",
  gravity: "bottom", // `top` or `bottom`
  position: "right",
  style: {
    background: "linear-gradient(to right, #00b09b, #96c93d)",
  }
}).showToast();
                }
            })
        }   
        else if(option == "De-Activated"){
            
            $.ajax({
                url:"updfeedback",
                type:"POST",
                data:{
                    messageid:messageid,
                    option:option,
                    "_token":"{{ csrf_token() }}"
                },
                success:function(){
                    Toastify({
  text: "Status Updated for Feedback",
  className: "success",
  gravity: "bottom", // `top` or `bottom`
  position: "right",
  style: {
    background: "linear-gradient(to right, #00b09b, #96c93d)",
  }
}).showToast();
                }
            })
        }
    })
</script>
@endsection