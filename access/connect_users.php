<?php 

include ('../view/include/connex.php');
session_start();

if(isset($_POST['log_in'])){
	$user = htmlentities(trim(strtolower($_POST['username'])));
	$pwd = htmlentities(trim($_POST['pass']));
	$funct = htmlentities(trim($_POST['funct']));

	//		/*

		if(isset($_POST['funct']) AND $_POST['funct'] == 'admin'){

			$query1 = $bd->prepare("SELECT * FROM admin WHERE login=? AND password=? ");
			$query1->execute(array($user, $pwd ));

				if ($done=$query1->fetch(PDO::FETCH_ASSOC)) {

					$_SESSION['profile']['admin']=$done;
								
					header('location:../view/admin.php');
				} else {
				  	header('location:../view/login.php?sms=1');
				  	
				}
		} 
		elseif(isset($_POST['funct']) AND $_POST['funct'] == 'etudiant') {

				$query2 = $bd->prepare("SELECT * FROM etudiant WHERE login = ? AND password = ? ");
				$query2->execute(array($user,$pwd ));

					if ($done2=$query2->fetch(PDO::FETCH_ASSOC)){

						$_SESSION['profile']['etudiant']=$done2;
						header('location:../view/espace_etudiant.php');
					}
					else 
					{ 
						header('location:../view/login.php?sms=1'); 
					}
        } 
		elseif(isset($_POST['funct']) AND $_POST['funct'] == 'agent') {

				$query2 = $bd->prepare("SELECT * FROM agent WHERE login = ? AND password = ? ");
				$query2->execute(array($user,$pwd ));

					if ($done2=$query2->fetch(PDO::FETCH_ASSOC)){

						$_SESSION['profile']['agent']=$done2;
						header('location:../view/espace_agent.php');
						
					}
					else 
					{ 
						header('location:../view/login.php?sms=1'); 
					}
        }

        else {
            header('location:../view/login.php');
		}
	}

 ?>