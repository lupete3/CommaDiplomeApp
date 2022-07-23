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
	<!--================================MODAL DE CONNEXION ========================================== -->
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
					<a class="nav-link" href="include/logout.php"><button type="button" class="btn btn-outline-light connexion"><h3>Deconnexion</h3></button><span class="sr-only">(current)</span></a>
				</li>
			</ul>
			
		</div>
	</nav>

		<!--================================CONTENU ========================================== -->

	<div class="container-fluid spacer">
		<div class="col-lg-12 text-uppercase">
                <center>  
                    <h3 class="border-danger" style="text-align:center; font-family:century gothic; border:2px solid ; width:40%;box-shadow: 0px 10px 20px; border-radius: 30px;">Espace Etudiant</h3>
                    </center> 
                </div>
        </div>
				
		<div class="row">
				
				<div class="col-md-6">
					<div class="border-strong-bottom border-primary p-3 m-3 bg-cream">
						<center>
                                 <a href="comDip.php"><img src="../public/bootstrap4/docs/emoticones/new/client.png" width="20%" alt="Front Office" > </a>
                            </center>
                            <legend style="color:black; text-align:center;">Commander un Diplôme</legend>
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="border-strong-bottom border-primary p-3 m-3 bg-cream">
						<center>
                                 <a href="demandeEncoursEtud.php"><img src="../public/bootstrap4/docs/emoticones/new/checkin1.png" width="20%" alt="Front Office" > </a>
                            </center>
                            <legend style="color:black; text-align:center;">Visualiser les demandes encours</legend>
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="border-strong-bottom border-primary p-3 m-3 bg-cream">
						<center>
                                 <a href="demandeValideEtud.php"><img src="../public/bootstrap4/docs/emoticones/new/autre service.png" width="20%" alt="Front Office" > </a>
                            </center>
                            <legend style="color:black; text-align:center;">Visualiser les demandes validées</legend>
					</div>
				</div>
				
				
				<div class="col-md-6">
					<div class="border-strong-bottom border-primary p-3 m-3 bg-cream">
						<center>
                                 <a target="_blank" href="ficheRetraitEtud.php"><img src="../public/bootstrap4/docs/emoticones/icon controleur1.png" width="20%" alt="Front Office" > </a>
                            </center>
                            <legend style="color:black; text-align:center;">Historique Retrait Diplôme</legend>
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
		  		$('#lib').val(data[1]);
		  		$('#pu').val(data[2]);
		  		$('#pu1').val(data[5]);
		  		$('#pu2').val(data[3]);
		  	});
		});
	</script>
</body>
</html>