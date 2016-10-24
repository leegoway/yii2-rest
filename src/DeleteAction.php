<?php
/**
 * @author leegoway(leego.sir@gmail.com)
 */

namespace leegoway\rest;

use Yii;
use yii\web\ServerErrorHttpException;
use yii\rest\Action;

/**
 * DeleteAction implements the API endpoint for deleting a model.
 */
class DeleteAction extends Action
{
    /**
     * Deletes a model.
     * @param mixed $id id of the model to be deleted.
     * @throws ServerErrorHttpException on failure.
     */
    public function run($id)
    {
        $model = $this->findModel($id);

        if ($this->checkAccess) {
            call_user_func($this->checkAccess, $this->id, $model);
        }

        if ($model->delete() === false) {
            throw new ServerErrorHttpException('Failed to delete the object for unknown reason.');
        }

        return true;
    }
}

