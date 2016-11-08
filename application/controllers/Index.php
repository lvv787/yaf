<?php

/**
 * @name IndexController
 * @author root
 * @desc 默认控制器
 * @see http://www.php.net/manual/en/class.yaf-controller-abstract.php
 */
class IndexController extends Yaf\Controller_Abstract
{
    public function init()
    {
//        echo '******index init*******';
    }

    /**
     * 默认动作
     * Yaf支持直接把Yaf\Request_Abstract::getParam()得到的同名参数作为Action的形参
     * 对于如下的例子, 当访问http://yourhost/yaf-demo/index/index/index/name/root 的时候, 你就会发现不同
     */
    public function indexAction($name = "Stranger")
    {
        echo $this->getRequest()->getMethod();
        exit;
        yaf\Loader::import("Tool/Http.php");//这句在win下开启   mac下不开启
//        echo Http::getHttpHost();
        echo Tool\Http::getHttpHost() . "***********";
        return false;
        //1. fetch query
        $get = $this->getRequest()->getQuery("get", "default value");

        //2. fetch model
        $model = new SampleModel();

        //3. assign
        $this->getView()->assign("content", $model->selectSample());
        $this->getView()->assign("name", $name);

        $this->forward('Index', 'Index', 'show');
//        echo '/////////index index//////////';

        //4. render by Yaf, 如果这里返回FALSE, Yaf将不会调用自动视图引擎Render模板
//        return false;
        return TRUE;
    }

    public function showAction()
    {
        echo 'show **********';
        return false;
    }

    public function logAction()
    {
        return false;
    }

    function testAction()
    {
        $this->getResponse()->setBody('test string');
    }
}
