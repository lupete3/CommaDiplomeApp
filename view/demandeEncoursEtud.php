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
					<a class="nav-link" href="espace_etudiant.php"><button type="button" class="btn btn-outline-light connexion"><h3>Retour</h3></button><span class="sr-only">(current)</span></a>
				</li>
			</ul>
			
		</div>
	</nav>

		<!--================================CONTENU ========================================== -->

	<div class="container spacer">
		
		<div class="row">
		<div class="col-md-12 spacer">
	          <h3 class="title">LES DEMANDES ENCOURS</span></h3>
	          <div class="row spacer">
	          	 <div class="col-12">
	 				<table id="tab" class="display table table-bordered table-striped table">
		          	<thead>
		          		<tr style="font-weight:bold; color: white" class="btn-danger ">
		          			<th class="th">N°</th>  
                            <th class="th">Date Commande</th> 
                            <th class="th">Diplôme</th> 
                            <th class="th">Borderau</th> 
                            <th class="th">Relevé G1</th> 
                            <th class="th">Relevé G2</th> 
                            <th class="th">Relevé G3</th> 
                            <th class="th">Relevé L1</th> 
                            <th class="th">Relevé L2</th> 
                                                        
		          		</tr>
		          	</thead>
		          	<tbody>
		          		<?php
		          			$limit=10;
							$page = isset($_GET['page'])?$_GET['page']:1;
							$start = ($page-1)*$limit;

							$req = $bd->query("SELECT a.id, date_format(a.dateCommande, '%d-%m-%Y') as dateCommande, a.typeDiplome, a.borderau, a.rG1, a.rG2,a.rG3,a.rL1,a.rL2,a.statut FROM commande as a, etudiant as b where a.idEtud = b.id AND a.statut = 'invalide' AND a.idEtud = $id ORDER BY a.dateCommande LIMIT $start,$limit");
							
							$res = $bd->query("SELECT COUNT(*) as total FROM commande as a, etudiant as b where a.idEtud = b.id AND a.statut = 'invalide' AND a.idEtud = $id");

							$don1 = $res->fetch();
							$total = $don1['total'];
							$nbrePage=ceil($total/$limit);
							if ($page==1) {
								$prec = $page;
							}else {
								$prec = $page-1;
							}
							if ($page==$nbrePage) {
								$suiv =$nbrePage;	
							}
							else{
								$suiv = $page+1;
							}
		          			while($don=$req->fetch()):
		          				?>
		          		<tr>
                                <td><?php echo $don['id'] ?></td>
                                <td><?php echo $don['dateCommande'] ?></td>
                                <td><?php echo $don['typeDiplome']?></td>
                                <td><a target="_blank" class="text-white" href="../public/bootstrap4/docs/recu/<?php echo $don['borderau'] ?>"><span class="btn btn-info ">Prévisualiser le Borderau</span></a></td>
                                <td><a target="_blank" class="text-white" href="../public/bootstrap4/docs/releve/g1/<?php echo $don['rG1'] ?>"><span class="btn btn-info ">Prévisualiser le relevé G1</span></a></td>
                                <td><a target="_blank" class="text-white" href="../public/bootstrap4/docs/releve/g2/<?php echo $don['rG2'] ?>"><span class="btn btn-info ">Prévisualiser le relevé G2</span></a></td>
                                <td><a target="_blank" class="text-white" href="../public/bootstrap4/docs/releve/g3/<?php echo $don['rG3'] ?>"><span class="btn btn-info ">Prévisualiser le relevé G3</span></a></td>
                                <td>
                                	<?php 
                                		if ($don['rL1'] == '') { ?>
                                			<span class="text-danger">Pas Disponible </span>
                                		<?php }else{ ?>
											<a target="_blank" class="text-white" href="../public/bootstrap4/docs/releve/l1/<?php echo $don['rL1'] ?>"><span class="btn btn-primary ">Prévisualiser le relevé L2</span></a>
                                		<?php }
                                	?>
                                </td>
                                <td>
                                	<?php 
                                		if ($don['rL2'] == '') { ?>
                                			<span class="text-danger">Pas Disponible </span>
                                		<?php }else{ ?>
											<a target="_blank" class="text-white" href="../public/bootstrap4/docs/releve/l2/<?php echo $don['rL2'] ?>"><span class="btn btn-primary ">Prévisualiser le relevé L2</span></a>
                                		<?php }
                                	?>
                                </td>

						</tr>
		          		<?php endwhile;?>
		          	</tbody>
		          </table>
	          	 </div>
	          </div>
	          <div class="row">
	          	 <div class="col-3 offset-9">
	          	 	<nav aria-label="Page navigation example">
	          			<ul class="pagination pg-blue">
			    		<li class="page-item">
			    			<a  class="page-link" aria-label="Previous" href="demandeEncoursEtud.php?page=<?php echo $prec;?>">
			    				<span aria-hidden="true">&laquo;</span>
			    				<span class="sr-only" ="true">Previous</span>
			    			</a>
			    		</li>
			    		<?php 
			    			for($i=1;$i<=$nbrePage;$i++) {
			    		?> 
			    		<li class="page-item <?php echo(($page==$i)?'active':'')?>"><a  class="page-link" href="demandeEncoursEtud.php?page=<?php echo $i;?>"><?php echo $i;?></a></li>
			    		<?php
			    		}?>
			    		<li class="page-item">
			    			<a  class="page-link" aria-label="Next" href="demandeEncoursEtud.php?page=<?php echo $suiv;?>">
			    				<span aria-hidden="true">&raquo;</span>
			    				<span class="sr-only" ="true">Previous</span>
			    			</a>
			    		</li>
			    	</ul>
	          		</nav>
	          	 </div>
	          </div>
	    </div>		</div>
		<div class="row">
			
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
		  	});
		  	$('[data-toggle="tooltip"]').tooltip();
		});
	</script>
</body>
</html>