<div class="home">
    <?php
    if (Yii::$app->user->isGuest) {
        echo "<h1>Bienvenido a <em>EnTemporada</em>, donde apoyamos</h1>";
    } else {
        echo "<h1>Bienvenido, " . Yii::$app->user->identity->nick . "</h1>";
    }
    ?>
    <br>
    <br>
    <div class="row imagenes">
        <div class="col-4">
            <div class="row">
                <div class="col-12">
                    <h3>A nuestra comunidad</h3>
                </div>
                <div class="col-12">
                    <img src="../IMG/Escenas/Comunidad.png" alt="">
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="row">
                <div class="col-12">
                    <h3>La conservación planeta</h3>
                </div>
                <div class="col-12">
                    <img src="../IMG/Escenas/Planeta.png" alt="">
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="row">
                <div class="col-12">
                    <h3>Los productos de calidad</h3>
                </div>
                <div class="col-12">
                    <img src="../IMG/Escenas/Producto calidad.png" alt="">
                </div>
            </div>
        </div>


    </div>
</div>