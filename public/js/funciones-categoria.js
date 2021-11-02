$(document).ready(function () {
    $("#data-cate").on("submit", function (event) {
        var tipo = document.getElementById("data-cate").value;

        if (tipo == 0) {
            alertify.error("No selecciono el tipo de usuario...");
        }
        else{
            var formData = new FormData(document.getElementById("data-cate"));
            formData.append("dato", "valor");

            $.ajax({
                url: "categoria/save_categoria.php",
                type: "POST",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
                processData: false
            })
                .done(function (res) {
                    $("#result-form").html(res);
                });
        }
        event.preventDefault();
})
/*Cargar Modal para actualizar categoria..*/
$(".upd-categoria").click(function () {
    var id = $(this).attr("id_categoria");
    $('#CateUpd').modal('show');
    $("#dataCate").load("categoria/updateDataCat.php?id_categoria=" + id);
});
/*Actualizar Nombre  */
$("#UPDCat").on("submit", function (event) {
    var formData = new FormData(document.getElementById("UPDCat"));
    formData.append("dato", "valor");

    $.ajax({
        url: "categoria/update_cat.php",
        type: "POST",
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false
    })
        .done(function (res) {
            $("#result-form").html(res);
        });
    event.preventDefault();
});
/*Cargar Modal para Eliminar usuario..*/
$(".btnDrop-Cate").click(function (event) {
    var id;
    id = $(this).attr("id_categoria");
    $("#result-form").load("categoria/drop_cate.php?id_categoria=" + id);
    event.preventDefault();
});

/*Paginado*/
$("a.pagina").click(function (event) {
    var num, reg;
    num = $(this).attr("v-num");
    reg = $(this).attr("num-reg");
    $("#contenido").load("categoria/principal.php?num=" + num + "&num_reg=" + reg);
    event.preventDefault();
});
/*Aumenta N° regsitros para el paginado*/
$("#select-reg").on('change', function (event) {
    var valor;
    valor = $("#select-reg option:selected").val();
    $("#contenido").load("categoria/principal.php?num_reg=" + valor);
    event.preventDefault();
});
/* Busca Categoria*/
$("#like-user").on('change', function (event) {
    var valor;
    valor = $("#like-user").val();
    if (valor.trim() == "") {
        alertify.alert("Busca Categoria", "No ingreso la categoria o codigo  a buscar...")
        event.preventDefault();
    }
    else {
        $("#contenido").load("categoria/principal.php?like=1&valor=" + valor);
    event.preventDefault();
        

    }

});
    });