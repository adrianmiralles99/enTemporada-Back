<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */

$this->title = $model->nombre . " " . $model->apellidos;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="usuarios-view">

    <h1 class="titulo"><?= Html::encode($this->title) ?></h1>
    <br>
    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estás seguro de que vas a borrar este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nombre',
            'apellidos',
            'nick',
            [
                'attribute' => 'imagen',
                //'label' => "<img draggable=false height='50' width='50'style='border-radius:100%; margin-right:10px;' src='../../../upload/Usuarios/" . $model->imagen . "' alt='no va'>
                'label' => 'Imagen',
                'format' => 'raw',
                'value' => function ($model) {
                   $ret =  $model->imagen;
                   $ret .= "<br>";
                   $ret.="<img draggable=false height='80' width='80'style='border-radius:100%; margin-right:10px;' src='/../../assets/IMG/Usuarios/" . $model->imagen . "' alt='no va'>";
                    return $ret;
                }

            ],
            'correo',
            // 'password',
            'descripcion:ntext',
            'localidad',
            'direccion',
            [
                'attribute' => 'tipo',
                'label' => "Tipo de Usuario",
                'format' => 'raw',
                'value' => $model->tipoText
            ],
            [
                'attribute' => 'estado',
                'label' => "Estado del Usuario",
                'format' => 'raw',
                'value' => $model->estadoText
            ],
            // 'token',
            // 'fecha_cad',
            'exp',
            [
                'attribute' => 'Nivel chef',
                'label' => 'Nivel chef',
                'format' => 'raw',
                'value' => function ($model) {
                    if($model->exp >= 0 && $model->exp < 150){
                       return "Nivel bronce";
                    }else if($model->exp >= 150 && $model->exp <300){
                        return "Nivel plata";
                    }else if ($model->exp >= 300 && $model->exp <400){
                        return "Nivel oro";
                    }else if ($model->exp >= 400 && $model->exp < 475){
                        return "Nivel platino";
                    }else{
                        return "Nivel diamante";
                    }
                 }
            ],
            [
                'attribute' => '',
                'label' => 'Notificaciones',
                'format' => 'raw',
                'value' => function ($model) {
                    $ret = "<ul>";
                    foreach ($model->getNotificaciones($model->id) as $valor){
                       // $ruta = Url::to([$comentariosview, 'id' => $valor['id']]);
                        $ret .= "<li class='notificacion'><strong>" .$valor['asunto'] . ":  </strong> "  . $valor['texto']. " </li>";        
                    }
                    $ret .= '</ul>';
                   // $array = [];
                   $view = "/notificaciones/create";
                   $ruta = Url::to([$view]);
                   $ret.="<button type='button' class='btn btn-dark'><a class='enlacenotificacion' href='$ruta'>Notificar</a> </button>";
                    return $ret;
                }
            ],
           
            // 'id_ultima_receta',
        ],
    ]) ?>

</div>