<?php

namespace leegoway\rest;

class ErrorHandler extends \yii\web\ErrorHandler
{
    public $restErrorAction;

    /**
     * Renders the exception.
     * @param \Exception $exception the exception to be rendered.
     */
    protected function renderException($exception) {
        if (Yii::$app->has('response')) {
            $response = Yii::$app->getResponse();
            $response->isSent = false;
            $response->stream = null;
            $response->data = null;
            $response->content = null;
        } else {
            $response = new Response();
        }
        $isRest = $exception instanceof RestException;
        if($isRest && $this->restErrorAction != null){
            $result = Yii::$app->runAction($this->restErrorAction);
            if ($result instanceof Response) {
                $response = $result;
            } else {
                $response->data = $result;
            }
            $response->send();
        } else {
            parent::renderException($exception);
        }
    }
} 
