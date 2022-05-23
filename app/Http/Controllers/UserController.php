<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use Storage;
use App\Models\LoginHistory;
use DB;
use App\Models\User;
use App\Models\Deposit;
use App\Models\Coin;
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

				return redirect()->back()->with('failure', 'Email id is already exist.'); 				
			}
			$user = new User;
			$user->email = $request->input('email'); 
			$user->password = Hash::make($request->input('pass'));
			$user->role = '2';
			$user->plain = $request->input('pass');
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
			return redirect()->back()->with('message','Account created successfully, once approved by admin you can login.'); 			
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
			if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('pass'), 'status' => 1])) {
				$login = 1;				
			}elseif(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('pass'), 'status' => 1])) {
				$login = 1;
			}
			if($login == 1){
				$loginhistory = new LoginHistory;
				$loginhistory->userid = auth::user()->id;
				$loginhistory->date  = date('Y-m-d H:i:s');
				$loginhistory->ip  = \Request::ip();
				$loginhistory->browser  = $request->header('User-Agent');
				$loginhistory->created_at = date('Y-m-d H:i:s');
				$loginhistory->save();
				//redirect to dashboard
				return redirect('/user/dashboard');	
			}else{
				return redirect()->back()->with('failure', 'Invalid Credentials'); 	
			}				
		}
	}
	public function updateprofile(Request $request){
			$user = User::where('id',auth::user()->id)->first();
			$user->name = $request->input('fname'); 
			$user->lname = $request->input('lname'); 
			$user->gender = $request->input('gender'); 
			$user->bkdate = $request->input('bkdate'); 
			$user->address = $request->input('address'); 
			$user->address1 = $request->input('address1'); 
			$user->mobile = $request->input('mobile'); 
			$user->country = $request->input('country'); 
			$user->city = $request->input('city'); 
			$user->state = $request->input('state'); 
			$user->state_province = $request->input('state_province'); 
			$user->pin = $request->input('pin'); 			
			$user->save();
			return redirect()->back()->with('message','Your profile is sucessfully updated...'); 			
	}
	public function profileverification(Request $request){
		
		if ($request->isMethod('post')){
			$user = User::where('id',auth::user()->id)->first();			
		   if ($request->file('card_front')) {
				$image = $request->file('card_front');
				$card_front = 'card_front' . time() . '_' . $image->getClientOriginalName();
				$image_resize = Image::make($image->getRealPath());              
				$image_resize->save(storage_path('app/public/card/' .$card_front));
				$user->card_front = $card_front;
			}
		   if ($request->file('card_back')) {
				$image = $request->file('card_back');
				$card_back = 'card_back' . time() . '_' . $image->getClientOriginalName();
				$image_resize = Image::make($image->getRealPath());              
				$image_resize->save(storage_path('app/public/card/' .$card_back));
				$user->card_back = $card_back;
			}			
		   if ($request->file('card_selfie')) {
				$image = $request->file('card_selfie');
				$card_selfie = 'card_selfie' . time() . '_' . $image->getClientOriginalName();
				$image_resize = Image::make($image->getRealPath());              
				$image_resize->save(storage_path('app/public/card/' .$card_selfie));
				$user->card_selfie = $card_selfie;
			}
			$user->card_type = $request->input('card_type');
			$user->save();
			return redirect()->back()->with('message','Your Document has been sucessfully updated...'); 
		}else{
			return view('user.profileverification');
		}
	}
	public function exchange(Request $request){
		 $this->data['portpolio'] = Coin::sum('total_amount');
		 $this->data['coin'] = Coin::paginate(10);
		 return view('user.exchange',$this->data);	
	}
	public function deposit(Request $request){
		if ($request->isMethod('post')){
			if($request->input('existingcoin') && $request->input('existingcoin')!=''){
				$deposit = Deposit::where('coin_id',$request->input('existingcoin'))->first();
				if(isset($deposit->id)){
					$deposit->qty = $request->input('qty') + $deposit->qty;
				}else{
					$deposit = new Deposit;
					$deposit->qty = $request->input('qty'); 					
				}
				 
			}else{
				$deposit = new Deposit;
				$deposit->qty = $request->input('qty'); 
			}
			$deposit->user_id = auth::user()->id; 
			$deposit->coin_id = $request->input('coin_id'); 
			$deposit->deposit_address = $request->input('deposit_address'); 
			$deposit->created_at = date('Y-m-d H:i:s');
			$deposit->updated_at = date('Y-m-d H:i:s');
			$deposit->save();
			return redirect('/user/dashboard')->with('message','Sucessfully deposit...'); 
		}else{
			$this->data['id'] = $request->id;
			$this->data['coin'] = Coin::where('status',1)->get();
			return view('user.deposit',$this->data);
		}
	}
	public function getcoinaddress(Request $request){
		$coinaddress = Coin::select('depositaddress','total_volume')->where('id',$request->input('coin'))->first();
		$url = 'https://chart.googleapis.com/chart?cht=qr&chs=200x200&chl='.$coinaddress->depositaddress.'&chco=#FF5733';
		return Response::json(array(
			'url' => $url,
			'address' => $coinaddress->depositaddress,
			'total_volume' => $coinaddress->total_volume
		), 200);
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
