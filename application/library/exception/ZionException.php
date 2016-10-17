<?php
/**
 * Created by PhpStorm.
 * User: luoweiwei
 * Date: 16/10/17
 * Time: 下午1:22
 */
namespace Exception;

class ZionException extends Exception{
    public function __construct($message, $code=0, Exception $previous)
    {
        parent::__construct($message, $code, $previous);
    }
}