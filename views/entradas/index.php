<?php
use app\models\Entradas;
use app\models\Comentarios;

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EntradasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Entradas';
$this->params['breadcrumbs'][] = $this->title;
//$comentario = new Comentario();
?>
<div class="entradas-index">

<h1 class="titulo"><?= Html::encode($this->title) ?></h1>


    <p>
        <?= Html::a('Crear Entrada', ['create'], ['class' => 'btn btn-success']) ?>
        
    </p>

    <?php ?>

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
                'attribute' => 'id_categoria',
                'label' => 'Categoría',
                'format' => 'raw',
                'value' => function ($data) {
                    return "ID: " . $data->categoria->id . "<br>Nombre: " . $data->categoria->nombre;
                }
            ],
           
            'titulo',
            'fecha',
           
            //'estado',
            //'texto:ntext',
            //'imagen',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Entradas $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>

