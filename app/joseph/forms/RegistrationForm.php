<?php

namespace joseph\forms;

use Laracasts\Validation\FormValidator;

class RegistrationForm extends FormValidator {
    protected $rules = [

        'email' => 'required|email|unique:users',
        'password' => 'required|confirmed'
    ];
} 