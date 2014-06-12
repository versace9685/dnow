<?php

	include('modelo.php');

	function vMostrarPaginaHilo() {
		$contenido=file_get_contents("dnow/menu.html");
		$cabecera=vMostrarCabeceraHilo(mCabeceraHilo());
		$contenido=str_replace("##cabecera##", $cabecera, $contenido);
		$twits=vMostrarTwitsHilo(mTwitsHilo());						
		$contenido=str_replace("##content##", $twits, $contenido);

		echo $contenido;
	}

	function vMostrarPaginaAlerts() {
		$contenido=file_get_contents("dnow/alerts.html");
		$contenido=str_replace("##titulo##", "Alertas seleccionadas",$contenido);
		$alertas=vMostrarAlertas(mAlertas());
		$contenido=str_replace("##content##", $alertas, $contenido);

		echo $contenido;
	}

	function vMostrarPaginaAlerts2() {
		$contenido=file_get_contents("dnow/alerts2.html");
		$contenido=str_replace("##titulo##", "Alertas seleccionadas",$contenido);
		$alertas=vMostrarAlertas(mAlertas());
		$contenido=str_replace("##content##", $alertas, $contenido);

		echo $contenido;
	}

	/*function vMostrarPortada() {
		$contenido=file_get_contents("index.html");
		$hilos=vMostrarHilosPortada(mHilosPortada());
		$contenido=str_replace("##content##", $hilos, $contenido);

		echo $contenido;
	}*/

	/*function vMostrarHilosPortada($listado) {
		$contenido=file_get_contents("listadohilosportada.html");
		$trozos=explode("##fila##",$contenido);
		$cuerpo="";
		$aux="";
		$i=0;
		while ($datos=mysqli_fetch_array($listado)){
			$aux=$trozos[1];
			if ($i%2==0) {
				$aux=str_replace("##tema##","b",$aux);
			}
			else {
				$aux=str_replace("##tema##","a",$aux);
			}
			$aux=str_replace("##titulo##",$datos["titulo"],$aux);
			$aux=str_replace("##subtitulo##",$datos["subtitulo"],$aux);
			$aux=str_replace("##descripcion##",$datos["descripcion"],$aux);
			$aux=str_replace("##keyword##",$datos["keyword"],$aux);

			$cuerpo.=$aux;
			$i++;
		}
		return $trozos[0].$cuerpo.$trozos[2];
	}*/

	function vMostrarCabeceraHilo($listado) {
		$contenido=file_get_contents("dnow/cabecerahilo.html");
		$trozos=explode("##fila##",$contenido);
		$cuerpo="";
		$aux="";
		while ($datos=mysqli_fetch_array($listado)){
			$aux=$trozos[1];
			$aux=str_replace("##titulo##",$datos["titulo"],$aux);
			$aux=str_replace("##subtitulo##",$datos["subtitulo"],$aux);

			$cuerpo.=$aux;
		}
		return $trozos[0].$cuerpo.$trozos[2];
	}

	function vMostrarTwitsHilo($listado) {
		$contenido=file_get_contents("dnow/listadotwits.html");
		$trozos=explode("##fila##",$contenido);
		$cuerpo="";
		$aux="";
		while ($datos=mysqli_fetch_array($listado)){
			$aux=$trozos[1];
			$aux=str_replace("##twit##",$datos["twit"],$aux);

			$cuerpo.=$aux;
		}
		return $trozos[0].$cuerpo.$trozos[2];
	}

	function vMostrarAlertas($listado) {
		$contenido=file_get_contents("dnow/listadoalertas.html");
		$trozos=explode("##fila##",$contenido);
		$cuerpo="";
		$aux="";
		while ($datos=mysqli_fetch_array($listado)){
			$aux=$trozos[1];
			$aux=str_replace("##subtitulo##",$datos["subtitulo"],$aux);
			$aux=str_replace("##keyword##", $datos["keyword"], $aux);
			if ($datos["suscripcion"]=="0") {
				$aux=str_replace("##seleccionadoOFF##","selected",$aux);
				$aux=str_replace("##seleccionadoON##","",$aux);
			}
			else {
				$aux=str_replace("##seleccionadoOFF##","",$aux);
				$aux=str_replace("##seleccionadoON##","selected",$aux);
			}

			$cuerpo.=$aux;
		}
		return $trozos[0].$cuerpo.$trozos[2];		
	}
?>