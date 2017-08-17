<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
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
    
    public function index()
    {
	    $role = Auth::user()->role;
	    if($role=='admin')
	    {
		    $users=User::where('role', '2')->get();
		    $data = [
			    'users' => $users
		    ];
	    	$view='admin.index';
	    }
	    else
	    {
	    	$view='home';
		    $data = [
			   
		    ];
	    }
        return view($view, $data);
    }
    
    public function addUser(Request $request)
    {
    	$this->is_admin();
	    $user=new User;
	    $user->name=$request->name;
	    $user->email=$request->email;
	    $user->role=$request->role;
	    $user->password=$request->password;
	    $user->verified=1;
	    $user->save();
	    return redirect('home');
    	
    }
	
	public function deleteUser(Request $request)
	{
		$this->is_admin();
		$user=User::find($request->id);
		$user->accounts()->delete();
		$user->delete();
		//User::destroy($request->id);
		return redirect()->back();
	}
}
