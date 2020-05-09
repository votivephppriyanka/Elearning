<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User, Hash; 
use Illuminate\Support\Facades\Auth; 
use Validator, DB;
use Illuminate\Validation\Rule;
use Twilio\Rest\Client;
use Session;
use Helper; 

class UserController extends Controller 
{
public $successStatus = true;
public $failureStatus = false;
    /** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */ 

    public function signin(){

        return view('auth/user_login');
    }

    public function login(Request $request){ 
        $validator = Validator::make($request->all(), [ 
            //'email' => 'required|email',
            'email' => 'required', 
            'password' => 'required', 
        ],
        [
            'email.required' => "Email is required",
            'password.required' =>  "Password is required",
        ]
        );
        if ($validator->fails()) {
            $messages = $validator->messages();
            foreach ($messages->all() as $message)
            {   
                return response()->json(['status'=>$this->failureStatus,'msg'=>$message]);            
            }
        }
        $email = $request->email;
        $user = DB::table('users')
                ->where('status', '=', 1)
                ->where('role_id', '=', 2)
                ->orwhere('role_id', '=', 3)
                ->where(function($query) use ($email){
                    $query->where('email', $email);
                })           
                ->first();
        if(!empty($user)){
            $credentials = array(
                        'email'         => $user->email,
                        'password'      => $request->password,
                        'status'   => '1'
                    );          
            if (Auth::attempt($credentials)){
                $status = ''; 
                $msg = ''; 
                if(($user->status == 0) && ($user->is_verify_email== 0)){
                    Auth::logout();
                    $status = $this->successStatus; 
                    $msg = "You accout is not verify";  
                }
                
                if(($user->status == 0) && ($user->is_verify_email== 1)){
                    Auth::logout();
                    $status = $this->failureStatus; 
                    $msg = "Your profile is inactivate please contact to admin";                    
                }
                if (($user->status == 1) && ($user->is_verify_email== 1)){
                    $user = Auth::user(); 
                    //$data = User::findorfail(Auth::user()->id);
                    // $data->device_type  = $request->device_type;
                    // $data->device_token = $request->device_token; 
                    //$data->save();
                    $status = $this->successStatus; 
                    $msg = Auth::user()->first_name. " Logged in successfully";

                    // $Query = DB::table('users')->where('id',$user->id)->update([
                    //     "firebase_token" => $request->firebase_token
                    // ]);                   
                }
                if(($user->status == 1) && ($user->is_verify_email== 0)){
                    $status = $this->successStatus; 
                    $msg = "You accout is not verify";                    
                }
                 // $nationality = DB::table("nationality")->where('n_id', $user->nationality_id)->first();

            // if(!empty($user->profile_img)){
            //     $img = url('public/uploads/profile_img').'/'.$user->profile_img;
            // }else{
            //     $img = url('resources/assets/images/blank_user.jpg');
            // }

                return response()->json([
                        'status'=>$status, 
                        'msg' => $msg,
                        'user_role'=>Auth::user()->role_id, 
                        'response' => 
                            [
                                'user_id'           => $user->id,
                                'fullname'          => $user->first_name,
                                'email'             => $user->email,
                                'role_id'           => $user->role_id,
                            ]
                    ]);
            }else{
                return response()->json([
                    'status'=>$this->failureStatus, 
                    'msg' => "Email id password not exists",
                    ]); 
            }
               
           
        }else{
            return response()->json(['status'=>$this->failureStatus, 'msg' => "User does not exists"]); 
        }
    }

    public function registration(){

        return view('auth/register');
    }
 
