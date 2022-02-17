<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Calendario;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CalendarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Calendarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calendario-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Calendario', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_prod',
            'mes',
            'estado',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Calendario $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
