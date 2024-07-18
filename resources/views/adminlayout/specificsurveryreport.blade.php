@extends('adminlayout.layout.header_footer')
@section('content')
<h3>Survey Details</h3>
<hr>

<div
    class="table-responsive"
>
    <table
        class="table"
    >
  
        
        @foreach($rep as $r)
        <tr>
        <td colspan="2">
            <a href="printsurvey/{{$r->survery_report_no}}" class="w-100 btn btn-primary">Download as PDF</a>
        </td>
        </tr>
            <tr>
                <th>Report No</th>
                <td>{{$r->survery_report_no}}</td>
            </tr>
            <tr>
                <th>Client Name</th>
                <td>{{$r->clientname}}</td>
            </tr>
            <tr>
                <th>Project Name</th>
                <td>{{$r->projectname}}</td>
            </tr>
            <tr>
                <th>Location / Area</th>
                <td>{{$r->location}}</td>
            </tr>
            <tr>
                <th>Elevator No</th>
                <td>{{$r->elevator_no}}</td>
            </tr>
            <tr>
                <th>Elevator Brand</th>
                <td>{{$r->elevator_brand}}</td>
            </tr>
            <tr>
                <th>Elevator Stops</th>
                <td>{{$r->elevator_stops}}</td>
            </tr>
            <tr>
                <th>Elevator Type</th>
                <td>{{$r->project_type}}</td>
            </tr>
            <tr>
                <th>Elevator Usage</th>
                <td>{{$r->project_usage}}</td>
            </tr>
            <tr>
                <td colspan="2">
                    <br>
                    <h4>Machine Details</h4>
                </td>
            </tr>
            @php 
$components = explode(', ',$r->machine_details);
$controlpanelcomponents = explode(', ',$r->controlpanel_details);
$steelwiredetails = explode(', ',$r->steelwire_details);
$sheavesdetails = explode(', ',$r->sheaves_details);
$mainguidedetails = explode(', ',$r->mainguide_details);
$cwtguidedetails = explode(', ',$r->cwtguide_details);
$cweightdetails = explode(', ',$r->counterweight_details);
$carcabindetails = explode(', ',$r->carcabin_details);
$cabin_cwt_shoedetail = explode(', ',$r->cabincwtshoe_details);
$cardoordetails = explode(', ',$r->cardoor_details);
$landingdoordetails = explode(', ',$r->landingdoor_details);
$doorsafetydetails = explode(', ',$r->doorsafety_details);
$speedgovernerdetails = explode(', ',$r->speedgoverner_details);
$limitswitchdetails = explode(', ',$r->limitswitches_details);
$buffersdetails = explode(', ',$r->buffers_details);
$intercomdetails = explode(', ',$r->intercom_details);
$fansdetails = explode(', ',$r->fans_details);
$cabinlightdetails = explode(', ',$r->cabinlights_details);
$lcsdetails = explode(', ',$r->lcs_details);
$caroperatingdetails = explode(', ',$r->caroperating_details);
$oilcandetails = explode(', ',$r->oilcan_details);
$additionaldetails = explode(', ',$r->additional_details);


$mdetails = [
    "Machine Type"=>$components[0],
    "Machine Description"=>$components[1],
    "Machine HP"=>$components[2],
    "Machine Encoders"=>$components[3],
    "Machine Groves"=>$components[4],
    "Machine's Status"=>$components[5],
    "Machine Issue Detail"=>$components[6]
];

