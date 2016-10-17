<?php
/**
 * Json处理类
 * User: luoweiwei
 * Date: 16/10/17
 * Time: 下午12:51
 */

namespace Tool;

class Json
{
    /**
     * @desc 将joson转成数组或对象
     * @author vv.L <lvv787@163.com>
     * @createDate 2015/06/28
     *
     * @param $v
     * @param bool $b
     * @return mixed
     */
    public static function json2arr($v, $b = true)
    {
        $rs = $b ? json_decode($v, $b) : json_decode($v);//$b=>true 返回数组  false 返回对象
        if (!is_array($rs)) {
            return false;
        }
        return $rs;
    }
}