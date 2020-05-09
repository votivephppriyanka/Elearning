<?php 
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\CourseModel,App\CourseTopicModel;
use Illuminate\Support\Facades\Auth; 
use Validator, DB;
use Illuminate\Validation\Rule;
use Twilio\Rest\Client;
use Session;

class CourseTopicController extends Controller 
{
	public function course_topic_list() {
		$data['course_topic_list'] = DB::table('course_topic')->leftjoin('courses', "courses.id",'=', "course_topic.course_id")->select('*', 'courses.status as course_status', 'course_topic.status as course_topic_status')->get();
		return view('admin/course/course_topic_list')->with($data);
	}

	public function add_course_topic(){
		$data['course_info'] = DB::table('courses')->where('status','=','1')->get();
		return view('admin/course/add_course_topic')->with($data); 
	}

	public function submit_course_topic(Request $request){

		$validator = Validator::make($request->all(), [
			'course_topic_name' => 'required'
		]);
		if ($validator->fails()) {
			session::flash('error', 'Validation error.');
			return redirect('/admin/add_course')->withErrors($validator)->withInput(); 
		} else {

			$course_topic_name = $request->course_topic_name;

        	$obj = new CourseTopicModel;
			$obj->course_topic_name = $course_topic_name;
			$obj->course_id = $request->course_id;
			$obj->status = 1;
			$obj->created_at = date('Y-m-d H:i:s');
			$res = $obj->save();
			if($res){
				session::flash('message', 'Record Addeed Succesfully.');
				return redirect('admin/course_topic_list');
			}else{
				session::flash('error', 'Record not inserted.');
				return redirect('admin/course_topic_list');
			}
		}
	}


	public function edit_course_topic(Request $request){
	    $course_topic_id = base64_decode($request->course_topic_id);

		$data['course_topic_info'] = DB::table('course_topic')->where('course_topic_id', $course_topic_id)->first();
		$data['course_info'] = DB::table('courses')->where('status','=','1')->get();
		return view('admin/course/edit_course_topic')->with($data);
	}

	public function update_course_topic(Request $request){

		$course_topic_id = $request->course_topic_id;
		$course_id = $request->course_id;
		$course_topic_name = $request->course_topic_name;
		$updated_at = date('Y-m-d H:i:s');

		$courseData = DB::table('course_topic')->where('course_topic_id', $course_topic_id) ->update(['course_id' => $course_id, 'course_topic_name'=> $course_topic_name, 'updated_at' =>$updated_at]);

		
		if($courseData){
			session::flash('message', 'Record updated succesfully.');
			return redirect('admin/course_topic_list');
		}else{
			session::flash('error', 'Somthing went wrong.');
			return redirect('admin/course_topic_list');
		} 
	} 


	public function change_course_topic_status(Request $request)
    {
        $course_topic_id = $request->course_topic_id;
        $status = $request->status;
        //$course_info->save();

        $courseData = DB::table('course_topic')->where('course_topic_id', $course_topic_id)->update(['status' => $status]);
  
        return response()->json(['success'=>'Course status change successfully.']);
    }


	public function delete_course_topic(Request $request) {
		$course_topic_id = $request->course_topic_id;

		$course_info = DB::table('course_topic')->where('course_topic_id','=',$course_topic_id)->first();

		$res = DB::table('course_topic')->where('course_topic_id', '=', $course_topic_id)->delete();	

		if ($res) {
			return json_encode(array('status' => 'success','msg' => 'Data has been deleted successfully!'));
		} else {
			return json_encode(array('status' => 'error','msg' => 'Some internal issue occured.'));
		}

	}

}
?>