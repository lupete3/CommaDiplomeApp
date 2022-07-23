<?php 
	include('../access/security_adm.php');
	require_once ('include/connex.php'); 
	$id =$_POST['id'];
	$statut = 'valide';


    $req1 = $bd->prepare('UPDATE commande SET statut=? WHERE id=?');
	$req1->execute(array($statut,$id));
	header('location:demandeEncoursAdm.php');
	

		
 ?>
							  