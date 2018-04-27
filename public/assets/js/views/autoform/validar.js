var validar_tipo_enlace = function () {

    var iden = document.getElementById("tipo_enlace").value;

    if(iden == '1') {
        console.log(iden);
        document.getElementById('enlace_contenido').disabled = false;
        document.getElementById('documento').disabled = true;
        document.getElementById('enlace_link').disabled = true;
    }
    if(iden == '2') {
        console.log(iden);
        document.getElementById('enlace_contenido').disabled = true;
        document.getElementById('documento').disabled = false;
       document.getElementById('enlace_link').disabled = true;
    }
    if(iden == '3') {
        document.getElementById('enlace_contenido').disabled = true;
        document.getElementById('documento').disabled = true;
        document.getElementById('enlace_link').disabled = false;
    }
};