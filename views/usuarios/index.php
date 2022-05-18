<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Usuarios;
use yii\grid\ActionColumn;
use yii\grid\CheckboxColumn;

use yii\web\JsExpression;
use daixianceng\echarts\ECharts;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


?>
<div class="usuarios-index">

    <h1 class="titulo"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Creación de Usuario', ['create'], ['class' => 'btn btn-success']) ?>
       

        <?= Html::a('Gráficos Nivel Chef', ['nivelchef'], ['class' => 'btn btn-info']) ?>
        
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        
        'filterModel' => $searchModel,
        'columns' => [

            [
                'class' => CheckboxColumn::class, 'name' => 'idselec',
                'checkboxOptions' => function ($model, $key, $index, $column) {
                    return ['value' => $model->id];
                }
            ],

            // 'id',
            'nombre',
            'apellidos',
            'nick',
            'correo',
            //'password',
            //'imagen',
            //'descripcion:ntext',
            //'localidad',
            //'direccion',
            [
                'attribute' => 'tipo',
                'label' => 'Tipo de Usuario',
                'format' => 'raw',
                'value' => "tipoText"
            ],
            //'estado',
            //'token',
            //'fecha_cad',
            //'exp',
            //'id_ultima_receta',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Usuarios $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>