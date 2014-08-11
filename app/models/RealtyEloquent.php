<?php


class RealtyEloquent extends \Eloquent
{
    static $sorter;

    // validation errors
    public static $errors;

    public static function isValid($data) {

        $validation = Validator::make($data, static::$rules);

        // valid
        if ($validation->passes()) return true;

        // error
        static::$errors = $validation->messages()->all();

        return false;
    }


    public static function getSorter()
    {
        $sorter = new Sorter(static::$sortable);
        $sorter->sort();
        return $sorter;
    }

    public static function sort()
    {
        static::$sorter = new Sorter(static::$sortable);
        static::$sorter->sort();
        return static::orderby(static::$sorter->field(), static::$sorter->direction());
    }




    protected function makeJsonValidationErrorResponse()
    {
        return JsonResponse::create([
            'errors' => array_flatten(static::$errors)
        ], 400);
    }
} 