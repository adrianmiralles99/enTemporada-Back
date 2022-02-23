<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuarios-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="row">
        <div class="col-3">
            <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-3">
            <?= $form->field($model, 'apellidos')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-3">
            <?= $form->field($model, 'nick')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-3">
            <!-- <input type="file" id="usuarios-imagen" name="Usuarios[imagen]"> -->
            <?= $form->field($model, 'eventImage')->fileInput() ?>
            <!-- <input type="file" id="usuarios-imagen" name="Usuarios[eventImage]"> -->
        </div>
        <div class="col-12">
            <?= $form->field($model, 'correo')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-3">
            <?= $form->field($model, 'localidad')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-3">
            <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-2">
            <?= $form->field($model, 'tipo')->dropDownList(['A' => 'Administrador', 'U' => 'Usuario',], ['prompt' => '']) ?>
        </div>
        <div class="col-2">
            <?= $form->field($model, 'estado')->dropDownList(['A' => 'Activo', 'P' => 'Pendiente', 'B' => 'Bloqueado',], ['prompt' => '']) ?>
        </div>
        <div class="col-3">
            <?= $form->field($model, 'exp')->textInput()->label("Experiencia") ?>
        </div>

        <div class="col-12">
            <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>
        </div>


    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'save btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>