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
    public $authenable=false;
}
