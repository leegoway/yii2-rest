<?php
/**
 * @author leegoway<leego.sir@gmail.com>
 */

namespace leegoway\rest;

use yii\rest\ActiveController;

class RestActiveController extends ActiveController
{

    public $serializer = 'leegoway\rest\RestSerializer';


    public function actions()
    {
        $actions = parent::actions();
        $actions['delete'] = [
                'class' => 'leegoway\rest\DeleteAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
            ];
        return $actions;
    }
}

