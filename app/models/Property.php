<?php

class Property extends \Eloquent {
	protected $fillable = ['land', 'floor', 'beds', 'baths', 'cars', 'suburb_id', 'created_by'];
}