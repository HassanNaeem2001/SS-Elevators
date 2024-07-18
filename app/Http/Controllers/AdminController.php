<?php

namespace App\Http\Controllers;

use App\Mail\AdminRegMail;
use App\Mail\ResponseMail;
use App\Mail\RoleUpgrade;
use App\Models\admin;
use App\Models\contact;
use App\Models\Project;
use App\Models\Client;
use App\Models\quotation;
use App\Models\survey;
use App\Models\maintenance;
use App\Models\monthly_invoice;
use App\Models\adminrequest;
use App\Models\inspectionreport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\SendUpdateEmail;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;


class AdminController extends Controller
{
    //
    
    public function loginadmin(Request $request){
        $username = $request->username;
        $userpassword = $request->password;

        $dbname = DB::table('admins')->where('username','=',$username)->first();
        $dbpass = DB::table('admins')->where('userpassword','=',$userpassword)->first();

        // echo $dbname->useremail;
        
        if($dbname && $dbpass){
            session(['admin'=>$username]);
            session(['email'=>$dbname->useremail]);
            session(['role'=>$dbname->userrole]);
            return View('adminlayout.index');
        }
        else{
            
            return redirect()->back()->with('errormessage','Invalid Credentials');
            
        }

    }
    
    public function logout(){
        session()->forget('admin');
        session()->forget('matched');
        return View('login');
    }

