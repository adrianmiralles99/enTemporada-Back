<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Categorias */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categorias-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">  
        <div class="col-3">
            <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
        </div>
        <div class ="col-9">
        <?= $form->field($model, 'eventImage')->fileInput()->label("Imagen") ?>
        </div>
    </div>
    <div class="row">  
    <div class="col-12">
    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>

        </div>  

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
