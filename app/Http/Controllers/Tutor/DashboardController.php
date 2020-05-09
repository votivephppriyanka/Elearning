<?php
namespace App\Http\Controllers\Tutor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\Auth; 
use Validator, DB;
use App\User;
use Illuminate\Validation\Rule;
use Twilio\Rest\Client;
use Session;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('tutor/dashboard');
    }
	
	public function logout(){
        Auth::logout();
        //return redirect('/login');
        return redirect('/signin');
    }
}
