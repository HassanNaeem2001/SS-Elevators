
    <style>
        .wrapper{
            page-break-after: always;
            
            
        }
        body{
            margin:0px;
            padding:0px;
            box-sizing:border-box;
        }
       p{
        font-size:14px
       }
        
       
        .boldtext{
            font-weight:bold;
        }
        .row{
            margin:5px
        }
        .stamp{
            height:100px;
            width:100px;
            background-image:url('{{asset('images/clients/stampic2.png')}}');
            background-size:100% 100%;
            background-position:center;
            margin-left:10px;
           
        }
        .letterheader{
            height:200px;
            background-image:url('{{asset('images/clients/letterheader.jpeg')}}');
            background-size:100% 100%;
            background-position:center;
            
        }
        .letterfooter{
            height:130px;
            background-image:url('{{asset('images/clients/letterfooter.jpeg')}}');
            background-size:100% 100%;
            background-position:center;
         
          
        }
        td{
            border:1px solid black;
            padding:10px
        }
        .content{
            margin:20px;
           
        }
        
    </style>
 <div class="letterheader"></div>
  
    @foreach($rec as $r)
    <div class="content">
        <center>
            <h2>Monthly Maintenance Invoice For The Month Of</h2>
           <b>{{ \Carbon\Carbon::parse($r->date)->format('F Y') }}</b>
        </center>
        <hr>
        <b>Dear Sir / Madam,</b>
        <hr>
        <p>We the team of S.S. Electronics and Elevators submit here-under our monthly maintenance bill for your <b>{{$r->elevator_no}}</b> Elevators installed at <b>{{$r->client_name}}</b> under our observation</p>
        <br>
        <p>Mentioned below are the charges for your services : </p>
        <hr>
        <p><b>Monthly Maintenance Charges For Each Lift</b> : {{$r->elevator_cost_ind}} <b>PKR</b> / Per Lift</p>
        <hr>
        <p><b>No of Elevators Installed </b> : {{$r->elevator_no}}</p>
        <hr>
        <p><b>Total Amount </b> : {{$r->total}} <b>PKR</b> </p>
        <br>
        <p>This document was approved by</p>
        <hr>
        <p>Asad Uddin Qureshi</p>
        <p>C.E.O</p>
        <p>S.S. Electronics and Elevators</p>
        <div class="stamp">

        </div>
        <br>
        <div class="letterfooter"></div>
    @endforeach
   
  </div>
  