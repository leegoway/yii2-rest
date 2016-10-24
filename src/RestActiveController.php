<?php
/**
 * @author leegoway<leego.sir@gmail.com>
 */

namespace leegoway\rest;

use yii\rest\ActiveController;

/**
 * RestActiveController implements a common set of actions for supporting RESTful access to ActiveRecord.
 *
 * The class of the ActiveRecord should be specified via [[modelClass]], which must implement [[\yii\db\ActiveRecordInterface]].
 * By default, the following actions are supported:
 *
 * - `index`: list of models
 * - `view`: return the details of a model
 * - `create`: create a new model
 * - `update`: update an existing model
 * - `delete`: delete an existing model
 * - `options`: return the allowed HTTP methods
 *
 * You may disable some of these actions by overriding [[actions()]] and unsetting the corresponding actions.
 *
 * To add a new action, either override [[actions()]] by appending a new action class or write a new action method.
 * Make sure you also override [[verbs()]] to properly declare what HTTP methods are allowed by the new action.
 *
 * You should usually override [[checkAccess()]] to check whether the current user has the privilege to perform
 * the specified action against the specified model.
 *
 * @author qiang.xue 
 * @since 2.0
 * 
 * Based on ActiveController, this extension output formatted response
 * @author leegoway<leego.sir@gmail.com>
 */
class RestActiveController extends ActiveController
{

    public $serializer = 'leegoway\rest\RestSerializer';

}

