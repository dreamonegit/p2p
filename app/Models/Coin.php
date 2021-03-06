<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Coin extends Authenticatable
{
    use Notifiable;
	
	protected $table="coins";

	public static function getcoinimage($id){
		
		$image = self::select('image')->where('id',$id)->first();
		
		return $image->image;
	}
	
	public static function getcoinname($id){
		
		$coin = self::select('coinname','symbol')->where('id',$id)->first();
		
		return array('coinname'=>$coin->coinname,'symbol'=>$coin->symbol);
	}
	
	public static function getcoindetail($id){
		
		$coin = self::where('id',$id)->first();
		
		return $coin->coinname;
	}
	public static function getneeddeposit($id){
		
		$coin = self::where('id',$id)->first();
		
		return $coin->need_deposite;
	}
}
