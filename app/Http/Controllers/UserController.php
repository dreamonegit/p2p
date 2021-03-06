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
use App\Models\Bankdetails;
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
		$this->bankdetails = new Bankdetails();
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
			if($request->input('pass')){
				$user->refcode = $request->input('refcode');
			}
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
				return redirect('/user/exchange');	
			}else{
				return redirect()->back()->with('failure', 'Invalid credentials or account is not verified pls try again or contact administration..'); 	
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
	public function wallet(Request $request){
		$this->data['wallet'] = Deposit::where('user_id',auth::user()->id)->where('approved',1)->get();
		return view('user.wallet',$this->data);	
	}
	public function deposithistory(Request $request){
		$this->data['deposithistory'] = Deposit::where('user_id',auth::user()->id)->get();
		return view('user.depositstatus',$this->data);			
	}
	public function deposit(Request $request){
		if ($request->isMethod('post')){
			$coin = Coin::where('id',$request->input('coin_id'))->first();
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
			$deposit->amount = $request->input('qty') * $coin->price ; 
			$deposit->user_id = auth::user()->id; 
			$deposit->coin_id = $request->input('coin_id'); 
			$deposit->type = 'Deposit';
			$deposit->deposit_address = $request->input('deposit_address'); 
			$deposit->created_at = date('Y-m-d H:i:s');
			$deposit->updated_at = date('Y-m-d H:i:s');
			$deposit->save();
			return redirect('/user/exchange')->with('message','Sucessfully deposit...'); 
		}else{
			$this->data['id'] = $request->id;
			$this->data['coin'] = Coin::where('status',1)->get();
			return view('user.deposit',$this->data);
		}
	}
	public function getcoinaddress(Request $request){
		$coinaddress = Coin::select('depositaddress','total_volume','price')->where('id',$request->input('coin'))->first();
		$url = 'https://chart.googleapis.com/chart?cht=qr&chs=200x200&chl='.$coinaddress->depositaddress.'&chco=#FF5733';
		return Response::json(array(
			'url' => $url,
			'address' => $coinaddress->depositaddress,
			'total_volume' => $coinaddress->total_volume,
			'coinamount' => $coinaddress->price
		), 200);
	}
	public function updatestatus(Request $request){
		if($request->input('hid')){
			$deposit = Deposit::where('id',$request->input('hid'))->first();
			$deposit->transaction_id = $request->input('transaction_id');
			$deposit->save();
			return redirect('/user/deposit-history')->with('message','Sucessfully updated...'); 
		}
	}	
	public function referrals(Request $request){
		if ($request->isMethod('post')){

		}else{
			$this->data['refuser'] = User::select('email')->where('refcode',auth::user()->id)->where('role',2)->get();
			return view('user.referrals',$this->data);
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
	public function bankdetails(Request $request){
		if($request->post()){
			$bankdetails = new Bankdetails;
			$bankdetails->user_id = auth::user()->id; 
			$bankdetails->holder_name = $request->input('holder_name');	
			$bankdetails->account_no = $request->input('account_no');
			$bankdetails->confirm_account_no = $request->input('confirm_account_no');
			$bankdetails->ifsc_code = $request->input('ifsc_code');
			$bankdetails->account_type = $request->input('account_type');
			$bankdetails->bank_name = $request->input('bank_name');
			$bankdetails->save();
			return Redirect::back()->withErrors(['msg' => 'Successfully send your contact details..']);
		}else{
			return view('/user/bank-details');
		}
	}
	public function aboutus(){
		
      return view('user.aboutus');
	}
}
