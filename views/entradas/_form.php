<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Entradas */
/* @var $form yii\widgets\ActiveForm */


//$form->field($model, 'fecha')->textInput()

?>

<div class="entradas-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">  
        <div class="col-6">
            <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-2">
            <?= $form->field($model, 'eventImage')->fileInput()->label("Imagen") ?>
        </div>

    </div>
    <div class="row">  

        <div class="col-2">
            <?= $form->field($model, 'id_usuario')->textInput() ?>
        </div>
        <div class="col-2">
            <?= $form->field($model, 'id_categoria')->textInput() ?>
        </div>
        <div class="col-2">
            <?= $form->field($model, 'estado')->dropDownList([ 'P' => 'Pendiente', 'A' => 'Activa', ], ['prompt' => '']) ?>
        </div>
        <div class="col-12">
            <?= $form->field($model, 'texto')->textarea(['rows' => 6]) ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'save btn btn-success']) ?>
    </div>






   
    <?php ActiveForm::end(); ?>

</div>