    public function viewprofile(){
      $username = session('admin');
      $useremail = session('email');
      $user = DB::table('admins')->where('username','=',$username)->get();
      return View('adminlayout.viewprofile',compact('user'));
      
    }
    public function updatepassword()
    {
        return View('adminlayout.updatepassword');
    }
    public function sendupdate_email()
    {
        $email = session('email');
        $otp = rand(1000,2000);
        $details = [
            'title' => "Password Reset",
            'body' => 'This is a test email'
        ];
       
        try {
            $ottp = session(['otp'=>$otp]);
            Mail::to($email)->send(new SendUpdateEmail($ottp));
            
            return redirect()->back()->with('emailmessage',"We have sent the email");
            
        } catch (Exception $e) {
            // Log or display the error
            Log::error('Email sending failed: ' . $e->getMessage());
            return 'Email sending failed: ' . $e->getMessage();
        }
        
    }
    public function verify(Request $req){
      $userinputtedotp = $req->post('otp');
      $otp = session('otp');
    //   echo $otp." <br> ";
    //   echo $userinputtedotp;

      if($userinputtedotp == $otp){
        session(['matched'=>'matched successfully']);
        return redirect('/editpass');

      }
      else{
        return 'Wrong OTP';
      }
    }
    public function editpassword(Request $request){
      $email = session('email');
      $password = $request->password;

      $record = DB::table('admins')->where('useremail','=',$email)->update(['userpassword'=>$password]);
      
     
      if($record){
        echo "<script>alert('Password has been updated successfully')</script>";
        return redirect()->back()->with('upd','Password has been updated');
        
        
      }
      else{
    
        echo "<script>alert('Password could not be changed !')</script>";
        
      }
     

    }
    public function registeradmin(Request $req){
     
      $username = $req->username;
      $useremail = $req->useremail;
      $userpassword = $req->userpassword;
     
      $details =[
        'useremail'=>$useremail,
        'userpassword'=>$userpassword,
        'username'=>$username,
        
      ];
      $admin = new admin();
      $admin->username = $username;
      $admin->useremail = $useremail;
     
      $admin->userpassword = $userpassword;
      $admin->save();
      Mail::to($useremail)->send(new AdminRegMail($details));
      return redirect()->back()->with('admincreated',"Registeration Successfull !");

    }
    public function fetchqueries(){
      $data = contact::where('ContactStatus','=','Not Responded')->paginate(10);
      return View('adminlayout.contact_queries',compact('data'));
    }
    public function fetchrespondedqueries(){
      $data = contact::where('ContactStatus','=','Responded')->get();
      return View('adminlayout.contact_queries_responded',compact('data'));
    }
    public function reply(Request $request){
      $msg = $request->message;
      $email = $request->resemail;
      
      $details = [
        'message' => $msg
      ];
      $send = Mail::to($email)->send(new ResponseMail($details));
      if($send){
        DB::table('contacts')->where('contactEmail','=',$email)->update(['contactStatus'=>'Responded']);
        return redirect()->back()->with('emailresponse','Email sent !');
      }
      else{
        return 'Error While Sending Response';
      }
     
    }
    public function upload_project(Request $req){
      
      $req->validate([
        'projectname'=>'required',
        'projectcategory'=>'required',
        'projectimage'=>'required | mimes:jpeg,png,jpg',
      ]);

      $pname = $req->projectname;
      $pcat = $req->projectcategory;
      $pimg = $req->file('projectimage');
      $pdesc = $req->projectdescription;
      if($pimg){
       
        
       $imagepath = $pimg->store('projectuploads','public');
       $project = new Project();
       $project->projectname =  $pname;
       $project->projectcategory =  $pcat;
       $project->projectimage =  $imagepath;
       $project->projectdescription =  $pdesc;
       $project->save();
       return redirect()->back()->with('projectuploaded','Project has been upoaded !');
      }
      else{
        return 'Issue While Uploading Uploading Project';
      }
    
     
    }
    public function getprojects(){
      $data = Project::get();
      return View('adminlayout.fetchprojects',compact('data'));
    }
    public function deleteproject(Request $req){
      $pid =$req->projectid;
      $record =Project::find($pid);
      $record->delete();
      return redirect()->back()->with('deleteproject','Project has been deactivated');
    }
    public function newfeedback(Request $req){
      $clientname = $req->testname;
      $clientmessage = $req->testmessage;
      $clientcompany = $req->testcompany;
      $rec = new Client();
      $rec->clientname = $clientname;
      $rec->clientmessage = $clientmessage;
      $rec->clientcompany = $clientcompany;
      $rec->save();
      return redirect()->back()->with('feedback','Feedback Uploaded to Website');
    }
    public function getfeedback(){
      $data = Client::get();
      return View('adminlayout.viewfeedback',compact('data'));
    }
    public function updatefeedback(Request $req){
      $testimonialoption = $req->post('option');
      $testimonialid = $req->post('messageid');
      if($testimonialoption == "Published"){
        Client::where('id','=',$testimonialid)->update([
          'feedbackstatus'=>'Published'
        ]);
        
      }
      else{
        Client::where('id','=',$testimonialid)->update([
          'feedbackstatus'=>'De-Activated'
        ]);
      }
    }
    public function generate_report(Request $req){
      $sup_name = $req->managername;
      $comp_name = $req->companyname;
      $ob_date = $req->observed_date;
      $st_date = $req->sent_date;
      $totalissues = $req->totalissues;
      $issues = implode(', ',$req->issues);
      $additional = $req->additional;
      $generatedby = session('admin');
      $subject = $req->subject;
      $duration = $req->duration;
      $unit = $req->unitlist;
      $report_no = rand();
      session(['report_session'=>$report_no]);
      if($additional){
        $record = new inspectionreport();
      $record->supervisorname = $sup_name;
      $record->companyname = $comp_name;
      $record->errorobserved_date = $ob_date;
      $record->reportsent_date = $st_date;
      $record->no_of_issues	= $totalissues;
      $record->issues = $issues;
      $record->additionaldetails = $additional;
      $record->generated_by = $generatedby;
      $record->subject = $subject;
      $record->duration_to_work = $duration;
      $record->unit = $unit;
      $record->report_no =  $report_no;
      $record->save();
      return redirect('/final_look_inspection');
      }
      else{
        $record = new inspectionreport();
        $record->supervisorname = $sup_name;
        $record->companyname = $comp_name;
        $record->errorobserved_date = $ob_date;
        $record->reportsent_date = $st_date;
        $record->no_of_issues	= $totalissues;
        $record->issues = $issues;
        $record->generated_by = $generatedby;
        $record->subject = $subject;
        $record->duration_to_work = $duration;
        $record->unit = $unit;
        $record->report_no =  $report_no;
        $record->save();
        return redirect('/final_look_inspection');
      }
      
    }
    public function final_inspection(){
      $rep_no = session('report_session');
      $record = inspectionreport::where('report_no','=',$rep_no)->get();
      return View('adminlayout.inspectionfinallayout',compact('record'));

    }
    public function insertsurvey(Request $req){
      
      $surveytable = new survey();
      $surveytable->clientname =  $req->clientname;
      $surveytable->projectname = $req->projectname;
      $surveytable->location = $req->areaname;
      $surveytable->elevator_no = $req->elevatorno;
      $surveytable->elevator_brand = $req->elevatorbrand;
      $surveytable->elevator_stops = $req->stops;
      $surveytable->project_type = $req->projecttypelist;
      $surveytable->project_usage = $req->usagelist;
      $machine_details = $req->machinedetails;
      $controlpanel_details = $req->controlpaneldetails;
      $steelwiredetails = $req->steelwiredetails;
      $sheavesdetails = $req->sheavesdetails;
      $mainguidedetails = $req->mainguidedetails;
      $cwtguidedetails = $req->cwtguidedetails;
      $counterweightdetails = $req->counterweightdetails;
      $carcabindetails = $req->carcabindetails;
      $cabincwtshoedetails = $req->cabincwtshoedetails;
      $cardoordetails = $req->cardoordetails;
      $landingdoordetails = $req->landingdoordetails;
      $doorsafetydetails = $req->doorsafetydetails;
      $speedgovernerdetails = $req->speedgovernerdetails;
      $limitswitchesdetails = $req->limitswitchesdetails;
      $buffersdetails = $req->buffersdetails;
      $intercomdetails = $req->intercomdetails;
      $fansdetails = $req->fansdetails;
      $cabinlightsdetails = $req->cabinlightsdetails;
      $lcsdetails = $req->lcsdetails;
      $caroperatingdetails = $req->caroperatingdetails;
      $oilcandetails = $req->oilcandetails;
      $additionalnotes = $req->additionalnotes;

      $surveyreportno = rand(10000,20000);
      
      $final_machine_details = implode(', ',$machine_details);
      $final_controlpanel_details = implode(', ',$controlpanel_details);
      $final_steelwire_details = implode(', ',$steelwiredetails);
      $final_sheaves_details = implode(', ',$sheavesdetails);
      $final_mainguide_details = implode(', ',$mainguidedetails);
      $final_cwtguide_details = implode(', ',$cwtguidedetails);
      $final_counterweight_details = implode(', ',$counterweightdetails);
      $final_carcabin_details = implode(', ',$carcabindetails);
      $final_cabincwtshoe_details = implode(', ',$cabincwtshoedetails);
      $final_cardoor_details = implode(', ',$cardoordetails);
      $final_landingdoor_details = implode(', ',$landingdoordetails);
      $final_doorsafety_details = implode(', ',$doorsafetydetails);
      $final_speedgoverner_details = implode(', ',$speedgovernerdetails);
      $final_limitswitches_details = implode(', ',$limitswitchesdetails);
      $final_buffers_details = implode(', ',$buffersdetails);
      $final_intercom_details = implode(', ',$intercomdetails);
      $final_fans_details = implode(', ',$fansdetails);
      $final_cabinlights_details = implode(', ',$cabinlightsdetails);
      $final_lcs_details = implode(', ',$lcsdetails);
      $final_caroperating_details = implode(', ',$caroperatingdetails);
      $final_oilcan_details = implode(', ',$oilcandetails);
     
      $surveytable->machine_details = $final_machine_details;
      $surveytable->controlpanel_details = $final_controlpanel_details;
      $surveytable->steelwire_details = $final_steelwire_details;
      $surveytable->sheaves_details = $final_sheaves_details;
      $surveytable->mainguide_details = $final_mainguide_details;
      $surveytable->cwtguide_details = $final_cwtguide_details;
      $surveytable->counterweight_details = $final_counterweight_details;
      $surveytable->carcabin_details = $final_carcabin_details;
      $surveytable->cabincwtshoe_details = $final_cabincwtshoe_details;
      $surveytable->cardoor_details = $final_cardoor_details;
      $surveytable->landingdoor_details = $final_landingdoor_details;
      $surveytable->doorsafety_details = $final_doorsafety_details;
      $surveytable->speedgoverner_details = $final_speedgoverner_details;
      $surveytable->limitswitches_details = $final_limitswitches_details;
      $surveytable->buffers_details = $final_buffers_details;
      $surveytable->intercom_details = $final_intercom_details;
      $surveytable->fans_details = $final_fans_details;
      $surveytable->cabinlights_details = $final_cabinlights_details;
      $surveytable->lcs_details = $final_lcs_details;
      $surveytable->caroperating_details = $final_caroperating_details;
      $surveytable->oilcan_details = $final_oilcan_details;
      $surveytable->additional_notes = $req->additionalnotes;
      $surveytable->survery_report_no = $surveyreportno;
      $surveytable->save();
      return redirect()->back()->with('successmessage','Survey has been saved successfully');

    }
    public function viewsurvey(){
      $data = survey::get();
      return View('adminlayout.surveyreportlook',compact('data'));
      
    }
   
