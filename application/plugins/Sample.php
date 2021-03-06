<?php

/**
 * @name SamplePlugin
 * @desc Yaf定义了如下的6个Hook,插件之间的执行顺序是先进先Call
 * @see http://www.php.net/manual/en/class.yaf-plugin-abstract.php
 * @author root
 */
class SamplePlugin extends Yaf\Plugin_Abstract
{

    public function routerStartup(Yaf\Request_Abstract $request, Yaf\Response_Abstract $response)
    {
        yaf\Loader::import("Tool/Lvtime.php");//这句在win下开启   mac下不开启
        yaf\Loader::import("Tool/SerException.php");
//        echo 'router start -------------------';
    }

    public function routerShutdown(Yaf\Request_Abstract $request, Yaf\Response_Abstract $response)
    {
//        echo 'router shutdown -------------------';
    }

    public function dispatchLoopStartup(Yaf\Request_Abstract $request, Yaf\Response_Abstract $response)
    {
//        echo 'dispatch loop startup -------------------';
    }

    public function preDispatch(Yaf\Request_Abstract $request, Yaf\Response_Abstract $response)
    {
//        echo 'pre dispatch -------------------';
    }

    public function postDispatch(Yaf\Request_Abstract $request, Yaf\Response_Abstract $response)
    {
//        echo 'post dispathch -------------------';
    }

    public function dispatchLoopShutdown(Yaf\Request_Abstract $request, Yaf\Response_Abstract $response)
    {
//        echo 'dispatch loop shutdown -------------------';
        
    }
}
