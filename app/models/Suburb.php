<?php

class Suburb extends \RealtyEloquent {

	protected $fillable = ['name', 'town_id'];

    protected $hidden = ['created_at', 'updated_at'];

    public static $rules = ['name' => 'required'];

    public function town()
    {
        return $this->belongsTo('Town');
    }

    public function listings()
    {
        return $this->hasMany('Listing');
    }
}