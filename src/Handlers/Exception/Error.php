<?php
/**
 * Created by PhpStorm.
 * User: jyl
 * Date: 2019/4/1
 * Time: 4:26 PM
 */

namespace Handlers\Exception;

class Error
{
    protected $ci;

    public function __construct($c)
    {
        $this->ci = $c;
    }
}