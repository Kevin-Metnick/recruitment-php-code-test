<?php
namespace App\Service;

use App\Service\logger\Log4php;
use App\Service\logger\ThinkLog;

/**
 * 日志记录
 * @method info(string $message);
 * @method debug(string $message);
 * @method error(string $message);
 */
class AppLogger
{
    const TYPE_LOG4PHP = 'log4php';
    const TYPE_THINKlOG = 'think-log';
    private $logger;

    /** @var array  */
    private $factory = [
        self::TYPE_THINKlOG => ThinkLog::class,
        self::TYPE_LOG4PHP  => Log4php::class,
    ];

    public function __construct($type = self::TYPE_LOG4PHP)
    {
        try {
            $this->logger = new $this->factory[$type];
        }catch (\Exception $e) {}
    }

    public function __call($func, $argv)
    {
        return call_user_func_array([$this->logger, $func], $argv);
    }

}