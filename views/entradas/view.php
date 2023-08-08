<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\bootstrap4\Button;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model app\models\Entradas */

$this->title = $model->titulo;
$this->params['breadcrumbs'][] = ['label' => 'Entradas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);


?>
<div class="entradas-view">

    <h1 class="titulo"><?= Html::encode($this->title) ?></h1>

    <p>

        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Borrarás esta receta, ¿estás seguro?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'id_usuario',
                'label' => 'Usuario',
                'format' => 'raw',
                'value' => function ($data) {
                    return "ID: " . $data->usuario->id . "<br>Nombre: " . $data->usuario->nombre;
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
            [
                'attribute' => 'estado',
                'label' => 'Estado',
                'format' => 'raw',
                'value' => function ($data) {
                    if ($data->estado =="A"){
                        return "Activa";
                    }else{
                        return "Pendiente";
                    }
                }
            ],
            'titulo',
            'fecha',
            'texto:ntext',
            [
                'attribute' => 'imagen',
                'label' => 'Imagen',
                'format' => 'raw',
                'value' => function ($model) {
                    $ret =  $model->imagen;
                    $ret .= "<br>";
                    $ret.="<img draggable=false height='90' width='90'style=' margin-right:10px;' 
                    src='/../../assets/IMG/entradas/" . $model->imagen . "' alt='imagen de la entrada'>";
                    return $ret;
                }
            ],           
             [
                'attribute' => '',
                'label' => 'Comentarios',
                'format' => 'raw',
                'value' => function ($model) {
                    $comentariosview = "/comentarios/view";
                    $subcomentariosview = "/subcomentarios/view";

                    $ret = '<table class ="comentarios"';
                    $ret .= "<tr><th>Ver</th><th>Tipo</th><th>ID</th><th>Texto</th></tr>";

                    foreach ($model->getComentariosEntrada() as $valor){
                        $ruta = Url::to([$comentariosview, 'id' => $valor['id']]);
                        $ret .= "<tr class='comentario'><td><a  href='$ruta'><img src='../../../assets/IMG/backend/icono/ver.png' width='30px'height='30px'/></a>
                        </td><td>  Comentario principal </td><td> ".$valor['id']. "</td><td>".$valor['texto'] ."</td></tr>";   
                        foreach ($model->getSubComentarios($valor['id']) as $subcomment){
                            $ruta2 = Url::to([$subcomentariosview, 'id' => $subcomment['id']]);

                            $ret .= "<tr class='subcomentario'><td><a href='$ruta2'><img src='../../../assets/IMG/backend/icono/ver.png' width='30px'height='30px'/></a>
                            </td><td>Subcomentario</td><td> ".$subcomment['id']. "</td><td>".$subcomment['texto'] ."</td></tr>";   
                        }

                    }
                    $ret .= '</table>';
                   // $array = [];
                    return $ret;
                }
            ],
           
        ],
    ]) ?>

</div>
