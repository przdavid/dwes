<?php
/**
 * Inicio del sitio
 * 
 * @author David Pérez Ruiz
 */

 // Indexado de enlaces
 $actividades = [
     ["id" => "Actividad 1",
     "enlace" => "./act1/index.php"],
     ["id" => "Actividad 2",
     "enlace" => "./act2/index.php"]
 ];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="David Pérez Ruiz">
    <title>RA3</title>
</head>
<body>
<h1>RA3</h1>
<p>Desarrollo Web en Entorno Servidor</p>
    <ul>
        <?php foreach ($actividades as $values) { ?>
            <li><a href='<?= $values["enlace"] ?>' target='_blank'><?= $values["id"] ?></a></li>
        <?php } ?>
    </ul>
</body>
</html>