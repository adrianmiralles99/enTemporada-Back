<?php

namespace app\controllers;

use yii\rest\ActiveController;

/**
 * LikesController implements the CRUD actions for Likes model.
 */
class LikesController extends ActiveController
{
    public $modelClass = 'app\models\Likes';
}
