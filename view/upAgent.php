<?php 
	include('../access/security_adm.php');
	require_once ('include/connex.php'); 
	$id =$_POST['id'];
	$a=$_POST['nom'];
    $b=$_POST['postnom'];
    $c=$_POST['login'];
    $d=$_POST['password'];


    $req1 = $bd->prepare('UPDATE agent SET nom=?,postnom=?,login=?,password=?  WHERE id=?');
	$req1->execute(array($a,$b,$c,$d,$id));
	header('location:agents.php');
	

		
 ?>
							  