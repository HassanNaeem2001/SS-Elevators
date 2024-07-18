@extends('adminlayout.layout.header_footer')
@section('content')
<h3>Add Quotation</h3>
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
    <strong>Success</strong><span>{{session('success')}}</span>
</div>

<script>
    var alertList = document.querySelectorAll(".alert");
    alertList.forEach(function (alert) {
        new bootstrap.Alert(alert);
    });
</script>

@endif
<form action="insertquotation" method="post">
    @csrf
   <div class="row ">
    <div class="col-lg-6 mt-2">
    <b>Enter Client Name</b>
    <input type="text" class="form-control" name="clientname" required>
    </div>
    <div class="col-lg-6 mt-2">
    <b>Enter Client Address</b>
    <input type="text" class="form-control" name="clientaddress" required>
    </div>
   </div>
   <div class="row">
    <div class="col-lg-6 mt-2">
        <b>Quotation for</b>
        <select name="type" id="" class="form-control" required>
            <option value="Semi-Imported">Semi-Imported</option>
            <option value="Imported">Imported</option>
            <option value="Local">Local</option>
        </select>
    </div>
    <div class="col-lg-6 mt-2">
        <b>Detail of Quotation</b>
        <input type="text" class="form-control" name="detail" required>
    </div>
   </div>
   <div class="row">
    <div class="col-lg-6 mt-2">
        <b>Document Title</b>
        <input type="text" class="form-control" name="doctitle" required>
    </div>
   </div>
   <div class="row">
    <div class="col-lg-4 mt-2">
        <b>No Of Electrical Material <span style="color:green"> - Optional</span></b>
        <input type="number" class="form-control" id="elecinp">
    </div>
    <div class="col-lg-4 mt-2">
    <b>No Of Mechanical Material <span style="color:green"> - Optional</span></b>
    <input type="number" class="form-control" id="mechinp">
    </div>
    <div class="col-lg-4 mt-2">
      
        <button type="button" class="btn btn-primary w-100 mt-4" onclick="gen()">Generate Fields</button>
    </div>
   </div>
   <br>
   <b>Electrical Material Details</b>
   <div class="row">
    <div class="col-4" id="elecappend"></div>
    <div class="col-4" id="elecno"></div>
    <div class="col-4" id="elecprice"></div>
   </div>
   <hr>
   <b>Mechanical Material Details</b>
   <div class="row">
    <div class="col-4" id="mechappend"></div>
    <div class="col-4" id="mechno"></div>
    <div class="col-4" id="mechprice"></div>
   </div>
   <hr>
   <b>Elevator Structure <span style="color:green"> - Optional</span></b>
   <div class="row">
    <div class="col-6">
    <input type="number" name="totalstructure" class="form-control elevno" placeholder="Total no of material">

    </div>
    <div class="col-6">
        <button type="button" class="btn btn-primary" onclick="genstructuredetails()">Generate Fields</button>
    </div>
    <br>
    <br>
    <hr>
    <div class="row">
        <div class="col-lg-4" id="structuredetail"></div>
        <div class="col-lg-4" id="structurequantity"></div>
        <div class="col-lg-4" id="structureprice"></div>
    </div>

    <div class="row">
        <div class="col-lg-3">
        <b>Delivery Time</b>
        <input type="number" name="deliverytime" class="form-control" required>
        </div>
        <div class="col-lg-3">
            <b>Mode</b>
            <select name="deliverylist" id="" class="form-control" required>
                <option value="Days">Days</option>
                <option value="Weeks">Weeks</option>
                <option value="Months">Months</option>
                <option value="Years">Years</option>
            </select>
        </div>
        <div class="col-lg-3">
        <b>Completion Time</b>
        <input type="number" name="completiontime" class="form-control" required>
        </div>
        <div class="col-lg-3">
            <b>Mode</b>
            <select name="completionlist" id="" class="form-control" required>
                <option value="Days">Days</option>
                <option value="Weeks">Weeks</option>
                <option value="Months">Months</option>
                <option value="Years">Years</option>
            </select>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-lg-6">
        <b>Installation Charges</b>
        <input type="number" class="form-control" name="installation_charges">
    </div>
    <div class="col-lg-6">
        <b>Tax Percentage <span style="color:green">- Optional</span></b>
        <input type="number" class="form-control" name="tax_percentage" value="0">
    </div>
</div>
<hr>

<br>

<button type="submit" class="w-100 btn btn-primary">Generate Quotation</button>
</form>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
    function gen(){
       var electrical = $('#elecinp').val();
      var mechanical = $('#mechinp').val();
      var electricaldiv = document.getElementById('elecappend')
      var electricno = document.getElementById('elecno')
      var electricprice = document.getElementById('elecprice')
      var mechanicaldiv = document.getElementById('mechappend')
      var mechanicalno = document.getElementById('mechno')
      var mechanicalprice = document.getElementById('mechprice')
      for(var i = 1 ; i <= electrical ; i++){
        var ine = document.createElement('input');
        var eno = document.createElement('input');
        var eprice = document.createElement('input');
        var br = document.createElement('br');
        ine.placeholder="Enter Electrical Instrument No "+i
        ine.className="form-control"
        ine.required=true
        ine.name="elecinstrument[]"
        eno.placeholder="Enter Quantity here "
        eno.className="form-control"
        eno.required=true
        eno.name="elecquantity[]"
        eprice.placeholder="Enter Price here "
        eprice.className="form-control"
        eprice.required=true
        eprice.name="elecprice[]"
        electricaldiv.append(ine)
        electricno.append(eno)
        electricprice.append(eprice)
        
        }
        for(var j = 1 ; j <= mechanical ; j++)
        {
        var inm = document.createElement('input');
        var mno = document.createElement('input');
        var mprice = document.createElement('input');
        var br = document.createElement('br');
        inm.placeholder="Enter Mechancal Instrument No "+j
        inm.className="form-control"
        inm.required=true
        inm.name="mechinstrument[]"
        mno.placeholder="Enter Quantity here "
        mno.className="form-control"
        mno.required=true
        mno.name="mechquantity[]"
        mprice.placeholder="Enter Price here "
        mprice.className="form-control"
        mprice.required=true
        mprice.name="mechprice[]"
        mechanicaldiv.append(inm)
        mechanicalno.append(mno)
        mechanicalprice.append(mprice)
        }
    }
    function genstructuredetails(){
        var elevatorstructure = $('.elevno').val();
        var d1 = document.getElementById('structuredetail');
        var d2 = document.getElementById('structurequantity');
        var d3 = document.getElementById('structureprice');
        
        for(var i = 1 ; i <= elevatorstructure; i++){
           var inputdesc = document.createElement('input');
           var inputno = document.createElement('input');
           var inputprice = document.createElement('input');
           inputdesc.required = true;
           inputdesc.className="form-control"
           inputdesc.name="elevator_s_details[]"
           inputdesc.placeholder="Enter Description"
           inputno.required = true;
           inputno.className="form-control"
           inputno.name="elevator_s_quantity[]"
           inputprice.placeholder="Enter Price"
           inputprice.required = true;
           inputprice.className="form-control"
           inputprice.name="elevator_s_price[]"
           inputprice.placeholder="Enter Price"
           inputprice.type="number";
           d1.append(inputdesc)
           d2.append(inputno)
           d3.append(inputprice)


        }
    }
</script>
@endsection