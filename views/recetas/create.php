<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Recetas */

$this->title = 'Creación de Receta';
$this->params['breadcrumbs'][] = ['label' => 'Recetas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recetas-create">

    <h1 class="titulo"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
