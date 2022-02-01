<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Calendario */

$this->title = $model->id_calendario;
$this->params['breadcrumbs'][] = ['label' => 'Calendarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="calendario-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_calendario' => $model->id_calendario], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_calendario' => $model->id_calendario], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_calendario',
            'id_prod',
            'mes',
            'estado',
        ],
    ]) ?>

</div>
