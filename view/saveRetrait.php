<?php 
	include('../access/security_agent.php');
	require_once ('include/connex.php'); 
	$id= $_SESSION['profile']['agent']['id'];

	$a =$_POST['nOrdre'];
	$b =$_POST['nEnreg'];
	$c =$_POST['option'];
	$d =$_POST['orientation'];
	$e =$_POST['mention'];
	$f =$_POST['dtDelib'];
	$g =$_POST['dtEtab'];
	$h =$_POST['dtEnt'];
	$i =$_POST['idEtud'];
	$j =$_POST['id'];

	$dateRetrait = date('Y-m-d');
	$statut = 'invalide';

	$query2 = $bd->prepare("SELECT * FROM retrait  WHERE idEtud = ? AND idCommande = ?");
	$query2->execute(array($i,$j));
	$don = $query2->fetch(PDO::FETCH_ASSOC);

	if ($don) {
		header("location:retrait.php?sms=1");
	}else{
		$req1 = $bd->prepare('INSERT INTO retrait (numOrdre,numEnreg,optionChoix,orientation,mention,dateDelib,dateEtabliss,dateEnterine,dateRetrait,idEtud,idAgent,idCommande) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)');
		$req1->execute(array($a,$b,$c,$d,$e,$f,$g,$h,$dateRetrait,$i,$id,$j));

		if ($req1) {

			header("location:retrait.php?sms=2");
		}else{

			header("location:retrait.php?sms=3");
		}

	}

	
		
 ?>
							  