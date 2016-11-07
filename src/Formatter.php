<?php
namespace leegoway\rest;

use Yii;

class Formatter
{

	public function init()
	{
		//Yii::$app->response->format = Response::FORMAT_JSON;
	}

	//正常返回数据
    public static function success($data)
    {
        return ['code' => 200, 'msg' => '', 'data' => $data, 'errors' => null];
    }

    //业务错误，返回错误信息
    public static function fail($msg, $code = 500)
    {
        return ['code' => $code, 'msg' => $msg, 'data' => null, 'errors' => null];
    }

    //校验失败，返回校验错误信息
    public static function error($errors, $errorcode = 400)
    {
        return ['code' => $errorcode, 'msg' => '', 'data' => null, 'errors' => $errors];
    }

}

