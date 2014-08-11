<?php
use Illuminate\Database\Query\Builder;

/**
 * Created by PhpStorm.
 * User: Joseph
 * Date: 20/06/14
 * Time: 11:37 AM
 */


class Sorter
{
    /***
     * The Sort instances that describe the sort options for a field.
     *
     * @var array
     */
    public $sorts = [];

    /***
     * The active sort instance.
     *
     * @var Sort
     */
    public $sort;


    /***
     *
     *
     * @var String
     */
    private $defaultSort;


    public function __construct(array $params, $defaultSort = null) {

        foreach($params as $param) {

            $field = $param[0];
            $ascText = $param[1];
            $descText = $param[2];

            if (! is_null($ascText)) {
                $this->sorts[$ascText] = new Sort($field, $ascText);
            }

            if (! is_null($descText)) {
                $this->sorts[$descText] = new Sort($field, $descText, false);
            }
        }

        $this->defaultSort = $defaultSort ?:  head($this->sorts)->title;
    }



    public function sort()
    {
        $key = Input::get('sort');

        // use the default if no sort was provided or if the
        // field was unknown
        if (empty($key) or ! array_key_exists($key, $this->sorts)) {
            $key = $this->defaultSort;
        }

        // Set the sort.
        $this->sort = $this->sorts[$key];

        // Hide the sort link.
        unset($this->sorts[$key]);
    }

    public function field()
    {
        return $this->sort->field;
    }
    public function direction()
    {
        return $this->sort->ascending ? 'asc' : 'desc';
    }
}