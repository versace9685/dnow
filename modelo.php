<?php
	/*function mHilosPortada() {
		$con=mysqli_connect("127.0.0.1","root","root","dnow",3306); //nos conectamos a la base de datos	
		$consulta="select * from Hilos";

		return mysqli_query($con,$consulta);//ejecutamos la consulta (devolvera un resultado true o false)
	}*/

	function mCabeceraHilo() {
		$con=mysqli_connect("sql205.eshost.es","eshos_14843838","holahola","eshos_14843838_dnow",3306);
		$consulta="select * from Hilos where keyword='".$_GET["hilo"]."'";

		return mysqli_query($con,$consulta);
	}

	function mTwitsHilo() {
		$con=mysqli_connect("sql205.eshost.es","eshos_14843838","holahola","eshos_14843838_dnow",3306);
		$consulta="select * from Twits where keyword='".$_GET["hilo"]."' ORDER BY `Twits`.`fecha` DESC";

		return mysqli_query($con,$consulta);
	}

	function mAlertas() {
		$con=mysqli_connect("sql205.eshost.es","eshos_14843838","holahola","eshos_14843838_dnow",3306);
		$consulta="select * from Hilos";

		return mysqli_query($con,$consulta);
	}

	function mSuscribeHilo() {
		$con=mysqli_connect("sql205.eshost.es","eshos_14843838","holahola","eshos_14843838_dnow",3306);
		$consulta="update Hilos set suscripcion=1 WHERE keyword='".$_GET["suscribe"]."'";

		mysqli_query($con,$consulta);
	}

	function mInsertarFeedback() {
		$fecha=date("d-m-Y");
		$con=mysqli_connect("sql205.eshost.es","eshos_14843838","holahola","eshos_14843838_dnow",3306);
		$consulta="insert into Feedback (feedback, fecha) values ('".$_POST["comentariofeedback"]."','".$fecha."')";
		
		mysqli_query($con,$consulta);

		header ("Location: http://gabilacosta.eshost.es/dnow/index.html");
	}
?>