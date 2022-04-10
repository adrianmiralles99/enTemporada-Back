<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Subcomentarios */

$this->title = 'Crear subcomentario';
$this->params['breadcrumbs'][] = ['label' => 'Subcomentarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subcomentarios-create">

<h1 class="titulo"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
