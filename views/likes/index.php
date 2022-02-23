<?php

use yii\helpers\Url;
use app\models\Likes;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;
use yii\grid\CheckboxColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LikesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Likes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="likes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Likes', ['create'], ['class' => 'btn btn-success']) ?>
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
            'id',
            'id_usuario',
            'id_receta',
            /*[
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Likes $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],*/
        ],
    ]); ?>


</div>