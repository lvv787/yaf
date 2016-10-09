<?php
namespace Tool;

class Http {
    public static function getHttpHost($http = false, $entities = false) {
        $host = (isset($_SERVER['HTTP_X_FORWARDED_HOST']) ? $_SERVER['HTTP_X_FORWARDED_HOST'] : $_SERVER['HTTP_HOST']);
        if ($entities)
            $host = htmlspecialchars($host, ENT_COMPAT, 'UTF-8');
        if ($http)
        {
            $host = self::getCurrentUrlProtocolPrefix() . $host;
        }

        return $host;
    }
}
