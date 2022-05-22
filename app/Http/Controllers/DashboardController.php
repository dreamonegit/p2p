<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use Storage;
use DB;
use App\Models\Coin;
use App\Models\Countries;
use App\Models\LoginHistory;
use Carbon\Carbon;
use Session;
use Maatwebsite\Excel\Facades\Excel;
use Redirect;
use Auth, Validator, Response;

class DashboardController extends Controller
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
    public function index(Request $request)
    {
		return view('usersection.dashboard');
    }
	
	public function account(Request $request){
		$this->data['countries'] = Countries::all();
		$this->data['loghistory'] = LoginHistory::where('userid',auth::user()->id)->get();
		return view('user.account',$this->data);
	}
}
