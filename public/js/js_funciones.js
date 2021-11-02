//funcion para pre-visualizar imagem
function redURL(input){
    if (input.files && input.files[0]){
    var reader = new FileReader();

    reader.onload=function(e){
        //asignamos el atributo src a la tag de imagen
        $('#muestraimagen').attr('src',e.target.result);

    }
    reader.readAsDataURL(input.files[0]);
    }
}

//El listener va aqui asignado al imput
$("#imagen").change(function(){
    redURL(this);
});