<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Reportes */

$this->title = 'Crear reporte';
$this->params['breadcrumbs'][] = ['label' => 'Reportes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reportes-create">

<h1 class="titulo"> <?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