    public function student_save(Request $request) 
    {   
        $validator = Validator::make($request->all(), [ 
            'first_name'  => 'required',
            'last_name'  => 'required',
            'username'  => 'required',  
            'email' => [
                    'required',
                    'email',
                    Rule::unique('users')->where(function ($query) {
                        return $query->where('status','=', 1);
                    }),
                ], 
          
            'password'  => [
                'required', 
                'min:8', 
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/'
                
           ],
          
        ],
        [   
            'first_name.required'       =>"First name is required",
            'last_name.required'        =>"last name is required",
            'username.required'        =>"Username is required",
            'email.email'               =>"Please enter vailid email id",
            'email.unique'              =>"Email id already exists",
            'password.required'         => "Password is required",
            'password.min'              => "Please password 8 digits or character",
            'password.regex'            => "Password should be contain one capital latter, numbar and special character",
        ]);
        if ($validator->fails()) {
            $messages = $validator->messages();
            foreach ($messages->all() as $message)
            {   
                return response()->json(['status'=>$this->failureStatus,'msg'=>$message]);            
            }
        }
        $forminput  = $request->all();
    

            // $name = '';
            // if ($request->hasFile('profile_img')) {
            //     $image = $request->file('profile_img');
            //     $name = time().'.'.$image->getClientOriginalExtension();
            //     $destinationPath = public_path('/uploads/profile_img');         
            //     $imagePath = $destinationPath. '/'.  $name;
            //     $image->move($destinationPath, $name);
            // }

            $digits                 = 6;
            $otp                    = rand(pow(10, $digits-1), pow(10, $digits)-1);
            $forminput              = $request->all();
            $user                   = new User; 
            $user->first_name         = $forminput['first_name'];
            $user->last_name         = $forminput['last_name'];
            $user->username         = $forminput['username'];
            $user->password         = Hash::make($forminput['password']);
            $user->status      = '0';
            $user->role_id     = '3';
            $user->vrfn_code       = $otp;
            $user->is_verify_email  = '0';
            $user->email            = $forminput['email'];       
            $user->created_at       = Date('Y-m-d H:i:s');
           
            //$user->profile_img      = $name;
            
               
            if($user->save()){
                $searchArray = array("{user_fname}", "{user_lname}","{user_email}", "{user_otp}");

                $replaceArray = array($user->first_name, $user->last_name, $user->email, $otp);

                $email_content = "<p>Hello, {user_fname} {user_lname} <br>
                Welcome to Elearning<br>
                your verfication otp is : {user_otp}
                </p>";

                $content = str_replace($searchArray, $replaceArray, $email_content);

                $data = [
                'name'      => $user->first_name,
                'email'     => $user->email,                 
                'subject'   => "Elearning",
                'content'   => $content,
                ];

                Helper::send_mail($data);

                return response()->json(          
                    [
                        'status'=>$this->successStatus, 
                        'msg' => "You have registered successfully",
                    ]
                ); 
            }else{
                return response()->json(['status'=>$this->failureStatus, 'msg' => "some thing is wrong please try again later."]);
            }
    
    }



    public function become_a_tutors(){

       $data['country_code'] =DB::table('countrycode')->get(); 
        return view('auth/teacher_register')->with($data);
    }
 
    public function tutors_save(Request $request) 
    {   
        $validator = Validator::make($request->all(), [ 
            'first_name'  => 'required',
            'last_name'  => 'required', 
            'email' => [
                    'required',
                    'email',
                    Rule::unique('users')->where(function ($query) {
                        return $query->where('status','=', 1);
                    }),
                ], 

            'contact_number' => [
                'required',
                'min:8',
                'max:16',
                Rule::unique('users')->where(function ($query) {
                    return $query->where('status','=', 1);
                }),
            ], 
          
            'password'  => [
                'required', 
                'min:8', 
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/'
                
           ],
          
        ],
        [   
            'first_name.required'       =>"First name is required",
            'last_name.required'        =>"last name is required",
            'email.email'               =>"Please enter vailid email id",
            'email.unique'              =>"Email id already exists",
            'contact_number.required'   =>"Contact number is required",
            'contact_number.min'        => "Please enter vailid contact number",
            'contact_number.max'        => "Please enter vailid contact number",
            'contact_number.unique'     => "Contact number already exists",
            'password.required'         => "Password is required",
            'password.min'              => "Please password 8 digits or character",
            'password.regex'            => "Password should be contain one capital latter, numbar and special character",
        ]);
        if ($validator->fails()) {
            $messages = $validator->messages();
            foreach ($messages->all() as $message)
            {   
                return response()->json(['status'=>$this->failureStatus,'msg'=>$message]);            
            }
        }

            // $name = '';
            // if ($request->hasFile('profile_img')) {
            //     $image = $request->file('profile_img');
            //     $name = time().'.'.$image->getClientOriginalExtension();
            //     $destinationPath = public_path('/uploads/profile_img');         
            //     $imagePath = $destinationPath. '/'.  $name;
            //     $image->move($destinationPath, $name);
            // }


            $digits                 = 6;
            $otp                    = rand(pow(10, $digits-1), pow(10, $digits)-1);
            $forminput              = $request->all();
            $user                   = new User; 
            $user->first_name         = $forminput['first_name'];
            $user->last_name         = $forminput['last_name'];
            $user->username         = $forminput['first_name'];
            $user->password         = Hash::make($forminput['password']);
            $user->status      = '0';
            $user->role_id     = '2';
            $user->vrfn_code       = $otp;
            $user->is_verify_email  = '0';
            $user->email            = $forminput['email'];
            $user->contact_number   = $forminput['contact_number']; 
            $user->code   = $forminput['code'];           
            $user->created_at       = Date('Y-m-d H:i:s');

            $access_key = 'a4cb1b1ea5acd891f759a5d0b29de70c';

            // set phone number
            $phone_number = $forminput['code'].''.$forminput['contact_number'];

            // Initialize CURL:
            $ch = curl_init('http://apilayer.net/api/validate?access_key='.$access_key.'&number='.$phone_number.'');  
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $json = curl_exec($ch);
            curl_close($ch);
            $validationResult = json_decode($json, true);
            $valid=$validationResult['valid'];  

            //$user->profile_img      = $name;
            if($valid=="1"){
            if($user->save()){
                $searchArray = array("{user_fname}", "{user_lname}","{user_email}", "{user_otp}");

                $replaceArray = array($user->first_name, $user->last_name, $user->email, $otp);

                $email_content = "<p>Hello, {user_fname} {user_lname} <br>
                Welcome to Elearning<br>
                your verfication otp is : {user_otp}
                </p>";

                $content = str_replace($searchArray, $replaceArray, $email_content);

                $data = [
                'name'      => $user->first_name,
                'email'     => $user->email,                 
                'subject'   => "Elearning",
                'content'   => $content,
                ];

                Helper::send_mail($data);

                return response()->json(          
                    [
                        'status'=>$this->successStatus, 
                        'msg' => "You have rehistered successfully",
                    ]
                ); 
            }else{
                return response()->json(['status'=>$this->failureStatus, 'msg' => "some thing is wrong please try again later."]);
            }
        }else{

            return response()->json(['status'=>$this->failureStatus, 'msg' => "Please enter vailid contact number"]);
        }
    
    }

   
    public function verification(){
        return view('auth/verify');
    }

