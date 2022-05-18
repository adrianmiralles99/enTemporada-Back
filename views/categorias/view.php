<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Categorias */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="categorias-view">

<h1 class="titulo"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estás seguro de que vas a borrar este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nombre',
            'descripcion:ntext',
            [
                'attribute' => 'imagen',
                //'label' => "<img draggable=false height='50' width='50'style='border-radius:100%; margin-right:10px;' src='../../../upload/Usuarios/" . $model->imagen . "' alt='no va'>
                'label' => 'Imagen',
                
                'format' => 'raw',
                'value' => function ($model) {
                   $ret =  $model->imagen;
                   $ret .= "<br>";
                   $ret.="<img draggable=false height='90' width='90'style=' margin-right:10px;' src='/../../assets/IMG/categorias/" . $model->imagen . "' alt='no va'>";
                    return $ret;
                }
            ],         
        ],
    ]) ?>

</div>
