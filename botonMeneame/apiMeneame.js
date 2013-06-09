/*
Botón API meneame 1.0

Script realizado por JosepSJ
http://josepsj.eshost.es/

Registrado bajo Licencia Creative Commons

Esta aplicación se puede modificar y difundir siempre y cuando
se reconozca la autoría del script base y no sea para uso comercial.

Reconocimiento
No Comercial

*/

/*PETICION AL SERVIDOR*/

var READY_STATE_COMPLETE=4;
var peticion_http = null;
 
function inicializa_xhr() {
  if(window.XMLHttpRequest) {
    return new XMLHttpRequest(); 
  }
  else if(window.ActiveXObject) {
    return new ActiveXObject("Microsoft.XMLHTTP");
  } 
}
 
function crea_query_string() {
 
  return "url=" + url +
         "&nocache=" + Math.random();
}
 
function hacerPeticion() {
  peticion_http = inicializa_xhr();
  
  if(peticion_http) {
    peticion_http.onreadystatechange = procesaRespuesta;
    peticion_http.open("POST", dirProxy, true);
    
	peticion_http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    var query_string = crea_query_string();
	
    peticion_http.send(query_string);
  }
}

function rtrim(s) {
	return s.replace(/\s+$/, "");
}

function mostrarBotoMeneame()
{
	var resp = meneameResp.split(" ");
	var link;
	api = resp[1];
	
	if(resp[0] == 'OK') 		/*		CREAR EL BOTON CON CONTADOR Y ESTADO		*/
	{
		vots = resp[2];
		estat = resp[3];
		estat = rtrim(estat);
		
		var publicat;
		var titol;
		
		if(estat == "published")
		{
				publicat = 'publicado';
				titol = 'Artículo Publicado + INFO';
		}
		else
		{
			
			if(estat == "queued")
			{
				publicat = 'pendiente';
				titol = 'Pendiente de publicación + INFO';
			}
			else
			{
				publicat = 'descartado';
				titol = 'Artículo Descartado + INFO';
			}
		}
		
		var div1 = '<a href="'+ api +'" target="blank" title="Votar">';
		var div2 = '<div class="botonCont"></div>';
		var div3 = '<div class="inicio"></div>';
		var div4 = '<div class="num" title="Votos"><div>'+ vots +'</div></div>';
		var div5 = '<div class="fin"></div>';
		var divEstado = '</a><a href="http://josepsj.eshost.es/2011/03/boton-plugin-para-meneame/" target="blank"><div class="'+ publicat +'" title="'+ titol +'"></div></a>';
		
		publicat = '<span class="text">' + publicat + '</span>';
		
		link = div1 + div2 + div3 + div4 + div5 + divEstado;
	}
	else	/* CREAR UN ENLACE PARA ENVIAR EL ARTICULO A MENEAME*/
	{
		var URLenviar = "http://www.meneame.net/submit.php?url=";
		var x = URLenviar + url;
		link = '<a href="'+ api + '" title="Enviar Artículo" target="blank"><div class="boton"></div></a>';
	}
	
	var caixa = document.getElementById("botonMeneame");
	
	caixa.innerHTML = link;
}

function procesaRespuesta() {
  if(peticion_http.readyState == READY_STATE_COMPLETE) {
  
	if(peticion_http.status == 200) {	  	  
	  meneameResp = peticion_http.responseText;
	  mostrarBotoMeneame();
    }
  }
}
/*PETICION AL SERVIDOR*/

/*VARIABLES GLOBALS */

	var url;
	var api;
	var vots;
	var estat;
	var meneameResp;
	var dirProxy;

/*VARIABLES GLOBALS */

function carregarLinkMeneame(direccion, urlPaginaActual)
{
	dirProxy = direccion + "/botonMeneame/peticionMeneame.php";
	url = urlPaginaActual;

	hacerPeticion();
	procesaRespuesta();

}