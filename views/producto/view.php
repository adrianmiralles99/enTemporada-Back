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
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'imagen',
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