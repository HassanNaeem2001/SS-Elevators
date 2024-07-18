@extends('adminlayout.layout.header_footer')
@section('content')
<h3>Maintenance Sheet </h3>
<hr>
@if(@session('success'))
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
    <strong>Alert </strong><span>{{session('success')}}</span>
</div>

<script>
    var alertList = document.querySelectorAll(".alert");
    alertList.forEach(function (alert) {
        new bootstrap.Alert(alert);
    });
</script>

@endif
<form action="insert_maintenance" method="post">

    @csrf
   <div class="row">
    <div class="col-lg-6 mt-2">
        <b>Project Name </b>
    <input type="text" class="form-control" name="projectname" placeholder="Enter Project Name">
    </div>
    <div class="col-lg-6 mt-2">
        <b>Select Lift Type</b>
    <select name="elevatortype" id="" class="form-control">
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
   <div class="row">
    <div class="col-lg-6 mt-2">
        <b>Enter Unit No</b>
        <input type="number" name="unitno" placeholder="Enter unit no" class="form-control">
    </div>
    <div class="col-lg-6 mt-2">
        <b>Inspected By</b>
        <input type="text" value="{{session('admin')}}" class="form-control" readonly>
    </div>
   </div>
    <br>
    <b>Details</b>
    <hr>
    <div class="row">
        <div class="col-lg-5 mt-2">
            Main Guide Cleaning and Lubricate
        </div>
        <div class="col-lg-2 mt-2">
            <select name="mainguide[]" id="" class="form-control">
                <option value="Ok">Ok</option>
                <option value="Not Ok">Not</option>
            </select>
        </div>
        <div class="col-lg-5 mt-2">
            <input type="text" name="mainguide[]" placeholder="Enter comments" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 mt-2">
            Counter Weight Cleaning and Lubricate
        </div>
        <div class="col-lg-2 mt-2">
            <select name="counterweight[]" id="" class="form-control">
                <option value="Ok">Ok</option>
                <option value="Not Ok">Not</option>
            </select>
        </div>
        <div class="col-lg-5 mt-2">
            <input type="text" placeholder="Enter comments" name="counterweight[]" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 mt-2">
            Oil Cup Level Check
        </div>
        <div class="col-lg-2 mt-2">
            <select name="oilcup[]" id="" class="form-control">
                <option value="Ok">Ok</option>
                <option value="Not Ok">Not</option>
            </select>
        </div>
        <div class="col-lg-5 mt-2">
            <input type="text" placeholder="Enter comments" name="oilcup[]" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 mt-2">
            Landing Door Roller Check
        </div>
        <div class="col-lg-2 mt-2">
            <select name="landingdoor[]" id="" class="form-control">
                <option value="Ok">Ok</option>
                <option value="Not Ok">Not</option>
            </select>
        </div>
        <div class="col-lg-5 mt-2">
            <input type="text" placeholder="Enter comments" name="landingdoor[]" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 mt-2">
           Landing Door Catcher Roller Check
        </div>
        <div class="col-lg-2 mt-2">
            <select name="landingdoorroller[]" id="" class="form-control">
                <option value="Ok">Ok</option>
                <option value="Not Ok">Not</option>
            </select>
        </div>
        <div class="col-lg-5 mt-2">
            <input type="text" placeholder="Enter comments" name="landingdoorroller[]" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 mt-2">
           Landing Door Tracks Check
        </div>
        <div class="col-lg-2 mt-2">
            <select name="landingdoortracks[]" id="" class="form-control">
                <option value="Ok">Ok</option>
                <option value="Not Ok">Not</option>
            </select>
        </div>
        <div class="col-lg-5 mt-2">
            <input type="text" placeholder="Enter comments" name="landingdoortracks[]" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 mt-2">
          Landing Door Spring Check
        </div>
        <div class="col-lg-2 mt-2">
            <select name="landingdoorspring[]" id="" class="form-control">
                <option value="Ok">Ok</option>
                <option value="Not Ok">Not</option>
            </select>
        </div>
        <div class="col-lg-5 mt-2">
            <input type="text" placeholder="Enter comments" name="landingdoorspring[]" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 mt-2">
            Landing Door Weight Check
        </div>
        <div class="col-lg-2 mt-2">
            <select name="landingdoorweight[]" id="" class="form-control">
                <option value="Ok">Ok</option>
                <option value="Not Ok">Not</option>
            </select>
        </div>
        <div class="col-lg-5 mt-2">
            <input type="text" placeholder="Enter comments" name="landingdoorweight[]" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 mt-2">
          Landing Door Contact Check
        </div>
        <div class="col-lg-2 mt-2">
            <select name="landingdoorcontact[]" id="" class="form-control">
                <option value="Ok">Ok</option>
                <option value="Not Ok">Not</option>
            </select>
        </div>
        <div class="col-lg-5 mt-2">
            <input type="text" placeholder="Enter comments" name="landingdoorcontact[]" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 mt-2">
            Landing Door Cam Roller Check
        </div>
        <div class="col-lg-2 mt-2">
            <select name="landingdoorcamroller[]" id="" class="form-control">
                <option value="Ok">Ok</option>
                <option value="Not Ok">Not</option>
            </select>
        </div>
        <div class="col-lg-5 mt-2">
            <input type="text" placeholder="Enter comments" name="landingdoorcamroller[]" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 mt-2">
           Cabin Door Roller Check
        </div>
        <div class="col-lg-2 mt-2">
            <select name="cabindoorroller[]" id="" class="form-control">
                <option value="Ok">Ok</option>
                <option value="Not Ok">Not</option>
            </select>
        </div>
        <div class="col-lg-5 mt-2">
            <input type="text" placeholder="Enter comments" name="cabindoorroller[]" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 mt-2">
          Cabin Door Catcher Roller Check
        </div>
        <div class="col-lg-2 mt-2">
            <select name="cabindoorcatcher[]" id="" class="form-control">
                <option value="Ok">Ok</option>
                <option value="Not Ok">Not</option>
            </select>
        </div>
        <div class="col-lg-5 mt-2">
            <input type="text" placeholder="Enter comments" name="cabindoorcatcher[]" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 mt-2">
           Cabin Door Chain Check
        </div>
        <div class="col-lg-2 mt-2">
            <select name="cabindoorchain[]" id="" class="form-control">
                <option value="Ok">Ok</option>
                <option value="Not Ok">Not</option>
            </select>
        </div>
        <div class="col-lg-5 mt-2">
            <input type="text" placeholder="Enter comments" name="cabindoorchain[]" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 mt-2">
           Door sills Check
        </div>
        <div class="col-lg-2 mt-2">
            <select name="doorsills[]" id="" class="form-control">
                <option value="Ok">Ok</option>
                <option value="Not Ok">Not</option>
            </select>
        </div>
        <div class="col-lg-5 mt-2">
            <input type="text" placeholder="Enter comments" name="doorsills[]" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 mt-2">
            Main Motor Pulley Check
        </div>
        <div class="col-lg-2 mt-2">
            <select name="mainmotorpulley[]" id="" class="form-control">
                <option value="Ok">Ok</option>
                <option value="Not Ok">Not</option>
            </select>
        </div>
        <div class="col-lg-5 mt-2">
            <input type="text" placeholder="Enter comments" name="mainmotorpulley[]" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 mt-2">
            Main Motor Oil Check
        </div>
        <div class="col-lg-2 mt-2">
            <select name="mainmotoroil[]" id="" class="form-control">
                <option value="Ok">Ok</option>
                <option value="Not Ok">Not</option>
            </select>
        </div>
        <div class="col-lg-5 mt-2">
            <input type="text" placeholder="Enter comments" name="mainmotoroil[]" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 mt-2">
            Main Motor Seal Check
        </div>
        <div class="col-lg-2 mt-2">
            <select name="mainmotorseal[]" id="" class="form-control">
                <option value="Ok">Ok</option>
                <option value="Not Ok">Not</option>
            </select>
        </div>
        <div class="col-lg-5 mt-2">
            <input type="text" placeholder="Enter comments" name="mainmotorseal[]" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 mt-2">
            Shaft Limit Switches Check (Up & Down)
        </div>
        <div class="col-lg-2 mt-2">
            <select name="shaftlimitswitches[]" id="" class="form-control">
                <option value="Ok">Ok</option>
                <option value="Not Ok">Not</option>
            </select>
        </div>
        <div class="col-lg-5 mt-2">
            <input type="text" placeholder="Enter comments" name="shaftlimitswitches[]" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 mt-2">
            Pit Switch Safety Check
        </div>
        <div class="col-lg-2 mt-2">
            <select name="pitswitchsafety[]" id="" class="form-control">
                <option value="Ok">Ok</option>
                <option value="Not Ok">Not</option>
            </select>
        </div>
        <div class="col-lg-5 mt-2">
            <input type="text" placeholder="Enter comments" name="pitswitchsafety[]" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 mt-2">
            Pit Spring Check
        </div>
        <div class="col-lg-2 mt-2">
            <select name="pitspring[]" id="" class="form-control">
                <option value="Ok">Ok</option>
                <option value="Not Ok">Not</option>
            </select>
        </div>
        <div class="col-lg-5 mt-2">
            <input type="text" placeholder="Enter comments" name="pitspring[]" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 mt-2">
        Emergency Light Check
        </div>
        <div class="col-lg-2 mt-2">
            <select name="emergencylight[]" id="" class="form-control">
                <option value="Ok">Ok</option>
                <option value="Not Ok">Not</option>
            </select>
        </div>
        <div class="col-lg-5 mt-2">
            <input type="text" placeholder="Enter comments" name="emergencylight[]" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 mt-2">
        Intercom Check
        </div>
        <div class="col-lg-2 mt-2">
            <select name="intercom[]" id="" class="form-control">
                <option value="Ok">Ok</option>
                <option value="Not Ok">Not</option>
            </select>
        </div>
        <div class="col-lg-5 mt-2">
            <input type="text" placeholder="Enter comments" name="intercom[]" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 mt-2">
        Call Push Button Check (Inside & Outside)
        </div>
        <div class="col-lg-2 mt-2">
            <select name="callpush[]" id="" class="form-control">
                <option value="Ok">Ok</option>
                <option value="Not Ok">Not</option>
            </select>
        </div>
        <div class="col-lg-5 mt-2">
            <input type="text" placeholder="Enter comments" name="callpush[]" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 mt-2">
        All Displays Check (Inside & Outside)
        </div>
        <div class="col-lg-2 mt-2">
            <select name="displaycheck[]" id="" class="form-control">
                <option value="Ok">Ok</option>
                <option value="Not Ok">Not</option>
            </select>
        </div>
        <div class="col-lg-5 mt-2">
            <input type="text" placeholder="Enter comments" name="displaycheck[]" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 mt-2">
        Main Guide Shoes Check
        </div>
        <div class="col-lg-2 mt-2">
            <select name="mainguideshoes[]" id="" class="form-control">
                <option value="Ok">Ok</option>
                <option value="Not Ok">Not</option>
            </select>
        </div>
        <div class="col-lg-5 mt-2">
            <input type="text" placeholder="Enter comments" name="mainguideshoes[]" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 mt-2">
        Counter Weight Guide Shoes Check
        </div>
        <div class="col-lg-2 mt-2">
            <select name="counterweightguideshoes[]" id="" class="form-control">
                <option value="Ok">Ok</option>
                <option value="Not Ok">Not</option>
            </select>
        </div>
        <div class="col-lg-5 mt-2">
            <input type="text" placeholder="Enter comments" name="counterweightguideshoes[]" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 mt-2">
       Landing Door Shoes Check
        </div>
        <div class="col-lg-2 mt-2">
            <select name="landingdoorshoes[]" id="" class="form-control">
                <option value="Ok">Ok</option>
                <option value="Not Ok">Not</option>
            </select>
        </div>
        <div class="col-lg-5 mt-2">
            <input type="text" placeholder="Enter comments" name="landingdoorshoes[]" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 mt-2">
        Cabin Door Shoes Check
        </div>
        <div class="col-lg-2 mt-2">
            <select name="cabindoorshoes[]" id="" class="form-control">
                <option value="Ok">Ok</option>
                <option value="Not Ok">Not</option>
            </select>
        </div>
        <div class="col-lg-5 mt-2">
            <input type="text" placeholder="Enter comments" name="cabindoorshoes[]" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 mt-2">
        Main Steel Wire Rope 12 MM Check
        </div>
        <div class="col-lg-2 mt-2">
            <select name="mainsteelwire[]" id="" class="form-control">
                <option value="Ok">Ok</option>
                <option value="Not Ok">Not</option>
            </select>
        </div>
        <div class="col-lg-5 mt-2">
            <input type="text" placeholder="Enter comments" name="mainsteelwire[]" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 mt-2">
      Speed Governor Wire Rope 8MM Check
        </div>
        <div class="col-lg-2 mt-2">
            <select name="speedgovernorwire[]" id="" class="form-control">
                <option value="Ok">Ok</option>
                <option value="Not Ok">Not</option>
            </select>
        </div>
        <div class="col-lg-5 mt-2">
            <input type="text" placeholder="Enter comments" name="speedgovernorwire[]" class="form-control">
        </div>
    </div>
    <hr>
    <b>Parts Replaced : <span style="color:green">If any</span></b>
    <br>
    <textarea name="partsreplaced" id="" class="form-control"></textarea>
    <br>

    <button type="submit" class="btn btn-primary w-100">Submit Report</button>
</form>
@endsection