    public function generate_pdf_inspection(){
      $rep_no = session('report_session');
      $record = inspectionreport::where('report_no','=',$rep_no)->get();
      $data = [
        'title'=>'Inspection Report',
        'date'=> date('m/d/Y'),
        'inspectionreport'=>$record
      ];
      $pdf = Pdf::loadView('adminlayout.inspection_generate',$data);
      
      return $pdf->download('inspection.pdf');
     
    }
    public function getinspectionreports(){
      $record = inspectionreport::get();
      return View('adminlayout.allinspectionreports',compact('record'));

    }
    public function getspecificreport_insp($id){
      $inspection = inspectionreport::where('id','=',$id)->get();
      return view('adminlayout.specficinspection',compact('inspection'));

    }
    public function getsurveyreports(){
      $record = survey::get();
      return View('adminlayout.allsurveyreports',compact('record'));
    }
    public function printreport_inspection($reportno){
      session(['report_session'=>$reportno]);
      return redirect('/final_look_inspection');
    }
    public function specific_survey($reportno){
      $rep = survey::where('survery_report_no','=',$reportno)->get();
      return View('adminlayout.specificsurveryreport',compact('rep'));
    }
    public function printsurveyreport($reportno){
      $rep = survey::where('survery_report_no','=',$reportno)->get();
      $record = [
        'title'=>'Inspection Report',
        'date'=> date('m/d/Y'),
        'rep'=>$rep
      ];
      $pdf = Pdf::loadView('adminlayout.surveyreportgenerate',$record);
      
      return $pdf->download('survey.pdf');
    }
    public function notifyadmin(Request $req){
      $id = $req->post('id');
      $query = new adminrequest();
      $query->user_id = $id;
      $query->save();
      return response()->json('Request sent to admin');

    }
    public function adminapproval(){
      $rec = DB::table('adminrequests')->join('admins','adminrequests.user_id','=','admins.id')->select('adminrequests.*','admins.username','admins.userrole')->get();
      return View('adminlayout.approval',compact('rec'));
    }
    public function approve($userid){
      admin::where('id','=',$userid)->update(['userrole'=>'admin']);
    $email = admin::where('id','=',$userid)->pluck('useremail')->first();
      adminrequest::where('user_id','=',$userid)->delete();
      $details = [
        'title' => "Role Upgrade",
        'body' => 'Notification'
    ];
    Mail::to($email)->send(new RoleUpgrade($details));
      return redirect()->back()->with('success','User role has been updated');

    }
    public function insert_invoice(Request $req){
      $cname = $req->clientname;
      $caddress = $req->address;
      $no_elevator = $req->noofelev;
      $price = $req->priceind;
      $total = $price * $no_elevator;
      $reportno = rand(100000,200000);
      $date = Carbon::now()->toDateString();
      $tax_percent = $req->taxpercent;
      $total_with_tax = $total * (1 + ($tax_percent / 100));

      $table = new monthly_invoice();
      $table->client_name = $cname;
      $table->client_address = $caddress;
      $table->elevator_no = $no_elevator;
      $table->elevator_cost_ind = $price;
      $table->bill_type = $req->detail;
      $table->bill_tax_percentage = $req->taxpercent;
      $table->total =  $total_with_tax;
      $table->report_no = $reportno;
      $table->date = $date;
      $table->save();
      session(['monthly'=>$reportno]);
      return redirect()->back()->with('success','Monthly quotation has been added');

    }
    public function allmonthlyreports(){
      $rec = monthly_invoice::get();
      
      return View('adminlayout.allmonthlyreport',compact('rec'));
    }
    public function spec_monthly_report($id){
      // $id = session('monthly');
      $rec = monthly_invoice::where('report_no','=',$id)->get();
      return View('adminlayout.monthlyreportlook',compact('rec'));
      

    }
   
