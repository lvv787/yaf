<?php
/**
 * Created by PhpStorm.
 * User: luoweiwei
 * Date: 16/10/11
 * Time: 下午3:46
 */

namespace Tool;


class Lvtime
{
    public static function getMicTime()
    {
        list($s1, $s2) = explode(' ', microtime());
        return (float)sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000);
    }
}