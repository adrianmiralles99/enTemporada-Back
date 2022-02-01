<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Calendario */

$this->title = 'Update Calendario: ' . $model->id_calendario;
$this->params['breadcrumbs'][] = ['label' => 'Calendarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_calendario, 'url' => ['view', 'id_calendario' => $model->id_calendario]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="calendario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
