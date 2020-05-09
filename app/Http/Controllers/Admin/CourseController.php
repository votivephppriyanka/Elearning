<?php 
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\CourseModel;
use Illuminate\Support\Facades\Auth; 
use Validator, DB;
use Illuminate\Validation\Rule;
use Twilio\Rest\Client;
use Session;

class CourseController extends Controller 
{
	public function course_list() {
		$data['course_list'] = DB::table('courses')->get();
		return view('admin/course/course_list')->with($data);
	}

	public function add_course(){
		return view('admin/course/add_course'); 
	}

	public function submit_course(Request $request){

		$validator = Validator::make($request->all(), [
			'course_name' => 'required'
		]);
		if ($validator->fails()) {
			session::flash('error', 'Validation error.');
			return redirect('/admin/add_course')->withErrors($validator)->withInput(); 
		} else {

			$course_name = $request->course_name;

        	$obj = new CourseModel;
			$obj->course_name = $course_name;
			$obj->status = 1;
			$obj->created_at = date('Y-m-d H:i:s');
			$res = $obj->save();
			if($res){
				session::flash('message', 'Record Addeed Succesfully.');
				return redirect('admin/course_list');
			}else{
				session::flash('error', 'Record not inserted.');
				return redirect('admin/course_list');
			}
		}
	}


	public function edit_course(Request $request){
		$course_id = base64_decode($request->id);
		$data['course_info'] = CourseModel::find($course_id);

		return view('admin/course/edit_course')->with($data) ;
	}

	public function update_course(Request $request){

		$course_id = $request->input('course_id') ;
		$course_name = $request->course_name;

		$courseData = CourseModel::where('id', $course_id)->first();
		$courseData->course_name = $course_name;
		$courseData->updated_at = date('Y-m-d H:i:s');
		$res = $courseData->save();
		
		if($res){
			session::flash('message', 'Record updated succesfully.');
			return redirect('admin/course_list');
		}else{
			session::flash('error', 'Somthing went wrong.');
			return redirect('admin/course_list');
		} 
	} 


	public function change_course_status(Request $request)
    {
        $course_info = CourseModel::find($request->course_id);
        $course_info->status = $request->status;
        $course_info->save();
  
        return response()->json(['success'=>'Course status change successfully.']);
    }


	public function delete_course(Request $request) {
		$course_id = $request->course_id;

		$course_info = DB::table('courses')->where('id','=',$course_id)->first();

		$res = DB::table('courses')->where('id', '=', $course_id)->delete();	

		if ($res) {
			return json_encode(array('status' => 'success','msg' => 'Data has been deleted successfully!'));
		} else {
			return json_encode(array('status' => 'error','msg' => 'Some internal issue occured.'));
		}

	}

}
?>