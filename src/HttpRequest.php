<?php
/**
 * Created by PhpStorm.
 * User: ytan
 * Date: 11/14/16
 * Time: 9:15 PM
 */

namespace Rainflute\ConfluenceClient;


class HttpRequest
{
    private $curl = null;

    public function __construct($url,$username,$password)
    {
        $this->curl = curl_init($url);
        curl_setopt_array($this->curl,[
            CURLOPT_HTTPAUTH=>CURLAUTH_BASIC,
            CURLOPT_USERPWD=> $username . ':' . $password
        ]);
    }

    public function setOption($name, $value)
    {
        curl_setopt($this->curl, $name, $value);
        return $this;
    }

    public function setOptions($options)
    {
        curl_setopt_array($this->curl,$options);
        return $this;
    }

    public function execute()
    {
        return curl_exec($this->curl);
    }

    public function setHeaders($headers){
        $httpHeaders = [];
        foreach ($headers as $key => $value) {
            $httpHeaders[] = $key.':'.$value;
        }
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, $httpHeaders);
        return $this;
    }

    public function getInfo($name)
    {
        return curl_getinfo($this->curl, $name);
    }

    public function getError()
    {
        return curl_error($this->curl);
    }

    public function getErrorNumber()
    {
        return curl_errno($this->curl);
    }

    public function close()
    {
        curl_close($this->curl);
        return $this;
    }
}