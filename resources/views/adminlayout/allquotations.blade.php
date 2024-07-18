@extends('adminlayout.layout.header_footer');
@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.5.0/css/rowReorder.dataTables.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.dataTables.css">
<h3>All Quotation Invoices / Bills</h3>
<hr>
<table id="myTable" class="display nowrap" style="width:100%">
    <thead>
            <th>Report No</th>
            <th>Client Name</th>
            <th>Project Address</th>
            <th>Date</th>
            <th>Operations</th>   
    </thead>
    <tbody>
        
       @foreach($data as $r)
       <tr>
            <td>{{$r->quotation_no}}</td>
            <td>{{$r->client_name}}</td>
            <td>{{$r->client_address}}</td>
            <td>{{$r->created_at}}</td>
            <td>
                <a href="printquotation/{{$r->quotation_no}}" class="btn btn-primary">View Details</a>
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