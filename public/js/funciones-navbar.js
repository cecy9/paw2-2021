$(document).ready(function(){
    /*Cargar vista de usuario*/
    $(".user").click(function(event){
        $("#contenido").load("usuarios/principal.php");
        event.preventDefault();
    });

    /*Cargar vista de producto*/
    $(".product").click(function(event){
        $("#contenido").load("productos/principal.php");
        event.preventDefault();
    });
    
    /*Cargar vista de inventario*/
    $(".inv").click(function(event){
        $("#contenido").load("inventario/principal.php");
        event.preventDefault();
    });

    /*Cargar vista de categorias*/
    $(".catg").click(function(event){
        $("#contenido").load("categoria/principal.php");
        event.preventDefault();
    });

    /*Cargar vista de proveedores*/
    $(".prov").click(function(event){
        $("#contenido").load("proveedores/principal.php");
        event.preventDefault();
    });

    /*btn Saliria */
    $(".exit-sys").click(function() {
        if (confirm('Seguro/a en cerrar sesión'))
        {
            location.href = "../../index.php";
        } else {
            alert('Cierre de sesión cancelado ...');
        }
    });

    $(".exit-sys1").click(function () {
        if (confirm('Seguro/a que desea eliminar el usuario')) {
            $("#contenido").load("usuarios/principal.php"); 
        }
        else {
            alert('Eliminar usuario cancelado');
            $("#contenido").load("usuarios/principal.php");
        }
    });

    $(".eliminar-sys1").click(function () {
        if (confirm('Seguro/a que desea eliminar la categoria')) {
            $("#contenido").load("categoria/principal.php"); 
        }
        else {
            alert('Eliminar la categoria cancelada');
            $("#contenido").load("categoria/principal.php");
        }
    });
    
    $(".exit-provee").click(function () {
        if (confirm('Seguro/a que desea eliminar el proveedor')) {
            $("#contenido").load("proveedores/principal.php"); 
        }
        else {
            alert('Eliminar el proveedor cancelado');
            $("#contenido").load("proveedores/principal.php");
        }
    });
    
});