<?php
/**
 * Ejercicio 2. Comunidades autónomas.
 * A partir de un array que almacena comunidades autónomas y provincias, escribe
 * un programa que muestre aleatoriamente una comunidad autónoma y presente un
 * formulario con un checkbox que permita seleccionar las provincias que pertenecen
 * a la comunidad. En respuesta al formulario, la aplicación mostrará el número de
 * aciertos y fallos.
 *
 * Incluye una opción que permita visualizar las opciones correctas.
 *
 * @author David Pérez Ruiz
 */

 // Array de comunidades y provincias
 $comProvincia = [
     "Andalucía" => ["Almería", "Cádiz", "Córdoba", "Granada", "Huelva", "Jaén", "Málaga", "Sevilla"],
     "Aragón" => ["Huesca", "Teruel", "Zaragoza"],
     "Principado de Asturias" => ["Asturias"],
     "Islas Baleares" => ["Baleares"],
     "Canarias" => ["Las Palmas", "Santa Cruz de Tenerife"],
     "Cantabria" => ["Cantabria"],
     "Castilla-La Mancha" => ["Albacete", "Ciudad Real", "Cuenca", "Guadalajara", "Toledo"],
     "Castilla y León" => ["Ávila", "Burgos", "León", "Palencia", "Salamanca", "Segovia", "Soria", "Valladolid", "Zamora"],
     "Cataluña" => ["Barcelona", "Gerona", "Lérida", "Tarragona"],
     "Comunidad Valenciana" => ["Alicante", "Castellón", "Valencia"],
     "Extremadura" => ["Badajoz", "Cáceres"],
     "Galicia" => ["La Coruña", "Lugo", "Orense", "Pontevedra"],
     "La Rioja" => ["La Rioja"],
     "Comunidad de Madrid" => ["Madrid"],
     "Región de Murcia" => ["Región de Murcia"],
     "Comunidad Foral de Navarra" => ["Navarra"],
     "País Vasco" => ["Álava", "Guipúzcoa", "Vizcaya"],
     "Ceuta" => ["Ceuta"],
     "Melilla" => ["Melilla"],
 ];

 $comunidadRandom = array_rand($comProvincia);
 $numAciertos = $numFallos = 0;

 if(isset($_POST["comunidad"])) {
     $comunidadRandom = $_POST["comunidad"];
 }

 if(isset($_POST["comprobar"]) or $_POST["mostrar"]) {
     $com = $_POST["comunidad"];
     $prov = $_POST["provincia"] ?: [];

     foreach ($prov as $provincia) {
        if (in_array($provincia, $comProvincia[$com])) {
            $numAciertos++;
        } else {
            $numFallos++;
        }
     }

     foreach ($comProvincia[$com] as $provincia) {
         if (!in_array($provincia, $prov)) {
             $numFallos++;
         }
     }
 }
?>

<style>
    .provincias {
        display: grid;
        inline-size: 1095px;
        grid-template-columns: repeat(4, 270px);
        column-gap: 5px;
        background: #3B3B3B;
    }
    .provincia {
        display: flex;
        justify-content: space-between;
    }
    .provincia:nth-child(odd) {
        background: #F5AAB0;
    }
    .provincia:nth-child(even) {
        background: #FFF0C9;
    }
    .provincia label, input {
        margin-inline: 20px;
    }
</style>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="David Pérez Ruiz">
    <title>Comunidades autónomas</title>
</head>
<body>
    <h1>Comunidades autónomas</h1>
    <p>
        A partir de un array que almacena comunidades autónomas y provincias, escribe
        un programa que muestre aleatoriamente una comunidad autónoma y presente un formulario con un
        checkbox que permita seleccionar las provincias que pertenecen a la comunidad. En respuesta al
        formulario, la aplicación mostrará el número de aciertos y fallos.
        <br>
        Incluye una opción que permita visualizar las opciones correctas.
    </p>
    <form action="" method="POST">
        <div class="comunidad">
            <input type="hidden" value="<?= $comunidadRandom ?>" name="comunidad">
            <?= $comunidadRandom ?>
        </div>
        <div class="provincias">
            <?php foreach ($comProvincia as $comunidad => $provincias) {
                foreach ($provincias as $provincia) { ?>
                    <div class="provincia">
                        <label for="<?= $provincia ?>"><?= $provincia ?></label>
                        <input type="checkbox" value="<?= $provincia ?>" id="<?= $provincia ?>" name="provincia[]"
                        <?= ((isset($_POST["provincia"]) and in_array($provincia, $_POST["provincia"])) ? "checked" : "") ?>>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
        <input type="submit" value="Comprobar" name="comprobar">
        <?php if(isset($_POST["comprobar"])) { ?>
            <input type="submit" value="Mostrar correctas" name="mostrar">
        <?php } ?>
    </form>
    <?php if (isset($_POST["comprobar"]) or isset($_POST["mostrar"])) { ?>
        <ul>
            <li id="correcto">Número de aciertos: <?= $numAciertos ?> </li>
            <li id="incorrecto">Número de fallos: <?= $numFallos ?> </li>
        </ul>
    <?php } ?>
    <?php if (isset($_POST["mostrar"])) { ?>
        <p>Las provincias de <?= $com ?> son: </p>
        <ul>
            <?php foreach ($comProvincia[$com] as $provincia) { ?>
                <li><?= $provincia ?></li>
                <?php } ?>
        </ul>
    <?php } ?>
</body>
</html>