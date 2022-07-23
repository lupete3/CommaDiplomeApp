<?php 
	include('../access/security_agent.php');
	require_once ('include/connex.php'); 
	$id =$_POST['id'];


    $req1 = $bd->prepare('DELETE FROM commande WHERE id=?');
	$req1->execute(array($id));
	header('location:demandeEncoursAg.php');
	

		
 ?>
							  