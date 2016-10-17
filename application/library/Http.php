<?php
use Tool\SerException;

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

    public static function getError(){
        throw new SerException('400 Bad Request','invalid_request','Invalid grant_type parameter or parameter missing');
    }
}
