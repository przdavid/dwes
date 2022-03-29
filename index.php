<?php
/**
 * Inicio del sitio
 * 
 * @author David Pérez Ruiz
 */

 // Indexado de enlaces
 $ra = [
     ["id" => "RA3",
     "enlace" => "./ra3/index.php"]
 ];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="David Pérez Ruiz">
    <title>David Pérez Ruiz</title>
</head>
<body>
<h1>David Pérez Ruiz</h1>
<p>Desarrollo Web en Entorno Servidor</p>
    <ul>
        <?php foreach ($ra as $values) { ?>
            <li><a href='<?= $values["enlace"] ?>' target='_blank'><?= $values["id"] ?></a></li>
        <?php } ?>
    </ul>
</body>
</html>