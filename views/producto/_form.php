<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Producto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="producto-form">

    <?php $form = ActiveForm::begin();
    ?>
    <div class="row">
        <div class="col-3">
            <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-3">
            <?= $form->field($model, 'imagen')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-3">
            <?= $form->field($model, 'tipo')->dropDownList(['F' => 'Fruta', 'V' => 'Verdura',], ['prompt' => '']) ?>
        </div>

        <div class="col-3">
            <?= $form->field($model, 'color')->textInput(['maxlength' => true])->label("<div style='background-color:" . $model->color . "' class='color'></div>Color") ?>
        </div>

        <div class="col-12">
            <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>
        </div>

        <!-- name="Producto[info_nut][cl]" -->
        <div class="col-12 row">
            <?php
            if ($model->info_nut) {
                foreach ($model->info_nut as $nut => $valor) {
                    echo "<label class='col-2'><span>" . $model->getNutriente($nut) . "</span><br>";
                    echo "<input class='form-control' name='Producto[info_nut][$nut]' value='$valor'></label>";
                }
            } else {
                foreach ($model::$nutrientes as $nut => $valor) {
                    echo "<label class='col-2'><span>" . $model->getNutriente($nut) . "</span><br>";
                    echo "<input class='form-control' name='Producto[info_nut][$nut]' ></label>";
                }
            }
            ?>
        </div>


        <div class="form-group col-12">
            <?= Html::submitButton('Save', ['class' => 'save btn btn-success']) ?>
        </div>

    </div>
    <?php ActiveForm::end(); ?>

</div>