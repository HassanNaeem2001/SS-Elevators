
<style>
    /* Example CSS for styling */
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        color: #333;
    }

    .container {
        max-width:800px;
        margin: 0px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
    }

    .section {
        margin-bottom: 30px;
    }

    .section-header {
        font-size: 1.2rem;
        font-weight: bold;
        color: #333;
        border-bottom: 2px solid red;
        padding-bottom: 5px;
        margin-bottom: 10px;
    }
    .letterheader{
            height:170px;
            background-image:url('{{asset('images/clients/letterheader.jpeg')}}');
            background-size:100% 100%;
            background-position:center;
            margin:auto
        }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .table th, .table td {
        
        text-align: left;
        vertical-align: top;
        border-bottom: 1px solid #ddd;
    }

    .table th {
        background-color: black;
    
        color: #fff;
    }

    .table tbody tr:hover {
        background-color: #f5f5f5;
    }
    tr,td,th{
        border:1px solid black;
        padding:3px;
    }
    .text-center {
        text-align: center;
    }

    .btn {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        text-transform: uppercase;
    }

    .btn:hover {
        background-color: #0056b3;
    }

    .stamp {
        height: 100px;
        width: 100px;
        background-image: url('{{ asset('images/clients/stampic2.png') }}');
        background-size: 100% 100%;
        background-position: center;
        margin-left: 10px;
    }

    .cover-page {
        text-align: center;
        margin-bottom: 30px;
    }

    .cover-page h1 {
        font-size: 2rem;
        color: black;
        margin-bottom: 10px;
    }

    .cover-page p {
        margin: 0;
    }

    .note {
        margin-top: 30px;
    }

    .note ol {
        padding-left: 20px;
    }

    .signature {
        margin-top: 20px;
    }

    .signature b {
        display: block;
        margin-top: 10px;
    }
    .page-break {
    page-break-after: always;
}
   
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.2/html2pdf.bundle.min.js" integrity="sha512-MpDFIChbcXl2QgipQrt1VcPHMldRILetapBl5MPCA9Y8r7qvlwx1/Mc9hNTzY+kS5kX6PdoDq41ws1HiVNLdZA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<center>
<button onclick="printinpdf()" class="btn">Download as PDF</button>
<br>
<br><br>
</center>
<div id="divToPrint">
<div class="container">
    
    <div class="letterheader"></div>
   @if($rec->isEmpty())

   @else
   @foreach ($rec as $report)
    <center>
    <table style="width:600px;margin:0 auto">
        <tr style="border:none">
            <td style="border:none"><p><b>From : </b><u>S.S. Elevators and Electronics</u></p></td>
            <td style="border:none"><p><b>Elevator Type : </b><u>{{$report->elevatortype}}</u></p></td>
        </tr>
        <tr style="border:none">
            <td style="border:none"><p><b>Project Name : </b><u>{{$report->projectname}}</u></p></td>
            <td style="border:none"><p><b>Unit No : </b><u>{{$report->unitno}}</u></p></td>
        </tr>
    </table>
    <hr>

        <p>Maintenance Report for the Month of <b>{{ \Carbon\Carbon::parse($report->created_at)->format('F Y') }}</b></p>
    
    <br>
