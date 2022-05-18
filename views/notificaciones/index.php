<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Notificaciones;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NotificacionesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Notificaciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notificaciones-index">
    <h1 class="titulo"><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Crear notificación', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'id_usuario',
                'label' => 'Usuario notificado',
                'format' => 'raw',
                'value' => function ($data) {
                    return "ID: " . $data->usuario->id . "<br>Nombre: " . $data->usuario->nombre;
                }
            ],
            'asunto',
            'texto',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Notificaciones $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
