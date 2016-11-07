<?php
/**
 * @desc desc
 * @author vv.L <weiwei.luo@chinapnr.com>
 * @createDate 2016/10/09
 */


use Monolog\Logger;
use Monolog\Handler\StreamHandler;

use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

use Tool\SerException;

use Yaf\Application;

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
        echo "static route get params \n";
        var_dump($params);
        $get = $this->getRequest()->getQuery();//当常规路由时用这个
        echo "general route get method \n";
        var_dump($get);
        $post = $this->getRequest()->getPost();
        echo "post method \n";
        var_dump($post);
//        $post = $this->getRequest()->getPost();
//        $file = $this->getRequest()->getFiles();
        $allParams = $this->getRequest()->get("a");//通用获取不同形式请求的数据,但必须指定一个参数
        echo "get one param's value \n";
        var_dump($allParams);
        echo "////user user index/////";
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

    public function writeLog3Action()
    {
        //
    }

    public function curl1Action()
    {
        $starTime = Tool\Lvtime::getMicTime();
        xhprof_enable(XHPROF_FLAGS_CPU + XHPROF_FLAGS_MEMORY);

//        echo Tool\Http::curlRequest("127.0.0.1:8580/user/user/index", ['a'=>343,'b'=>55],"POST")."\n";
        echo Tool\Http::curlRequest("127.0.0.1:8580/user/user/index", "a=123&b=2323", "POST") . "\n";
//        echo Tool\Http::curlRequest("127.0.0.1:8580/user/user/index?a=123123&b=454545")."\n";
        $overTime = Tool\Lvtime::getMicTime();
        echo "time========>" . ($overTime - $starTime) . "\n";
        $xhprof_data = xhprof_disable();
        include_once "/Users/luoweiwei/source/php-ext/longxinH.xhprof/xhprof_lib/utils/xhprof_lib.php";
        include_once "/Users/luoweiwei/source/php-ext/longxinH.xhprof/xhprof_lib/utils/xhprof_runs.php";
        $objXhprofRun = new XHProfRuns_Default();//数据会保存在php.ini中xhprof.output_dir设置的目录去中
        $run_id = $objXhprofRun->save_run($xhprof_data, "yaf_curl1");
        echo "http://127.0.0.1:8980/index.php?run={$run_id}&source=yaf_curl1\n";

    }

    public function curl2Action()
    {
        echo Tool\Http::curlRequest("127.0.0.1:8580");
    }

    public function curl3Action()
    {
//        phpinfo();exit;
//        $starTime = Tool\Lvtime::getMicTime();
//        xhprof_enable(XHPROF_FLAGS_CPU + XHPROF_FLAGS_MEMORY);
        $client = new \GuzzleHttp\Client();
        $res = $client->request('POST', '127.0.0.1:8580/user/user/index', [
            'form_params' => [
                'a' => 343434,
                'b' => 676676
            ]
        ]);
//        echo $res->getStatusCode() . '+++';
        // 200
//        echo $res->getHeaderLine('content-type') . '+++';
        // 'application/json; charset=utf8'
        echo $res->getBody() . "\n";
//        $overTime = Tool\Lvtime::getMicTime();
//        echo "time========>" . ($overTime - $starTime) . "\n";

//        $request = new \GuzzleHttp\Psr7\Request('GET', 'http://httpbin.org');
//        $promise = $client->sendAsync($request)->then(function ($response) {
//            echo 'I completed! ' . $response->getBody();
//        });
//        $promise->wait();
//        $xhprof_data = xhprof_disable();
//        include_once "/Users/luoweiwei/source/php-ext/longxinH.xhprof/xhprof_lib/utils/xhprof_lib.php";
//        include_once "/Users/luoweiwei/source/php-ext/longxinH.xhprof/xhprof_lib/utils/xhprof_runs.php";
//        $objXhprofRun = new XHProfRuns_Default();//数据会保存在php.ini中xhprof.output_dir设置的目录去中
//        $run_id = $objXhprofRun->save_run($xhprof_data, "yaf_curl3");
//        echo "http://127.0.0.1:8980/index.php?run={$run_id}&source=yaf_curl3\n";
    }

    public function getBizConfigAction()
    {
        $starTime = Tool\Lvtime::getMicTime();
        $string = file_get_contents(APPLICATION_PATH . "/conf/lvv.json");
        var_dump(json_decode($string, true));
        $overTime = Tool\Lvtime::getMicTime();
        echo "time========>" . ($overTime - $starTime) . "\n";
    }

    public function jsonAciton()
    {
        $get = $this->getRequest()->getQuery();//当常规路由时用这个

        var_dump(Tool\Json::json2arr($get['finger_params']));
    }

    public function testExceptionAction()
    {
        try {
            if (!isset($_GET['a'])) {
                Http::getError();
            }
        } catch (SerException $e) {
            $e->sendHttpResponse();
        }
    }

    public function getConfigAction(){
        $name = Yaf\Registry::get('config')->name;
        echo $name;
        $api = Application::app()->getConfig()->get('api');//routerShutdown
        echo $api;

    }
}