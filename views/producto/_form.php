<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Producto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="producto-form">

    <?php $form = ActiveForm::begin();
    $model->info_nut = json_encode($model->info_nut);
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

        <div class="col-12">
            <?= $form->field($model, 'info_nut')->textarea(['rows' => 6]) ?>
        </div>



        <div class="form-group col-12">
            <?= Html::submitButton('Save', ['class' => 'save btn btn-success']) ?>
        </div>

    </div>
    <?php ActiveForm::end(); ?>

</div>