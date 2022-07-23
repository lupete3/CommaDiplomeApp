
<!DOCTYPE html>
<html>
    <head>
        <title>ISTM Dip</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=devidev-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" type="text/css" href="bootstrap/font-awesome-4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/print.css" media="print">
    </head>
    
    <body id="">
        
        <div class="container spacer" style="border-bottom:3px solid black;">
            <div class="row" style="border-bottom:1px solid black;margin-bottom:2px">
                
                
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 offset-2" >
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-top:70px;">
                        <h1 class="text-center text-uppercase" style="text-align:center; border:1px solid black">Fiche Retrait 
                        
                        </h1>
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
                                <tr>
                                        <td> echo $num; </td>
                                        <td> echo $don['numOrdre'] ?></td>
                                        <td> echo $don['numEnreg'] ?></td>
                                        <td> echo $don['nom']</td>
                                        <td> echo $don['sexe'] </td>
                                        <td> echo $don['optionChoix'] </td>
                                        <td> echo $don['orientation']</td>
                                        <td> echo $don['mention'] </td>
                                        <td> echo $don['dateDelib'] </td>
                                        <td> echo $don['dateEtabliss'] </td>
                                        <td> echo $don['dateEnterine'] </td>
                                        <td></td>
                                        
                                </tr>
                               
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
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 offset-9    cacher">
                    <button type="button" class="btn btn-primary    print    pull-right"><span class="fa fa-print"></span> Imprimer</button>
                </div>
            </div>
        </div>

	<script src="jquery-3.4.1.min.js"></script>
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


