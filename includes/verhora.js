function verhorafor12() 
{
    var fecha = new Date();
    var hora = fecha.getHours();
    var minutos = fecha.getMinutes();
    var segundos = fecha.getSeconds();
    var dianoche = "AM";
    if (hora >= 12) {
        dianoche = "PM";
        if (hora > 12) hora -= 12;
    }
    if (hora == 0) hora = 12;
    minutos = minutos < 10 ? "0" + minutos : minutos;
    segundos = segundos < 10 ? "0" + segundos : segundos;
    document.getElementById("hora").innerHTML = hora + ":" + minutos + ":" + segundos + " " + dianoche;
}