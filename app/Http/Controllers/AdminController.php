<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use Storage;
use DB;
use App\Models\User;
use App\Models\State;
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
		return view('admin.list-user',$this->data);
	}
	public function saveuser(Request $request){
        if ($request->input("id") != 0) {
            $user = User::where("id", $request->input("id"))->first();
        } else {
            $user = new User();
        }
		if ($request->isMethod('post')){
			$this->data['user'] = User::where('role',2)->first();
			$user->name	 = $request->input('name'); 
			$user->lname = $request->input('lname');  
			$user->bkdate = $request->input('bkdate'); 
			$user->email = $request->input('email');
            $user->mobile = $request->input('mobile');
            $user->address = $request->input('address'); 			
			$user->role = '2';
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
        return view('admin.view-user',$this->data);
    }
	public function deleteuser($id){
		$user = $this->user->where('id',$id)->delete();
		return redirect('/admin/list-user');
	}
	 public function logout(){
		
		Session::flush();
		
		return redirect('/');	
	}
}
