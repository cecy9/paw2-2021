
<?php
    session_start();
    include '../../controllers/redireccionar.php';
    include './modals/new_passw.php';
    include './modals/update_user.php';
    include './modals/update_cate.php';
    include './modals/update_provee.php';
    include './modals/update_prod.php';

    $user = $_SESSION["user"];

    $redic = new Rd();
    $redic->Admin();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <!--CSS -->
    <link rel="stylesheet" href="../../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/css/bootstrap-theme.css">
    <link rel="stylesheet" href="../../public/css/estilo.css">
    <link rel="stylesheet" href="../../public/css/alertify.min.css"/>
    <link rel="stylesheet" href="../../public/css/default.min.css"/>
    <!--JS -->
    <script src="../../public/js/jquery-3.5.1.slim.min.js"></script>
    <script src="../../public/js/alertify.min.js"></script>
    <script src="../../public/js/jquery-1.9.1.min.js"></script>
    <script src="../../public/js/bootstrap.min.js"></script>
    <script src="../../public/js/funciones-navbar.js"></script>
    <script src="https://kit.fontawesome.com/05f4903dc9.js" crossorigin="anonymous"></script>

</head>
<body>

    <?php include 'navbar/navbar.php';?>
    <div class="container-fluid" id="contenido">
        <div class="alert alert-success" style="width:400px;">
            <h6><b>Bienvenido/a: <?php echo $user; ?></b></h6>
        </div> <!--
            <div class="card">
                <div class="card-header bg-dark text-white">Panel principal</div>
                    <div class="card-body">
                        <div class="row">
                        <div class="col-md-3">
                            <a class="btn btn-info user" href="#">Usuarios</a> <br><br>
                            <a class="btn btn-info product" href="#">Productos</a>
                            <a class="btn btn-info prov" href="#">Proveedor</a>
                        </div>
                            <div class="col-md-8" id="contenido">
                            <div class="col-md-8" id="contenido">
                    </div>
                </div>
            </div> -->
        </div>
    </div>

</body>
</html>