<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Plugin Menéame PHP</title>
		<link rel="stylesheet" href="estil.css" media="screen">

</head>
				
<body>

		<h1>Botón - Plugin para Menéame</h1>
		
		<center>
				<img src="botonNaranjaCaja.png" alt="Botón meneame naranja caja" ></img>
		</center>
		
		<p>El botón tiene diferentes aspectos según la información recibida. Si la noticia de la página no ha sido enviada a Menéame, el botón sirve para enviar la notícia, en caso contrario, muestra el número de "meneos" recibidos y otro elemento que muestra el estado del artículo en Menéame (pendiente, publicado o descartado). A continuación se muestran todos los estados posibles:</p>
		
		<p>Esta aplicación esta registrada bajo la licencia Creative Commons con las siguientes restricciones: reconocimiento, no comercial y obra derivada igual</p>
		
		<h2>Instalación para páginas PHP</h2>
		
		<p>Para insertar el botón en tus páginas tienes que enlazar los archivos de estilo .css y los scripts de javascript .js dentro de las etiquetas &lt;head&gt; y &lt;/head&gt; como se muestra a continuación.</p>
		
		<div class="code">
		<pre><code>
&lt;head&gt;	
		&lt;script type="text/javascript" src="botonMeneame/apiMeneame.js"&gt;&lt;/script&gt;
		&lt;link rel=StyleSheet type="text/css" href="botonMeneame/botonNaranjaCaja.css" media="screen" /&gt;
		....
&lt;/head&gt;
		</pre></code>
		</div>
		
		<p>Podemos elegir entre distintos diseños, para ello sólo tenemos que modificar en el enlace al fichero CSS entre los cuatro distintos disños: botonNaranjaCaja.css, botonNaranjaSem.css, botonNegroCaja.css y botonNegroSem.css.</p>
		

		
		<p>Luego introducimos esta función PHP dentro del cuerpo y antes del script que se mostrará a continuación.</p>
		
		<div class="code">
		<pre><code>
&lt;?php
# Función obtenida de:
# http://www.webcheatsheet.com/PHP/get_current_page_url.php
		
function URL() {
		$URL = 'http';
		$URL .= "://";
		if ($_SERVER["SERVER_PORT"] != "80") {
		 $URL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		} else {
				$URL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		}
		
		/*	ELIMINAR LOS PARÁMETROS GET ENVIADOS POR LA URL
		se mantiene sólamente el primero ya que normalmente se usa como identificador de la página
		*/
		
		$tallar = explode('&',$URL);
		$URL = $tallar[0];
		
		return $URL;
}
$url = URL();
?&gt;
		</pre></code>
		</div>

		
		<p>Por último insertamos la siguiente etiqueta div con id="botonMeneame" en la parte de nuestro código donde queramos mostrar el botón y a continuación el código de javascript que inicializará las llamadas a Menéame. Hay que tener cuidado al introducir la dirección donde hemos guardado la carpeta "botonMeneame" (ruta hasta la carpeta sin incluir su nombre y sin la / final).</p>
		
		<div class="code">		
				<pre><code>

&lt;div id="botonMeneame" class="meneame"&gt;&lt;/div&gt;&lt;div class="clear"&gt;&lt;/div&gt;

&lt;script type="text/javascript"&gt;
			var dirCarpeta = "http://www.pagina.com/direccion/donde/esta/la/carpeta";
			carregarLinkMeneame(dirCarpeta, &lt;?php echo '"'.$url.'"'?&gt;);
&lt;/script&gt;
				
				</pre></code>
		</div>
		
		</pre></code>
		</div>
		
		<center>
				
		<div class="llicencia">
				<br />
				<a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/" target="_blank">
						<img alt="Licencia de Creative Commons" style="border-width:0" src="http://i.creativecommons.org/l/by-nc-sa/3.0/88x31.png" />
				</a>
						
		</div>
		
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
				<span>Colabora con una donación</span>
				<br /><br />
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
				">
				<input type="image" src="https://www.paypalobjects.com/WEBSCR-640-20110306-1/es_ES/ES/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal. La forma rápida y segura de pagar en Internet.">
				<img alt="" border="0" src="https://www.paypalobjects.com/WEBSCR-640-20110306-1/es_ES/i/scr/pixel.gif" width="1" height="1">
		</form>
				
		</center>
				
		<h2>Posibles problemas</h2>
		
		<p>La configuración del servidor debe tener la libreria CURL para PHP que es la que se encarga de realizar la petición a menéame o tener activado la función fopen para URL externas en el php.ini ('allow_fopen_url' normalmente desactivada por seguridad). Ponte en contacto con tu servidor de hosting para averiguarlo.</p>
		
		<h2>Próximamente</h2>
		
		<ul>
				<li> Plugin para WordPress</li>
				<li> Posibilidad de insertar varios botones en una misma página para cada distinto post.</li>
		</ul>
</body>
</html>
