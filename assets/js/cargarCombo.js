function CargarPresentacion(valor, idinterno){
    var xmlhttp;
    document.getElementById("PP").innerHTML="";
    document.getElementById("PROD").innerHTML="";
	document.getElementById("btnSubDC").disabled=true;
    if (valor>0) {
        if (window.XMLHttpRequest){
            xmlhttp=new XMLHttpRequest();
        }else{
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function(){
            if (xmlhttp.readyState==4 && xmlhttp.status==200){
                document.getElementById("PP").innerHTML=xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","control/getripprod.php?id="+valor,true);
        xmlhttp.send();
    }


}
function CargarProducto(valor, idinterno){
    document.getElementById("PROD").innerHTML="";
    var TP=document.getElementById("slcTPDC").value;
    var xmlhttp;
    if (valor>0) {
        if (window.XMLHttpRequest){
            xmlhttp=new XMLHttpRequest();
        }else{
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function(){
            if (xmlhttp.readyState==4 && xmlhttp.status==200){
                document.getElementById("PROD").innerHTML=xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","control/getprodC.php?idTP="+TP+"&idPP="+valor,true);
        xmlhttp.send();
    }
}
function Habilitar(valor){
    document.getElementById("btnSubDC").disabled=true;
    if (valor>0) {
        document.getElementById("btnSubDC").disabled=false;
    }
}

function validarInt(numero){
	var m = numero.value.match(/^((\d+))$/);
	if(m===null){
		numero.value="";
		alert("Número Invalido\ndebe usar el formato ###");
	}
}
function validarDouble(numero){
	var m = numero.value.match(/^(((\d+)\.(\d+))|(\d+))$/);
	if(m===null){
		numero.value="";
		alert("Número Invalido\ndebe usar el formato ####.## ó ###");
	}
}
