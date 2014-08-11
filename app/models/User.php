<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';


    /**
     * Fillable fields.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password'
    ];




	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');


    public function setPasswordAttribute($cleartext)
    {
        $this->attributes['password'] = Hash::make($cleartext);
    }

    public function wishes()
    {
        return $this->belongsToMany('Listing', 'wishes')
                    ->withTimestamps();
    }
}
