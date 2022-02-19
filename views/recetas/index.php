<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Recetas;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RecetasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Recetas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recetas-index">

    <h1 class="titulo"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Recetas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'titulo',
            [
                'attribute' => 'id_usuario',
                'label' => 'Usuario',
                'format' => 'raw',
                'value' => function ($data) {
                    return "ID: " . $data->usuario->id . "<br>Nombre: " . $data->usuario->nombre;
                }
            ],
            'tipo',
            'fecha',
            [
                'attribute' => 'id_prodp',
                'label' => 'Producto Principal',
                'format' => 'raw',
                'value' => function ($data) {
                    return "ID: " . $data->prodp->id . "<br>Nombre: " . $data->prodp->nombre;
                }
            ],
            //'estado',
            //'imagen',
            //'tiempo',
            //'comensales',
            //'dificultad',
            //'ingredientes:ntext',
            //'pasos:ntext',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Recetas $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>