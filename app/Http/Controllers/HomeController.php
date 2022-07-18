<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\attributes;
use App\Models\orders;
use App\Models\packages;
use App\Models\testimonials;
use App\Models\config;
use App\Models\inquiry;
use App\Models\player;
use App\Models\logo;
use App\Models\production_schedule;
use App\Models\invoice;

use App\Models\contact_details;
use App\Models\service_request;
use App\Models\parts;
use App\Models\labour;
use Illuminate\Support\Str;
use Session;
use Illuminate\Support\Facades\Hash;
use Helper;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index(){
        if (Auth::user()->role_id != 1) {
            return redirect()->route('customer');
        }
        return view('web.index');
    }
    public function customer()
    {
        $requests = service_request::where('is_active',1);
        if (Auth::user()->role_id != 1) {
            $requests = $requests->where('tech',Auth::user()->id);
        }
        $requests = $requests->get();
        $techs = User::where('role_id',3)->where('is_active',1)->where('is_deleted',0)->get();
        return view('web.customer')->with(compact('requests','techs'));
    }
    public function entry($id) {
        $amount = 0;

        $service = service_request::where('is_active',1)->where('id',$id)->first();
        $parts = parts::where('is_active',1)->where('request_id',$id)->get();
        $labours = labour::where('is_active',1)->where('request_id',$id)->get();
        foreach ($parts as $key => $value) {
            $amount += $value->sell_price*$value->quantity_price;
        }
        foreach ($labours as $i => $val) {
            $amount += $val->hours*$val->hourly_rate;
        }
        return view('web.entry')->with(compact('id','parts','labours','service','amount'));
        // code...
    }
    public function assign_tech(Request $request)
    {
        $fields['tech'] = $request->tech;
        $update = service_request::where('id',$request->request_id)->update($fields);
        $status['status'] = 1;
        $status['message'] = "Tech has been assigned the task";
        return json_encode($status);
    }

    public function part_submit(Request $request)
    {
        // dd($_POST);
        try{
            $fields = array();
            $fields['request_id'] = $request->request_id;
            $fields['value'] = $request->value;
            $fields['part'] = $request->part;
            $fields['description'] = $request->description;
            $fields['component'] = $request->component;
            $fields['unit_price'] = $request->unit_price;
            $fields['sell_price'] = $request->sell_price;
            $fields['location'] = $request->location;
            $fields['quantity_price'] = $request->quantity_price;
            if (isset($_POST['record_id']) && $_POST['record_id'] != '') {
                $create = parts::where("id" , $_POST['record_id'])->update($fields);
            } else{
                $create = parts::create($fields);
            }
            if ($create) {
                return redirect()->back()->with('message', 'Part Saved');
            } else{
                return redirect()->back()->with('error', 'Error while saving part');
            }
        } catch(Exception $e){
            return redirect()->back()->with('error', 'Error while saving record');
        }
    }
    
    public function labour_submit(Request $request)
    {
        // dd($_POST);
        try{
            $fields = array();
            $fields['request_id'] = $request->request_id;
            $fields['tech'] = $request->tech_id;
            
            $fields['hours'] = $request->hours;
            $fields['pay_type'] = $request->pay_type;
            $fields['hourly_rate'] = $request->hourly_rate;
            if (isset($_POST['record_id']) && $_POST['record_id'] != '') {
                if (isset($_POST['work_date']) && $_POST['work_date'] != '') {
                    $fields['work_date'] = $request->work_date;
                }
                $create = labour::where("id" , $_POST['record_id'])->update($fields);
            } else{
                $fields['work_date'] = $request->work_date;
                $create = labour::create($fields);
            }
            if ($create) {
                return redirect()->back()->with('message', 'Record saved');
            } else{
                return redirect()->back()->with('error', 'Error while saving record');
            }
        } catch(Exception $e){
            return redirect()->back()->with('error', 'Error while saving record');
        }

    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
    }


    public function invoice_submit(Request $request)
    {
        // dd($_POST);
        $payment = array();
        $payment['is_paid'] = 1;
        $token_ignore = ['_token' => '' ];
        $post_feilds = array_diff_key($_POST , $token_ignore);
        $post_feilds['amount'] = (float) $post_feilds['amount'];
        $post_feilds['request_id'] = (int) $post_feilds['request_id'];
        try{
            $create = invoice::create($post_feilds);
            if ($create) {
                $pay = service_request::where("id" , $post_feilds['request_id'])->update($payment);
                $status['message'] = "Record saved successfully";
                $status['status'] = 1;
                return json_encode($status);
            } else{
                $status['message'] = "Error while saving record";
                $status['status'] = 0;
                return json_encode($status);
            }
        } catch(Exception $e){
            $status['message'] = "Error while saving record";
            $status['status'] = 0;
            return json_encode($status);
        }
    }


    public function invoice_modal(Request $request)
    {
        $service = service_request::where('id',$request->id)->first();
        $body ='';
        $body .= '<div id="certificate-info-modal"><div class="certificate-info" >
                        <div class="row ">
                            <div class="col-12 col-md-12 col-sm-12 col-lg-4 col-xl-4 col-xxl-4">
                                <p>Name: '.$service->name.'</p>
                                <p>Email: '.$service->email.'</p>
                                <p>Jobsite: '.$service->location.'</p>
                                <a href="tel:'.$service->phone.'">'.$service->phone.'</a>
                            </div>
                            <div class="col-12 col-md-12 col-sm-12 col-lg-4 col-xl-4 col-xxl-4">
                                <p>Bill to : '.$service->location.'</p>
                            </div>
                            <div class="col-12 col-md-12 col-sm-12 col-lg-4 col-xl-4 col-xxl-4">
                                <h4>Invoice : 175558588</h4>
                                <p>Site : GM Ener Tech Corp 67 Valentine St, Glen Cove, NY 11542</p>
                                <a href="tel:516 675 4345">Tel : (516) 675-4345</a>
                                <a >Email : info@gmenertech.com</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-start-center">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">TechName</th>
                                    <th scope="col">Terms</th>
                                    <th scope="col">TaxGroup</th>
                                    <th scope="col">PO</th>
                                    <th scope="col">PriceLevel</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>';
                            foreach ($service->labours as $key => $value) {
                                $body .= '<tr>
                                    <td>'.$value->labour->name.'</td>
                                    <td>DueNow</td>
                                    <td>Nassou</td>
                                    <td></td>
                                    <td>Standard</td>
                                    <td>'.date("M d,Y" ,strtotime($value->work_date)).'</td>
                                </tr>';
                            }
                                

        $body .= '          </tbody>
                        </table>
                    </div>
                    <div class="table-center">
                        <ul>
                            <li>Problem</li>
                            <li>
                                <p>'.$service->problem.'</p>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="table-center">
                        <ul>
                            <li>Work Performed</li>
                            <li>
                                '.$service->invoice->current_work_performed.'
                            </li>
                        </ul>
                    </div>
                    <div class="table-center">
                        <ul>
                            <li>Recomendation</li>
                            <li>
                                '.$service->invoice->current_recommendation.'
                            </li>
                        </ul>
                    </div>
                   
                    
                    <div class="table-start-center">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Part</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Unit Price</th>
                                    <th scope="col">Ext Price</th>
                                </tr>
                            </thead>
                            <tbody>';
                            foreach ($service->parts as $i => $part) {
                                $body .= '<tr>
                                    <td>'.$part->part.'</td>
                                    <td>'.$part->quantity_price.'</td>
                                    <td>$'.$part->sell_price.'</td>
                                    <td>$'.($part->quantity_price*$part->sell_price).'</td>
                                </tr>';
                            }
                            foreach ($service->labours as $j => $labour) {
                                $body .= '<tr>
                                    <td>'.$labour->labour->name.'</td>
                                    <td>$'.$labour->hourly_rate.'</td>
                                    <td>'.$labour->hours.'</td>
                                    <td>$'.($labour->hours*$labour->hourly_rate).'</td>
                                </tr>';
                            }
                            $body .= '
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>Total: </td>
                                    <td>$'.$service->invoice->amount.'</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    </div>';
        $status['message'] = $body;
        $status['status'] = 1;
        return json_encode($status);
    }

    public function add_technician() {
        $techs = User::where('role_id',3)->where('is_active',1)->where('is_deleted',0)->get();
        // dd($techs);
        return view('web.technician')->with(compact('techs'));
    }



    public function delete_part($id)
    {
        $res=parts::where('id',$id)->delete();
        return redirect()->back()->with('message', 'Record Deleted');
    }
    public function delete_labour($id)
    {
        $res=labour::where('id',$id)->delete();
        return redirect()->back()->with('message', 'Record Deleted');
    }
    public function index_view()
    {
        $production_schedule = production_schedule::paginate(5);
        $user = Auth::user();
        $title = 'Dan TerryBerry - Home';
        // dd($production_schedule);
        return view('web.index')->with(compact('production_schedule','user','title'));
    }
    public function technician_submit(Request $request)
    {
        $post_feilds['name'] = $request->name;
        $post_feilds['email'] = $request->email;
        if (isset($_POST['record_id']) && $_POST['record_id']!='') {
            if (isset($_POST['password']) && $_POST['password']!='') {
                $post_feilds['password'] = Hash::make($request->password);
            }
            $update = User::where('id',$request->record_id)->update($post_feilds);
        } else{
            $check = User::where('email',$request->email)->where('is_active',1)->where('is_deleted',0)->first();
            if ($check) {
                return redirect()->back()->with('error', 'The email has already been taken.');
            }
            $post_feilds['password'] = Hash::make($request->password);
            $create = User::create($post_feilds);
        }
        
        return back();
    }
    public function delete_tech($id)
    {
        $fields['is_active'] = 0;
        $fields['is_deleted'] = 1;
        $update = User::where('id',$id)->update($fields);
        return back()->with('message','Tech has been deleted');
    }



    public function dashboard()
    {
        $orders = orders::where('is_active' ,1)->where('paid_status' ,'Paid')->get();

        // Balance Sheet
        $balance = 0;
        if ($orders) {
            foreach ($orders as $key => $value) {
                $balance += $value->amount;
            }
        }
        $previous_balance = orders::select('amount')->where('is_active' ,1)->where('paid_status' ,'Paid')->limit(10)->latest('created_at')->get()->pluck('amount')->toArray();
        $previous_balance = implode(",", $previous_balance);
        // Balance Sheet End

        // User Registration
        $users = User::all();

        // Refund Cases
        $previous_balance_refund = orders::select('amount')->where('is_active' ,1)->where('paid_status' ,'Refund')->limit(10)->latest('created_at')->get()->pluck('amount')->toArray();
        $balance_refund = 0;
        $balance_count = count($previous_balance_refund);
        foreach ($previous_balance_refund as $key => $value) {
            $balance_refund += $value;
        }

        $previous_balance_refund = implode(",", $previous_balance_refund);

        // Payment Schdule
        $previous_balance_date = orders::where('is_active' ,1)->where('paid_status' , '!=', 'Pending')->get();
        $date_array = array();
        foreach ($previous_balance_date as $key => $value) {
            array_push($date_array, date("M" , strtotime($value->created_at)));
        }
        ;
        
        usort( $date_array , function($a, $b){
            $a = strtotime($a);
            $b = strtotime($b);
            return $a - $b;
        });
        $date_array = array_unique($date_array);
        $sale_dates = "";
        foreach ($date_array as $key => $value) {
            $sale_dates  .= "'".$value."',";  
        }
        
        $packages = packages::all();
        $testimonials = testimonials::all();
        return view('dashboard')->with(compact('orders','balance','previous_balance','users','previous_balance_refund','balance_refund','balance_count','sale_dates','packages','testimonials'));
    }



    public function steps()
    {
        if(Auth::user()->role_id == 1){
            $projects = attributes::where('attribute' , 'project')->where('is_active' ,1)->get();
            return view('steps')->with(compact('projects'));
        }else{
            return redirect()->back()->with('error', 'No Page Found');
        }
    }
    public function logo()
    {
        $user = Auth::user();
        $logo = logo::orderBy('id','desc')->get();
        $mainLogo = logo::orderBy('id','desc')->first();
        return view('logo')->with('title',"System Configuration")->with(compact('user','logo','mainLogo'));
    }
    public function change_logo(Request $request)
    {               
        $logo = new logo;
        $path = "";
        if ($request->file('pic_attach') != '') {
            $path = ($request->file('pic_attach'))->store('uploads/logo/'.md5(Str::random(20)), 'public');
        }
        $logo->image = $path;
        $logo->save();
        return redirect()->back()->with('success', 'Image has been successfully updated');       
    }
    public function switch_project($project_id)
    {
        if(Auth::user()->role_id == 1){
            $project = attributes::where('id',$project_id)->where('is_active' ,1)->first();
            $data['project_id'] = $project_id;
            Session::put("project_id" , $project_id);
            Helper::activity_log("login",$data);
            return redirect()->route('user_profile')->with('message', "Welcome to ".$project->name);
        }else{
            return redirect()->back()->with('error', 'No Page Found');
        }
    }
    public function user_profile()
    {
        $user = Auth::user();
        if (!$user->role_id == 1) {
            return redirect()->route("welcome");
        }
        return view('user-profile')->with('title',"Home Page")->with(compact('user'));
    }

    public function update_password()
    {
        $user = Auth::user();
        if (!$user->role_id == 1) {
            return redirect()->route("welcome");
        }
        return view('user-password')->with('title',"Home Page")->with(compact('user'));
    }

    public function user_rights()
    {
        $user = Auth::user();
        //dd(Session::get("project_id" ));
        $roles = attributes::where("is_active" ,1)->where('is_deleted' , 0)->get();
        return view('user-rights')->with('title',"User Rights")->with(compact('user','roles'));
    }
    public function user_infoupdate(Request $request)
    {
        $user = User::find(Auth::user()->id);
        
        $user->name = $request->name;
        // $name = explode(" ",$request->name);
        // $edit_feilds['firstname'] = $name[0];
        // $edit_feilds['lastname'] = $name[1];
        // dd($edit_feilds);
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->save();
        // $update = player::where("id" , $user->id)->update($edit_feilds);
        return redirect()->back()->with('message', 'Information updated successfully');
    }
    public function user_passwordupdate(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $old_password = $_POST['old_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $post_feilds['password']  = $hashed_password;
        if(password_verify($old_password, $user->password) && $new_password == $confirm_password && $new_password != $old_password) {
            $create = User::where("id" , $user->id)->update($post_feilds);
            return redirect()->back()->with('message', 'Information updated successfully');
        } else{
            return redirect()->back()->with('message', 'Problem updating Information');
        }
    }

    public function user_updates(Request $request)
    {
        $user = User::find($_POST['user_id']);
        if (!is_null($request->emp_id) && $request->emp_id != "") {
            $user->emp_id = $request->emp_id;
        }
        if (!is_null($request->role_id) && $request->role_id !="") {
            $user->role_id = $request->role_id;
        }
        if (!is_null($request->department_id) && $request->department_id != "") {
            $user->department = $request->department_id;
        }
        if (!is_null($request->designations) && $request->designations != "") {
            $user->designation = $request->designations;
        }
        if (!is_null($request->reporting_line_id) && $request->reporting_line_id != "") {
            $user->reporting_line = $request->reporting_line_id;
        }
        if (!is_null($request->salary) && $request->salary != "") {
            $user->salary = $request->salary;
        }
        if (!is_null($request->status) && $request->status != "") {
            $user->is_active = $request->status;
        }
        if (!is_null($request->shift_in) && $request->shift_in != "") {
            $user->shift_in = $request->shift_in;
        }
        if (!is_null($request->shift_out) && $request->shift_out != "") {
            $user->shift_out = $request->shift_out;
        }

        $user->save();
        return redirect()->back()->with('message', 'Information updated successfully');
    }

    public function shift_change()
    {
        
    }
    

// office details start
    public function user_office_details()
    {
        $user = Auth::user();
        return view('user-office-details')->with('title',"Office Details")->with(compact('user'));
    }
    public function user_office_infoupdate(Request $request)
    {
        $user = User::find(Auth::user()->id);
        
        // $user->emp_id = $request->emp_id;
        // $user->email = $request->email;
        // $user->designation = $request->designation;
        // $user->department = $request->department;
        // $user->join_date = $request->join_date;
        // $user->reporting_line = $request->reporting_line;
        $user->bank_account_number = $request->bank_account_number;
        $user->v_model_name = $request->v_model_name;
        $user->v_model_year = $request->v_model_year;
        $user->v_number_plate = $request->v_number_plate;
        
        $user->save();
        // Session::flash('message', 'This is a message!'); 
         Session::flash('alert-class', 'alert-danger'); 
        return redirect()->back()->with('message', 'Information updated successfully');
    }
// office details end

// file details start
    public function user_file_details()
    {
        $user = Auth::user();
        return view('user-file-details')->with('title',"file Details")->with(compact('user'));
    }
    public function user_file_infoupdate(Request $request)
    {
        // $user = User::find(Auth::user()->id);
        
        // $user->emp_id = $request->emp_id;
        // $user->email = $request->email;
        // $user->designation = $request->designation;
        // $user->department = $request->department;
        // $user->join_date = $request->join_date;
        // $user->reporting_line = $request->reporting_line;
        // $user->bank_account_number = $request->bank_account_number;
        // $user->v_model_name = $request->v_model_name;
        // $user->v_model_year = $request->v_model_year;
        // $user->v_number_plate = $request->v_number_plate;
        
        // $user->save();
        // Session::flash('message', 'This is a message!'); 
        // Session::flash('alert-class', 'alert-danger'); 
        // return redirect()->back()->with('success', 'Information updated successfully');
    }
// file details end

    public function upload_image(Request $request)
    {               
        $user = User::find(Auth::user()->id);
        $path = "";
        if ($request->file('pic_attach') != '') {
            $path = ($request->file('pic_attach'))->store('uploads/avatar/'.md5(Str::random(20)), 'public');
        }
        $user->profile_pic = $path;
        $user->save();
        return redirect()->back()->with('success', 'Image has been successfully updated');       
    }
    public function profile_submit(Request $request)
    {
        $user = User::find(Auth::user()->id);
        // Avatar Upload
        if ($request->has('avatar')) {
            if ($request->file('avatar') != '') {
                 $request->validate([
                 'avatar' => ['required', 'mimes:jpeg,png,jpg', 'max:2000']
                ]);
                $path_a = ($request->file('avatar'))->store('uploads/avatar/'.md5(Str::random(20)), 'public');
                $user->profile_pic = $path_a;
                $user->save();
                return redirect()->back()->with('message', 'Profile Picture been updated successfully');
            }
            else{
                 return redirect()->back()->with('error', 'File not found, please update your Profile Picture');
            }
        }
        // Resume Upload
        if ($request->has('cnic_file')) {
            if ($request->file('cnic_file') != '') {
            $request->validate([
             'cnic_file' => ['required', 'mimes:jpeg,png,jpg', 'max:2000']
            ]);
            $path_c = ($request->file('cnic_file'))->store('uploads/cnic/'.md5(Str::random(20)), 'public');
            $user->cnic_doc = $path_c;
            $user->save();
            return redirect()->back()->with('message', 'NIC Picture has been updated successfully');
        }
            else{
                 return redirect()->back()->with('error', 'File not found, please update your NIC Picture');
            }
        }
        // // CNIC Upload
        if ($request->has('cv_file')) {
            if ($request->file('cv_file') != '') {
            $request->validate([
             'cv_file' => ['required', 'mimes:doc,docs,pdf', 'max:5000']
            ]);
            $path_r = ($request->file('cv_file'))->store('uploads/resume/'.md5(Str::random(20)), 'public');
            $user->resume_doc = $path_r;
            $user->save();
            return redirect()->back()->with('message', 'Resume/CV Document has been updated successfully');
        }
            else{
                 return redirect()->back()->with('error', 'File not found, please update your Resume/CV Document');
            }
        }
       // // Education Upload
        if ($request->has('education_file')) {
            if ($request->file('education_file') != '') {
            $request->validate([
             'education_file' => ['required', 'mimes:doc,docs,pdf', 'max:5000']
            ]);
            $path_e = ($request->file('education_file'))->store('uploads/education/'.md5(Str::random(20)), 'public');
            $user->education_doc = $path_e;
            $user->save();
            return redirect()->back()->with('message', 'Education Document has been updated successfully');
        }
            else{
                 return redirect()->back()->with('error', 'File not found, please update your Education Document');
            }
        }
    }

    public function web_config()
    {
        $user = Auth::user();
        $config = config::all();
        return view('config')->with('title',"System Configuration")->with(compact('user','config'));
    }

    public function config_update(Request $request)
    {
        $token_ignore = ['_token' => ''];
        $post_feilds = array_diff_key($_POST , $token_ignore);
        foreach ($post_feilds as $key => $value) {
            $config = config::where("type" , $key)->first();
            $config->value = $value;
            $config->save();
        }
        return redirect()->back()->with('message', 'Setting has been updated.');
    }

    

    public function inquiry_manage()
    {
        $user = Auth::user();
        if (!$user->role_id == 1) {
            return redirect()->route("welcome");
        }

        
        $inquiry = inquiry::where("is_active" ,1)->where('is_deleted' , 0)->get();
        return view('inquiry-manage')->with('title',"Inquiry Management")->with(compact('user','inquiry'));
    }
    public function subcategory($accessories_id,$category_id){
        // dd($accessories_id,$category_id);
        return view('subcategory')->with(compact('accessories_id','category_id'));
    }
}
