<?php
    include '../../../models/conexion.php';
    include '../../../controllers/procesos.php';
    include '../../../models/procesos.php';

    //$objeto = new ConexBD();
    //$conexion = $objeto->get_conexion();

    $categoria = $_POST['categoria'];

    //obtener atributo de archivo

    $imgFile = $_FILES['imagen']['name'];
    $tmp_dir = $_FILES['imagen']['tmp_name'];
    $imgSize = $_FILES['imagen']['size'];

    $path = "../../../Public/img/categorias/";

    $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); //Obtenemos la extencion del archivo//
    $newName = $categoria.".".$imgExt; //Asignamos un nuevo nombre al archivo//

    $carga_img = CargaIMG($tmp_dir, $newName, $path);

    $tabla = "categorias";
    $campos = "categoria, imagen_cate";
    $valores = "'$categoria','$newName'";

    $query1 = "SELECT * FROM categorias WHERE categoria = '$categoria'";

    //$insertData = $conexion->query("INSERT INTO $tabla ($campos) VALUES ($valores)");
?>
<?php if (CountReg($query1) > 0) : ?>
    <script>
        alertify.error("Usuario ya registrado intente con uno nuevo ....");
        $("#contenido").load("categoria/principal.php");
    </script>
<?php else : ?>
    <?php
    switch ($carga_img) {                      
        case 0;
            echo
            '<script>
                    alertify.error("Error Datos e imagen no cargados...");
                    $("#contenido").load("categoria/principal.php");
            </script>';
            break;
        case 1:
            $query2 = "INSERT INTO $tabla($campos) VALUES($valores)";

            if (CRUD($query2, "i")){
                echo 
                '<script>
                    alertify.success("Datos registrados...");
                    $("#contenido").load("categoria/principal.php");
                </script>';
            }
            else{
                echo 
                '<script>
                    alert("Error datos no registrados...");
                    $("#contenido").load("categoria/principal.php");
                </script>';
            }
            break;
    }
    ?>
<?php endif ?>