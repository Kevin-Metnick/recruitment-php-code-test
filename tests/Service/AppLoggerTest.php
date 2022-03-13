<?php

namespace Test\Service;

use PHPUnit\Framework\TestCase;
use App\Service\AppLogger;

/**
 * Class ProductHandlerTest
 */
class AppLoggerTest extends TestCase
{

    public function testInfoLog()
    {
        $logger = new AppLogger('log4php');
        $logger->info('This is info log message');
        $logger->debug('This is debug log message');
        $logger->error('This is error log message');

        $logger = new AppLogger('think-log');
        $logger->info('This is info log message');
        $logger->debug('This is debug log message');
        $logger->error('This is error log message');
    }
}