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
        'name', 'email', 'password', 'email_token', 'role',
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
}
