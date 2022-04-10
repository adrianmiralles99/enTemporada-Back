<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Subcomentarios */

$this->title = 'Actualización subcomentario ID: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Subcomentarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="subcomentarios-update">

<h1 class="titulo"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
