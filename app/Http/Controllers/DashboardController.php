<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use Storage;
use DB;
use App\Models\Coin;
use App\Models\User;

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


    public function profile(Request $request){
        
        if ($request->isMethod('post')){
            $user = User::where('id',auth::user()->id)->first();
            $user->nickname = $request->input('nickname'); 

            $image = $profile_images = '';   
          /* if ($request->file('profile_image')) {
                $image = $request->file('profile_image');
                $profile_images = 'Profile_image' . time() . '_' . $image->getClientOriginalName();
                $image_resize = Image::make($image->getRealPath());              
                $image_resize->save(storage_path('app/public/profile/' .$profile_images));
                 $user->profile_image = $profile_images;
                //echo $profile_images; exit;
            }*/
            $user->save();
            return redirect()->back()->with('message', 'Successfully updated');            
        }else{

            //get user profile
            $this->data['user'] = User::where('id',auth::user()->id)->first();
            return view('usersection.profile',$this->data);
        }
    }
}
