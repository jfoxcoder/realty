<?php
/**
 * Created by PhpStorm.
 * User: Joseph
 * Date: 23/06/14
 * Time: 4:51 PM
 */

namespace joseph\transformers;


/**
 * Class Transformer
 *
 * @package joseph\transformers
 */
abstract class Transformer {



    public function transformCollection(array $items)
    {
        return array_map([$this, 'transform'], $items);
    }

    public abstract function transform($item);

} 