<?php
/**
 * Created by PhpStorm.
 * User: Victoria
 * Date: 13-Dec-18
 * Time: 3:31 PM
 */

namespace App\Lib;

class View
{
    public function generate($content_view, $template_view, $data = null)
    {
        include 'views/'.$template_view;
    }
}
