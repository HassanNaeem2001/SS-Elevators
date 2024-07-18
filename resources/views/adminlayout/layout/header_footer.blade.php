<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - S.S. Elevators</title>

  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">


  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="{{asset('assets/img/logo.png')}}" alt="">
        <span class="d-none d-lg-block">S.S. Elevators</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword" id="myinput">
        <button type="button" title="Search"><i class="bi bi-search" onclick="search()"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

     

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{asset('assets/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">
                {{session('admin')}}
            </span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{session('admin')}}</h6>
              <span>Admin</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="profile">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            

            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="/admin">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Profile</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          
          <li>
            <a href="profile">
              <i class="bi bi-circle"></i><span>View Details</span>
            </a>
          </li>
         @if(@session('role') == 'admin')
         <li>
            <a href="approval">
              <i class="bi bi-circle"></i><span>Admin Approval Requests</span>
            </a>
          </li>
         @endif
          <li>
            <a href="updatepassword">
              <i class="bi bi-circle"></i><span>Update Password</span>
            </a>
          </li>
          @if(@session('role') == 'admin')
          <li>
            <a href="add_admin">
              <i class="bi bi-circle"></i><span>Add Inspector</span>
            </a>
          </li>
          @endif
         
        </ul>
      </li><!-- End Components Nav -->

      @if(@session('role') == 'admin')
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Contact Queries</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="responded_queries">
              <i class="bi bi-circle"></i><span>Replied</span>
            </a>
          </li>
          <li>
            <a href="getqueries">
              <i class="bi bi-circle"></i><span>Not Replied</span>
            </a>
          </li>
         
        </ul>
      </li>
      @endif
      
      <!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Feedback</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="newfeedback">
              <i class="bi bi-circle"></i><span>Add New Feedback</span>
            </a>
          </li>
          <li>
            <a href="feedback">
              <i class="bi bi-circle"></i><span>View Feedbacks</span>
            </a>
          </li>
       
        </ul>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="">
          <i class="bi bi-bar-chart"></i><span>Add Projects</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="uploadproject">
              <i class="bi bi-circle"></i><span>Add New Project</span>
            </a>
          </li>
          @if(@session('role') == 'admin')
          <li>
            <a href="existingprojects">
              <i class="bi bi-circle"></i><span>View Existing Project</span>
            </a>
          </li>
         
          @endif
        </ul>
      </li><!-- End Charts Nav -->



      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span>Documentation</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
            <a href="gen_survey">
              <i class="bi bi-circle"></i><span>Generate Survey Report</span>
            </a>
          </li>
           <li>
            <a href="gen_inspection">
              <i class="bi bi-circle"></i><span>Generate Inspection Report</span>
            </a>
          </li>
        @if(@session('role') == 'admin')
        <!-- <li>
            <a href="icons-bootstrap.html">
              <i class="bi bi-circle"></i><span>Add New Quotation</span>
            </a>
          </li> -->
          <li>
            <a href="monthly_invoice">
              <i class="bi bi-circle"></i><span>Generate Monthly Invoice</span>
            </a>
          </li>
          <li>
            <a href="maintenance_sheet">
              <i class="bi bi-circle"></i><span>Generate Maintenance Sheet</span>
            </a>
          </li>
          <li>
            <a href="quotation">
              <i class="bi bi-circle"></i><span>Generate Quotation</span>
            </a>
          </li>
         
        @endif
        </ul>
      </li><!-- End Icons Nav -->
      <!--History started-->
      @if(@session('role') == 'admin')
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#history-nav" data-bs-toggle="collapse" href="">
          <i class="bi bi-bar-chart"></i><span>History</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="history-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="surveys">
              <i class="bi bi-circle"></i><span>All Survey Reports</span>
            </a>
          </li>
          <li>
            <a href="inspection">
              <i class="bi bi-circle"></i><span>All Inspection Reports</span>
            </a>
          </li>
          <li>
            <a href="allmonthlyreports">
              <i class="bi bi-circle"></i><span>All Monthly Bills</span>
            </a>
          </li>
          <li>
            <a href="quotation_reports">
              <i class="bi bi-circle"></i><span>All Quotation Reports</span>
            </a>
          </li>
          <li>
            <a href="maintenance_reports">
              <i class="bi bi-circle"></i><span>All Maintenance Reports</span>
            </a>
          </li>
         
        </ul>
      </li>
      @endif
      <!--History ended-->
      
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">


  @yield('content')

  </main>
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>S.S. Elevators</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Powered by <a href="https://hassannaeem.netlify.app">Hassan Bin Naeem</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/quill/quill.js')}}"></script>
  <script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>

  <script>
    function search(){
      var s = document.getElementById('myinput').value;
      if(s.toLowerCase() == "home")
      {
        window.location.href="/"
      }
      else if(s.toLowerCase() == "dashboard"){
        window.location.href="/admin"
      }
      else{
        alert("Sorry, could not find that page");
      }
    }
  </script>


</body>

</html>