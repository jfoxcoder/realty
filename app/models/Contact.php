<?php

class Contact extends \Eloquent {
	protected $fillable = ['name', 'email', 'phone', 'message'];

    public function getFormattedCreatedAt()
    {
        return $this->created_at->format('j M, Y');
    }

    public function getDiffCreatedAt()
    {
        return $this->created_at->diffForHumans();
    }
}