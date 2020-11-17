<?php
    require 'config.php';

    $codigo = $_GET['codigo'];
    $sql = "DELETE FROM pelicula WHERE codigo=:codigo";
    $query = $pdo->prepare($sql);
    $query->execute([
        'codigo'=>$codigo
    ]);
    header("Location:list.php");
?>
