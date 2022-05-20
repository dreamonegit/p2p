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
	 public function logout(){
		
		Session::flush();
		
		return redirect('/');	
	}
}