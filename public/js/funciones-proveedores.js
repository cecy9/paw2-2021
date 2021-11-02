$(document).ready(function () {
    $("#data-prove").on("submit", function (event) {
            var formData = new FormData(document.getElementById("data-prove"));
            formData.append("dato", "valor");
            

            $.ajax({
                url: "proveedores/save_proveedor.php",
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

    /*Cargar Modal para Eliminar proveedor..*/
    $(".btnDrop-Proveedor").click(function (event) {
        var id;
        id = $(this).attr("id_proveedor");
        $("#result-form").load("proveedores/drop_proveedor.php?id_proveedor=" + id);
        event.preventDefault();
    });

    /*Cambiar Modal para actualizar proveedor*/
    $(".upd-provee").click(function (event) {
        var id_proveedor = $(this).attr("id_proveedor");
        $('#UpdProv').modal('show');
        $("#dataProve").load("proveedores/UpdateDataProvee.php?id_proveedor=" + id_proveedor);
        event.preventDefault();
    });
    
    /*Actualizar informacion del proveedor */
    $("#Upd-Provee").on("submit", function (event) {
        //var tipo = document.getElementById("tipo-user").value;
        var formData = new FormData(document.getElementById("Upd-Provee"));
        formData.append("dato", "valor");

        $.ajax({
            url: "proveedores/update_provee.php",
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

    /*Paginado*/
    $("a.pagina").click(function (event) {
        var num, reg;
        num = $(this).attr("v-num");
        reg = $(this).attr("num-reg");
        $("#contenido").load("proveedores/principal.php?num=" + num + "&num_reg=" + reg);
        event.preventDefault();
    });

    /*Aumenta N° regsitros para el paginado*/
    $("#select-reg").on('change', function (event) {
        var valor;
        valor = $("#select-reg option:selected").val();
        $("#contenido").load("proveedores/principal.php?num_reg=" + valor);
        event.preventDefault();
    });


    //Busca usuario.
    $("#like-prov").on('change', function(event){
        var valor;
        valor = $('#like-prov').val();
        if(valor.trim()=="")
        {
            alertify.alert("Busca usuario","No ingreso el nombre ó código de usuario a buscar ...");
            event.preventDefault();
        }
        else
        {
            //alert(valor);
            $("#contenido").load("proveedores/principal.php?like=1&valor=" + valor);
            //event.preventDefault();
        }
    });
    
});