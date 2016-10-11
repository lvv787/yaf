<?php
/**
 * @desc desc
 * @author vv.L <weiwei.luo@chinapnr.com>
 * @createDate 2016/10/09
 */


use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class UserController extends Yaf\Controller_Abstract
{
    protected $log = null;

    public function init()
    {
//        $this->getView()->setScriptPath(APPLICATION_PATH.'/template');//重新设置模板路径   一般不开
    }

    public function showAction()
    {
        echo '////user user show/////////';
        $this->getView()->assign('content', "user user show");
        $this->getView()->assign('name', "lvv");
        $this->getView()->render(APPLICATION_PATH . "/application/views/index/index.phtml");//使用另一块模板
//        return false;//当在bootstrap里关闭了视图这个语句可以不要
    }

    public function indexAction()
    {
        $params = $this->getRequest()->getParams();//当静态路由时用这个
        var_dump($params);
        $get = $this->getRequest()->getQuery();//当常规路由时用这个
        var_dump($get);
//        $post = $this->getRequest()->getPost();
//        $file = $this->getRequest()->getFiles();
        $allParams = $this->getRequest()->get("a");//通用获取不同形式请求的数据,但必须指定一个参数
        var_dump($allParams);
        echo '////user user index/////';
        return false;
    }

    public function queryAction()
    {
//        $this->getResponse()->setRedirect("http://www.baidu.com");//跳转到百度
        return false;
    }

    public function writeLog1Action()
    {
        $starTime = Tool\Lvtime::getMicTime();
        $this->log = new Logger('yaf');
        if (!Yaf\Registry::get('config')->get('application.monolog')) {
            $this->log->pushHandler(new StreamHandler('application/logs/yaf.log', Logger::WARNING));
        }

        $this->log->warn('Foo', array('a' => 123, 'b' => 3242));
//        $this->log->err('Bar', array('b' => 4545, 'c' => 333));
        $overTime = Tool\Lvtime::getMicTime();
        echo $overTime - $starTime;
        return false;
    }

    public function writeLog2Action()
    {
        $starTime = Tool\Lvtime::getMicTime();
        Tool\Log::writeLog("12313131231313");
//        Tool\Log::writeLog("23232323243333");
        $overTime = Tool\Lvtime::getMicTime();
        echo $overTime - $starTime;
        return false;
    }

    public function curl1Action()
    {
        echo Tool\Http::curlRequest("127.0.0.1:8580/user/user/index","a=110");
    }

    public function curl2Action()
    {
        echo Tool\Http::curlRequest("127.0.0.1:8580");
    }
}