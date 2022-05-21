<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use Storage;
use DB;
use App\Models\User;
use Carbon\Carbon;
use Session;
use Maatwebsite\Excel\Facades\Excel;
use Redirect;
use Auth, Validator, Response;
class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
		$this->user = new User();
    }
	
	public function signup(Request $request){
		$validator = Validator::make($request->all(), [
			'name'	=> 'required',
			'email' => 'required|email',
			'mobile' => 'required|digits:10',
			'password' => 'required',
		]);		
		if ($validator->fails()) {
			return redirect()->back()->with('errors', $validator->getMessageBag()->toArray()); 			
		}else{
			$msg = User::emailmobilecheckexist($request->input('email'),$request->input('mobile'));
			if($msg!=''){
				return redirect()->back()->with('message', 'Email id is already exist please use another mail id...'); 				
			}
			$user = new User;
			$user->name = $request->input('name'); 
			$user->email = $request->input('email'); 
			$user->mobile = $request->input('mobile');
			$user->password = Hash::make($request->input('password'));
			$user->save();
			auth()->login($user);
			if(env('MAILENV') == 'live'){
				$data = array('email'=>$request->input('email'),'name'=>$request->input('name'));
				$mail = Mail::send('mail.registration', $data, function($message) use ($data) {
					$message->to($data['email'], $data['name'])->subject
					('Payhub Registration');
					$message->from(env('MAIL_FROM_ADDRESS'),'');
				});
			}
			return redirect()->back()->with('Mobile number is already exist please use another mobile number...'); 			
		}
	}
	public function signin(Request $request){
		$validator = Validator::make($request->all(), [
			'username'	=> 'required',
			'password' => 'required',
		]);		
		if ($validator->fails()) {
			return Response::json(array(
				'success' => false,
				'errors' => $validator->getMessageBag()->toArray()

			), 400);			
		}else{
			$login = 0;
			if (Auth::attempt(['email' => $request->input('username'), 'password' => $request->input('password'), 'status' => 0])) {
				$login = 1;				
			}elseif(Auth::attempt(['email' => $request->input('username'), 'password' => $request->input('password'), 'status' => 0])) {
				$login = 1;
			}
			if($login == 1){
				return Response::json(array(
					'success' => true,
					'message' => 'Successfully register please wait.....'
				), 200);
			}else{
				return Response::json(array(
					'success' => false,
					'errors' => array('Invalid email or mobile number pls enter valid information...')
				), 400);
			}				
		}
	}
	public function privacypolicy(){
		
      return view('admin.privacypolicy');

	}

}
