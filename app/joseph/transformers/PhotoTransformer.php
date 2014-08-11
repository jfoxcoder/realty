<?php
/**
 * Created by PhpStorm.
 * User: Joseph
 * Date: 23/06/14
 * Time: 4:55 PM
 */

namespace joseph\transformers;


class PhotoTransformer extends Transformer {

    public function transform($photo)
    {
        return [
            'id' => $photo->id,
            'path' => $photo->path(),
            'order' => $photo->order,
        ];
    }
}