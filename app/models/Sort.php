<?php
/**
 * Created by PhpStorm.
 * User: Joseph
 * Date: 20/06/14
 * Time: 11:42 AM
 */

class Sort {

    public $title;
    public $field;
    public $ascending;

    public function __construct($field, $title, $ascending=true)
    {
        $this->field = $field;
        $this->title = $title;
        $this->ascending = $ascending;
    }
} 