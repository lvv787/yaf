<?php
/**
 * Created by PhpStorm.
 * User: luoweiwei
 * Date: 16/10/11
 * Time: 下午2:18
 */

namespace Tool;


class Log
{
    public static function writeLog($info)
    {
        $base = APPLICATION_PATH . "/application/logs";
        $dest = $base . "/" . date('Y-m-d') . "_errorlog.log";
        if (!file_exists($dest)) {
//            mkdir($base, 0777, true);
//            @chmod($base, 0777);
            @file_put_contents($dest, date('Y-m-d H:i:s') . ';' . $info . "\r\n", FILE_APPEND);
        } else {
            @file_put_contents($dest, date('Y-m-d H:i:s') . ';' . $info . "\r\n", FILE_APPEND);
        }
    }
}