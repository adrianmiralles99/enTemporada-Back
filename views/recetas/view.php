<?php

use app\models\Recetas;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Recetas */

$this->title =  $model->titulo;
$this->params['breadcrumbs'][] = ['label' => 'Recetas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="recetas-view">

    <h1 class="titulo"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'tipo',
            'fecha',
            [
                'attribute' => 'id_prodp',
                'label' => 'Producto Principal',
                'format' => 'raw',
                'value' => function ($data) {
                    return "ID: " . $data->prodp->id . "<br>Nombre: " . $data->prodp->nombre;
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
            [
                'attribute' => 'imagen',
                //'label' => "<img draggable=false height='50' width='50'style='border-radius:100%; margin-right:10px;' src='../../../upload/Usuarios/" . $model->imagen . "' alt='no va'>
                'label' => 'Imagen',
                
                'format' => 'raw',
                'value' => function ($model) {
                   $ret =  $model->imagen;
                   $ret .= "<br>";
                   $ret.="<img draggable=false height='90' width='90'style='margin-right:10px;' src='/../../assets/IMG/recetas/" . $model->imagen . "' alt='no va'>";
                    return $ret;
                }

            ],            'titulo',
            'tiempo',
            'comensales',
            'dificultad',
            [
                'attribute' => 'ingredientes',
                'label' => 'Ingredientes',
                'format' => 'raw',
                'value' => function ($data) {
                    $ret = '<table>';
                    foreach ($data->ingredientes as $id => $valor) {
                        $ret .= "<tr><th>" . ($id + 1) . "</th><td>$valor</td></tr>";
                    }
                    $ret .= '</table>';

                    return $ret;
                }
            ],
            [
                'attribute' => 'pasos',
                'label' => 'Pasos',
                'format' => 'raw',
                'value' => function ($data) {
                    $ret = '<table>';
                    foreach ($data->pasos as $id => $valor) {
                        $ret .= "<tr><th>Paso " . ($id + 1) . "</th><td>$valor</td></tr>";
                    }
                    $ret .= '</table>';

                    return $ret;
                }
            ],
        ],
    ]) ?>

</div>