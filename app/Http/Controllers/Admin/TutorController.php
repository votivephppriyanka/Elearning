<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\User;
use Illuminate\Support\Facades\Auth; 
use Validator, DB;
use Illuminate\Validation\Rule;
use Twilio\Rest\Client;
use Session;
use App\Imports\TutorImport;
use App\Exports\TutorExport;
use Maatwebsite\Excel\Facades\Excel;

class TutorController extends Controller 
{
	public function tutor_list() {
		$data['tutor_list'] = DB::table('users')->where('role_id',2)->get();
		return view('admin/tutor/tutor_list')->with($data);
	}

	public function add_tutor(){
		return view('admin/tutor/add_tutor'); 
	}

	public function submit_tutor(Request $request){

		$validator = Validator::make($request->all(), [
			'name' => 'required',
			'username' => 'required',
			'curriculum' => 'required',
			'email' => 'required',
			'password' => 'required'
		]);
		if ($validator->fails()) {
			session::flash('error', 'Validation error.');
			return redirect('/admin/add_tutor')->withErrors($validator)->withInput(); 
		} else {

			$name = $request->name;
        	$email = $request->email;
        	$password = $request->password;
        	$username = $request->username;
        	$curriculum = $request->curriculum;
        	$name_arr = explode(' ', $name);

        	$obj = new User;
			$obj->first_name = (!empty($name_arr[0]) ? $name_arr[0] : '');
			$obj->last_name = (!empty($name_arr[1]) ? $name_arr[1] : '');
			$obj->username = $username;
			$obj->email = $email;
			$obj->role_id = 2;
			$obj->curriculum = $curriculum;
			$obj->grade = "";
			$obj->password = bcrypt($password);
			$obj->status = 1;
			$obj->created_at = date('Y-m-d H:i:s');
			$res = $obj->save();
			if($res){
				session::flash('message', 'Record Addeed Succesfully.');
				return redirect('admin/tutor_list');
			}else{
				session::flash('error', 'Record not inserted.');
				return redirect('admin/tutor_list');
			}
		}
	}


	public function edit_tutor(Request $request){
		$tutor_id = base64_decode($request->id);
		$data['tutor_info'] = User::find($tutor_id);

		return view('admin/tutor/edit_tutor')->with($data) ;
	}

	public function update_tutor(Request $request){

		$tutor_id = $request->input('tutor_id') ;
		$name = $request->name;
    	$email = $request->email;
    	$password = $request->password;
    	$username = $request->username;
    	$curriculum = $request->curriculum;
    	$name_arr = explode(' ', $name);

		$tutorData = User::where('id', $tutor_id)->first();
		$tutorData->first_name = (!empty($name_arr[0]) ? $name_arr[0] : '');
		$tutorData->last_name = (!empty($name_arr[1]) ? $name_arr[1] : '');
		$tutorData->username = $username;
		$tutorData->curriculum = $curriculum;
		$tutorData->updated_at = date('Y-m-d H:i:s');
		$res = $tutorData->save();
		
		if($res){
			session::flash('message', 'Record updated succesfully.');
			return redirect('admin/tutor_list');
		}else{
			session::flash('error', 'Somthing went wrong.');
			return redirect('admin/tutor_list');
		} 
	} 


	public function change_tutor_status(Request $request)
    {
        $tutor_info = User::find($request->tutor_id);
        $tutor_info->status = $request->status;
        $tutor_info->save();
  
        return response()->json(['success'=>'Tutor status change successfully.']);
    }


	public function delete_tutor(Request $request) {
		$tutor_id = $request->tutor_id;

		$student_info = DB::table('users')->where('id','=',$tutor_id)->first();

		$res = DB::table('users')->where('id', '=', $tutor_id)->delete();	

		if ($res) {
			return json_encode(array('status' => 'success','msg' => 'Data has been deleted successfully!'));
		} else {
			return json_encode(array('status' => 'error','msg' => 'Some internal issue occured.'));
		}

	}


	public function change_password(Request $request){

        $tutor_id = base64_decode($request->id);
        $data['tutor_info'] = User::find($tutor_id);
        return view('admin/tutor/change_password')->with($data);

    }


	public function update_password(Request $request) {
        
        $user_id = $request->tutor_id;
        $user_info = User::find($user_id);

        /*if (!(Hash::check($request->get('current-password'), $user_info->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }*/

        $validatedData = $request->validate([
            //'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user_info->password = bcrypt($request->input('new-password'));
        $user_info->save();

        return redirect()->back()->with("message","Password changed successfully !");
    }

    public function TutorImportData(Request $request) {

    	if( $request->file('import_file') ) {
		    $path = $request->file('import_file')->getRealPath();
		    $data = \Excel::import(new TutorImport,$path);
		    if($data){
		    	session::flash('message', 'File import succesfully.');
				return redirect('admin/tutor_list');
		    }else{
		    	session::flash('error', 'Something went Wrong.');
				return redirect('admin/tutor_list');
		    }
		    
		} else {
		   	session::flash('error', 'Some internal error.');
			return redirect('admin/tutor_list');
		}
 
        
    }


    public function TutorExportData(){
        return Excel::download(new TutorExport, 'tutor.xlsx');
    }
	

}
?>