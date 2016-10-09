<?php
/**
 * @desc desc
 * @author vv.L <weiwei.luo@chinapnr.com>
 * @createDate 2016/10/09
 */

class UserController extends Yaf\Controller_Abstract {
    public function init(){
//        $this->getView()->setScriptPath(APPLICATION_PATH.'/template');//重新设置模板路径   一般不开
    }

    public function showAction(){
        echo '////user user show/////////';
        $this->getView()->assign('content',"user user show");
        $this->getView()->assign('name',"lvv");
        $this->getView()->render(APPLICATION_PATH."/application/views/index/index.phtml");//使用另一块模板
//        return false;//当在bootstrap里关闭了视图这个语句可以不要
    }

    public function indexAction(){
        $params = $this->getRequest()->getParams();//当静态路由时用这个
        var_dump($params);
        $get = $this->getRequest()->getQuery();//当常规路由时用这个
        var_dump($get);
//        $post = $this->getRequest()->getPost();
//        $file = $this->getRequest()->getFiles();
//        $this->getRequest()->get();//通用获取不同形式请求的数据
        echo '////user user index/////';
        return false;
    }

    public function queryAction(){
//        $this->getResponse()->setRedirect("http://www.baidu.com");//跳转到百度
        return false;
    }
}