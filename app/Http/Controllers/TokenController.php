<?php

namespace App\Http\Controllers;

use App\User;
use App\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokenController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	private function is_admin()
	{
		$role = Auth::user()->role;
		if($role!='admin')
		{
			abort(404);
		}
	}
	
	public function getTokens()
	{
		$this->is_admin();
		$tokens=Token::all();
		$data = [
			'tokens' => $tokens
		];
		return view('tokens.show', $data);
	}
	
	public function addToken(Request $request)
	{
		$this->is_admin();
		$token=new Token;
		$token->appid=$request->appid;
		$token->devid=$request->devid;
		$token->certid=$request->certid;
		$token->runame=$request->runame;
		$token->save();
		return redirect('tokens');
	}
	
	public function showEditToken(Request $request)
	{
		$this->is_admin();
		$token=Token::find($request->id);
		$data=[
			'token' => $token
		];
		return view('tokens.edit', $data);
	}
	
	public function editToken(Request $request)
	{
		$this->is_admin();
		$token=Token::find($request->id);
		if($request->appid)
		{
			$token->appid=$request->appid;
		}
		if($request->devid)
		{
			$token->devid=$request->devid;
		}
		if($request->certid)
		{
			$token->certid=$request->certid;
		}
		if($request->runame)
		{
			$token->runame=$request->runame;
		}
		$token->save();
		return redirect('tokens');
	}
	
	public function deleteToken(Request $request)
	{
		$this->is_admin();
		Token::destroy($request->id);
		return redirect('tokens');
	}
}
