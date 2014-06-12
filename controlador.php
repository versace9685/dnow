<?php

	include("vista.php");

	/*if ((!isset ($_GET["hilo"])) && (!isset ($_GET["alerts"]))) {
        vMostrarPortada();
	}*/

	if (isset ($_GET["hilo"])) {
        $id=$_GET["hilo"];
        vMostrarPaginaHilo();
    }

    if (isset ($_GET["alerts"])) {
    	vMostrarPaginaAlerts();
    }

    if (isset ($_GET["suscribe"])) {
        mSuscribeHilo();
        header ("Location: http://gabilacosta.eshost.es/dnow/index.html");
    }

    if (isset ($_POST["keyword"])) {
        if ($_POST["comentario"]!="") {
            $timestamp=time();
            $con=mysqli_connect("sql205.eshost.es","eshos_14843838","holahola","eshos_14843838_dnow",3306);
            $consulta="insert into Twits (fecha, twit, keyword) values ('".$timestamp."','".$_POST["comentario"]."','".$_POST["keyword"]."')";

            mysqli_query($con,$consulta);

            header ("Location: http://gabilacosta.eshost.es/dnow/index.html");
        }
        else {
            header ("Location: http://gabilacosta.eshost.es/dnow/index.html");
        }
    }

    if (isset ($_GET["feedback"])) {
        if ($_POST["comentariofeedback"]!="") {
            mInsertarFeedback();
        }
        else {
            header ("Location: http://gabilacosta.eshost.es/index.html");
        }
    }
?>