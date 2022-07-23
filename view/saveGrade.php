<?php 
	include('../access/security_etud.php');
	require_once ('include/connex.php'); 
	$idEtudiant= $_SESSION['profile']['etudiant']['id'];

	$grade =$_POST['grade'];
	
	$dateCom = date('Y-m-d');
	$statut = 'invalide';

	$a=$_FILES['recu']['name'];
	$b=$_FILES['rG1']['name'];
	$c=$_FILES['rG2']['name'];
	$d=$_FILES['rG3']['name'];
	$a_tmp=$_FILES['recu']['tmp_name'];
	$b_tmp=$_FILES['rG1']['tmp_name'];
	$c_tmp=$_FILES['rG2']['tmp_name'];
	$d_tmp=$_FILES['rG3']['tmp_name'];

	$req = $bd->prepare('SELECT COUNT(*) AS totalN FROM commande');
	$req->execute();
	$don = $req->fetch();
	$numMax = $don['totalN'];

    $numAdd = $numMax + 1;
	$extValide = array('pdf','png','jpeg','gif' );
	$extentionUpload = strtolower(substr(strrchr($a, '.'), 1));
	in_array($extentionUpload, $extValide);
	$chemin = "../public/bootstrap4/docs/recu/".$numAdd.".".$extentionUpload;
	$resultat = move_uploaded_file($a_tmp, $chemin);
	$recu = $numAdd.".".$extentionUpload;

    $numAdd1 = $numMax + 1;
	$extValide1 = array('pdf','png','jpeg','gif' );
	$extentionUpload1 = strtolower(substr(strrchr($b, '.'), 1));
	in_array($extentionUpload1, $extValide1);
	$chemin = "../public/bootstrap4/docs/releve/g1/".$numAdd1.".".$extentionUpload1;
	$resultat = move_uploaded_file($b_tmp, $chemin);
	$rG1 = $numAdd1.".".$extentionUpload1;

    $numAdd2 = $numMax + 1;
	$extValide2 = array('pdf','png','jpeg','gif' );
	$extentionUpload2 = strtolower(substr(strrchr($c, '.'), 1));
	in_array($extentionUpload2, $extValide2);
	$chemin = "../public/bootstrap4/docs/releve/g2/".$numAdd2.".".$extentionUpload2;
	$resultat = move_uploaded_file($c_tmp, $chemin);
	$rG2 = $numAdd2.".".$extentionUpload2;

    $numAdd3 = $numMax + 1;
	$extValide3 = array('pdf','png','jpeg','gif' );
	$extentionUpload3 = strtolower(substr(strrchr($d, '.'), 1));
	in_array($extentionUpload3, $extValide3);
	$chemin = "../public/bootstrap4/docs/releve/g3/".$numAdd3.".".$extentionUpload3;
	$resultat = move_uploaded_file($d_tmp, $chemin);
	$rG3 = $numAdd3.".".$extentionUpload3;

	$query2 = $bd->prepare("SELECT * FROM commande  WHERE typeDiplome = ? AND idEtud = ?");
	$query2->execute(array($grade,$idEtudiant));
	$don = $query2->fetch(PDO::FETCH_ASSOC);

	if ($don) {
		header("location:comDip.php?sms=1");
	}else{
		$req1 = $bd->prepare('INSERT INTO commande (dateCommande,typediplome,borderau,rG1,rG2,rG3,statut,idEtud) VALUES (?,?,?,?,?,?,?,?)');
		$req1->execute(array($dateCom,$grade,$recu,$rG1,$rG2,$rG3,$statut,$idEtudiant));

		if ($req1) {

			header("location:comDip.php?sms=2");
		}else{

			header("location:comDip.php?sms=3");
		}

	}

	
		
 ?>
							  