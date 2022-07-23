<?php 
	include ('../view/include/connex.php');

	if(isset($_POST['register'])){

	$a = $_POST['nom'];
	$b = $_POST['postnom'];
	$c = $_POST['prenom'];
	$d = $_POST['sexe'];
	$e = $_POST['matricule'];
	$f = $_POST['tel'];
	$g = $_POST['login'];
	$h = $_POST['password'];

	if(!empty($a) AND !empty($b) AND !empty($c) AND !empty($d) AND !empty($e) AND !empty($f)){

		$query1 = $bd->prepare("SELECT * FROM etudiant  WHERE  nom=? AND postnom=? AND prenom = ? AND sexe = ? AND matricule = ? AND tel = ?");
		$query1->execute(array($a, $b, $c, $d, $e, $f ));

		if ($done=$query1->fetch(PDO::FETCH_ASSOC)) {

			header('location:../view/register.php?sms=1');

		} else {

			$req=$bd->prepare('INSERT INTO etudiant(nom,postnom,prenom,sexe,matricule,tel,login,password) VALUES (?,?,?,?,?,?,?,?)');

			if ($req->execute(array($a,$b,$c,$d,$e,$f,$g,$h))){

				header('location:../view/register.php?sms=2');
			}else{

				header('location:../view/register.php?sms=3');
			}
        }
	}

	}else{
		header('location:../view/register.php?sms=4');
	}

?>