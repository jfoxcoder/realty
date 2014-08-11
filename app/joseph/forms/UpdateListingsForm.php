<?php

namespace joseph\forms;

use Illuminate\Support\Facades\Log;
use Laracasts\Validation\FormValidator;

// Specification

class UpdateListingsForm extends FormValidator {



    protected $rules = [

        'title' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
        'land' => 'required|integer',
        'floor' => 'required|integer',
        'beds' => 'required|integer',
        'baths' => 'required|integer',
        'cars' => 'required|integer',


        // Checks the suburb id is in the suburbs table. The ",id" part
        // is there because the input key is different to the column name.
        'suburb' => 'required|exists:suburbs,id',

        'street_number' => 'required',
        'street_name' => 'required'

        //'created_by' => 'required|integer'
    ];


}