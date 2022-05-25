<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Auth;

class Deposit extends Authenticatable
{
    use Notifiable;
	
	protected $table="deposits";
	
	public static function getcoincount($id){
		
		$coin = self::where('coin_id',$id)->where('user_id',auth::user()->id)->sum('qty');
		
		return $coin;
	}	
	public static function getdepositrequest(){
		$coin = self::where('user_id',auth::user()->id)->where('type','Deposit')->count();
		
		return $coin;		
	}
	public static function getmyportpolio(){
		$coin = self::where('user_id',auth::user()->id)->where('type','Deposit')->sum('amount');
		
		return $coin;		
	}	
}
