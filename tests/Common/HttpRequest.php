<?php


namespace Test\Common;


class HttpRequest
{
    protected $url;

    public function __construct($url = '')
    {
        $this->url = $url;
    }

    public function get()
    {
        $ch = curl_init($this->url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    public function setUrl($url = '')
    {
        $this->url = $url;
    }
}