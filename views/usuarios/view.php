<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */

$this->title = $model->nombre . " " . $model->apellidos;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="usuarios-view">

    <h1><?= Html::encode($this->title)?></h1>
    <br>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'nombre',
            'apellidos',
            'nick',
            'correo',
            'password',
            'imagen',
            'descripcion:ntext',
            'localidad',
            'direccion',
            'tipoText',
            // 'estado',
            // 'token',
            // 'fecha_cad',
            'exp',
            // 'id_ultima_receta',
        ],
    ]) ?>

</div>