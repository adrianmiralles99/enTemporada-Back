<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Favoritos;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FavoritosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Favoritos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="favoritos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear favorito', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_usuario',
            'id_receta',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Favoritos $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
