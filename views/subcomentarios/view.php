<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Subcomentarios */

$this->title = "Subcomentario perteneciente al comentario con ID ".$model->id_comentarioprinc;
$this->params['breadcrumbs'][] = ['label' => 'Subcomentarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="subcomentarios-view">

<h1 class="titulo"><?= Html::encode($this->title) ?></h1>

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
            [
                'attribute' => 'id_usuario',
                'label' => 'Usuario',
                'format' => 'raw',
                'value' => function ($data) {
                    return "ID: " . $data->usuario->id . "<br>Nombre: " . $data->usuario->nombre;
                }
            ],
            [
                'attribute' => 'id_comentarioprinc',
                'label' => 'Comentario principal',
                'format' => 'raw',
                'value' => function ($data) {
                    return "ID: " . $data->comentarioprinc->id . "<br>" . $data->comentarioprinc->texto;
                }
            ],
            'texto:ntext',
           
            [
                'attribute' => 'estado',
                'label' => 'Estado',
                'format' => 'raw',
                'value' => function ($data) {
                    if ($data->estado =="V"){
                        return "Visible";
                    }else{
                        return "Invisible";
                    }
                }
            ],
            'fecha'
        ],
    ]) ?>

</div>