    public function verifyotp(Request $request){
        $forminput =  $request->all();
        $validator = Validator::make($request->all(), [ 
                'otp'  => 'required|min:6',           
            ],
            [   
                'otp.required'     => "OTP is required",
                'otp.min'          => "OTP is 6 digit please enter vailid otp",
            ]
        );
            if ($validator->fails()) { 
                $messages = $validator->messages();
                foreach ($messages->all() as $message)
                {   
                    return response()->json(['status'=>$this->failureStatus,'msg'=>$message]);            
                }            
            }

    
            $user = User::where('vrfn_code', $forminput['otp'])->where('status', '!=', 1)->first();
            if(/*(count($user)>0) &&*/ (!empty($user))){
                $user->status = 1;                
                $user->vrfn_code = null;
                $user->is_verify_email = 1;
                $user->save();
                return response()->json(['status'=>$this->successStatus, 'msg' => 'Your account has been verify successfully', 'response'=>['user_id' => $user->id]]); 
            }else{
                return response()->json(['status'=>$this->failureStatus, 'msg' => "You have entered Invailid otp "]); 
            }
        

    } 
    public function forgotpass(Request $request)
    {
        $email = $request->email;
        $pass_token = rand(100000, 999999); 

        //echo $pass_token  = str_random(6); die;   
         
        $sql =DB::table('users')->where('email', $email)->update(['vrfn_code' =>$pass_token]); 
        if($sql){      
            $data['usersdata']  = DB::table('users')->where('email', $email)->where('vrfn_code', $pass_token)->get();
        $id =   $data['usersdata'][0]->id;

        $searchArray = array("{user_email}");  

        $replaceArray = array($email);
        
        //$url = '{url(admin/forgot)}';
        
            $email_content = "<h3>Hello Dear,</h3>
            Admin<br>
            <p>Please use this code <h4><b>".$pass_token."</b></h4></p>
        <p>Click on the button below the reset your password.</p>
        <a href='".url('resetpass/'.$id.'')."'>Click Here</a>";
        
        //print_r($email_content); die;
        
            $content = str_replace($searchArray, $replaceArray, $email_content);
            $data = [
                'name'      => 'Admin',
                'email'     => $email,
                'subject'   => "Forgot Password",
                'content'   => $content,
            ];
            Helper::send_mail($data); 
            return redirect('login')->with('success', 'Email sent successfully.');
        }
        else {
         return redirect('password/reset')->with('warning', 'Please enter vaild  mail-id.');
      
        }
    }


    public function resetpass($id)
    {
         $data['user_id']= $id;
         $data['title']= 'Reset Password';
             return view('auth.passwords.reset', ['data'=>$data]);
    } 

     public function updateforgot(Request $request)
    {
      
    $token = $request->input('token');
    $token_id = $request->input('token_id');
    $password = $request->input('password');
    $password_confirmation = Hash::make($request->input('password_confirmation'));

    if($request->input('password')!= $request->input('password_confirmation')){
    return redirect('admin/resetpass/'.$user_id.'')->with('warning', 'Password confirmation does not match password!');
    }else {
    $data['usersdata']  = DB::table('users')->where('id', $token)->where('vrfn_code', $token_id)->get();
    $datauser = count($data['usersdata']);
    if($datauser!=0){
    DB::table('users')
             ->where('id',$token)
             ->update(['vrfn_code'=>null, 'password'=> $password_confirmation]);  

       return redirect('login')->with('success', 'Password Update successfully.');
       }
       else {

      return redirect('resetpass/'.$user_id.'')->with('warning', 'Please Enter correct code.');
       }
    }   
    }

}