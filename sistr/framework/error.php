<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 24/11/16
 * Time: 16:59
 */

namespace F3il;


class Error extends \Exception
{
    const DEBUG = "debug";
    const PRODUCTION = "production";
    protected  $explanation;
    protected $runMode;

    /**
     * Error constructor.
     */
    public function __construct($message)
    {
        

    }
    public function __toString()
    {
        // TODO: Implement __toString() method.
    }
    private function productionRender(){

    }
    public function debugRender(){

    }

}