    public function printreport(){
      $repno = session('monthly');
      $rec = monthly_invoice::where('report_no','=',$repno)->get();
      $record = [
        'title'=>'Monthly Report',
        'date'=> date('m/d/Y'),
        'rec'=>$rec
      ];
      $pdf = Pdf::loadView('adminlayout.monthlyrepgenerate',$record);
      
      return $pdf->download('monthly.pdf');
    }
    public function insert_quotation(Request $request)
    {
        // Calculate totals for electrical, mechanical, and elevator structure items
        $totalmechanic = 0;
        $totalelectrical = 0;
        $totalelectricalstructure = 0;
    
        // Calculate total for mechanical items if provided
        if (isset($request->mechquantity) && isset($request->mechprice)) {
            foreach ($request->mechquantity as $index => $quantity) {
                if (isset($request->mechprice[$index])) {
                    $price = $request->mechprice[$index];
                    $totalmechanic += $quantity * $price;
                }
            }
        }
    
        // Calculate total for electrical items if provided
        if (isset($request->elecquantity) && is_array($request->elecquantity) && isset($request->elecprice)) {
            foreach ($request->elecquantity as $index => $quantity) {
                if (isset($request->elecprice[$index])) {
                    $price = $request->elecprice[$index];
                    $totalelectrical += $quantity * $price;
                }
            }
        }
    
        // Calculate total for elevator and structural items if provided
        if (isset($request->elevator_s_quantity) && isset($request->elevator_s_price)) {
            foreach ($request->elevator_s_quantity as $index => $quantity) {
                if (isset($request->elevator_s_price[$index])) {
                    $price = $request->elevator_s_price[$index];
                    $totalelectricalstructure += $quantity * $price;
                }
            }
        }
    
        // Create a new instance of Quotation model
        $quotation = new Quotation();
    
        // Assign values from request to the model instance
        $quotation->client_name = $request->clientname;
        $quotation->client_address = $request->clientaddress;
        $quotation->elevator_type = $request->type;
        $quotation->elevator_detail = $request->detail;
        $quotation->elevator_doc_title = $request->doctitle;
        $quotation->electrical_instruments = isset($request->elecinstrument) ? implode(', ',$request->elecinstrument) : 'Not Provided';
        $quotation->electrical_quantity = isset($request->elecquantity) && is_array($request->elecquantity) ? count($request->elecquantity) : 0;
        $quotation->electrical_price = $totalelectrical;
        $quotation->electrical_total = $totalelectrical;
        $quotation->mechanical_instruments = isset($request->mechinstrument) ? implode(', ',$request->mechinstrument) : 'Not Provided';
        $quotation->mechanical_quantity = isset($request->mechquantity) && is_array($request->mechquantity) ? count($request->mechquantity) : 0;
        $quotation->mechanical_price = $totalmechanic;
        $quotation->mechanical_total = $totalmechanic;
        $quotation->no_of_elevator_structure = isset($request->deliverylist) ? $request->deliverylist : 'Not Provided';
        $quotation->elevator_s_details = isset($request->elevator_s_details) ? implode(', ',$request->elevator_s_details) : 'Not Provided';
        $quotation->elevator_s_quantity = isset($request->elevator_s_quantity) && is_array($request->elevator_s_quantity) ? count($request->elevator_s_quantity) : 0;
        $quotation->elevator_s_price = $totalelectricalstructure;
        $quotation->elevator_s_total = $totalelectricalstructure;
        $quotation->delivery_time = isset($request->deliverytime) ? $request->deliverytime : 0;
        $quotation->delivery_unit = isset($request->deliverylist) ? $request->deliverylist : 'Days';
        $quotation->completion_time = isset($request->completiontime) ? $request->completiontime : 0;
        $quotation->completion_unit = isset($request->completionlist) ? $request->completionlist : 'Days';
        $quotation->installation_charges = $request->installation_charges;
        $subtotal= $totalelectrical + $totalelectricalstructure + $totalmechanic + $request->installation_charges;
        $tax = $request->tax_percentage;
        $tax_amount = ($subtotal * $tax) / 100;
        $quotation->total_bill = $subtotal + $tax_amount;
        $quotation->quotation_no = rand(100000, 999999);
        $quotation->save();
    
        // Optionally, redirect back with a success message
        return redirect()->back()->with('success', 'Quotation added successfully!');
    }
    public function fetch_quotations(){
      $data = quotation::get();
      return View('adminlayout.allquotations',compact('data'));

    }
   