$cpdetails = [
    "Based Upon"=>$controlpanelcomponents[0],
    "Invertor KW"=>$controlpanelcomponents[1],
    "Status"=>$controlpanelcomponents[2],
    "Control Panel Issue"=>$controlpanelcomponents[3],
    
];
$swdetails = [
    "Ropes Qty"=>$steelwiredetails[0],
    "Diameter"=>$steelwiredetails[1],
    "Length"=>$steelwiredetails[2],
    "Ratio"=>$steelwiredetails[3],
    "Steel Wire Status"=>$steelwiredetails[4],
    "Steel Wire Issue"=>$steelwiredetails[5]
];
$shdetails = [
    "Sheaves Qty"=>$sheavesdetails[0],
    "Sheaves Status"=>$sheavesdetails[1],
    "Shaves Issue"=>$sheavesdetails[2],
  
];
$mgdetails = [
    "Main Guide mm"=>$mainguidedetails[0],
    "Main Guide Status"=>$mainguidedetails[1],
    "Main Guide Issue"=>$mainguidedetails[2],
  
];
$cwtdetails = [
    "C.W.T Guide mm"=>$cwtguidedetails[0],
    "C.W.T Guide Status"=>$cwtguidedetails[1],
    "C.W.T Guide Issue"=>$cwtguidedetails[2],
  
];
$cwdetails = [
    "Counter Weight Status"=>$cweightdetails[0],
    "Counter Weight Issue"=>$cweightdetails[1],
  
];
$ccdetails = [
    "Car Cabin"=>$carcabindetails[0],
    "Car Cabin Opening"=>$carcabindetails[1],
    "Car Cabin Status"=>$carcabindetails[2],
    "Car Cabin Issue"=>$carcabindetails[3],
];
$ccsdetails = [
    "Cabin & C.W.T Shoe Status"=>$cabin_cwt_shoedetail[0],
    "Cabin & C.W.T Shoe Issue"=>$cabin_cwt_shoedetail[1],
];
$cddetails = [
    "Car Door Opening Size"=>$cardoordetails[0],
    "Car Door Type"=>$cardoordetails[1],
    "Car Door Status"=>$cardoordetails[2],
    "Car Door Issue"=>$cardoordetails[3],
];
$lddetails = [
    "Landing Door Qty"=>$landingdoordetails[0],
    "Landing Door Type"=>$landingdoordetails[1],
    "Landing Door Status"=>$landingdoordetails[2],
    "Landing Door Door Issue"=>$landingdoordetails[3],
];
$dsdetails = [
    "Door Safety Type"=>$doorsafetydetails[0],
    "Door Safety Status"=>$doorsafetydetails[1],
    "Door Safety Issue"=>$doorsafetydetails[2],
    
];
$osgdetails = [
    "Speed Governer Status"=>$speedgovernerdetails[0],
    "Speed Governer Issue"=>$speedgovernerdetails[1],
];
$lsddetails = [
    "Limit Switches Qty"=>$limitswitchdetails[0],
    "Limit Switches Type"=>$limitswitchdetails[1],
    "Limit Switches Status"=>$limitswitchdetails[2],
    "Limit Switches Issue"=>$limitswitchdetails[3],
];
$bfdetails = [
    "Buffers Qty"=>$buffersdetails[0],
    "Hydraulics"=>$buffersdetails[1],
    "Buffers Status"=>$buffersdetails[2],
    "Buffers Issue"=>$buffersdetails[3],
];
$icdetails = [
    "Intercom Type"=>$intercomdetails[0],
    "Intercom Status"=>$intercomdetails[1],
    "Intercom Issue"=>$intercomdetails[2],
   
];
$fdetails = [
    "Fans Qty"=>$fansdetails[0],
    "Fan Type"=>$fansdetails[1],
    "Fan Category"=>$fansdetails[2],
    "Fan Status"=>$fansdetails[3],
    "Fan Issue"=>$fansdetails[4],
   
];
$cldetails = [
    "Lights"=>$cabinlightdetails[0],
    "Type Of Lights"=>$cabinlightdetails[1],
    "Lights Category"=>$cabinlightdetails[2],
    "Lights Status"=>$cabinlightdetails[3],
    "Lights Issue"=>$cabinlightdetails[4],
   
];
$lcs_details = [
    "LCS Qty"=>$lcsdetails[0],
    "LCS Category"=>$lcsdetails[1],
    "LCS Status"=>$lcsdetails[2],
    "LCS Issue"=>$lcsdetails[3],
   
];
$coddetails = [
    "Buttons Qty"=>$caroperatingdetails[0],
    "Category"=>$caroperatingdetails[1],
    "Status"=>$caroperatingdetails[2],
    "Issue"=>$caroperatingdetails[3],   
];
$ocdetails = [
    "Qty On Cabin"=>$oilcandetails[0],
    "Qty On CWT"=>$oilcandetails[1],
    "Availibility"=>$oilcandetails[2],
    "Oil Can Status"=>$oilcandetails[3],   
    "Oil Can Issue"=>$oilcandetails[4],   
];


@endphp
@foreach($mdetails as $key => $value)
        <tr><th>{{ $key }}</th><td>{{$value}}</td></tr>
@endforeach
<tr>
    <td colspan="2">
        <br>
        <h4>Control Panel Details</h4>
    </td>
</tr>
@foreach($cpdetails as $key => $value)
        <tr><th>{{ $key }}</th><td>{{$value}}</td></tr>
@endforeach
<tr>
    <td colspan="2">
        <br>
        <h4>Steel Wire Details</h4>
    </td>
</tr>
@foreach($swdetails as $key => $value)
        <tr><th>{{ $key }}</th><td>{{$value}}</td></tr>
@endforeach
<tr>
    <td colspan="2">
        <br>
        <h4>Sheaves Details</h4>
    </td>
</tr>
@foreach($shdetails as $key => $value)
        <tr><th>{{ $key }}</th><td>{{$value}}</td></tr>
