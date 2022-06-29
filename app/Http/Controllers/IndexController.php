<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\attributes;
use App\Models\company;
use App\Models\car_details;
use App\Models\category;
use App\Models\subcategory;
use App\Models\accessories;
use App\Models\brand;
use App\Models\contact_details;
use App\Models\service_request;
use App\Models\parts;
use App\Models\labour;


use Illuminate\Support\Str;
use App\Mail\mailer;
use Session;
use Helper;
use Mail;
use Carbon\Carbon;
use \Crypt;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

   
    public function qr_code()
    {
        return view('web.qr_code');
    }
    public function problem()
    {
        return view('auth.problem');
        // code...
    }
    public function submit_problem(Request $request)
    {
        try{
            $fields = array();
            $fields['name'] = $request->name;
            $fields['email'] = $request->email;
            $fields['phone'] = $request->phone;
            $fields['problem'] = $request->problem;
            $fields['location'] = $request->location;
            $create = service_request::create($fields);
            if ($create) {
                return redirect()->back()->with('message', 'Service has been requested');
            } else{
                return redirect()->back()->with('error', 'Error while submitting request');
            }
        } catch(Exception $e){
            return redirect()->back()->with('error', 'Error will saving record');
        }
    }

    
    public function login(){
        
        if (Auth::check()) {
            
            return redirect()->route('index');
        }
        $title = 'GM Tech - Login';
        return view('auth.login')->with(compact('title'));
    }

}
