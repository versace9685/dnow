<?php
	include("vista.php");

	$con=mysqli_connect("sql205.eshost.es","eshos_14843838","holahola","eshos_14843838_dnow",3306); //nos conectamos a la base de datos
	$consultaprueba="select keyword from Hilos";
	$query=mysqli_query($con,$consultaprueba);
	while (($arrayconsulta=mysqli_fetch_row($query))!=null) {
		$keyword=$arrayconsulta[0];
		$consulta="update Hilos set suscripcion='".$_POST[$keyword]."' where keyword='".$keyword."'";
		mysqli_query($con,$consulta);
	}	
	
	vMostrarPaginaAlerts2(); 
?>