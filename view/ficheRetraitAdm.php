<?php 
	include('../access/security_adm.php');
	require_once ('include/connex.php'); 
    
    $dateJ=date('Y-m-d');


    $req = $bd->prepare("SELECT a.numOrdre,a.numEnreg,a.optionChoix,a.orientation,a.mention, date_format(a.dateDelib,'%d-%m-%Y ') as dateDelib,date_format(a.dateEtabliss,'%d-%m-%Y ') as dateEtabliss, date_format(a.dateEnterine,'%d-%m-%Y ') as dateEnterine,date_format(a.dateRetrait,'%d-%m-%Y ') as dateRetrait,a.idEtud,a.idAgent,a.idCommande, b.nom, b.postnom,b.prenom,b.sexe FROM retrait as a, etudiant as b, commande as c, agent as d WHERE a.idEtud = b.id AND a.idAgent = d.id AND a.idCommande = c.id AND a.dateRetrait = ?");
    $req->execute(array($dateJ));
        
    if (isset($_GET['save'])) {
        $in=$_GET['dateIn'];
        $out=$_GET['dateOut'];

        $req = $bd->prepare("SELECT a.numOrdre,a.numEnreg,a.optionChoix,a.orientation,a.mention, date_format(a.dateDelib,'%d-%m-%Y ') as dateDelib,date_format(a.dateEtabliss,'%d-%m-%Y ') as dateEtabliss, date_format(a.dateEnterine,'%d-%m-%Y ') as dateEnterine,date_format(a.dateRetrait,'%d-%m-%Y ') as dateRetrait,a.idEtud,a.idAgent,a.idCommande, b.nom, b.postnom,b.prenom,b.sexe FROM retrait as a, etudiant as b, commande as c, agent as d WHERE a.idEtud = b.id AND a.idAgent = d.id AND a.idCommande = c.id AND a.dateRetrait BETWEEN ? AND ?");
        $req->execute(array($in,$out));
        
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
        <link rel="stylesheet" type="text/css" href="bootstrap/css/print.css" media="print">
    </head>
    
    <body id="">
        
        <div class="container spacer" style="border-bottom:3px solid black;">
            <div class="row" style="border-bottom:1px solid black;margin-bottom:2px">
                
                
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 offset-2" >
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-top:70px;">
                        <h1 class="text-center text-uppercase" style="text-align:center; border:1px solid black">Fiche Retrait diplôme
                        
                        </h1>
                        
                        <div class="cacher">
                            <form action="" method="GET">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Date début</span>
                                    </div>
                                    <input type="date" name="dateIn" value="<?php echo(isset($_GET['dateIn'])?$_GET['dateIn']:'') ?>" class="form-control">
                                    
                                </div><br>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Date de fin</span>
                                    </div>
                                        <input type="date" name="dateOut"value="<?php echo(isset($_GET['dateOut'])?$_GET['dateOut']:'') ?>" class="form-control">
                                </div>
                                <div class="row">
                                    <div class="col-md-6 text-center">
                                        <button type="submit" class="btn btn-danger" name="save">Visualiser</button><br>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                
                </div>
                
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                    
                    
            </div>
        </div>
        <div class="container-fluid spacer">
            <div class="row spacer">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <table class="table table-bordered table-striped spacer">
                        <thead>
                            <tr>
                                <th>N°</th>   
                                <th>N° ordre</th>
                                <th>N° enreg</th>
                                <th>Nom et Postnom</th>
                                <th>Sexe</th>
                                <th>Option</th>
                                <th>Orientation</th>
                                <th>Mention</th>
                                <th>Date Délibération</th>
                                <th>Date Etablissement</th>
                                <th>Date Enterine</th>
                                <th>Signature</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                
                                    $num=1;
                                    
                                    while($don=$req->fetch()):
                                        ?>
                                <tr>
                                        <td><?php echo $num; ?></td>
                                        <td><?php echo $don['numOrdre'] ?></td>
                                        <td><?php echo $don['numEnreg'] ?></td>
                                        <td><?php echo $don['nom'].' '.$don['postnom'] ?></td>
                                        <td><?php echo $don['sexe'] ?></td>
                                        <td><?php echo $don['optionChoix'] ?></td>
                                        <td><?php echo $don['orientation'] ?></td>
                                        <td><?php echo $don['mention'] ?></td>
                                        <td><?php echo $don['dateDelib'] ?></td>
                                        <td><?php echo $don['dateEtabliss'] ?></td>
                                        <td><?php echo $don['dateEnterine'] ?></td>
                                        <td></td>
                                        
                                </tr>
                                <?php
                                $num++;
                                 endwhile;
                                 ?>
                                 
                             
                        </tbody>
                    </table>
                </div>
                
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 offset-8 spacer">
                    <h class="text-center"><em>Fait à Bukavu, le <?php $madate= date('d-m-Y H:i:s'); 
                            list($annee,$mois,$jour,$h,$m,$s)=sscanf($madate,"%d-%d-%d %d:%d:%d"); 
                            $h+=2; 
                            $timestamp=mktime($h,$m,$s,$mois,$annee,$jour); 
                            $new_date=date('d-m-Y à H:i:s',$timestamp); 
                            echo $new_date; 
                        ?></em> </h>
                </div>
                
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 offset-9">
                    <button type="button" class="btn btn-primary print pull-right"><span class="fa fa-print"></span> Imprimer</button>
                </div>
            </div>
        </div>

	<script src="bootstrap/js/jquery-3.4.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.print').on('click',function(){
                $('.cacher').hide();
                if (!window.print()) {
                    $('.cacher').show();
                }
            });
        });
    </script>
            

    </body>
</html>