@endforeach
<tr>
    <td colspan="2">
        <br>
        <h4>Main Guide Details</h4>
    </td>
</tr>
@foreach($mgdetails as $key => $value)
        <tr><th>{{ $key }}</th><td>{{$value}}</td></tr>
@endforeach
<tr>
    <td colspan="2">
        <br>
        <h4>C.W.T Guide Details</h4>
    </td>
</tr>
@foreach($cwtdetails as $key => $value)
        <tr><th>{{ $key }}</th><td>{{$value}}</td></tr>
@endforeach
<tr>
    <td colspan="2">
        <br>
        <h4>Counter Weight Details</h4>
    </td>
</tr>
@foreach($cwdetails as $key => $value)
        <tr><th>{{ $key }}</th><td>{{$value}}</td></tr>
@endforeach
<tr>
    <td colspan="2">
        <br>
        <h4>Car Cabin Details</h4>
    </td>
</tr>
@foreach($ccdetails as $key => $value)
        <tr><th>{{ $key }}</th><td>{{$value}}</td></tr>
@endforeach
<tr>
    <td colspan="2">
        <br>
        <h4>Cabin C.W.T Shoe Details</h4>
    </td>
</tr>
@foreach($ccsdetails as $key => $value)
        <tr><th>{{ $key }}</th><td>{{$value}}</td></tr>
@endforeach
<tr>
    <td colspan="2">
        <br>
        <h4>Car Door Details</h4>
    </td>
</tr>
@foreach($cddetails as $key => $value)
        <tr><th>{{ $key }}</th><td>{{$value}}</td></tr>
@endforeach
<tr>
    <td colspan="2">
        <br>
        <h4>Landing Door Details</h4>
    </td>
</tr>
@foreach($lddetails as $key => $value)
        <tr><th>{{ $key }}</th><td>{{$value}}</td></tr>
@endforeach
<tr>
    <td colspan="2">
        <br>
        <h4>Door Safety Details</h4>
    </td>
</tr>
@foreach($dsdetails as $key => $value)
        <tr><th>{{ $key }}</th><td>{{$value}}</td></tr>
@endforeach
<tr>
    <td colspan="2">
        <br>
        <h4>OverSpeed Governer Details</h4>
    </td>
</tr>
@foreach($osgdetails as $key => $value)
        <tr><th>{{ $key }}</th><td>{{$value}}</td></tr>
@endforeach
<tr>
    <td colspan="2">
        <br>
        <h4>Limit Switches Details</h4>
    </td>
</tr>
@foreach($lsddetails as $key => $value)
        <tr><th>{{ $key }}</th><td>{{$value}}</td></tr>
@endforeach
<tr>
    <td colspan="2">
        <br>
        <h4>Buffers Details</h4>
    </td>
</tr>
@foreach($bfdetails as $key => $value)
        <tr><th>{{ $key }}</th><td>{{$value}}</td></tr>
@endforeach
<tr>
    <td colspan="2">
        <br>
        <h4>Intercom Details</h4>
    </td>
</tr>
@foreach($icdetails as $key => $value)
        <tr><th>{{ $key }}</th><td>{{$value}}</td></tr>
@endforeach
<tr>
    <td colspan="2">
        <br>
        <h4>Fans Details</h4>
    </td>
</tr>
@foreach($fdetails as $key => $value)
        <tr><th>{{ $key }}</th><td>{{$value}}</td></tr>
@endforeach
<tr>
    <td colspan="2">
        <br>
        <h4>Cabin Light Details</h4>
    </td>
</tr>
@foreach($cldetails as $key => $value)
        <tr><th>{{ $key }}</th><td>{{$value}}</td></tr>
@endforeach
<tr>
    <td colspan="2">
        <br>
        <h4>LCS Details</h4>
    </td>
</tr>
@foreach($lcs_details as $key => $value)
        <tr><th>{{ $key }}</th><td>{{$value}}</td></tr>
@endforeach
<tr>
    <td colspan="2">
        <br>
        <h4>Car Operating Details</h4>
    </td>
</tr>
@foreach($coddetails as $key => $value)
        <tr><th>{{ $key }}</th><td>{{$value}}</td></tr>
@endforeach
<tr>
    <td colspan="2">
        <br>
        <h4>Oil Can Details</h4>
    </td>
</tr>
@foreach($ocdetails as $key => $value)
        <tr><th>{{ $key }}</th><td>{{$value}}</td></tr>
@endforeach
<tr>
    <td colspan="2">
        <br>
        <h4>Additional Details</h4>
    </td>
</tr>
<tr>
    <th>Notes</th>
    <td>{{$r->additional_notes}}</td>
</tr>
@endforeach
    </table>
</div>

@endsection