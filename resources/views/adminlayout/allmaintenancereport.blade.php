@extends('adminlayout.layout.header_footer')
@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.5.0/css/rowReorder.dataTables.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.dataTables.css">
<h3>All Maintenance Reports</h3>
<hr>
<table id="myTable" class="display nowrap" style="width:100%">
    <thead>
            <th>Project Name</th>
            <th>Elevator Type</th>
            <th>Date</th>
            <th>Operations</th>   
    </thead>
    <tbody>
        
       @foreach($data as $r)
       <tr>
            <td>{{$r->projectname}}</td>
            <td>{{$r->elevatortype}}</td>
            <td>{{$r->created_at}}</td>
           
            <td>
                <a href="maintenance/{{$r->id}}" class="btn btn-primary">View Details</a>
            </td>
        </tr>
       @endforeach
    </tbody>
</table>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.5.0/js/dataTables.rowReorder.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.5.0/js/rowReorder.dataTables.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.2/js/responsive.dataTables.js"></script>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable({
        responsive: true,
    rowReorder: {
        selector: 'td:nth-child(2)'
    }
    });
} );
</script>
@endsection