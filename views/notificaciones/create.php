<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Notificaciones */

$this->title = 'Crear notificación';
$this->params['breadcrumbs'][] = ['label' => 'Notificaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notificaciones-create">

<h1 class="titulo"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
