function deleteSocio(socio, source)
{
    var answer = confirm("Seguro que queres borrar este socio?")
    if (answer){
        window.location = "delete.php?socio=" + socio + "&source=" + source;
    }
}