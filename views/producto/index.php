<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Producto;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Productos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producto-index">

    <h1 class="titulo"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Nuevo Articulo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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
            [
                'attribute' => 'tipo',
                'label' => 'Tipo de Articulo',
                'format' => 'raw',
                'value' => "tipoArticulo"
            ],
            //'color',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Producto $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
