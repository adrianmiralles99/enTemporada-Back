<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\bootstrap4\Button;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model app\models\Reportes */

$this->title = "Reporte con ID ". $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Reportes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="reportes-view">

<h1 class="titulo"> <?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php 
    if ($model->tipo_comentario =="C"){
        $comment = "Id Comentario";
        $vista = "/comentarios/view";

    }else{
        $comment = "Id Subcomentario";
        $vista = "/subcomentarios/view";

    }
     ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
                    $vista = "/usuarios/view"; 
                    $ruta = Url::to([$vista, 'id' => $data->id_usuarioreportado]);
                    return "ID: " . $data->id_usuarioreportado . 
                     "<br>Nick: " . $data->usuarioreportado->nick . 
                     "<br><a  href='$ruta'> <img src='../../../assets/IMG/backend/icono/ver.png' width='30px'height='30px'/></a>";
                   // return "ID: " . $data->usuarioreportado->id . "<br>Nick: " . $data->usuarioreportado->nick;
                }
            ],  
            [
                'attribute' => 'id_comentario',
                'label' => $comment,
                'format' => 'raw',
                'value' => function ($data) {
                    if ($data->tipo_comentario =="C"){
                        $vista = "/comentarios/view"; 
                    }else{
                        $vista = "/subcomentarios/view";
                    }
                    $ruta = Url::to([$vista, 'id' => $data->id_comentario]);
                    return "" .$data->id_comentario . "<br><a  href='$ruta'> <img src='../../../assets/IMG/backend/icono/ver.png' width='30px'height='30px'/></a>";
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
            'motivo:ntext',
            'fecha',
        ],
    ]) ?>

</div>
