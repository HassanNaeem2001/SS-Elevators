<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\contact;
use App\Models\Project;
class UserController extends Controller
{
    //
    public function contact(Request $request){
       $name = $request->post('username');
       $emai = $request->post('useremail');;
       $subject = $request->post('usersubject');;
       $message = $request->post('usermessage');;

       $c = new contact();
       $c->contactName = $name;
       $c->contactEmail = $emai;
       $c->contactSubject = $subject;
       $c->contactMessage = $message;
       $c->save();
       return response('recorded');

       
    }
    public function fetchall(){
        $data = Project::get();
        $data2 = Client::where('feedbackstatus','=','Published')->get();
        return View('index',compact(['data','data2']));
    }
}
