<!-- <form action="" method="post" enctype="multipart/form-data">
    <button class="button"><a href="index.php">Volver</a></button>
    <input class="button" type="submit" name=enviar value="Guardar">
    <br>
    <?php
    // for ($i = 0; $i < 5; $i++) {
    //     echo "Archivo" . $i . ": <input type='file' name='archivo[]'>";
    //     echo "<br><br>";
    // }
    ?>
    <br>
    <br>

</form>
</form> -->

<?php


use yii\web\Controller;

class FileController
{
    public function actionUpload($x)
    {
        $archivo = $_FILES['archivo']['name'];
        $temp = $_FILES['archivo']['tmp_name'];

        // $archivo = $_FILES['name'];
        var_dump($x);
        die();
    }
}

?>