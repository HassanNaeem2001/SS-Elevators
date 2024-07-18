@extends('adminlayout.layout.header_footer')
@section('content')
<style>
    .wrapper{
        page-break-after: always;
    }
    body{
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
    }
    p{
        font-size: 14px;
    }
    .boldtext{
        font-weight: bold;
    }
    .row{
        margin: 5px;
    }
    .stamp{
        height: 100px;
        width: 100px;
        background-image: url('{{ asset('images/clients/stampic2.png') }}');
        background-size: 100% 100%;
        background-position: center;
        margin-left: 10px;
    }
    .letterheader{
        height: 200px;
        background-image: url('{{ asset('images/clients/letterheader.jpeg') }}');
        background-size: 100% 100%;
        background-position: center;
        margin:auto;
    }
    .letterfooter{
        height: 130px;
        background-image: url('{{ asset('images/clients/letterfooter.jpeg') }}');
        background-size: 100% 100%;
        background-position: center;
        margin: 0 auto;
    }
    
    td, tr, th{
        border: 1px solid black;
        padding: 5px;
    
    }
    .content{
        margin: 0 12px;
    }
    .wrap{
        background-color: white;
        margin: 0;
        padding: 0;
    }
    .container {
        width: 100%;
        max-width: 800px;
        margin: 0 auto;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-lg-9">
            <h3>Monthly Invoice / Bill Report</h3>
        </div>
        <div class="col-lg-3">
            <button class="btn btn-primary" onclick="printhtml()">Download as PDF</button>
        </div>
    </div>
    @foreach($rec as $r)
    <div id="divtoprint" class="wrap">
        <div class="letterheader"></div>
        <div class="content">
            <center>
                <u><p style="font-size: 20px;">Monthly Invoice Bill / Invoice For the Month Of <b>{{ date('F Y') }}</b></p></u>
                @if ($r->bill_tax_percentage > 0)
                <b>NTN : 6840385-7</b>
            @endif
            <br>

            <br>
            <table style="width: 80%;">
                <tr>
                    <td>
                        <b>{{ $r->client_name }}</b>
                        <br>
                        <p>{{ $r->client_address }}</p>
                    </td>
                    <td>
                        <b>Ref # SSEE / {{ $r->report_no }}</b>
                        <br>
                        <p>{{ \Carbon\Carbon::parse($r->date)->format('d F Y') }}</p>
                    </td>
                </tr>
            </table>
            </center>
            <br>
            <b>Dear Sir / Madam,</b>
            <hr>
            <p>We submit here-under our monthly maintenance bill for your <b>{{ $r->elevator_no }}</b> Elevator(s) at {{ $r->client_name }}</p>
            <p><b>Monthly Maintenance Charges For Each Lift</b> : {{ number_format($r->elevator_cost_ind) }} <b>PKR</b> /= Per Lift</p>
            <hr>
            <p><b>No of Elevators Installed</b> : {{ $r->elevator_no }}</p>
            <hr>
            <p><b>Total Amount</b> : {{ number_format($r->total) }} <b>PKR</b> /=</p>
            <p><b>Total Amount in Words</b> : {{ convert_number_to_words($r->total) }}  only</p>
            <hr>
            <p>Asad Uddin Qureshi</p>
            <p>C.E.O</p>
            <p>S.S. Electronics and Elevators</p>
            <div class="stamp"></div>

        </div>
        <br>
        <br>
        <div class="letterfooter"></div>
    </div>
    @endforeach
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    function printhtml(){
        var divtoprint = document.getElementById('divtoprint');
        html2pdf().from(divtoprint).save();
    }
</script>
@endsection
