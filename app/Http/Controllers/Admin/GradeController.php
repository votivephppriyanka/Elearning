<?php 
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\GradeModel;
use Illuminate\Support\Facades\Auth; 
use Validator, DB;
use Illuminate\Validation\Rule;
use Twilio\Rest\Client;
use Session;

class GradeController extends Controller 
{
	public function grade_list() {
		$data['grade_list'] = DB::table('grades')->get();
		return view('admin/grade/grade_list')->with($data);
	}

	public function add_grade(){
		return view('admin/grade/add_grade'); 
	}

	public function submit_grade(Request $request){

		$validator = Validator::make($request->all(), [
			'grade' => 'required'
		]);
		if ($validator->fails()) {
			session::flash('error', 'Validation error.');
			return redirect('/admin/add_grade')->withErrors($validator)->withInput(); 
		} else {

			$grade = $request->grade;

        	$obj = new GradeModel;
			$obj->grade = $grade;
			$obj->status = 1;
			$obj->created_at = date('Y-m-d H:i:s');
			$res = $obj->save();
			if($res){
				session::flash('message', 'Record Addeed Succesfully.');
				return redirect('admin/grade_list');
			}else{
				session::flash('error', 'Record not inserted.');
				return redirect('admin/grade_list');
			}
		}
	}


	public function edit_grade(Request $request){
		$grade_id = base64_decode($request->id);
		$data['grade_info'] = GradeModel::find($grade_id);

		return view('admin/grade/edit_grade')->with($data) ;
	}

	public function update_grade(Request $request){

		$grade_id = $request->input('grade_id') ;
		$grade = $request->grade;

		$gradeData = GradeModel::where('id', $grade_id)->first();
		$gradeData->grade = $grade;
		$gradeData->updated_at = date('Y-m-d H:i:s');
		$res = $gradeData->save();
		
		if($res){
			session::flash('message', 'Record updated succesfully.');
			return redirect('admin/grade_list');
		}else{
			session::flash('error', 'Somthing went wrong.');
			return redirect('admin/grade_list');
		} 
	} 


	public function change_grade_status(Request $request)
    {
        $grade_info = GradeModel::find($request->grade_id);
        $grade_info->status = $request->status;
        $grade_info->save();
  
        return response()->json(['success'=>'Grade status change successfully.']);
    }


	public function delete_grade(Request $request) {
		$grade_id = $request->grade_id;

		$grade_info = DB::table('grades')->where('id','=',$grade_id)->first();

		$res = DB::table('grades')->where('id', '=', $grade_id)->delete();	

		if ($res) {
			return json_encode(array('status' => 'success','msg' => 'Data has been deleted successfully!'));
		} else {
			return json_encode(array('status' => 'error','msg' => 'Some internal issue occured.'));
		}

	}

}
?>