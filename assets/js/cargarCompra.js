function CargarPresentacion(valor){
    var xmlhttp;
    document.getElementById("PP").innerHTML="";
    document.getElementById("PROD").innerHTML="";
    if (valor>0) {
        document.getElementById("btnSubDC").disabled=false;
        if (window.XMLHttpRequest){
            xmlhttp=new XMLHttpRequest();
        }else{
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function(){
            if (xmlhttp.readyState==4 && xmlhttp.status==200){
                document.getElementById("PP").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","control/getripprod.php?id="+valor,true);
        xmlhttp.send();
    }


}
function CargarProducto(valor){
    document.getElementById("PROD").innerHTML="";
    var TP=document.getElementById("slcTPDC").value;
    var xmlhttp;
    if (valor>0) {
        document.getElementById("btnSubDC").disabled=false;
        if (window.XMLHttpRequest){
            xmlhttp=new XMLHttpRequest();
        }else{
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function(){
            if (xmlhttp.readyState==4 && xmlhttp.status==200){
                document.getElementById("PROD").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","control/getprod.php?idTP="+TP+"&idPP="+valor,true);
        xmlhttp.send();
    }
}
