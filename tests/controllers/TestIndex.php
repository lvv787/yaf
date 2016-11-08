<?php

class TestLvindex extends \PHPUnit\Framework\TestCase
{
    public function testIndex()
    {
        $request = new \Yaf\Request\Simple('CLI','Index', 'Index', 'test');
        $res = \Yaf\Application::app()->getDispatcher()->returnResponse(true)->dispatch($request);
        $valid = 'test string';
        $this->assertEquals($valid, $res->getBody());
    }
}