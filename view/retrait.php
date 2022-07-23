<?php 
	include('../access/security_agent.php');
	require_once ('include/connex.php'); 
	$id= $_SESSION['profile']['agent']['id'];

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
	
	<div class="modal fade" id="editBtn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header bg-danger">
					<h4 class="modal-title text-white" id="exampleModalLabel">RETRAIT DIPLOME</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="close">
						<span aria-hidden="true">&times;</span>
					</button>
						
				</div>
				<form action="saveRetrait.php" method="POST" class="was-validated">
					<div class="modal-body">
						<input type="hidden" name="id" id="id" required="" autocomplete="off">
						<input type="hidden" name="idEtud" id="idEtud" required="" autocomplete="off">
						<div class="input-group mb-4">	           			
							<div class="input-group-append">
		           			<span class="input-group-text" id="basic-addon2">N° D'ordre </span>
		           			</div>
		           			<input type="text" name="nOrdre" class="form-control " id="nom" required="" autocomplete="off">
		           		</div>
						<div class="input-group mb-4">	           			
							<div class="input-group-append">
		           			<span class="input-group-text" id="basic-addon2">N° Enregistrement </span>
		           			</div>
		           			<input type="text" name="nEnreg" class="form-control " id="nom" required="" autocomplete="off">
		           		</div>
						<div class="input-group mb-4">	           			
							<div class="input-group-append">
		           			<span class="input-group-text" id="basic-addon2">Option </span>
		           			</div>
		           			<input type="text" name="option" class="form-control " id="nom" required="" autocomplete="off">
		           		</div>
						<div class="input-group mb-4">	           			
							<div class="input-group-append">
		           			<span class="input-group-text" id="basic-addon2">Orientation </span>
		           			</div>
		           			<input type="text" name="orientation" class="form-control " id="nom" required="" autocomplete="off">
		           		</div>
						<div class="input-group mb-4">	           			
							<div class="input-group-append">
		           			<span class="input-group-text" id="basic-addon2">Mention </span>
		           			</div>
		           			<select name="mention" id="" required="" class="form-control">
		           				<option value="Satisfaction">Satisfaction</option>
		           				<option value="Distinction">Distinction</option>
		           				<option value="Grande Distinction">Grande Distinction</option>
		           			</select>
		           		</div>
						<div class="input-group mb-4">	           			
							<div class="input-group-append">
		           			<span class="input-group-text" id="basic-addon2">Date Délibération </span>
		           			</div>
		           			<input type="date" name="dtDelib" class="form-control " id="nom" required="" autocomplete="off">
		           		</div>
						<div class="input-group mb-4">	           			
							<div class="input-group-append">
		           			<span class="input-group-text" id="basic-addon2">Date Etablissement </span>
		           			</div>
		           			<input type="date" name="dtEtab" class="form-control " id="nom" required="" autocomplete="off">
		           		</div>	
						<div class="input-group mb-4">	           			
							<div class="input-group-append">
		           			<span class="input-group-text" id="basic-addon2">Date Enterine </span>
		           			</div>
		           			<input type="date" name="dtEnt" class="form-control " id="nom" required="" autocomplete="off">
		           		</div>	           		
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-outline-secondary btn-block" data-dismiss="modal">Annuler</button>
						<button type="submit" class="btn btn-danger btn-block">Valider</button>
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

        		if (isset($_GET['sms']) AND $_GET['sms'] == 1) { ?>
        			<div class="alert alert-danger alert-dismissible" id="msg" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4>Ce diplôme a déjà été retiré</h4>
					</div>
        		<?php }elseif (isset($_GET['sms']) AND $_GET['sms'] == 2) { ?>
        			<div class="alert alert-success alert-dismissible" id="msg" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4>Opération est bien effectuée</h4>
					</div>
        		<?php }elseif (isset($_GET['sms']) AND $_GET['sms'] == 3) { ?>
        			<div class="alert alert-danger alert-dismissible" id="msg" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4>Une erreur s'est produite; Veuillez réessayer</h4>
					</div>
        		<?php }
        		?>
	          <h3 class="title">LISTE DES DIPLOMES DISPONIBLES</span></h3>
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
                            <th class="th">Id Etudiant</th> 
                            <th class="th">Action</th> 
                                                        
		          		</tr>
		          	</thead>
		          	<tbody>
		          		<?php
		          			$limit=10;
							$page = isset($_GET['page'])?$_GET['page']:1;
							$start = ($page-1)*$limit;

							$req = $bd->query("SELECT a.id, date_format(a.dateCommande, '%d-%m-%Y') as dateCommande, a.typeDiplome, a.borderau, a.rG1, a.rG2,a.rG3,a.rL1,a.rL2,a.statut,b.id AS idEtud FROM commande as a, etudiant as b where a.idEtud = b.id AND a.statut = 'valide' ORDER BY a.dateCommande LIMIT $start,$limit");
							
							$res = $bd->query("SELECT COUNT(*) as total FROM commande as a, etudiant as b where a.idEtud = b.id AND a.statut = 'valide' ");

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
                                <td><?php echo $don['idEtud']; ?></td>
                                <td>
                                	<button type="button" data-toggle="tooltip" title="Livrer le diplôme" class="btn btn-danger editBtn"><span class="fa fa-check"> </span></button>
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
			    			<a  class="page-link" aria-label="Previous" href="retrait.php?page=<?php echo $prec;?>">
			    				<span aria-hidden="true">&laquo;</span>
			    				<span class="sr-only" ="true">Previous</span>
			    			</a>
			    		</li>
			    		<?php 
			    			for($i=1;$i<=$nbrePage;$i++) {
			    		?> 
			    		<li class="page-item <?php echo(($page==$i)?'active':'')?>"><a  class="page-link" href="retrait.php?page=<?php echo $i;?>"><?php echo $i;?></a></li>
			    		<?php
			    		}?>
			    		<li class="page-item">
			    			<a  class="page-link" aria-label="Next" href="retrait.php?page=<?php echo $suiv;?>">
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
		  		$('#idEtud').val(data[9]);
		  	});
		  	$('[data-toggle="tooltip"]').tooltip();
		});
	</script>
</body>
</html>