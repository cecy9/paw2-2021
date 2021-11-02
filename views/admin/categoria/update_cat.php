<?php

    include '../../../models/conexion.php';
    include '../../../controllers/procesos.php';
    include '../../../models/procesos.php';

    echo $id_categoria = $_POST['id_categoria'];
    echo $categoria = $_POST['categoria'];

?>
<?php if (CRUD(" UPDATE categorias SET categoria ='$categoria' WHERE id_categoria='$id_categoria'", "u")) : ?>
    <script>
        alertify.success("Categoria Actualizada...");
        $('#CateUpd').modal('hide');
        $("#contenido").load("categoria/principal.php");
    </script>
<?php else : ?>
    <script>
        alert("Error al actualizar usuarip...");
        $('#CateUpd').modal('hide');
        $("#contenido").load("categoria/principal.php");
    </script>
<?php endif ?>