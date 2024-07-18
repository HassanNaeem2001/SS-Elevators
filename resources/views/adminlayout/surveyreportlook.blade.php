@extends('adminlayout.layout.header_footer')
@section('content')
<h3>Final look of survey report</h3>
<hr>
<h3>Basic Information</h3>
<hr>
@foreach($data as $d)
<p> <b>Project Name</b> : {{$d->projectname}} </p>
<p> <b>Client Name</b> : {{$d->clientname}} </p>
<p> <b>Area Name / Location</b> : {{$d->location}} </p>
<p> <b>Area Name / Location</b> : {{$d->location}} </p>
<hr>
<h3>Equipment Details</h3>
<hr>
@php 
$components = explode(', ',$d->machine_details);
$mdetails = [
    "Machine Type"=>$components[0],
    "Machine Description"=>$components[1],
    "Machine HP"=>$components[2],
    "Machine Encoders"=>$components[3],
    "Machine Groves"=>$components[4],
    "Machine's Overall Status"=>$components[5]
]
@endphp
@foreach($mdetails as $key => $value)
        <p><b>{{ $key }}</b> : {{ $value }}</p>
    @endforeach
@endforeach
@endsection