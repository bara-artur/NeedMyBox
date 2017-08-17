<?php

namespace App\Http\Controllers;

use App\User;
use App\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountsController extends Controller
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
	
	private function verify_account($user_id)
	{
		if($user_id!=Auth::user()->id)
		{
			abort(404);
		}
	}
	
	public function adminGetAccounts(Request $request)
	{
		$this->is_admin();
		$accounts=User::find($request->id)->accounts;
		$data = [
			'user'=>$request->id,
			'accounts' => $accounts
		];
		return view('accounts.admin-show', $data);
	}
	
	public function adminAddAccount(Request $request)
	{
		$this->is_admin();
		$account=new Account;
		$account->user_id=$request->user;
		$account->login=$request->login;
		$account->password=$request->password;
		$account->save();
		return redirect('/admin/accounts/'.$request->user);
	}
	
	public function adminShowEditAccount(Request $request)
	{
		$this->is_admin();
		$account=Account::find($request->id);
		$data=[
			'account' => $account
		];
		return view('accounts.admin-edit', $data);
	}
	
	public function adminEditAccount(Request $request)
	{
		$this->is_admin();
		$account=Account::find($request->id);
		if($request->login)
		{
			$account->login=$request->login;
		}
		if($request->password)
		{
			$account->password=$request->password;
		}
		$account->save();
		return redirect('/admin/accounts/'.$account->user_id);
	}
	
	public function adminDeleteAccount(Request $request)
	{
		$this->is_admin();
		Account::destroy($request->id);
		return redirect()->back();
	}
	
	public function getAccounts()
	{
		$accounts=User::find(Auth::user()->id)->accounts;
		$data = [
			'accounts' => $accounts
		];
		return view('accounts.show', $data);
	}
	
	public function addAccount(Request $request)
	{
		$account=new Account;
		$account->user_id=Auth::user()->id;
		$account->login=$request->login;
		$account->password=$request->password;
		$account->save();
		return redirect('accounts');
	}
	
	public function showEditAccount(Request $request)
	{
		$account=Account::find($request->id);
		$this->verify_account($account->user_id);
		$data=[
			'account' => $account
		];
		return view('accounts.edit', $data);
	}
	
	public function editAccount(Request $request)
	{
		$account=Account::find($request->id);//->where('user_id', Auth::user()->id);
		$this->verify_account($account->user_id);
		if($request->login)
		{
			$account->login=$request->login;
		}
		if($request->password)
		{
			$account->password=$request->password;
		}
		$account->save();
		return redirect('accounts');
	}
	
	public function deleteAccount(Request $request)
	{
		$account=Account::find($request->id);
		$this->verify_account($account->user_id);
		Account::where('id', $request->id)->delete();
		return redirect('accounts');
	}
}
