<?php

    include '../../../models/conexion.php';
    include '../../../controllers/procesos.php';
    include '../../../models/procesos.php';

    $id_categoria = $_GET['id_categoria'];

    $updDrop = CRUD("DELETE FROM `categorias` WHERE `categorias`.`id_categoria` =$id_categoria ", "d");

?>