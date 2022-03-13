<?php
namespace Test\App;

use App\Service\AppLogger;
use PHPUnit\Framework\TestCase;
use Test\Common\HttpRequest;

class DemoTest extends TestCase
{
    private $_logger;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->_logger = new AppLogger(AppLogger::TYPE_THINKlOG);
    }


    public function testUserInfo()
    {
        $url = "http://some-api.com/user_info";

        $response = (new HttpRequest($url))->get();

        $data = json_decode($response, true);

        if(!$this->getData($data)){
            $this->_logger->error("fetch data error.");
            return null;
        }

        return $data['data'];
    }


    public function getData($data = '')
    {
        return isset($data['error']) && $data['error'] === 0 ? ($data['data']??false):false;
    }

}