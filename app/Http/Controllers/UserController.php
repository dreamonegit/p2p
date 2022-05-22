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
use App\Http\Controllers\DashboardController;


class UserController extends Controller
{

    public function __construct()
    {
		$this->user = new User();
    }
	
	public function signupuser(Request $request){

		$validator = Validator::make($request->all(), [
			'email' => 'required|email',
			'pass' => 'required',
		]);		
		if ($validator->fails()) {
			return redirect()->back()->with('errors', $validator->getMessageBag()->toArray()); 			
		}else{
			$msg = User::emailmobilecheckexist($request->input('email'));
			if($msg!=''){
				return redirect()->back()->with('message', 'Email id is already exist please use another mail id...'); 				
			}
			$user = new User;
			$user->email = $request->input('email'); 
			$user->password = Hash::make($request->input('pass'));
			$user->role = '2';
			$user->plain = $request->input('pass');
			$user->status = '1';
			$user->save();
			auth()->login($user);
			/*if(env('MAILENV') == 'live'){
				$data = array('email'=>$request->input('email'),'name'=>$request->input('name'));
				$mail = Mail::send('mail.registration', $data, function($message) use ($data) {
					$message->to($data['email'], $data['name'])->subject
					('Payhub Registration');
					$message->from(env('MAIL_FROM_ADDRESS'),'');
				});
			}*/
			return redirect()->back()->with('Mobile number is already exist please use another mobile number...'); 			
		}
	}
	public function signin(Request $request){
		$validator = Validator::make($request->all(), [
			'email'	=> 'required',
			'pass' => 'required',
		]);		
		if ($validator->fails()) {
			return Response::json(array(
				'success' => false,
				'errors' => $validator->getMessageBag()->toArray()

			), 400);			
		}else{
			$login = 0;
			if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('pass'), 'status' => 0])) {
				$login = 1;				
			}elseif(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('pass'), 'status' => 0])) {
				$login = 1;
			}
			if($login == 1){
				//redirect to dashboard
				return redirect('/dashboard');	
			}else{
				return redirect()->back()->with('failure', 'Invalid Credentials'); 	
			}				
		}
	}
	public function privacypolicy(){
		
      return view('user.privacypolicy');

	}
	public function termsconditions(){
		
      return view('user.termsconditions');

	}
	public function forgotpassword(Request $request){
			$msg = User::emailexistornot($request->input('email'));
			if($msg==0){
				return Response::json(array(
					'success' => false,
					'errors' => array('This email id does not have in our database record....')
				), 400);				
			}else{
				$newpassword = Helper::generatePassword(8);
				$data = array('mail'=>$request->input('email'));
				
				$user = User::where('email',$request->input('email'))->first();
				$user->password = Hash::make($newpassword);
				$user->save();
				
				if(env('MAILENV') == 'live'){
					$data = array('email'=>$request->input('email'),'password'=>$newpassword);
					$mail = Mail::send('mail.forgot', $data, function($message) use ($data) {
						$message->to($data['email'], '')->subject
						('Forgot password');
						$message->from(env('MAIL_FROM_ADDRESS'),'');
					});
				}
				if($mail){
					return Response::json(array(
						'success' => false,
						'errors' => array('Something went wrong pls try again....')
					), 400);					
				}else{
					return Response::json(array(
						'success' => false,
						'message' => array('Password send sucessfully in your mailbox pls check.....')
					), 200);
				}				
			}				
	}

}
