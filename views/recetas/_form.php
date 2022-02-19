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
            <?= $form->field($model, 'dificultad')->dropDownList(['Fácil' => 'Fácil', 'Intermedia' => 'Intermedia', 'Difícil' => 'Difícil'], ['prompt' => '']) ?>

        </div>

        <div class="col-12 row">
            <?php
            echo "<p>Ingredientes</p>";
            if ($model->ingredientes) {
                foreach ($model->ingredientes as $id => $valor) {
                    echo "<input class='form-control' name='Producto[ingredientes][$id]' value='$valor'></label>";
                }
            } else {
                // foreach ($model::$nutrientes as $nut => $valor) {
                //     echo "<label class='col-2'><span>" . $model->getNutriente($nut) . "</span><br>";
                //     echo "<input class='form-control' name='Producto[info_nut][$nut]' ></label>";
                // }
            }
            ?>
        </div>

        <div class="col-12 row">
            <?php
            echo "<p><br>Pasos</p>";
            if ($model->ingredientes) {
                foreach ($model->pasos as $id => $valor) {
                    echo "<input class='form-control' name='Producto[pasos][$id]' value='$valor'></label>";
                }
            } else {
                // foreach ($model::$nutrientes as $nut => $valor) {
                //     echo "<label class='col-2'><span>" . $model->getNutriente($nut) . "</span><br>";
                //     echo "<input class='form-control' name='Producto[info_nut][$nut]' ></label>";
                // }
            }
            ?>
        </div>





        <div class="form-group col-12">
            <?= Html::submitButton('Save', ['class' => 'save btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>