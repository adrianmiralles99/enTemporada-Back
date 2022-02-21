<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Producto;
use yii\grid\ActionColumn;
use yii\grid\CheckboxColumn;

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

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            [
                'class' => CheckboxColumn::class, 'name' => 'idselec',
                'checkboxOptions' => function ($model, $key, $index, $column) {
                    return ['value' => $model->id];
                }
            ],
            // 'id',
            'nombre',
            // 'imagen',
            // 'descripcion:ntext',
            // [
            //     'attribute' => 'info_nut',
            //     'label' => 'Información de Nutrientes',
            //     'format' => 'raw',
            //     'value' => function ($data) {
            //         $ret = "<div class='row'>";
            //         foreach ($data->info_nut as $dato => $valor) {
            //             $ret .= "<div class='col-3'>" . (new Producto())->getNutriente($dato) . ": $valor</div>";
            //         }
            //         $ret .= '</div>';

            //         return $ret;
            //     }
            // ],
            [
                'attribute' => 'tipo',
                'label' => 'Tipo de Articulo',
                'format' => 'raw',
                'value' => "tipoArticulo"
            ],
            //'color',
            /*[
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Producto $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],*/
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>