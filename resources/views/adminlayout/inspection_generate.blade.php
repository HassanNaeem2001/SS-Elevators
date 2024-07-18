<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Example</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 200px; /* Adjust according to your header height */
            background-image: url('images/clients/letterheader.jpeg');
            background-size: 100% 100%;
            background-position: center;
        }

        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            height: 150px; /* Adjust according to your footer height */
            background-image: url('images/clients/letterfooter.jpeg');
            background-size: 100% 100%;
            background-position: center;
        }

        .content {
            margin-top: 190px; /* Adjust this value to account for header */
            margin-bottom: 150px; /* Adjust this value to account for footer */
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px; /* Adjust as needed */
        }

        th, td {
            padding: 8px;
            border: 1px solid black;
        }

        p {
            font-size: 13px;
            line-height: 1.5;
        }

        .boldtext {
            font-weight: bold;
        }

        .stamp {
            position: absolute;
            bottom: 130px; /* Adjust as needed */
            right: 50px; /* Adjust as needed */
            height: 100px;
            width: 100px;
            background-image: url('images/clients/stampic.jpeg');
            background-size: cover;
            background-position: center;
        }

        .wrapper {
            margin-bottom: 20px; /* Ensure proper margin between reports */
        }

        @page {
            margin: 0;
        }

        .page-break {
            page-break-after: always;
        }
        li{
            font-size:13px
        }
    </style>
</head>
<body>
    <header>
        <!-- Header content is handled by CSS background-image -->
    </header>

    <footer>
        <!-- Footer content is handled by CSS background-image -->
    </footer>

    <div class="content">
        @foreach($inspectionreport as $d)
        <div class="wrapper">
            <main>
              
                <table>
                    <tr>
                    <td><b>Report No</b></td>
                    <td colspan="3">{{$d->report_no}}</td>
                    </tr>
                    <tr>
                      
                        <td><b>To</b></td>
                        <td>{{$d->supervisorname}}</td>
                        <td><b>Company Name</b></td>
                        <td>{{$d->companyname}}</td>
                    </tr>
                    <tr>
                        <td><b>Date</b></td>
                        <td>{{ \Carbon\Carbon::parse($d->reportsent_date)->format('j F Y') }}</td>
                        <td><b>Report Generated By</b></td>
                        <td>{{$d->generated_by}}</td>
                    </tr>
                </table>
                <hr>
                <p><b>Subject : </b>{{$d->subject}}</p>
                <hr>

                <div>
                    <p><span class="boldtext">Dear Sir / Madam,</span></p>
                    <hr>
                    <p>
                    We, the dedicated team of S.S. Elevators, would like to draw your attention to a number of critical issues that have been identified in your project. These issues are of significant concern as they may impact the overall safety, efficiency, and performance of your system. We believe that addressing these matters promptly is essential for ensuring the optimal functionality and longevity of the project. Therefore, we have documented each issue in detail to provide you with a comprehensive understanding of the challenges at hand and the necessary steps required to resolve them.

                    </p>
                    <p>
                        We have been observing <b>{{$d->no_of_issues}} errors</b> since, <b> {{ \Carbon\Carbon::parse($d->reportsent_date)->format('j F Y') }}</b>
                    </p>
                    <p>
                    Our dedicated team has been diligently working to identify and address the various issues that have arisen in your project. We believe it is important to keep you informed about the nature and specifics of these issues to ensure transparency and foster a collaborative approach towards resolving them. Below, we have provided a detailed list of the issues we have encountered, along with relevant observations and insights.

                    </p>
                    <hr>
                    <ol>
                        @php
                        $iss = explode(',', $d->issues);
                        @endphp
                        @foreach($iss as $issue)
                        <li>{{$issue}}</li>
                        @endforeach
                    </ol>

                </div>
                <div class="stamp"></div>
                <div class="page-break"></div>
                <br><br><br><br><br><br>
                <br><br><br><br><br><br>
                <b>Additional Details</b>
                <p>{{$d->additionaldetails}}</p>
                <hr>
                <div>
                    <p>
                    We have meticulously listed all these issues for you with the utmost care and attention because your safety and satisfaction are our highest priorities. Ensuring that you are fully aware of the challenges we have identified allows us to work together more effectively towards resolving them. By prioritizing these concerns, we aim to enhance the reliability and performance of your system, thereby guaranteeing your peace of mind and overall satisfaction with our services. Our commitment to your safety and satisfaction drives us to maintain the highest standards of excellence in addressing and rectifying these issues.

                    </p>
                    <p>We would like to request you to please carefully read all these issues and <b>grant us the go-ahead</b> to fix these issues, we would be needing yours and your staff's co-operation till the complete resolution of the errors.</p>
                    <hr>
                    <p>We would also like to notify you that the complete duration for resolving these errors including the observation period will be <b> {{$d->duration_to_work}} {{$d->unit}}</b> after the date of allowance / approval from your side.</p>
                </div>
                <hr>
                <p>Regards,</p>
                <b>Asad Uddin Qureshi</b>
                <p>C.E.O</p>
                <p>S.S. Elevators</p>
            </main>
        </div>
        <div class="stamp"></div>
        <div class="page-break"></div>
        @endforeach
    </div>
</body>
</html>
