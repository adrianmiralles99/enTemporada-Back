<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;
use app\models\Subcomentarios;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SubcomentariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Subcomentarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subcomentarios-index">

<h1 class="titulo"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear subcomentario', ['create'], ['class' => 'btn btn-success']) ?>
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
            //'fecha',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Subcomentarios $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
