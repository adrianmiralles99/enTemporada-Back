<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Recetas */
/* @var $form yii\widgets\ActiveForm */
?>

<script>
    window.onload = () => {
        if (document.getElementById("addingred")) {
            crearFila("pasos");
            crearFila("ingredientes");
            document.getElementById("addingred").addEventListener("click", () => {
                crearFila("ingredientes");
            });
            document.getElementById("addpaso").addEventListener("click", () => {
                crearFila("pasos");
            });
        }

    }

    function crearFila(tabla) {
        var table = document.getElementById(tabla);
        var tr = document.createElement("tr");
        var th = document.createElement("th");
        var td = document.createElement("td");
        var img = document.createElement("img");
        var input = document.createElement("input");
        var numero = table.childElementCount;

        // NO AGREGO EL NUMERO AL LADO DE LA IMAGEN PORQUE SI ENTRE EL 1 Y EL 4, ELIMINAN EL 2,
        // EL RESTO DE NUMERO NO SE ACTUALIZA
        img.className = "quitar";
        img.src = "../IMG/quitar.png";
        img.addEventListener("click", eliminar);
        th.prepend(img);
        input.className = "form-control";
        input.name = "Recetas[" + tabla + "][" + numero + "]";

        td.appendChild(input);
        tr.appendChild(th);
        tr.appendChild(td);
        table.appendChild(tr);
    }

    function eliminar(e) {
        e.target.parentElement.parentElement.remove();
    }
</script>
<div class="recetas-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-4">
            <?= $form->field($model, 'titulo')->textInput() ?>
        </div>
        <div class="col-3">
            <?= $form->field($model, 'imagen')->textInput() ?>
        </div>

        <div class="col-2">
            <?= $form->field($model, 'id_usuario')->textInput()->label("Id del Usuario") ?>
        </div>

        <div class="col-3">
            <?= $form->field($model, 'id_prodp')->textInput()->label("Id del Producto Principal") ?>
        </div>




        <div class="col-3">
            <?= $form->field($model, 'comensales')->textInput()->label("Comensales") ?>
        </div>
        <div class="col-3">
            <?= $form->field($model, 'tiempo')->textInput()->label("Tiempo") ?>
        </div>

        <div class="col-3">
            <?= $form->field($model, 'tipo')->dropDownList(
                ['Desayuno' => 'Desayuno', 'Almuerzo' => 'Almuerzo', 'Comida' => 'Comida', 'Cena' => 'Cena', 'Postre' => 'Postre'],
                ['prompt' => '']
            ) ?>
        </div>
        <div class="col-2">
            <?= $form->field($model, 'dificultad')->dropDownList(['Fácil' => 'Fácil', 'Intermedia' => 'Intermedia', 'Difícil' => 'Difícil'], ['prompt' => '']) ?>

        </div>
        <div class="col-2">
            <?= $form->field($model, 'estado')->dropDownList(['A' => 'Activo', 'P' => 'Pendiente', 'B' => 'Bloqueado',], ['prompt' => '']) ?>
        </div>

        <div class="col-12">
            <?php
            echo "<p>Ingredientes</p>";
            if ($model->ingredientes) {
                foreach ($model->ingredientes as $id => $valor) {
                    echo "<input class='form-control' name='Recetas[ingredientes][$id]' value='$valor'>";
                }
            } else {
                echo "<table class='table table-striped table-bordered'><tbody id='ingredientes'>";
                echo "</tbody></table>";
                echo "<button type='button' class='btn btn-primary' id='addingred'>Agregar Ingrediente</button>";
            }
            ?>
        </div>

        <div class="col-12">
            <?php
            echo "<p><br>Pasos</p>";
            if ($model->pasos) {
                foreach ($model->pasos as $id => $valor) {
                    echo "<input class='form-control' name='Recetas[pasos][$id]' value='$valor'>";
                }
            } else {
                echo "<table class='table table-striped table-bordered'><tbody id='pasos'>";
                echo "</tbody></table>";
                echo "<button type='button' class='btn btn-primary' id='addpaso'>Agregar Paso</button>";
            }
            ?>
        </div>





        <div class="form-group col-12">
            <?= Html::submitButton('Save', ['class' => 'save btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>