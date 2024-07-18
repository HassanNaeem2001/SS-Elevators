@extends('adminlayout.layout.header_footer')
@section('content')
<h3>Inspection Report Details</h3>
<hr>

<div
    class="table-responsive"
>
    <table
        class="table table-striped"
    >
        
        @foreach($inspection as $r)
            <tr>
                <th>Report No</th>
                <td>{{$r->report_no}}</td>
            </tr>
            <tr>
                <th>Client Name</th>
                <td>{{$r->supervisorname}}</td>
            </tr>
            <tr>
                <th>Project of</th>
                <td>{{$r->companyname}}</td>
            </tr>
            <tr>
                <th>Report Sent Date</th>
                <td>{{ \Carbon\Carbon::parse($r->reportsent_date)->format('j F Y') }}</td>
            </tr>
            <tr>
                <th>Total issues</th>
                <td>{{$r->no_of_issues}}</td>
            </tr>
            <tr>
                <th>Subject</th>
                <td>{{$r->subject}}</td>
            </tr>
            <tr>
                <th>Work Duration</th>
                <td>{{$r->duration_to_work}} {{$r->unit}}</td>
            </tr>
            <tr>
                <th>Issues</th>
                <td>{{$r->issues}}</td>
            </tr>
            <tr>
                <th>Inspected By</th>
                <td>{{$r->generated_by}}</td>
            </tr>
            <tr>
                <td colspan="2">
                   
                        <a href="/inspection_details/spec_inspec_print/{{$r->report_no}}" class="btn btn-primary">Print this</button>
                    
                </td>
            </tr>
    </table>
</div>

@endforeach
@endsection