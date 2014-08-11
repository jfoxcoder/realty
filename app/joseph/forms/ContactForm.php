<?php

namespace joseph\forms;

use Laracasts\Validation\FormValidator;

// Specification
// The contact page must contain a fully validated form that
// accepts a users name, email address, phone No.
// and a question/comment field.

class ContactForm extends FormValidator {

    // Phone is optional.

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required'
    ];
}