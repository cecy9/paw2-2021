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

    //Paginado
    $("a.pagina").click(function(event){
        var num, reg;
        num = $(this).attr("v-num");
        reg = $(this).attr("num-reg");
        $("#contenido").load("inventario/principal.php?num=" + num + "&num_reg=" + reg);
        event.preventDefault();
    });

    //Aumenta el Nº de registro para el paginado.
    $("#select-reg").on('change', function(event){
        var valor;
        valor = $("#select-reg option:selected").val();
        $("#contenido").load("inventario/principal.php?num_reg=" + valor);
        event.preventDefault();
    });

    //Busca usuario.
    $("#like-prod").on('change', function(event){
        var valor;
        valor = $('#like-prod').val();
        if(valor.trim()=="")
        {
            alertify.alert("Busca usuario","No ingreso el nombre ó código de usuario a buscar ...");
            event.preventDefault();
        }
        else
        {
            //alert(valor);
            $("#contenido").load("inventario/principal.php?like=1&valor=" + valor);
            //event.preventDefault();
        }
    });

});