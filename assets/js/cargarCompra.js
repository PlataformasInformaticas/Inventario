function CargarPresentacion(valor, idinterno){
    var xmlhttp;
    document.getElementById("PP").innerHTML="";
    document.getElementById("PROD").innerHTML="";
	document.getElementById("Precios").innerHTML="";
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
	document.getElementById("Precios").innerHTML="";
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
        xmlhttp.open("GET","control/getprod.php?idTP="+TP+"&idPP="+valor,true);
        xmlhttp.send();
    }
}
function CargarPrecioProducto(valor, idinterno){
    document.getElementById("Precios").innerHTML="";
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
                document.getElementById("Precios").innerHTML=xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","control/getprecprod.php?idP="+valor,true);
        xmlhttp.send();
    }
}
function validarFecha(fecha){
	var m = fecha.match(/^(\d{4})\-(\d{1,2})\-(\d{1,2})$/);
	fechaCampo =document.getElementById("fecha");
	if(m===null){
		fechaCampo.value="";
		alert("Fecha Invalida\ndebe usar el formato aaaa-mm-dd");
	}else{
		var fechaArr = fecha.split('-');
		var aho = fechaArr[0];
		var mes = fechaArr[1];
		var dia = fechaArr[2];
		var plantilla = new Date(aho, mes - 1, dia);//mes empieza de cero Enero = 0
		if(!(!plantilla || plantilla.getFullYear() == aho && plantilla.getMonth() == mes -1 && plantilla.getDate() == dia)){
			alert("Fecha Invalida\ndebe usar el formato aaaa-mm-dd");
		}
	}
}
function validarDouble(numero){
	var m = numero.value.match(/^(((\d+)\.(\d+))|(\d+))$/);
	if(m===null){
		numero.value="";
		alert("Número Invalido\ndebe usar el formato ####.## ó ###");
	}
}
