<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Plugin para Menéame</title>
		<link rel="stylesheet" href="estil.css" media="screen">
		
		<link rel="stylesheet" href="highlight/styles/ir_black.css" media="screen">		
		<script src="highlight/highlight.js"></script>		
		<script src="highlight/languages/php.js"></script>
		<script src="highlight/languages/html-xml.js"></script>
		
<!-- Este bloque es el que tendríamos que añadir en la página que se quiera mostrar el botón  -->		
		<script type="text/javascript" src="botonMeneame/apiMeneame.js"></script>
		<link rel=StyleSheet type="text/css" href="botonMeneame/botonNaranjaCaja.css" media="screen" />
<!-- Este bloque es el que tendríamos que añadir en la página que se quiera mostrar el botón  -->

		<!--	Estas son las diferentes opciones de configurar visualmente el botón
		
		<link rel=StyleSheet type="text/css" href="botonMeneame/botonNaranjaCaja.css" media="screen" />
		<link rel=StyleSheet type="text/css" href="botonMeneame/botonNaranjaSem.css" media="screen" />
		<link rel=StyleSheet type="text/css" href="botonMeneame/botonNegroCaja.css" media="screen" />
		<link rel=StyleSheet type="text/css" href="botonMeneame/botonNegroSem.css" media="screen" />
		
		-->
		
		<script>
				hljs.tabReplace = '    ';
				hljs.initHighlightingOnLoad();
		</script>

</head>

<!-- Este bloque es el que tendríamos que añadir en la página que se quiera mostrar el botón  -->

<?php
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
				
				/*	ELIMINAR LOS PARÁMETROS ENVIADOS POR LA URL CON GET,
				se mantiene sólamente el primero ya que normalmente puede ser el identificador del artículo	*/
				$tallar = explode('&',$URL);
				$URL = $tallar[0];
				
				return $URL;
		}
		$url = URL();
?>

<!-- Este bloque es el que tendríamos que añadir en la página que se quiera mostrar el botón  -->
				
<body>

		<h1>Botón - plugin para Menéame</h1>

		<h2>Ejemplo</h2>
		
		<p>Este es el botón en funcionamiento....</p>
		
		<!-- Este bloque es el que tendríamos que añadir en la página que se quiera mostrar el botón  -->
		
				<div id="botonMeneame" class="meneame"></div><div class="clear"></div>
		
				<script type="text/javascript">
							var dirCarpeta = "http://localhost/x/direccion";
							carregarLinkMeneame(dirCarpeta, <?php echo '"'.$url.'"'?>);
				</script>

		<!-- Este bloque es el que tendríamos que añadir en la página que se quiera mostrar el botón  -->
		<p>(tienes que tener un servidor en localhost y modificar la dirección dentro del script)</p>
		
		<h2>¿Cómo funciona?</h2>
		
		<p>El botón tiene diferentes aspectos según la información recibida. Si la noticia de la página no ha sido enviada a Menéame, el botón sirve para enviar la notícia, en caso contrario, muestra el número de "meneos" recibidos y otro elemento que muestra el estado del artículo en Menéame (pendiente, publicado o descartado). A continuación se muestran todos los estados posibles:</p>
		
		
		<div class="demo">
				<br/><br/>
				<div class="meneame">
					<a title="Enviar Artículo"><div class="boton"></div></a>
				</div>
				
				<br/>
				
				<br/>
				
						
				<div class="meneame">
					<a title="Votar">
						<div class="botonCont"></div>
						<div class="inicio"></div>
						<div class="num" title="Votos"><div>17</div></div>
						<div class="fin"></div>
					</a>
					<a>
					<div class="pendiente" title="Pendiente de publicación"> </div>
					</a>
				</div>
				
				<br/><br/>
				<div class="meneame">
					<a title="Votar"> 
						<div class="botonCont"></div>
						<div class="inicio"></div>
						<div class="num" title="Votos"><div>9999</div></div>
						<div class="fin"></div>
					</a>
					<a>
					<div class="publicado" title="Publicado"> </div>
					</a>
				</div>
				
				<br/><br/>
				<div class="meneame">
					<a title="Votar">
						<div class="botonCont"></div>
						<div class="inicio"></div>
						<div class="num" title="Votos"><div>9</div></div>
						<div class="fin"></div>
					</a>
					<a>
					<div class="descartado" title="Artículo descartado"> </div>
					</a>
				</div>
		</div>
		<br/>

		<p>El botón recibe la url de la página actual y envía una petición mediante AJAX a la API de Menéame para que ésta le responda si ha sido enviado el artículo. De ser así recibe también un id como ha sido registrado, el estado y el número de votos recibidos.</p>
		
		<h2></h2>
		<center>
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

</body>
</html>
