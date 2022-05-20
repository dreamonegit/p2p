<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use Storage;
use DB;
use App\Models\Coin;
use Carbon\Carbon;
use Session;
use Maatwebsite\Excel\Facades\Excel;
use Redirect;
use Auth, Validator, Response;
class CoinController extends Controller
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
		$this->data["coin"] = Coin::orderBy('order_price','asc')->get();
		return view('admin.coin.listcoin',$this->data);
    }
	public function savecoin(Request $request){
		if ($request->isMethod('post')){
			if ($request->input("hid")) {
				$coin = Coin::where('id',$request->input("hid"))->first();
			}else{
				$coin = new Coin;
			}
			$coin->coinname = $request->input('coinname'); 
			$coin->symbol = $request->input('symbol'); 
			$coin->coinid = $request->input('coinid'); 
			$coin->minwithdraw = $request->input('minwithdraw'); 
			$coin->maxwithdraw = $request->input('maxwithdraw');
			$coin->withdrawfee = $request->input('withdrawfee'); 
			$coin->depositaddress = $request->input('depositaddress'); 
			$coin->inr_to_coin_percentage = $request->input('inr_to_coin_percentage');
			$coin->coin_to_inr_percentage = $request->input('coin_to_inr_percentage'); 
			$coin->coin_to_coin_percentage = $request->input('coin_to_coin_percentage'); 
			$coin->need_api = $request->input('need_api');
			$coin->need_deposite = $request->input('need_deposite');
			$coin->price = $request->input('price');
			$coin->order_price = $request->input('order_price');
			$coin->status = $request->input('status');
			$coin->created_at = date('Y-m-d H:i:s');
			$coin->updated_at = date('Y-m-d H:i:s');
			$coin->save();
			return redirect('/admin/listcoin')->with('message', 'successfully coin added...');	
		}else{
			if ($request->id) {
				$this->data["coin"] = Coin::where('id',$request->id)->first();
				return view('admin.coin.coin',$this->data);
			}else{
				return view('admin.coin.coin');
			}
		}
	}
}
