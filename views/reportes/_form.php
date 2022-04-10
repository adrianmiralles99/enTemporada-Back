<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Reportes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reportes-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">  
        <div class="col-2">
            <?= $form->field($model, 'id_usuario')->textInput() ?>
        </div>
        <div class="col-2">
            <?= $form->field($model, 'id_usuarioreportado')->textInput() ?>
        </div>
        <div class="col-2">
            <?= $form->field($model, 'tipo_comentario')->dropDownList([ 'C' => 'Comentario principal', 'S' => 'Subcomentario', ], ['prompt' => '']) ?>
        </div>
        <div class="col-2">
            <?= $form->field($model, 'id_comentario')->textInput() ?>
        </div>
        
        <div class="col-8">
        <?= $form->field($model, 'motivo')->textarea(['rows' => 6]) ?>
        </div>
    </div>






    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
