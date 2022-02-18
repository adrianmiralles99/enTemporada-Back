<?php

use app\models\Producto;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Recetas;
use app\models\Usuarios;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RecetasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Recetas';
$this->params['breadcrumbs'][] = $this->title;
// $modeloProducto = (new Usuarios())->findOne($searchModel->id_usuario);
?>
<div class="recetas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Recetas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    echo $searchModel->id_usuario;
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'id_usuario',
                'label' => 'Usuario',
                'format' => 'raw',
                'value' => function ($data) {
                    return "ID: " . $data->id_usuario . " <br>Nick:  " . (new Usuarios())->findOne($data->id_usuario)->nick;
                }
            ],
            'tipo',
            'fecha',
            [
                'attribute' => 'id_usuario',
                'label' => 'Producto Principal',
                'format' => 'raw',
                'value' => function ($data) {
                    return "ID: " . $data->id_prodp . " <br>Nombre: " . (new Producto())->findOne($data->id_prodp)->nombre;
                }
            ],
            //'estado',
            //'imagen',
            //'titulo',
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