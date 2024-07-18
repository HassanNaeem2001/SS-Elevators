<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

use App\Models\inspectionreport;
Route::get('/',[UserController::class,('fetchall')]);
Route::post('/contactadmin',[UserController::class,('contact')]);
//====Admin Panel

Route::get('/admin', function () {
   if(session('admin')){
    return view('adminlayout.index');
   }
   else{
    return View('login');
   }
});

Route::get('/login',function(){
    return View('login');
});
Route::get('/add_admin',function(){
    return View('adminlayout.addadmin');
})->middleware('admin');
Route::get('/editpass',function(){
   if(session('matched')){
    return View('adminlayout.editpassword');
   }
   else{
    return View('adminlayout.updatepassword');

   }
})->middleware('admin');
Route::post('/checklogin',[AdminController::class,('loginadmin')]);
Route::get('/logout',[AdminController::class,('logout')])->middleware('admin');

Route::get('/profile',[AdminController::class,('viewprofile')])->middleware('admin');
Route::get('/updatepassword',[AdminController::class,('updatepassword')])->middleware('admin');

Route::get('/updateemail',[AdminController::class,('sendupdate_email')])->middleware('admin');

Route::post('/verifyotp',[AdminController::class,('verify')])->middleware('admin');
Route::post('/pass_update',[AdminController::class,('editpassword')])->middleware('admin');
Route::post('/add_admin',[AdminController::class,('registeradmin')])->middleware('admin');
Route::get('/getqueries',[AdminController::class,('fetchqueries')])->middleware('admin');
Route::post('/contacted_admin',[AdminController::class,('reply')])->middleware('admin');
Route::get('/responded_queries',[AdminController::class,('fetchrespondedqueries')])->middleware('admin');
Route::get('/uploadproject',function(){
    return View('adminlayout.addproject');
})->middleware('admin');
Route::post('/updproject',[AdminController::class,('upload_project')])->middleware('admin');
Route::get('/existingprojects',[AdminController::class,('getprojects')])->middleware('admin');
Route::post('/deleteproject',[AdminController::class,('deleteproject')])->middleware('admin');
Route::get('/newfeedback',function(){
    return View('adminlayout.insertfeedback');
})->middleware('admin');
Route::post('/insertfeedback',[AdminController::class,('newfeedback')])->middleware('admin');
Route::get('/feedback',[AdminController::class,('getfeedback')])->middleware('admin');
Route::post('/updfeedback',[AdminController::class,('updatefeedback')])->middleware('admin');
Route::get('/gen_inspection',function(){
    return View('adminlayout.inspectionreport');
})->middleware('admin');
Route::get('/gen_survey',function(){
    return View('adminlayout.surveyreport');
})->middleware('admin');
Route::post('/generate_ins',[AdminController::class,('generate_report')])->middleware('admin');
Route::get('/final_look_inspection',[AdminController::class,('final_inspection')])->middleware('admin');
Route::post('/insertsurvey',[AdminController::class,('insertsurvey')]);
Route::get('/survey_report',[AdminController::class,('viewsurvey')]);


Route::get('/gen_inspect_report',[AdminController::class,('generate_pdf_inspection')]);
Route::get('/inspection',[AdminController::class,('getinspectionreports')]);
Route::get('/inspection_details/{id}',[AdminController::class,('getspecificreport_insp')]);
Route::get('/surveys',[AdminController::class,('getsurveyreports')]);
Route::get('/inspection_details/spec_inspec_print/{report_no}',[AdminController::class,('printreport_inspection')]);
Route::get('/surveyreport/{report_no}',[AdminController::class,('specific_survey')]);
Route::get('/surveyreport/printsurvey/{report_no}',[AdminController::class,('printsurveyreport')]);
Route::post('/updaterolenotify',[AdminController::class,('notifyadmin')]);
Route::get('/approval',[AdminController::class,('adminapproval')]);
Route::post('/approveuser/{userid}',[AdminController::class,('approve')]);

Route::get('/monthly_invoice',function(){
    return View('adminlayout.monthly_inv_form');
});
Route::post('/ins_invoice',[AdminController::class,('insert_invoice')]);
Route::get('/allmonthlyreports',[AdminController::class,('allmonthlyreports')]);
Route::get('/monthly_report/{id}',[AdminController::class,('spec_monthly_report')]);
Route::get('/printmonthlyreport',[AdminController::class,('printreport')]);

Route::get('/quotation',function(){
    return View('adminlayout.quotationform');
})->middleware('admin');

Route::post('/insertquotation',[AdminController::class,('insert_quotation')]);
Route::get('/quotation_reports',[AdminController::class,('fetch_quotations')]);
Route::get('/quotation_report/{report_no}',[AdminController::class,('single_quotation')]);
Route::get('/printquotation/{id}',[AdminController::class,('printquot')]);
Route::get('/download-pdf', [AdminController::class, 'downloadPDF'])->name('download.pdf');

Route::get('/maintenance_sheet',function(){
    return View('adminlayout.maintenanceform');
});
Route::post('/insert_maintenance',[AdminController::class,('insert_maintenance')]);

Route::get('/maintenance_reports',[AdminController::class,('getallmaintenancereports')]);
Route::get('/maintenance/{id}',[AdminController::class,('spec_maintenance')]);
Route::get('/maintenance/maintenance_generate/{id}',[AdminController::class,('generate_maintenance')])->name('generate_maintenance');