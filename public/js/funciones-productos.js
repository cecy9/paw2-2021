$(document).ready(function() {
    $("#data-product").on('submit',function(event)
    {
        var tipo = document.getElementById("tipo-estado").value;

        if(tipo == 0)
        {
            alert("No selecciono el tipo del producto ...");
        }
        else
        {
            var formData = new FormData(document.getElementById("data-product"));
            formData.append("dato","valor");

            $.ajax({
                url: "productos/save_prod.php",
                type: "POST",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
                processData: false
            }).done(function(res){
                $("#result-form").html(res);
            });
        }

        event.preventDefault();
    });

    /* Cambiar estado */
    $(".btnHDProd").click(function(event){
        var id, estado;
        id = $(this).attr("id-prod");
        estado = $(this).attr("estado");
        $("#result-form").load("productos/cambiar_estado.php?id_producto="+id+"&estado="+estado);
        event.preventDefault();
    });
 
    /*Cargar modal Actualizar Usuario */
    $(".updateProd").click(function(event){
        var id = $(this).attr("id-prod");
        $('#ProdUpd').modal('show');
        $("#dataProd").load("productos/updateDataUser.php?id_producto="+id);
        event.preventDefault();
    });

    /* Actualizar nombre usuario y tipo */
    $("#UpdProd").on("submit",function(event)
    {
        var formData =  new FormData (document.getElementById("UpdProd"));
        formData.append("dato","valor");

         $.ajax({
            url:"productos/update_prod.php",
            type: "POST",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false

        })
        .done(function(res){
            $("#result-form").html(res);
         });
        event.preventDefault();
    });

    //Modal para eliminar usuarios.
    $(".BtnDrop-prod").click(function(event) {
        var id;
        id = $(this).attr("id-prod");
        $("#result-form").load("productos/delete_prod.php?id_producto="+id);
        event.preventDefault();
    });

    $(".txt-sys").click(function() {
        if (confirm('Estas seguro que deseas eliminar el Usuario'))
        {
            location.href = "../../index.php";
        } else {
            alert('Cancelado ...');
        }
    });

    //Paginado
    $("a.pagina").click(function(event){
        var num, reg;
        num = $(this).attr("v-num");
        reg = $(this).attr("num-reg");
        $("#contenido").load("productos/principal.php?num=" + num + "&num_reg=" + reg);
        event.preventDefault();
    });

    //Aumenta el Nº de registro para el paginado.
    $("#select-reg").on('change', function(event){
        var valor;
        valor = $("#select-reg option:selected").val();
        $("#contenido").load("productos/principal.php?num_reg=" + valor);
        event.preventDefault();
    });

    //Busca usuario.
    $("#like-pro").on('change', function(event){
        var valor;
        valor = $('#like-pro').val();
        if(valor.trim()=="")
        {
            alertify.alert("Busca usuario","No ingreso el nombre ó código de usuario a buscar ...");
            event.preventDefault();
        }
        else
        {
            //alert(valor);
            $("#contenido").load("productos/principal.php?like=1&valor=" + valor);
            //event.preventDefault();
        }
    });

});