    public function printquot($id){
      

      $data = quotation::where('quotation_no','=',$id)->get();
      return View('adminlayout.quotation_generate',compact('data'));
      
    }
    public function downloadPDF()
    {
        $data = Quotation::all();
        $pdf = PDF::loadView('adminlayout.quotation_generate', compact('data'));
        return $pdf->download('quotation_report.pdf');
    }
    public function insert_maintenance(Request $req)
    {
      $table = new maintenance();

      $table->projectname = $req->projectname;
      $table->elevatortype=$req->elevatortype;
      $table->unitno=$req->unitno;
      $table->mainguide=implode(', ',$req->mainguide);
      $table->counterweight=implode(', ',$req->counterweight);
      $table->oilcup=implode(', ',$req->oilcup);
      $table->landingdoor=implode(', ',$req->landingdoor);
      $table->landingdoorroller=implode(', ',$req->landingdoorroller);
      $table->landingdoortracks=implode(', ',$req->landingdoortracks);
      $table->landingdoorspring=implode(', ',$req->landingdoorspring);
      $table->landingdoorweight=implode(', ',$req->landingdoorweight);
      $table->landingdoorcontact=implode(', ',$req->landingdoorcontact);
      $table->landingdoorcamroller=implode(', ',$req->landingdoorcamroller);
      $table->cabindoorroller=implode(', ',$req->cabindoorroller);
      $table->cabindoorcatcher=implode(', ',$req->cabindoorcatcher);
      $table->cabindoorchain=implode(', ',$req->cabindoorchain);
      $table->doorsills=implode(', ',$req->doorsills);
      $table->mainmotorpulley=implode(', ',$req->mainmotorpulley);
      $table->mainmotoroil=implode(', ',$req->mainmotoroil);
      $table->mainmotorseal=implode(', ',$req->mainmotorseal);
      $table->shaftlimitswitches=implode(', ',$req->shaftlimitswitches);
      $table->pitswitchsafety=implode(', ',$req->pitswitchsafety);
      $table->pitspring=implode(', ',$req->pitspring);
      $table->emergencylight=implode(', ',$req->emergencylight);
      $table->intercom=implode(', ',$req->intercom);
      $table->callpush=implode(', ',$req->callpush);
      $table->displaycheck=implode(', ',$req->displaycheck);
      $table->mainguideshoes=implode(', ',$req->mainguideshoes);
      $table->counterweightguideshoes=implode(', ',$req->counterweightguideshoes);
      $table->landingdoorshoes=implode(', ',$req->landingdoorshoes);
      $table->cabindoorshoes=implode(', ',$req->cabindoorshoes);
      $table->mainsteelwire=implode(', ',$req->mainsteelwire);
      $table->speedgovernorwire=implode(', ',$req->speedgovernorwire);
      $table->partsreplaced=$req->partsreplaced;
      $table->save();
      return redirect()->back()->with('success','Report Created');

   
    }
    public function getallmaintenancereports(){
      $data = maintenance::get();
      return View('adminlayout.allmaintenancereport',compact('data'));

    }
    public function spec_maintenance($id)
    {
      $data = maintenance::where('id','=',$id)->get();
      return View('adminlayout.spec_maintenance',compact('data'));
    }
    public function generate_maintenance($id)
    {
      try {
        $rec = maintenance::where('id', '=', $id)->get();

        if ($rec->isEmpty()) {
            return response()->json(['error' => 'No records found for the given ID'], 404);
        }

        return view('adminlayout.maintenance_generate', compact('rec'));
    } catch (\Exception $e) {
        // Handle any exceptions here
        return response()->json(['error' => 'Failed to fetch maintenance records'], 500);
    }
    }
    

}
