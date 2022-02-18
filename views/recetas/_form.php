<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Recetas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recetas-form">

    <?php $form = ActiveForm::begin();
    ?>
    <div class="row">
        <div class="col-6">
            <?= $form->field($model, 'titulo')->textInput() ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'imagen')->textInput() ?>
        </div>

        <div class="col-3">
            <?= $form->field($model, 'id_usuario')->textInput()->label("Id del Usuario") ?>
        </div>

        <div class="col-3">
            <?= $form->field($model, 'id_prodp')->textInput()->label("Id del Producto Principal") ?>
        </div>
        <div class="col-3">
            <?= $form->field($model, 'tipo')->dropDownList(
                ['Desayuno' => 'Desayuno', 'Almuerzo' => 'Almuerzo', 'Comida' => 'Comida', 'Cena' => 'Cena', 'Postre' => 'Postre'],
                ['prompt' => '']
            ) ?>
        </div>
        <div class="col-3">
            <?= $form->field($model, 'dificultad')->dropDownList(['Fácil' => 'Fácil', 'Intermedio' => 'Intermedio', 'Difícil' => 'Difícil'], ['prompt' => '']) ?>

        </div>


        <div class="col-12">
            <?= $form->field($model, 'ingredientes')->textarea(["rows" => 5]) ?>
        </div>

        <div class="col-12">
            <?= $form->field($model, 'pasos')->textarea(["rows" => 5]) ?>
        </div>



        <div class="form-group col-12">
            <?= Html::submitButton('Save', ['class' => 'save btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>