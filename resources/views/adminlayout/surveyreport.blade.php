@extends('adminlayout.layout.header_footer')
@section('content')
<h3>Generate Survey Report</h3>
<br>
<p>Kindly , fill in all the required details to generate your report</p>

<p>This report is being generated by <b>{{session('admin')}}</b></p>
<hr>

<div class="container">
    @if(@session('successmessage'))
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
        <strong>Success {{ session('successmessage')}} </strong>
    </div>
    
    <script>
        var alertList = document.querySelectorAll(".alert");
        alertList.forEach(function (alert) {
            new bootstrap.Alert(alert);
        });
    </script>
    @endif
    
<form action="insertsurvey" method="post">
@csrf    
<div class="row">
    <div class="col-lg-6">
        <b>Enter Project Name</b>
        <input type="text" class="form-control" required name="projectname">
    </div>
    <div class="col-lg-6">
        <b>Enter Client Name</b>
        <input type="text" class="form-control" required name="clientname">
    </div>
    <div class="row">
        <div class="col-lg-12">
            <b>Enter Area / Location</b>
            <textarea id="" class="form-control" required name="areaname"></textarea>
        </div>
        <br>
    </div>
    
    <h3 class="mt-3">Equipment Details</h3>
    <hr>
    <div class="row">
        <div class="col-lg-4">
            <b>Elevator No</b>
            <input type="number" class="form-control" required name="elevatorno">
        </div>
        <div class="col-lg-4">
            <b>Elevator Brand</b>
            <input type="text" class="form-control" required name="elevatorbrand">
        </div>
        <div class="col-lg-4">
            <b>Stops / Landings</b>
            <input type="text" class="form-control" required name="stops">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <b>Project Type</b>
            <select name="projecttypelist" id="" class="form-control">
                <option value="Building">Building</option>
                <option value="Hospital">Hospital</option>
                <option value="School">School</option>
                <option value="Office">Office</option>
                <option value="Factory">Factory</option>
                <option value="Other">Other</option>
            </select>
        </div>
        <div class="col-lg-6">
        <b>Usage</b>
            <select name="usagelist" id="" class="form-control">
                <option value="Passenger">Passenger</option>
                <option value="Freight">Freight</option>
                <option value="Bed Lift">Bed Lift</option>
                <option value="Home Lift">Home Lift</option>
                <option value="Disabled">Disabled</option>
                <option value="Dumb waster">Dumb waster</option>
                <option value="Other">Other</option>
            </select>
        </div>
    </div>
    <h3 class="mt-3">Major Parts & Details</h3>
    <hr>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-secondary">
                <tr>
                    <th>Machine</th>
                    <td class="m-1">
                         <select name="machinedetails[]" id="" class="form-control">
                         <option value="" selected disabled>Select Option</option>
                            <option value="Gear">Gear </option>
                            <option value="Gearless">Gearless </option>
                            <option value="Other">Other </option>
                         </select>
                       <hr>
                       <input type="text" name="machinedetails[]" class="form-control" placeholder="Enter machine detail here">
                       <hr>
                        <br>
                        <div class="row">
                            <div class="col-lg-4">
                            <label for="">HP</label>
                             <input type="text" class="form-control" name="machinedetails[]" >
                            </div>
                            <div class="col-lg-4">
                            <label for="">Encoder</label>
                             <input type="text" class="form-control" name="machinedetails[]">
                            </div>
                            <div class="col-lg-4">
                            <label for="">Groves</label>
                             <input type="number" class="form-control" name="machinedetails[]">
                            </div>
                        </div>
                        <br>
                     
                        <hr>
             
                        <div class="row">
                            <div class="col-lg-6">
                            <input type="radio" name="machinedetails[]" value="Ok" >Ok</button>
                            </div>
                            <div class="col-lg-6">
                            <input type="radio" name="machinedetails[]" value="Not Ok" >Not Ok</button>
                            </div>
                            
                            
                        </div>
                            
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-g-12">
                                <b>Describe Issue - Optional</b>
                                <input type="text" class="form-control" name="machinedetails[]">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Control Panel</th>
                    <td>
                        <select name="controlpaneldetails[]" id="" class="form-control">
                            <option value="" selected disabled>Select Option</option>
                            <option value="Relay Based">Relay Based</option>
                            <option value="PCB Based">PCB Based</option>
                            <option value="Invertor">Invertor</option>
                        </select>
                        <hr>
                        <b>Invertor KW</b>
                        <input type="number" class="form-control w-25" name="controlpaneldetails[]">
                        <hr>
                        <div class="row">
                        <div class="row">
                            <div class="col-lg-6">
                            <input type="radio" name="controlpaneldetails[]" value="Ok">Ok</button>
                            </div>
                            <div class="col-lg-6">
                            <input type="radio" name="controlpaneldetails[]" value="Not Ok">Not Ok</button>
                            </div>
                            
                            
                        </div>
                            
                            
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-g-12">
                                <b>Describe Issue - Optional</b>
                                <input type="text" class="form-control" name="controlpaneldetails[]">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Steel Wire</th>
                    <td>
                        <div class="row">
                            <div class="col-lg-4">
                            <label for="">Ropes Qty</label>
                            <input type="number" class="form-control" name="steelwiredetails[]">
                            </div>
                            <div class="col-lg-4">
                            <label for="">Diameter</label>
                            <input type="number" class="form-control" name="steelwiredetails[]">
                            </div>
                            <div class="col-lg-4">
                            <label for="">Length</label>
                            <input type="number" class="form-control" name="steelwiredetails[]">
                            </div>
                        </div>
                        <hr>
                        <select name="steelwiredetails[]" id="" class="form-control">
                            <option value="" selected disabled>Select Option</option>
                            <option value="1 : 1">1 : 1</option>
                            <option value="2 : 1">2 : 1</option>
                            <option value="3 : 1">3 : 1</option>
                            <option value="4 : 1">4 : 1</option>
                        </select>
                        <hr>
                        <div class="row">
                        <div class="row">
                            <div class="col-lg-6">
                            <input type="radio" name="steelwiredetails[]" value="Ok">Ok</button>
                            </div>
                            <div class="col-lg-6">
                            <input type="radio" name="steelwiredetails[]" value="Not Ok">Not Ok</button>
                            </div>
                            
                            
                        </div>
                            
                            
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-g-12">
                                <b>Describe Issue - Optional</b>
                                <input type="text" class="form-control" name="steelwiredetails[]">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Sheaves</th>
                    <td>
                        <label for="">Sheaves Quantity</label>
                        <input type="number" class="form-control" name="sheavesdetails[]">
                        <hr>
                        <div class="row">
                            <div class="col-lg-6">
                            <input type="radio" name="sheavesdetails[]" value="Ok">Ok</button>
                            </div>
                            <div class="col-lg-6">
                            <input type="radio" name="sheavesdetails[]" value="Not Ok">Not Ok</button>
                            </div>
                            
                            
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-g-12">
                                <b>Describe Issue - Optional</b>
                                <input type="text" class="form-control" name="sheavesdetails[]">
                            </div>
                        </div>
                    </td>
                    
                </tr>
                <tr>
                    <th>Main Guide</th>
                    <td>
                        <select name="mainguidedetails[]" id="" class="form-control">
                            <option value="" selected disabled>Select Option</option>
                            <option value="9 mm">9 mm</option>
                            <option value="10 mm">10 mm</option>
                            <option value="16 mm">16 mm</option>
                        </select>
                        <hr>
                        <div class="row">
                            <div class="col-lg-6">
                            <input type="radio" name="mainguidedetails[]" value="Ok">Ok</button>
                            </div>
                            <div class="col-lg-6">
                            <input type="radio" name="mainguidedetails[]" value="Not Ok">Not Ok</button>
                            </div>
                            
                            
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-g-12">
                                <b>Describe Issue - Optional</b>
                                <input type="text" class="form-control" name="mainguidedetails[]">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>CWT Guide</th>
                    <td>
                    <select name="cwtguidedetails[]" id="" class="form-control">
                            <option value="" selected disabled>Select Option</option>
                            <option value="9 mm">5 mm</option>
                            <option value="10 mm">10 mm</option>
                            <option value="16 mm">16 mm</option>
                        </select>
                        <hr>
                        <div class="row">
                            <div class="col-lg-6">
                            <input type="radio" name="cwtguidedetails[]" value="Ok">Ok</button>
                            </div>
                            <div class="col-lg-6">
                            <input type="radio" name="cwtguidedetails[]" value="Not Ok">Not Ok</button>
                            </div>   
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-g-12">
                                <b>Describe Issue - Optional</b>
                                <input type="text" class="form-control" name="cwtguidedetails[]">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Counter Weight</th>
                    <td>
                    
                        <div class="row">
                            <div class="col-lg-6">
                            <input type="radio" name="counterweightdetails[]" value="Ok">Ok</button>
                            </div>
                            <div class="col-lg-6">
                            <input type="radio" name="counterweightdetails[]" value="Not Ok">Not Ok</button>
                            </div>   
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-g-12">
                                <b>Describe Issue - Optional</b>
                                <input type="text" class="form-control" name="counterweightdetails[]">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Car Cabin</th>
                    <td>
                       <div class="row">
                       <div class="col-lg-6">
                       <select name="carcabindetails[]" id="" class="form-control">
                            <option value="" selected disabled>Select Option</option>
                            <option value="SST">SST</option>
                            <option value="Wood">Wood</option>
                            <option value="Glass">Glass</option>
                            <option value="MS">MS</option>
                            
                        </select>
                       </div>
                       <div class="col-lg-6">
                       <select name="carcabindetails[]" id="" class="form-control">
                            <option value="" selected disabled>Select Opening</option>
                            <option value="Single">Single</option>
                            <option value="Through">Through</option>
                            <option value="Side">Side</option>
                        </select>
                       </div>
                       </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-6">
                            <input type="radio" name="carcabindetails[]" value="Ok">Ok</button>
                            </div>
                            <div class="col-lg-6">
                            <input type="radio" name="carcabindetails[]" value="Not Ok">Not Ok</button>
                            </div>   
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-g-12">
                                <b>Describe Issue - Optional</b>
                                <input type="text" class="form-control" name="carcabindetails[]">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Cabin & CWT Shoe</th>
                    <td>
                    <div class="row">
                            <div class="col-lg-6">
                            <input type="radio" name="cabincwtshoedetails[]" value="Ok">Ok</button>
                            </div>
                            <div class="col-lg-6">
                            <input type="radio" name="cabincwtshoedetails[]" value="Not Ok">Not Ok</button>
                            </div>   
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-g-12">
                                <b>Describe Issue - Optional</b>
                                <input type="text" class="form-control" name="cabincwtshoedetails[]">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Car Door</th>
                    <td>
                        <b>Opening Size</b>
                        <input type="text" name="cardoordetails[]" class="form-control">
                        <hr>
                        <select name="cardoordetails[]" id="" class="form-control">
                            <option value="" selected disabled>Select</option>
                            <option value="SST">SST</option>
                            <option value="Glass">Glass</option>
                            <option value="Available">Available</option>
                        </select>
                        <hr>
                        <div class="row">
                            <div class="col-lg-6">
                            <input type="radio" name="cardoordetails[]" value="Ok">Ok</button>
                            </div>
                            <div class="col-lg-6">
                            <input type="radio" name="cardoordetails[]" value="Not Ok">Not Ok</button>
                            </div>   
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-g-12">
                                <b>Describe Issue - Optional</b>
                                <input type="text" class="form-control" name="cardoordetails[]">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Landing Doors</th>
                    <td>
                        <b>Door Quantity</b>
                        <input type="number" class="form-control" name="landingdoordetails[]">
                        <hr>
                        <select name="landingdoordetails[]" id="" class="form-control">
                            <option value="" selected disabled>Select</option>
                            <option value="Manual">Manual</option>
                            <option value="Auto">Auto</option>
                            <option value="SST">SST</option>
                            <option value="MS">MS</option>
                            <option value="Glass">Glass</option>
                        </select>
                        <hr>
                        <div class="row">
                            <div class="col-lg-6">
                            <input type="radio" name="landingdoordetails[]" value="Ok">Ok</button>
                            </div>
                            <div class="col-lg-6">
                            <input type="radio" name="landingdoordetails[]" value="Not Ok">Not Ok</button>
                            </div>   
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-g-12">
                                <b>Describe Issue - Optional</b>
                                <input type="text" class="form-control" name="landingdoordetails[]">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Door Safety</th>
                    <td>
                        <select name="doorsafetydetails[]" id="" class="form-control">
                            <option value="" selected disabled>Select Safety</option>
                            <option value="Door lock">Door Lock</option>
                            <option value="Door contact">Door Contact</option>
                            <option value="Curtain of light">Curtain of Light</option>
                        </select>
                        <hr>
                        <div class="row">
                            <div class="col-lg-6">
                            <input type="radio" name="doorsafetydetails[]" value="Ok">Ok</button>
                            </div>
                            <div class="col-lg-6">
                            <input type="radio" name="doorsafetydetails[]" value="Not Ok">Not Ok</button>
                            </div>   
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-g-12">
                                <b>Describe Issue - Optional</b>
                                <input type="text" class="form-control" name="doorsafetydetails[]">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>OverSpeed Governor</th>
                    <td>
                    
                        <div class="row">
                            <div class="col-lg-6">
                            <input type="radio" name="speedgovernerdetails[]" value="Ok">Ok</button>
                            </div>
                            <div class="col-lg-6">
                            <input type="radio" name="speedgovernerdetails[]" value="Not Ok">Not Ok</button>
                            </div>   
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-g-12">
                                <b>Describe Issue - Optional</b>
                                <input type="text" class="form-control" name="speedgovernerdetails[]">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Limit Switches</th>
                    <td>
                       <div class="row">
                       <div class="col-lg-6">
                       <b>Switches Quantity</b>
                        <input type="number" class="form-control" name="limitswitchesdetails[]">
                       </div>
                       <div class="col-lg-6">
                       <b>Switch Type</b>
                        <input type="text" class="form-control" name="limitswitchesdetails[]">
                       </div>
                       </div>
                       <hr>
                       <div class="row">
                            <div class="col-lg-6">
                            <input type="radio" name="limitswitchesdetails[]" value="Ok">Ok</button>
                            </div>
                            <div class="col-lg-6">
                            <input type="radio" name="limitswitchesdetails[]" value="Not Ok">Not Ok</button>
                            </div>   
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-g-12">
                                <b>Describe Issue - Optional</b>
                                <input type="text" class="form-control" name="limitswitchesdetails[]">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Buffers</th>
                    <td>
                        <b>Buffers Quantity</b>
                        <input type="number" class="form-control" name="buffersdetails[]">
                        <hr>
                        <b>Hydraulics</b>
                        <select name="buffersdetails[]" id="" class="form-control">
                            <option value="" selected disabled>Select Option</option>
                            <option value="Spring">Spring</option>
                            <option value="Available">Available</option>
                            <option value="Not available">Not Available</option>
                        </select>
                        <hr>
                       <div class="row">
                            <div class="col-lg-6">
                            <input type="radio" name="buffersdetails[]" value="Ok">Ok</button>
                            </div>
                            <div class="col-lg-6">
                            <input type="radio" name="buffersdetails[]" value="Not Ok">Not Ok</button>
                            </div>   
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-g-12">
                                <b>Describe Issue - Optional</b>
                                <input type="text" class="form-control" name="buffersdetails[]">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Intercom Unit</th>
                    <td>
                        <select name="intercomdetails[]" id="" class="form-control">
                            <option value="" selected disabled>Select Option</option>
                            <option value="Cabin">Cabin</option>
                            <option value="MR">MR</option>
                            <option value="G Floor">G Floor</option>
                            <option value="Available">Available</option>
                        </select>
                        <hr>
                       <div class="row">
                            <div class="col-lg-6">
                            <input type="radio" name="intercomdetails[]" value="Ok">Ok</button>
                            </div>
                            <div class="col-lg-6">
                            <input type="radio" name="intercomdetails[]" value="Not Ok">Not Ok</button>
                            </div>   
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-g-12">
                                <b>Describe Issue - Optional</b>
                                <input type="text" class="form-control" name="intercomdetails[]">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Cabin Fans</th>
                    <td>
                        <div class="row">
                            <div class="col-lg-4">
                                <b>Fan Quantity</b>
                                <input type="number" class="form-control" name="fansdetails[]">
                            </div>
                            <div class="col-lg-4">
                            <b>Type of fan</b>
                                <input type="text" class="form-control" name="fansdetails[]">
                            </div>
                            <div class="col-lg-4">
                                <b>Select Option</b>
                                <select name="fansdetails[]" id="" class="form-control">
                                    <option value="Auto">Auto</option>
                                    <option value="Manual">Manual</option>
                                    <option value="Available">Available</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                       <div class="row">
                            <div class="col-lg-6">
                            <input type="radio" name="fansdetails[]" value="Ok">Ok</button>
                            </div>
                            <div class="col-lg-6">
                            <input type="radio" name="fansdetails[]" value="Not Ok">Not Ok</button>
                            </div>   
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-g-12">
                                <b>Describe Issue - Optional</b>
                                <input type="text" class="form-control" name="fansdetails[]">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Cabin Lights</th>
                    <td>
                        <div class="row">
                            <div class="col-lg-4">
                                <b>Lights</b>
                                <br>
                               <select name="cabinlightsdetails[]" id="" class="form-control">
                                <option value="Ok">Ok</option>
                                <option value="Not Ok">Not Ok</option>
                               </select>
                            </div>
                            <div class="col-lg-4">
                            <b>Type of Lights</b>
                                <input type="text" class="form-control" name="cabinlightsdetails[]">
                            </div>
                            <div class="col-lg-4">
                                <b>Select Option</b>
                                <select name="cabinlightsdetails[]" id="" class="form-control">
                                    <option value="Auto">Auto</option>
                                    <option value="Manual">Manual</option>
                                    <option value="Available">Available</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                       <div class="row">
                            <div class="col-lg-6">
                            <input type="radio" name="cabinlightsdetails[]" value="Ok">Ok</button>
                            </div>
                            <div class="col-lg-6">
                            <input type="radio" name="cabinlightsdetails[]" value="Not Ok">Not Ok</button>
                            </div>   
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-g-12">
                                <b>Describe Issue - Optional</b>
                                <input type="text" class="form-control" name="cabinlightsdetails[]">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Landing Call Station</th>
                    <td>
                        <div class="row">
                            <div class="col-lg-6">
                            <b>LCS Qty</b>
                            <input type="number" class="form-control" name="lcsdetails[]">
                            </div>
                            <div class="col-lg-6">
                                <b>Select Option</b>
                                <select name="lcsdetails[]" id="" class="form-control">
                                    <option value="Seven Segment">Seven Segment</option>
                                    <option value="Dot-Matrix">Dot-Matrix</option>
                                    <option value="LCD">LCD</option>
                                    <option value="Round">Round</option>
                                    <option value="Square">Square</option>
                                    <option value="Available">Available</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                       <div class="row">
                            <div class="col-lg-6">
                            <input type="radio" name="lcsdetails[]" value="Ok">Ok</button>
                            </div>
                            <div class="col-lg-6">
                            <input type="radio" name="lcsdetails[]" value="Not Ok">Not Ok</button>
                            </div>   
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-g-12">
                                <b>Describe Issue - Optional</b>
                                <input type="text" class="form-control" name="lcsdetails[]">
                            </div>
                        </div>
           
                    </td>
                </tr>
                <tr>
                    <th>Car Operating Panel</th>
                    <td>
                        <div class="row">
                            <div class="col-lg-6">
                            <b>Buttons Qty</b>
                            <input type="number" class="form-control" name="caroperatingdetails[]">
                            </div>
                            <div class="col-lg-6">
                                <b>Select Option</b>
                                <select name="caroperatingdetails[]" id="" class="form-control">
                                    <option value="Seven Segment">Seven Segment</option>
                                    <option value="Dot-Matrix">Dot-Matrix</option>
                                    <option value="LCD">LCD</option>
                                    <option value="Round">Round</option>
                                    <option value="Square">Square</option>
                                    <option value="Available">Available</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                       <div class="row">
                            <div class="col-lg-6">
                            <input type="radio" name="caroperatingdetails[]" value="Ok">Ok</button>
                            </div>
                            <div class="col-lg-6">
                            <input type="radio" name="caroperatingdetails[]" value="Not Ok">Not Ok</button>
                            </div>   
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-g-12">
                                <b>Describe Issue - Optional</b>
                                <input type="text" class="form-control" name="caroperatingdetails[]">
                            </div>
                        </div>
           
                    </td>
                </tr>
                <tr>
                    <th>Oil Can</th>
                    <td>
                        <div class="row">
                            <div class="col-lg-4">
                                <b>Qty On Cabin</b>
                                <input type="number" class="form-control" name="oilcandetails[]">
                            </div>
                            <div class="col-lg-4">
                            <b>Qty On CWT</b>
                                <input type="number" class="form-control" name="oilcandetails[]">
                            </div>
                            <div class="col-lg-4">
                                <b>Availibility</b>
                                <select name="oilcandetails[]" id="" class="form-control">
                                    <option value="Available">Available</option>
                                    <option value="Not Available">Not Available</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                       <div class="row">
                            <div class="col-lg-6">
                            <input type="radio" name="oilcandetails[]" value="Ok">Ok</button>
                            </div>
                            <div class="col-lg-6">
                            <input type="radio" name="oilcandetails[]" value="Not Ok">Not Ok</button>
                            </div>   
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-g-12">
                                <b>Describe Issue - Optional</b>
                                <input type="text" class="form-control" name="oilcandetails[]">
                            </div>
                        </div>
           

                    </td>

                </tr>
                <tr>
                   <th>
                    Additional Notes
                   </th>
                   <td>
                   <div class="col-lg-12">
                       
                        <textarea name="additionalnotes" required class="form-control" id="" rows="5"></textarea>
                    </div>
                   </td>
                </tr>
                <tr>
                    <td colspan="2">
                    <button type="submit" class="btn btn-primary w-100">Submit Survey Report</button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    </div>
</form>
</div>
@endsection