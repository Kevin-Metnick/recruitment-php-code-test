<?php


namespace App\Service\logger;


use think\facade\Log;

class ThinkLog
{
    public function __construct()
    {
        Log::init([
            'default'	=>	'file',
            'channels'	=>	[
                'file'	=>	[
                    'type'	=>	'file',
                    'path'	=>	'../../logs/',
                ],
            ],
        ]);
    }

    public function __call($name, $arguments)
    {
        return call_user_func_array([Log::class, $name], $arguments);
    }

}