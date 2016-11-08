<?php
/**
 * @author leegoway<leego.sir@gmail.com>
 */

namespace leegoway\rest;

use yii\rest\ActiveController;
use Yii;

class RestActiveController extends ActiveController
{

    public $serializer = 'leegoway\rest\RestSerializer';
    public $uicRules = [];

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

    public function checkAccess($action, $model = null, $params = [])
    {
        $allow = true;
        if(isset($this->uicRules[$action])){
            $organizationId = $this->uicRules[$action]['organizationId'];
            $permissionId = $this->uicRules[$action]['permissionId'];
            $allow = Yii::$app->uicAuther->checkPermission($permissionId, $organizationId);
        }
        if(!$allow){
            throw new RestException('您没有权限执行此操作', 403);
        }
        return $allow;
    }
}

