<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'email_token', 'role', 'verified'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
	/**
	 * Get the user's role string.
	 *
	 * @param  int  $value
	 * @return string
	 */
    public function getRoleAttribute($value)
    {
    	if($value===1)
	    {
		    $value='admin';
	    }
	    elseif ($value==2)
	    {
	    	$value='user';
	    }
	    return $value;
    }
	/**
	 * Set the user's first name.
	 *
	 * @param  string $value
	 * @return void
	 */
	public function setRoleAttribute($value)
	{
		if($value=='admin')
		{
			$this->attributes['role'] = 1;
		}
		elseif ($value=='user')
		{
			$this->attributes['role'] = 2;
		}
	}
	
	public function accounts()
	{
		return $this->hasMany('App\Account');
	}
}
