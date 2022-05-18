<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Producto;

/* @var $this yii\web\View */
/* @var $model app\models\Producto */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="producto-view">

    <h1 class="titulo"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Borrarás este producto, ¿estás seguro?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nombre',
            [
                'attribute' => 'imagen',
                //'label' => "<img draggable=false height='50' width='50'style='border-radius:100%; margin-right:10px;' src='../../../upload/Usuarios/" . $model->imagen . "' alt='no va'>
                'label' => 'Imagen',
                
                'format' => 'raw',
                'value' => function ($model) {
                   $ret =  $model->imagen;
                   $ret .= "<br>";
                   $ret.="<img draggable=false height='80' width='80'style='border-radius:100%; margin-right:10px;' src='/../../assets/IMG/Articulos/basic/" . $model->imagen . "' alt='no va'>";
                    return $ret;
                }

            ],
            'descripcion:ntext',
            [
                'attribute' => 'info_nut',
                'label' => 'Información de Nutrientes',
                'format' => 'raw',
                'value' => function ($data) {
                    $ret = '<table>';
                    foreach ($data->info_nut as $dato => $valor) {
                        $ret .= "<tr><th>" . (new Producto())->getNutriente($dato) . "</th><td>$valor</td></tr>";
                    }
                    $ret .= '</table>';

                    return $ret;
                }
            ],
            'tipo',
            [
                'attribute' => 'color',
                'label' => "<div style='background-color:" . $model->color . "' class='color'></div>Color",
                'format' => 'raw',
                'value' => $model->color
            ],
        ],
    ]) ?>

</div>