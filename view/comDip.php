<?php 
	include('../access/security_etud.php');
	require_once ('include/connex.php'); 
	$id= $_SESSION['profile']['etudiant']['id'];

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>ISTM Dip</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=devidev-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="bootstrap/font-awesome-4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-extension.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-extension.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/style.css">
</head>
<style type="text/css">
	.spacer{
		margin-top:30px;
	}
	.bad{
		font-size:1.5em;
	}
	img:hover{
		cursor:pointer;
	}
	.modal-body img{
		height:400px;
	}
	.mCard{
		width: 170px;
		height: 170px;
	}
	.pagin{
		float:center;
	}
	.ceni{
		color:silver;
	}
	.bbh{
		width:100%;
		height:100%;
	}
	#h1_bbh_title{
		font-family: Buxton Sketch;
		font-size:4em; 
		font-weight: bold; margin-top: 2px; 
		margin-left: 10px; color: white; 
		padding-top: 3px;
    }
</style>
<body>
	<!--================================MODAL DIPLOME GRADE ========================================== -->
	<div class="modal fade" id="gradeBtn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header bg-danger">
					<h4 class="modal-title text-white" id="exampleModalLabel">COMMANDE DIPLOME GRADE</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="close">
						<span aria-hidden="true">&times;</span>
					</button>
						
				</div>
				<form action="saveGrade.php" method="POST" enctype="multipart/form-data" class="was-validated">
					<div class="modal-body">
						<input type="hidden" name="grade" id="grade" required="" autocomplete="off"><br>
						<div class="input-group mb-4">	           			
							<div class="input-group-append">
		           			<span class="input-group-text" id="basic-addon2">Copie Reçu</span>
		           			</div>
		           			<input type="file" name="recu" class="form-control btn-lg" id="nom" required="" autocomplete="off"><br>
		           		</div><br>
		           		<div class="input-group mb-4">	           			
							<div class="input-group-append">
		           				<span class="input-group-text" id="basic-addon2">Relevé G1</span>
		           			</div>
		           			<input type="file" name="rG1" class="form-control btn-lg" id="tel" required="" autocomplete="off"><br>
		           		</div>
		           		<div class="input-group mb-4">	           			
							<div class="input-group-append">
		           				<span class="input-group-text" id="basic-addon2">Relevé G2</span>
		           			</div>
		           			<input type="file" name="rG2" class="form-control btn-lg" id="login" required=""  autocomplete="off"><br>
		           		</div>
		           		<div class="input-group mb-4">	           			
							<div class="input-group-append">
		           				<span class="input-group-text" id="basic-addon2">Relevé G3</span>
		           			</div>
		           			<input type="file" name="rG3" class="form-control btn-lg" id="password" required="" autocomplete="off"><br>
		           		</div>		           		
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-outline-secondary btn-block" data-dismiss="modal">Annuler</button>
						<button type="submit" class="btn btn-danger btn-block">Commander</button>
					</div>
				</form>				
			</div>
		</div>			
	</div>


	<!--================================MODAL DIPLOME LICENCE ========================================== -->
	<div class="modal fade" id="licenceBtn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header bg-danger">
					<h4 class="modal-title text-white" id="exampleModalLabel">COMMANDE DIPLOME LICENCE</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="close">
						<span aria-hidden="true">&times;</span>
					</button>
						
				</div>
				<form action="saveLicence.php" method="POST" enctype="multipart/form-data" class="was-validated">
					<div class="modal-body">
						<input type="hidden" name="licence" id="licence" required="" autocomplete="off"><br>
						<div class="input-group mb-4">	           			
							<div class="input-group-append">
		           			<span class="input-group-text" id="basic-addon2">Copie Reçu</span>
		           			</div>
		           			<input type="file" name="recu" class="form-control " id="nom" required="" autocomplete="off">
		           		</div>
		           		<div class="input-group mb-4">	           			
							<div class="input-group-append">
		           				<span class="input-group-text" id="basic-addon2">Relevé G1</span>
		           			</div>
		           			<input type="file" name="rG1" class="form-control " id="tel" required="" autocomplete="off"><br>
		           		</div>
		           		<div class="input-group mb-4">	           			
							<div class="input-group-append">
		           				<span class="input-group-text" id="basic-addon2">Relevé G2</span>
		           			</div>
		           			<input type="file" name="rG2" class="form-control " id="login" required=""  autocomplete="off"><br>
		           		</div>
		           		<div class="input-group mb-4">	           			
							<div class="input-group-append">
		           				<span class="input-group-text" id="basic-addon2">Relevé G3</span>
		           			</div>
		           			<input type="file" name="rG3" class="form-control " id="password" required="" autocomplete="off"><br>
		           		</div>	
		           		<div class="input-group mb-4">	           			
							<div class="input-group-append">
		           				<span class="input-group-text" id="basic-addon2">Relevé L1</span>
		           			</div>
		           			<input type="file" name="rL1" class="form-control " id="password" required="" autocomplete="off"><br>
		           		</div>	
		           		<div class="input-group mb-4">	           			
							<div class="input-group-append">
		           				<span class="input-group-text" id="basic-addon2">Relevé L2</span>
		           			</div>
		           			<input type="file" name="rL2" class="form-control " id="password" required="" autocomplete="off"><br>
		           		</div>		           		
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-outline-secondary btn-block" data-dismiss="modal">Annuler</button>
						<button type="submit" class="btn btn-danger btn-block">Commander</button>
					</div>
				</form>				
			</div>
		</div>			
	</div>
	

	<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
		<a class="navbar-brand" href="#"><h1><span class="text-info">ISTM</span>-<span class="text-warning">BUKAVU</span></h1>
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a class="nav-link" href="espace_etudiant.php"><button type="button" class="btn btn-outline-light connexion"><h3>Retour</h3></button><span class="sr-only">(current)</span></a>
				</li>
			</ul>
			
		</div>
	</nav>

		<!--================================CONTENU ========================================== -->

	<div class="container spacer">
        <div class="row">
        	<div class="col-md-3">
        		
        	</div>
        	<div class="col-md col-md-6">
        		<?php 

        		if (isset($_GET['sms']) AND $_GET['sms'] == 1) { ?>
        			<div class="alert alert-danger alert-dismissible" id="msg" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4>Vous avez déjà commander ce diplôme; Passer au service concerné pour plus d'informations</h4>
					</div>
        		<?php }elseif (isset($_GET['sms']) AND $_GET['sms'] == 2) { ?>
        			<div class="alert alert-success alert-dismissible" id="msg" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4>La demande de votre diplôme est bien envoyé. Vous allez recevoir un message pour vous assurer de sa disponibilité</h4>
					</div>
        		<?php }elseif (isset($_GET['sms']) AND $_GET['sms'] == 3) { ?>
        			<div class="alert alert-danger alert-dismissible" id="msg" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4>Une erreur s'est produite; Veuillez réessayer</h4>
					</div>
        		<?php }
        		?>
              <div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header bg-danger">
					<h4 class="modal-title text-center text-white" id="exampleModalLabel">COMMANDER UN DIPLOME</h4>
						
				</div>
					<div class="modal-body">
								           		
					</div>
					<div class="modal-footer">
						<button  class="btn btn-dark btn-lg btn-block btnG">GRADE</button>
						<button  class="btn btn-info btn-lg btn-block btnL">LICENCE</button>
					</div>
			</div>
		</div>
        	</div>
        </div>
    </div>
	
	

	<script src="bootstrap/js/popper.min.js"></script>
	<script src="bootstrap/js/jquery-3.4.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="bootstrap/js/bootstrap-extension.js"></script>
	<script src="bootstrap/js/bootstrap-extension.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.btnG').on('click', function(){
		  		$('#gradeBtn').modal('show');

		  		$tr =$(this).closest('tr');
		  		var data = $tr.children('td').map(function(){
		  			return $(this).text();
		  		}).get();
		  		console.log(data);

		  		$('#grade').val("grade");
		  		
		  	});
			$('.btnL').on('click', function(){
		  		$('#licenceBtn').modal('show');

		  		$tr =$(this).closest('tr');
		  		var data = $tr.children('td').map(function(){
		  			return $(this).text();
		  		}).get();
		  		console.log(data);

		  		$('#licence').val("licence");
		  		
		  	});
		});
	</script>
</body>
</html>