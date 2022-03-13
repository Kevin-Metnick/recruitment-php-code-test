<?php


namespace App\Service\logger;

class Log4php
{
    private $logger;

    public function __construct(){
        $this->logger = \Logger::getLogger("log4php");
    }

    public function __call($func, $argv)
    {
        return call_user_func_array([$this->logger, $func], $argv);
    }

}