<?php
/**
 * @desc desc
 * @author vv.L <weiwei.luo@chinapnr.com>
 * @createDate 2016/10/18
 */

namespace Tool;


class SerException extends \Exception
{
    public function __construct($http_status_code, $error, $error_description = NULL)
    {
//        parent::__construct($error);

        $this->httpCode = $http_status_code;

        $this->errorData['error'] = $error;
        if ($error_description) {
            $this->errorData['error_description'] = $error_description;
        }
    }

    public function sendHttpResponse()
    {
        header("HTTP/1.1 " . $this->httpCode);
        header("Content-Type: application/json");
        header("Cache-Control: no-store");

        print(json_encode(array('code' => $this->httpCode, 'message' => $this->errorData['error_description'], 'error' => $this->errorData['error'])));
        exit();
    }
}