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

    <h1 class="titulo"><?= Html::encode($this->title) ?></h1>
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
            [
                'attribute' => 'imagen',
                'label' => "<img draggable=false height='50' width='50'style='border-radius:100%; margin-right:10px;' src='../../../upload/Usuarios/" . $model->imagen . "' alt='no va'>
                </span>Imagen<span>",
                'format' => 'raw',
                'value' => $model->imagen
            ],
            'correo',
            // 'password',
            'descripcion:ntext',
            'localidad',
            'direccion',
            [
                'attribute' => 'tipo',
                'label' => "Tipo de Usuario",
                'format' => 'raw',
                'value' => $model->tipoText
            ],
            [
                'attribute' => 'estado',
                'label' => "Estado del Usuario",
                'format' => 'raw',
                'value' => $model->estadoText
            ],
            // 'token',
            // 'fecha_cad',
            'exp',
            // 'id_ultima_receta',
        ],
    ]) ?>

</div>