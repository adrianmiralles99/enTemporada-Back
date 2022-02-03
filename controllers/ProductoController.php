<?php

namespace app\controllers;

// use yii\rest\ActiveController;
use app\controllers\BaseController;
use yii\rest\ActiveController;

/**
 * ProductoController implements the CRUD actions for Producto model.
 */
class ProductoController extends BaseController
{
    public $modelClass = 'app\models\Producto';
    public $authenable = false;

    public function actions()
    {
        $actions = parent::actions();
        //Eliminamos acciones de crear y eliminar apuntes. Eliminamos update para personalizarla
        unset($actions['delete'], $actions['create'], $actions['update']);
        return $actions;
    }
}
