<?php
namespace leegoway\rest;

use yii\rest\Serializer;
use Yii;
use yii\base\Arrayable;
use yii\base\Component;
use yii\base\Model;
use yii\data\DataProviderInterface;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use yii\web\Link;
use yii\web\Request;
use yii\web\Response;

class RestSerializer extends Serializer
{

    public function init()
    {
        parent::init();
        Yii::$app->response->format = Response::FORMAT_JSON;
    }

    public function serialize($data)
    {
    	if ($data instanceof Model && $data->hasErrors()) {
            return $this->serializeModelErrors($data);
        } elseif ($data instanceof Arrayable) {
            return $this->serializeModel($data);
        } elseif ($data instanceof DataProviderInterface) {
            return $this->serializeDataProvider($data);
        } else {
            return Formatter::success($data);
        }
    }

    /**
     * Serializes the validation errors in a model.
     * @param Model $model
     * @return array the array representation of the errors
     */
    protected function serializeModelErrors($model)
    {
        $errors = [];
        foreach ($model->getFirstErrors() as $name => $message) {
            $errors[] = [
                'field' => $name,
                'message' => $message,
            ];
        }
        return Formatter::error($errors); 
    }

	/**
     * Serializes a data provider.
     * @param DataProviderInterface $dataProvider
     * @return array the array representation of the data provider.
     */
    protected function serializeDataProvider($dataProvider)
    {
        $result = parent::serializeDataProvider($dataProvider);
        return Formatter::success($result); 
    }

    /**
     * Serializes a model object.
     * @param Arrayable $model
     * @return array the array representation of the model
     */
    protected function serializeModel($model)
    {
        $model = parent::serializeModel($model);
        return Formatter::success($model); ; 
    }


}

