<?php
namespace Tool;

class Http
{
    public static function getHttpHost($http = false, $entities = false)
    {
        $host = (isset($_SERVER['HTTP_X_FORWARDED_HOST']) ? $_SERVER['HTTP_X_FORWARDED_HOST'] : $_SERVER['HTTP_HOST']);
        if ($entities)
            $host = htmlspecialchars($host, ENT_COMPAT, 'UTF-8');
        if ($http) {
            $host = self::getCurrentUrlProtocolPrefix() . $host;
        }

        return $host;
    }

    public static function curlRequest($url, $params = '', $type = 'GET', $timeout = 60, $cookie = '', $header = array(), $headback = 0)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);         // 地址
        curl_setopt($ch, CURLOPT_HEADER, $headback); // 返回内容中包含 HTTP 头
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5); // 在发起连接前等待的时间，如果设置为0，则无限等待
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);       // 设置cURL允许执行的最长秒数
        if (!empty($cookie)) {
            curl_setopt($ch, CURLOPT_COOKIE, $cookie);
        }
        if (!empty($header)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }

        /*
         * php curl常见错误：SSL错误、bool(false)
         * 症状：php curl调用https出错
         * 排查方法：在命令行中使用curl调用试试。
         * 原因：服务器所在机房无法验证SSL证书。
         * 解决办法：跳过SSL证书检查。
         * 参考文档：http://www.oschina.net/code/snippet_170919_13290
         * add by mario.cao 2013-04-24
         */
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过ssl认证

        switch ($type) {
            case 'GET' :
                curl_setopt($ch, CURLOPT_HTTPGET, true);
                break;
            case 'POST':
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
                break;
            case 'PUT' :
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
                curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
                break;
            case 'DELETE':
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
                curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
                break;
        }
        $curlData = curl_exec($ch); // 获得返回值
        $curlErrno = curl_errno($ch);
        // $curlError = curl_error($ch);
        curl_close($ch);

        if ($curlErrno > 0) {
             echo "cURL Error ($curlErrno): $curlErrno";
//            return json_encode(array());
        }

        return $curlData;
    }
}
