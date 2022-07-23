<?php 
	include('../access/security_agent.php');
	require_once ('include/connex.php'); 
	$id= $_SESSION['profile']['agent']['id'];

	include("sendsmsFunction.php");
	 
	 if (isset($_GET['id'])) {
	 	$idCom = $_GET['id'];
	 	
	 	$req = $bd->query("SELECT a.id, date_format(a.dateCommande, '%d-%m-%Y') as dateCommande, a.typeDiplome, b.nom, b.postnom, b.tel FROM commande as a, etudiant as b where a.idEtud = b.id AND a.statut = 'valide' AND a.id = $idCom ");
	 	$don = $req->fetch(PDO::FETCH_ASSOC);

	 }

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
    .th{
    	color: white;
    }
</style>
<body>
	

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
					<a class="nav-link" href="espace_agent.php"><button type="button" class="btn btn-outline-light connexion"><h3>Retour</h3></button><span class="sr-only">(current)</span></a>
				</li>
			</ul>
			
		</div>
	</nav>

		<!--================================CONTENU ========================================== -->

	<div class="container-fluid spacer">
		
	<div class="row">
		<div class="col-md-12 spacer">
			<?php 

        		if (isset($_GET['msg']) AND $_GET['msg'] == 1) { ?>
        			<div class="alert alert-success alert-dismissible" id="msg" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4>Message envoyé</h4>
					</div>
        		<?php }elseif (isset($_GET['msg']) AND $_GET['msg'] == 2) { ?>
        			<div class="alert alert-danger alert-dismissible" id="msg" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4>Une erreur s'est produite; Veuillez réessayer</h4>
					</div>
        		
        		<?php }
        		?>
	          
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header bg-danger">
						<h4 class="modal-title text-white" id="exampleModalLabel">NOTIFIER L'ETUDIANT</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="close">
							<span aria-hidden="true">&times;</span>
						</button>
							
					</div>
					<form action="" method="POST" class="was-validated">
						<div class="modal-body">
							<div class="form-group text-primary">
								<input id="countryname" required type="hidden" value="<?php echo $idCom; ?>" class="form-control" name="id" >
								<input id="countryname" required type="text" value="<?php echo $don['tel']; ?>" class="form-control" name="tel" >
							</div>
							<div class="form-group text-primary">
							<textarea name="message" rows="5" class="form-control">
								Bonjour <?php echo $don['nom'].' '.$don['postnom']; ?> nous tenons à vous informer que  votre diplome de <?php echo $don['typeDiplome'];?> commandé le <?php echo $don['dateCommande']; ?> est disponible
							</textarea>
								
							</div>	           		
						</div>
						<div class="modal-footer">
							<a href="espace_agent.php"><button type="button" class="btn btn-outline-secondary btn-block" >Annuler</button></a>
							<button type="submit" name='send_submit' class="btn btn-danger btn-block">Envoyer</button>
						</div>
					</form>				
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
			$('.editBtn').on('click', function(){
		  		$('#editBtn').modal('show');

		  		$tr =$(this).closest('tr');
		  		var data = $tr.children('td').map(function(){
		  			return $(this).text();
		  		}).get();
		  		console.log(data);

		  		$('#id').val(data[0]);
		  		$('#idEtud').val(data[9]);
		  	});
		  	$('[data-toggle="tooltip"]').tooltip();
		});
	</script>
</body>
</html>