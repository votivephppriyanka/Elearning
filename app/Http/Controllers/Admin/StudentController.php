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
use App\Imports\StudentImport;
use App\Exports\StudentExport;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller 
{
	public function student_list() {
		$data['student_list'] = DB::table('users')->where('role_id',3)->get();
		return view('admin/student/student_list')->with($data);
	}

	public function add_student(){
		$data['grade_list'] = DB::table('grades')->where('status',1)->get();
		$data['course_list'] = DB::table('courses')->where('status',1)->get();
		return view('admin/student/add_student')->with($data); 
	}

	public function submit_student(Request $request){

		$validator = Validator::make($request->all(), [
			'name' => 'required',
			'username' => 'required',
			'email' => 'required',
			'password' => 'required',
			'grade' => 'required',
			'curriculum' => 'required',
		]);
		if ($validator->fails()) {
			session::flash('error', 'Validation error.');
			return redirect('/admin/add_student')->withErrors($validator)->withInput(); 
		} else {

			$name = $request->name;
        	$email = $request->email;
        	$password = $request->password;
        	$username = $request->username;
        	$curriculum = $request->curriculum;
        	$grade = $request->grade;
        	$name_arr = explode(' ', $name);

        	$obj = new User;
			$obj->first_name = (!empty($name_arr[0]) ? $name_arr[0] : '');
			$obj->last_name = (!empty($name_arr[1]) ? $name_arr[1] : '');
			$obj->username = $username;
			$obj->email = $email;
			$obj->role_id = 3;
			$obj->grade = $grade;
			$obj->curriculum = $curriculum;
			$obj->password = bcrypt($password);
			$obj->status = 1;
			$obj->created_at = date('Y-m-d H:i:s');
			$res = $obj->save();
			if($res){
				session::flash('message', 'Record Addeed Succesfully.');
				return redirect('admin/student_list');
			}else{
				session::flash('error', 'Record not inserted.');
				return redirect('admin/student_list');
			}
		}
	}


	public function edit_student(Request $request){
		$student_id = base64_decode($request->id);
		$data['student_info'] = User::find($student_id);
		$data['grade_list'] = DB::table('grades')->where('status',1)->get();
		$data['course_list'] = DB::table('courses')->where('status',1)->get();

		return view('admin/student/edit_student')->with($data) ;
	}

	public function update_student(Request $request){

		$student_id = $request->input('student_id') ;

		$name = $request->name;
    	$email = $request->email;
    	$password = $request->password;
    	$username = $request->username;
    	$curriculum = $request->curriculum;
    	$grade = $request->grade;
    	$name_arr = explode(' ', $name);

		$studentData = User::where('id', $student_id)->first();
		$studentData->first_name = (!empty($name_arr[0]) ? $name_arr[0] : '');
		$studentData->last_name = (!empty($name_arr[1]) ? $name_arr[1] : '');
		$studentData->username = $username;
		$studentData->curriculum = $curriculum;
		$studentData->grade = $grade;
		$studentData->updated_at = date('Y-m-d H:i:s');
		$res = $studentData->save();
		
		if($res){
			session::flash('message', 'Record updated succesfully.');
			return redirect('admin/student_list');
		}else{
			session::flash('error', 'Somthing went wrong.');
			return redirect('admin/student_list');
		} 
	} 


	public function change_student_status(Request $request)
    {
        $student_info = User::find($request->student_id);
        $student_info->status = $request->status;
        $student_info->save();
  
        return response()->json(['success'=>'Student status change successfully.']);
    }


	public function delete_student(Request $request) {
		$student_id = $request->student_id;

		$student_info = DB::table('users')->where('id','=',$student_id)->first();

		$res = DB::table('users')->where('id', '=', $student_id)->delete();	

		if ($res) {
			return json_encode(array('status' => 'success','msg' => 'Data has been deleted successfully!'));
		} else {
			return json_encode(array('status' => 'error','msg' => 'Some internal issue occured.'));
		}

	}


	public function change_password(Request $request){

        $student_id = base64_decode($request->id);
        $data['student_info'] = User::find($student_id);
        return view('admin/student/change_password')->with($data);

    }


	public function update_password(Request $request) {
        
        $user_id = $request->student_id;
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

	public function StudentImportData(Request $request)
    {

    	if( $request->file('import_file') ) {
		    $path = $request->file('import_file')->getRealPath();
		    $data = \Excel::import(new StudentImport,$path);
		    if($data){
		    	session::flash('message', 'File import succesfully.');
				return redirect('admin/student_list');
		    }else{
		    	session::flash('error', 'Something went Wrong.');
				return redirect('admin/student_list');
		    }
		} else {
		   	session::flash('message', 'Some internal error.');
			return redirect('admin/student_list');
		}
 
        
    }


    public function StudentExportData() 
    {
        return Excel::download(new StudentExport, 'student.xlsx');
    }

}
?>