</center>
    <table style="width:95%">
        <tr>
            <th>Description</th>
            <th>Status</th>
            <th>Comments</th>
        </tr>
        <tr>
            <td>Main Guide Cleaning and Lubricate</td>
            <td>{{explode(', ',$report->mainguide)[0]}}</td>
            <td>{{explode(', ',$report->mainguide)[1]}}</td>
        </tr>
        <tr>
            <td>Counter Weight Cleaning and Lubricate</td>
            <td>{{explode(', ',$report->counterweight)[0]}}</td>
            <td>{{explode(', ',$report->counterweight)[1]}}</td>
        </tr>
        <tr>
            <td>Oil Cup Level Check</td>
            <td>{{explode(', ',$report->oilcup)[0]}}</td>
            <td>{{explode(', ',$report->oilcup)[1]}}</td>
        </tr>
    
        <tr>
        <td>Landing Door Roller Check</td>
            <td>{{explode(', ',$report->landingdoor)[0]}}</td>
            <td>{{explode(', ',$report->landingdoor)[1]}}</td>
        </tr>
        <tr>
            <td>Landing Door Catcher Roller Check</td>
            <td>{{explode(', ',$report->landingdoorroller)[0]}}</td>
            <td>{{explode(', ',$report->landingdoorroller)[1]}}</td>
        </tr>
        <tr>
            <td>Landing Door Tracks Check</td>
            <td>{{explode(', ',$report->landingdoortracks)[0]}}</td>
            <td>{{explode(', ',$report->landingdoortracks)[1]}}</td>
        </tr>
        <tr>
            <td>Landing Door Spring Check</td>
            <td>{{explode(', ',$report->landingdoorspring)[0]}}</td>
            <td>{{explode(', ',$report->landingdoorspring)[1]}}</td>
        </tr>
        <tr>
        <td>Landing Door Weight Check</td>
            <td>{{explode(', ',$report->landingdoorweight)[0]}}</td>
            <td>{{explode(', ',$report->landingdoorweight)[1]}}</td>
        </tr>
        <tr>
            <td>Landing Door Contact Check</td>
            <td>{{explode(', ',$report->landingdoorcontact)[0]}}</td>
            <td>{{explode(', ',$report->landingdoorcontact)[1]}}</td>
        </tr>
        <tr>
            <td>Landing Door Cam Roller Check</td>
            <td>{{explode(', ',$report->landingdoorcamroller)[0]}}</td>
            <td>{{explode(', ',$report->landingdoorcamroller)[1]}}</td>
        </tr>
        <tr>
            <td>Cabin Door Roller Check</td>
            <td>{{explode(', ',$report->cabindoorroller)[0]}}</td>
            <td>{{explode(', ',$report->cabindoorroller)[1]}}</td>
        </tr>
        <tr>
            <td>Cabin Door Catcher Roller Check</td>
            <td>{{explode(', ',$report->cabindoorcatcher)[0]}}</td>
            <td>{{explode(', ',$report->cabindoorcatcher)[1]}}</td>
        </tr>
        <tr>
            <td>Cabin Door Chain Check</td>
            <td>{{explode(', ',$report->cabindoorchain)[0]}}</td>
            <td>{{explode(', ',$report->cabindoorchain)[1]}}</td>
        </tr>
        <tr>
            <td>Door sills Check</td>
            <td>{{explode(', ',$report->doorsills)[0]}}</td>
            <td>{{explode(', ',$report->doorsills)[1]}}</td>
        </tr>
        <tr>
            <td>Main Motor Pulley Check</td>
            <td>{{explode(', ',$report->mainmotorpulley)[0]}}</td>
            <td>{{explode(', ',$report->mainmotorpulley)[1]}}</td>
        </tr>
        <tr>
            <td>Main Motor Oil Check</td>
            <td>{{explode(', ',$report->mainmotoroil)[0]}}</td>
            <td>{{explode(', ',$report->mainmotoroil)[1]}}</td>
        </tr>
        <tr>
            <td>Main Motor Seal Check</td>
            <td>{{explode(', ',$report->mainmotorseal)[0]}}</td>
            <td>{{explode(', ',$report->mainmotorseal)[1]}}</td>
        </tr>
        <tr>
            <td>Shaft Limit Switches Check (Up & Down)</td>
            <td>{{explode(', ',$report->shaftlimitswitches)[0]}}</td>
            <td>{{explode(', ',$report->shaftlimitswitches)[1]}}</td>
        </tr>
        <tr>
            <td>Pit Switch Safety Check</td>
            <td>{{explode(', ',$report->pitswitchsafety)[0]}}</td>
            <td>{{explode(', ',$report->pitswitchsafety)[1]}}</td>
        </tr>
        <tr>
            <td>Pit Spring Check</td>
            <td>{{explode(', ',$report->pitspring)[0]}}</td>
            <td>{{explode(', ',$report->pitspring)[1]}}</td>
        </tr>
        <tr>
            <td>Emergency Light Check</td>
            <td>{{explode(', ',$report->emergencylight)[0]}}</td>
            <td>{{explode(', ',$report->emergencylight)[1]}}</td>
        </tr>
        <tr>
            <td>Intercom Check</td>
            <td>{{explode(', ',$report->intercom)[0]}}</td>
            <td>{{explode(', ',$report->intercom)[1]}}</td>
        </tr>
        <tr>
            <td>Call Push Button Check (Inside & Outside)</td>
            <td>{{explode(', ',$report->callpush)[0]}}</td>
            <td>{{explode(', ',$report->callpush)[1]}}</td>
        </tr>
        <tr>
            <td>All Displays Check (Inside & Outside)</td>
            <td>{{explode(', ',$report->displaycheck)[0]}}</td>
            <td>{{explode(', ',$report->displaycheck)[1]}}</td>
        </tr>
        <tr>
            <td>Main Guide Shoes Check</td>
            <td>{{explode(', ',$report->mainguideshoes)[0]}}</td>
            <td>{{explode(', ',$report->mainguideshoes)[1]}}</td>
        </tr>
       
    <tr style="border:none">
   <td colspan="3" style="border:none">
   <div class="page-break"></div>
   </td>
    </tr>
    <tr style="border:none">
        <td colspan="3" style="height:50px;border:none" ></td>
    </tr>
        
        <tr>
            
            <td>Counter Weight Guide Shoes Check</td>
            <td>{{explode(', ',$report->counterweightguideshoes)[0]}}</td>
            <td>{{explode(', ',$report->counterweightguideshoes)[1]}}</td>
        </tr>
        
        <tr>
            <td>Landing Door Shoes Check</td>
            <td>{{explode(', ',$report->landingdoorshoes)[0]}}</td>
            <td>{{explode(', ',$report->landingdoorshoes)[1]}}</td>
        </tr>
        <tr>
            <td>Cabin Door Shoes Check</td>
            <td>{{explode(', ',$report->cabindoorshoes)[0]}}</td>
            <td>{{explode(', ',$report->cabindoorshoes)[1]}}</td>
        </tr>
        <tr>
            <td>Main Steel Wire Rope 12 MM Check</td>
            <td>{{explode(', ',$report->mainsteelwire)[0]}}</td>
            <td>{{explode(', ',$report->mainsteelwire)[1]}}</td>
        </tr>
        <tr>
            <td>Speed Governor Wire Rope 8MM Check</td>
            <td>{{explode(', ',$report->speedgovernorwire)[0]}}</td>
            <td>{{explode(', ',$report->speedgovernorwire)[1]}}</td>
        </tr>
    
        
    </table>
    
    <br>
    <b>Additional Details</b>
    <hr>
    <table style="width:95%">
    <tr >
            <td colspan="3">Parts Replaced</td>
            
        </tr>
        <tr>
            @if($report->partsreplaced)
            <td colspan="3" rowspan="3">{{$report->partsreplaced}}</td>
            @else
            <td colspan="3"><b>None</b></td>
            @endif
        </tr>
    </table>
    <br>
    <table style="width:95%;text-align:center">
    <tr style="height:70px">
        <td >
            <b>S.S. Electronics Elevators</b>
            <br>
            <b>CONTRACTOR</b>
        </td>
        <td>
            
            <b>CUSTOMER / REPRESENTATIVE</b>
        </td>
    </tr>
  

    </table>
    </center>
    @endforeach
   @endif
    </div>
</div>
</div>
<script>
    function printinpdf(){
        var div = document.getElementById('divToPrint')
        html2pdf().from(div).save();
        
    }
</script>