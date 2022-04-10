<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Subcomentarios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subcomentarios-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">  
        <div class="col-3">
            <?= $form->field($model, 'id_usuario')->textInput() ?>
        </div>
        <div class="col-3">
            <?= $form->field($model, 'id_comentarioprinc')->textInput() ?>
        </div>
        <div class="col-3">
            <?= $form->field($model, 'estado')->dropDownList([ 'V' => 'Visible', 'I' => 'Invisible', ], ['prompt' => '']) ?>
        </div>
        
    </div>

    <?= $form->field($model, 'texto')->textarea(['rows' => 6]) ?>

  
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
