
<style>
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
        .lettercontent{
            background-color:white
        }
        table{
            margin-left:10px;
            margin-right:10px;
        }
        tr,td,th{
            padding:10px;
            border:1px solid black;
            margin:10px;
            text-align:center
        }
</style>
<div class="row">
    <div class="col-lg-8">
    <h3>Quotation Overview</h3>
    </div>
    <div class="col-lg-4">
        <button class="w-100 btn btn-primary">Download as PDF</button>
    </div>
</div>
<hr>
<div class="letterheader"></div>
@foreach($data as $d)
<div class="lettercontent">
    <h2 style="text-align:center;text-decoration:underline">QUOTATION</h2>
    <br>
    <h4 style="text-align:center">{{$d->elevator_type}}</h4>
    <br>
    <p style="text-align:center">{{$d->elevator_detail}}</p>
    <hr>
    <table style="border:1px solid:black;width:100%">
        <tr style="text-align:center;">
            <th>Client Details</th>
            <th>Vendor Details</th>
        </tr>
        <tr>
            <td>
                {{$d->client_address}}
            </td>
            <td>
                <b>S.S. Electronics and Elevators</b>
                <br>
                <p>Office 614, 6th Floor Zahra Square SR/2C OPP : New Memon Masjid. Karachi</p>
                <br>
                <b>Email</b>
                <br>
                sselevators902@yahoo.com
            </td>
        </tr>
    </table>
    <br>
    <h3 style="text-align:center;text-decoration:underline">Document Title</h3>
    <br>
    <p style="text-align:center"><b>" {{$d->elevator_doc_title}} "</b></p>
    <hr>
    <p style="margin-left:10px"><b>Report No : </b>{{$d->quotation_no}}</p>
    <p style="margin-left:10px"><b>Report Sent On : </b>{{$d->created_at->format('d-m-Y')}}</p>
    <p style="margin-left:10px">This is to confirm , that this document was viewed and approved by </p>
     <p style="margin-left:10px"> <b>Asad uddin Qureshi</b></p>
    <div class="stamp"></div>
</div>

@endforeach
<div class="letterfooter"></div>
