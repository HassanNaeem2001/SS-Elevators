@extends('adminlayout.layout.header_footer')

@section('content')
<style>
    /* Example CSS for styling */
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        color: #333;
    }

    .container {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .table th, .table td {
        padding: 8px;
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
</style>

<div class="container">
    <div id="divtoprint">
    @foreach ($data as $quotation)
    <div class="cover-page">
        <h1>Quotation</h1>
        <p>Quotation No: {{ $quotation->quotation_no }}</p>
        <p>Created Date: {{ $quotation->created_at->format('Y-m-d') }}</p>
    </div>

    <div class="section">
        <div class="section-header">Client Information</div>
        <p><strong>Client Name:</strong> {{ $quotation->client_name }}</p>
        <p><strong>Client Address:</strong> {{ $quotation->client_address }}</p>
    </div>

    <div class="section">
        <div class="section-header">Elevator Details</div>
        <table class="table">
            <thead>
                <tr>
                    <th>Attribute</th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Elevator Type</td>
                    <td>{{ $quotation->elevator_type }}</td>
                </tr>
                <tr>
                    <td>Elevator Detail</td>
                    <td>{{ $quotation->elevator_detail }}</td>
                </tr>
                <tr>
                    <td>Elevator Document Title</td>
                    <td>{{ $quotation->elevator_doc_title }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    @if($quotation->electrical_price > 0)
    <div class="section">
        <div class="section-header">Electrical Material</div>
        <table class="table">
            <thead>
                <tr>
                    <th>Instrument</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $electricalInstruments = explode(', ', $quotation->electrical_instruments);
                    $electricalQuantities = explode(', ', $quotation->electrical_quantity);
                    $electricalPrices = explode(', ', $quotation->electrical_price);
                @endphp
                @foreach ($electricalInstruments as $key => $instrument)
                    <tr>
                        <td>{{ $instrument }}</td>
                        <td>{{ isset($electricalQuantities[$key]) ? $electricalQuantities[$key] : '' }}</td>
                        <td>{{ isset($electricalPrices[$key]) ? $electricalPrices[$key] : '' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif  
    @if($quotation->mechanical_price > 0)
    <div class="section">
        <div class="section-header">Mechanical Material</div>
        <table class="table">
            <thead>
                <tr>
                    <th>Instrument</th>
                    <th>Quantity</th>
                    <th>Prices</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $mechanicalInstruments = explode(', ', $quotation->mechanical_instruments);
                    $mechanicalQuantities = explode(', ', $quotation->mechanical_quantity);
                    $mechanicalPrices = explode(', ', $quotation->mechanical_price);
                @endphp
                @foreach ($mechanicalInstruments as $key => $instrument)
                    <tr>
                        <td>{{ $instrument }}</td>
                        <td>{{ isset($mechanicalQuantities[$key]) ? $mechanicalQuantities[$key] : '' }}</td>
                        <td>{{ isset($mechanicalPrices[$key]) ? $mechanicalPrices[$key] : '' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
    @if($quotation->elevator_s_price)
    <div class="section">

        <div class="section-header">Elevator Structure Details</div>
        <table class="table">
            <thead>
                <tr>
                    <th>Detail</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $elevatorSDetails = explode(', ', $quotation->elevator_s_details);
                    $elevatorSQuantities = explode(', ', $quotation->elevator_s_quantity);
                    $elevatorSPrices = explode(', ', $quotation->elevator_s_price);
                @endphp
               
                @foreach ($elevatorSDetails as $key => $detail)
                    <tr>
                        <td>{{ $detail }}</td>
                        <td>{{ isset($elevatorSQuantities[$key]) ? $elevatorSQuantities[$key] : '' }}</td>
                        <td>{{ isset($elevatorSPrices[$key]) ? $elevatorSPrices[$key] : '' }}</td>
                    </tr>
                @endforeach
             
               
            </tbody>
        </table>
    </div>
    @endif
    <div class="section">
        <div class="section-header">Delivery & Completion Details</div>
        <div class="details-row">
            <p><strong>Delivery:</strong> {{ $quotation->delivery_time }} {{ $quotation->delivery_unit }}</p>
            <p><strong>Completion:</strong> {{ $quotation->completion_time }} {{ $quotation->completion_unit }}</p>
        </div>
    </div>

    <div class="section">
        <div class="section-header">Financial Details</div>
        <table class="table">
            <tbody>
                <tr>
                    <td>Total Electrical Material Charges</td>
                    <td>{{ number_format($quotation->electrical_total) }} PKR</td>
                </tr>
                <tr>
                    <td>Total Mechanical Material Charges</td>
                    <td>{{ number_format($quotation->mechanical_total )}} PKR </td>
                </tr>
                <tr>
                    <td>Installation Charges</td>
                    <td>{{ number_format($quotation->installation_charges) }} PKR</td>
                </tr>
                <tr>
                    <td>Total Bill</td>
                    <td>{{ number_format($quotation->total_bill) }} PKR /=</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="note">
        <div class="section-header">Amount In Words</div>
       <p>{{convert_number_to_words($quotation->total_bill)}} PKR / = Only</p>
    </div>

    <div class="note">
        <div class="section-header">Notes</div>
        <ol>
            <li>Exclusive all kind of taxes</li>
            <li>Civil Work includes in this offer</li>
        </ol>
    </div>

    <div class="note">
        <div class="section-header">Mode of Payment</div>
        <ol>
            <li>80% after approval</li>
            <li>10% after material shifted to site</li>
            <li>05% after starting lift at slow speed</li>
            <li>05% on handing over completely</li>
        </ol>
    </div>

    <div class="section">
        <div class="section-header">Quotation Validity</div>
        <p><b>This quotation will be valid till 15 days from the date of submission</b></p>
    </div>

    <div class="section">
        <div class="section-header">Thank You</div>
        <p>Thank You For Your Business & Trust In Our Products</p>
        <br>
        <p>Yours Faithfully</p>
        <b>Asad Uddin Qureshi</b>
        <p>C.E.O <b>S.S.Elevators</b></p>
        <br>
        <div class="stamp"></div>
    </div>
    </div>

    @endforeach

    <div class="text-center">
    <button class="btn" type="button" onclick="generatePDF()">Download PDF</button>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

<script>
  
    function generatePDF() {
        const element = document.getElementById('divtoprint');

        html2canvas(element, {
            onrendered: function(canvas) {
                const imgData = canvas.toDataURL('image/png');
                const pdf = new jsPDF();
                const imgProps = pdf.getImageProperties(imgData);
                const pdfWidth = pdf.internal.pageSize.getWidth();
                const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

                pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
                pdf.save('quotation.pdf');
            }
        });
    }


</script>

@endsection
