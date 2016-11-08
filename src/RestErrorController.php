<?php

namespace leegoway\rest;

use Yii;
use yii\web\Controller;

class RestErrorController extends Controller
{

    public function actionError()
    {
        if (Yii::$app->db->transaction && Yii::$app->db->transaction->isActive) {
            Yii::$app->db->transaction->rollBack();
        }
        $errorHandler = Yii::$app->getErrorHandler();
        $exception = $errorHandler->exception;
        $code = $exception->getCode();
        $msg = $exception->getMessage();
        return Formatter::fail($msg, $code);
    }
}
