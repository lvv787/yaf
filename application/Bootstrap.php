<?php

/**
 * @name Bootstrap
 * @author root
 * @desc 所有在Bootstrap类中, 以_init开头的方法, 都会被Yaf调用,
 * @see http://www.php.net/manual/en/class.yaf-bootstrap-abstract.php
 * 这些方法, 都接受一个参数:Yaf\Dispatcher $dispatcher
 * 调用的次序, 和申明的次序相同
 */
use Yaf\Dispatcher;
class Bootstrap extends Yaf\Bootstrap_Abstract
{

    public function _initConfig(Dispatcher $dispatcher)
    {
        //把配置保存起来
        $arrConfig = Yaf\Application::app()->getConfig();
        Yaf\Registry::set('config', $arrConfig);

    }

    public function _initPlugin(Dispatcher $dispatcher)
    {
        //注册一个插件
        $objSamplePlugin = new SamplePlugin();
        $dispatcher->registerPlugin($objSamplePlugin);
    }

    public function _initRoute(Dispatcher $dispatcher)
    {
        //$dispatcher->setDefaultModule('Index')->setDefaultController('Index')->setDefaultAction('index');
        //在这里注册自己的路由协议,默认使用简单路由
        $router = $dispatcher->getInstance()->getRouter();
////        $r = new Yaf\Route\Simple('m','c','a');
////        $router->addRoute('simple',$r);
//        $router->addConfig(Yaf\Registry::get('config')->routes);

        $router->addConfig(new Yaf\Config\Simple([
            'testIndex' => [
                'type' => 'rewrite'
                , 'match' => "/showcode"
                , 'route' => [
                    "module" => "index"//(default)
                    , "controller" => "index"
                    , "action" => "index"
                ]
            ]
        ]));
    }

    public function _initView(Dispatcher $dispatcher)
    {
        //在这里注册自己的view控制器，例如smarty,firekylin
        $dispatcher->getInstance()->disableView();
    }

    public function _initLoader(Dispatcher $dispatcher)
    {
        require APPLICATION_PATH . '/vendor/autoload.php';
    }
}
