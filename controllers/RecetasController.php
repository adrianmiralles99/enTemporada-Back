<?php

namespace app\controllers;

use yii\rest\ActiveController;

/**
 * RecetasController implements the CRUD actions for Recetas model.
 */
class RecetasController extends ActiveController
{
    public $modelClass = 'app\models\Recetas';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::class,
            'except' => ['view', 'index'],
        ];
        return $behaviors;
    }
}
