<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Notificaciones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="notificaciones-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-3">
            <?= $form->field($model, 'id_usuario')->textInput() ?>
        </div>
        <div class="col-3">
            <?= $form->field($model, 'asunto')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-12">
            <?= $form->field($model, 'texto')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
