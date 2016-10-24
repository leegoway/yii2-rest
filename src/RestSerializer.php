<?php

namespace leegoway\rest;

use yii\rest\Serializer;

class RestSerializer extends Serializer
{

    public function serialize($data)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $result = parent::serialize($data);
        return ['code' => 200, 'msg' => '', 'data' => $result];  
    }
}
