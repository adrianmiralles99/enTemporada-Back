<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Reportes;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReportesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reportes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reportes-index">

<h1 class="titulo"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear reporte', ['create'], ['class' => 'btn btn-success']) ?>
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
                'label' => 'Usuario',
                'format' => 'raw',
                'value' => function ($data) {
                    return "ID: " . $data->usuario->id . "<br>Nick: " . $data->usuario->nick;
                }
            ],       
            [
                'attribute' => 'id_usuarioreportado',
                'label' => 'Usuario reportado',
                'format' => 'raw',
                'value' => function ($data) {
                    return "ID: " . $data->usuarioreportado->id . "<br>Nick: " . $data->usuarioreportado->nick;
                }
            ],  
            [
                'attribute' => 'tipo_comentario',
                'label' => 'Tipo de comentario',
                'format' => 'raw',
                'value' => function ($data) {
                    if ($data->tipo_comentario =="C"){
                        return "Comentario principal";
                    }else{
                        return "Subcomentario";
                    }
                }
            ], 
           
            'id_comentario',
            'motivo:ntext',
            //'fecha',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Reportes $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
