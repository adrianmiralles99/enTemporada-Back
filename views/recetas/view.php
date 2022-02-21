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
            'id_usuario',
            'tipo',
            'fecha',
            'id_prodp',
            'estado',
            'imagen',
            'titulo',
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