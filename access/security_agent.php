<?php

	session_start();

	if(!isset($_SESSION['profile']['agent'])){
		header('location:../view/login.php');
     }
 ?>