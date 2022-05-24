<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use Storage;
use DB;
use App\Models\User;
use App\Models\State;
use App\Models\Countries;
use App\Models\Deposit;
use Carbon\Carbon;
use Session;
use Maatwebsite\Excel\Facades\Excel;
use Redirect;
use Auth, Validator, Response;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
		$this->user = new User();
		$this->countries = new Countries();
		$this->deposit = new Deposit();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.index');
    }

	public function myprofile(Request $request){
		if ($request->isMethod('post')){
			$user = User::where('id',auth::user()->id)->first();
			$user->name = $request->input('name'); 
			$user->email = $request->input('email'); 
			$user->mobile = $request->input('mobile'); 
		    $user->password = Hash::make($request->input('password'));
		    $user->plain = $request->input('password'); 
			$user->status = $request->input('status');
			$image = $profile_images = '';   
		   if ($request->file('profile_image')) {
				$image = $request->file('profile_image');
				$profile_images = 'Profile_image' . time() . '_' . $image->getClientOriginalName();
				$image_resize = Image::make($image->getRealPath());              
				$image_resize->save(storage_path('app/public/profile/' .$profile_images));
				 $user->profile_image = $profile_images;
				//echo $profile_images; exit;
			}
			$user->save();
			return redirect()->back()->with('message', 'Successfully profile is update...'); 			
		}else{
			$this->data['title'] = 'My Profile';
			return view('admin.mypofile', $this->data);			
		} 		
	}
	public function listuser(Request $request){
		$this->data["user"] = $this->user->get();
		$this->data["countries"] = $this->countries->get();
		return view('admin.list-user',$this->data);
	}
	public function saveuser(Request $request){
		if ($request->isMethod('post')){
         if ($request->input("id") != 0) {
            $user = User::where("id", $request->input("id"))->first();
        } else {
            $user = new User();
        }
			$user->name = $request->input('name'); 
			$user->lname = $request->input('lname');  
			$user->bkdate = $request->input('bkdate'); 
			$user->email = $request->input('email');
            $user->mobile = $request->input('mobile');
            $user->address = $request->input('address'); 
			$user->address1	= $request->input('address1');
			$user->name = $request->input('name');
			$user->state = $request->input('state'); 
			$user->city = $request->input('city');
            $user->pin = $request->input('pin');
            $user->gender = $request->input('gender'); 			
			$user->status = $request->input('status');
            $user->save();
			return redirect()->back()->with('message', 'Successfully profile is updated...');			
		}else{
			return view('admin.list-user',$this->data);
		}		
	}
     public function viewuser($id)
    {
        $this->data["user"] = $this->user->where("id", $id)->first();
		$this->data["countries"] = $this->countries->get();
        return view('admin.view-user',$this->data);
    }
	public function deleteuser($id){
		$user = $this->user->where('id',$id)->delete();
		return redirect('/admin/list-user');
	}
	public function listdeposit(Request $request){
		$this->data["deposit"] = $this->deposit->get();
		return view('admin.list-deposits',$this->data);
	}
	public function savedeposit(Request $request){
		
	 if ($request->isMethod('post')){
          
		  if ($request->input("id") != 0) {
            $deposit = Deposit::where("id", $request->input("id"))->first();
        } else {
            $deposit = new Deposit();
        }
		
			$deposit->user_id = $request->input('user_id'); 
			$deposit->coin_id = $request->input('coin_id');  
			$deposit->qty = $request->input('qty'); 
			$deposit->amount = $request->input('amount');
            $deposit->deposit_address = $request->input('deposit_address'); 
            $deposit->approved = $request->input('approved'); 			
			$deposit->status = $request->input('status');
            $deposit->save();
			return redirect()->back()->with('message', 'Successfully profile is updated...');			
		}else{
			return view('admin.list-deposits',$this->data);
		}		
	}
     public function viewdeposit($id)
    {
        $this->data["deposit"] = $this->deposit->where("id", $id)->first();
        return view('admin.view-deposits',$this->data);
    }
	public function deletedeposit($id){
		$deposit = $this->deposit->where('id',$id)->delete();
		return redirect('/admin/list-deposits');
	}
	 public function logout(){
		
		Session::flush();
		
		return redirect('/');	
	}
}
