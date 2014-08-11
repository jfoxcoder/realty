<?php
/**
 * Created by PhpStorm.
 * User: Joseph
 * Date: 22/06/14
 * Time: 12:48 PM
 */


/**
 * Used to set the active navigation link class.
 *
 * @param $path nav link path
 * @return string 'active' if the request matches $path, otherwise an empty string.
 */
function set_active($path)
{
    return Request::is($path) ? 'active' : '';
}