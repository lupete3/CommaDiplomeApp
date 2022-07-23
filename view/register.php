<?php 
  include ('include/connex.php');
?>

<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=devidev-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ISTM Diplome</title>
  
  <!-- [ FONT-AWESOME ICON ] 
        =========================================================================================================================-->
  <link rel="stylesheet" type="text/css" href="../public/bootstrap3/library/font-awesome-4.3.0/css/font-awesome.min.css">

  <!-- [ PLUGIN STYLESHEET ]
        =========================================================================================================================-->
  <link rel="shortcut icon" type="image/x-icon" href="../public/bootstrap3/images/icon.png">
  <link rel="stylesheet" type="text/css" href="../public/bootstrap3/css/animate.css">
  <link rel="stylesheet" type="text/css" href="../public/css/magnific-popup.css">
        <link rel ="stylesheet" type="text/css" href="../public/library/vegas/vegas.min.css">
  <!-- [ Boot STYLESHEET ]
        =========================================================================================================================-->
  <link rel="stylesheet" type="text/css" href="../public/bootstrap3/library/bootstrap/css/bootstrap-theme.min.css">
  <link rel="stylesheet" type="text/css" href="../public/bootstrap3/library/bootstrap/css/bootstrap.css">
        
        <!-- [ DEFAULT STYLESHEET ] 
        =========================================================================================================================-->
  <link rel="stylesheet" type="text/css" href="../public/bootstrap3/css/style.css">
        <link rel="stylesheet" type="text/css" href="../public/bootstrap3/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="../public/bootstrap3/css/color/green.css">
    <link rel="stylesheet" type="text/css" href="../public/bootstrap3/css/color/blue.css">
</head>
<style type="text/css">
    body{
        background-color:#ffffff;
    }
    .bg-whit{
        background-color: #fffdf8;
    }
</style>
</style>
<body >
<!-- [ LOADERs ]
================================================================================================================================--> 

<!-- [ /PRELOADER ]
=============================================================================================================================-->
<!-- [WRAPPER ]
=============================================================================================================================-->
<div class="wrapper">
    
 <!-- [NAV]
 ============================================================================================================================-->    
   <!-- Navigation
    ==========================================-->
    <nav  class="amd-menu navbar navbar-default navbar-fixed-top bg-danger  fadeInDown" >
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">ISTM BUKAVU</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="index.php"><span class="red">ISTM</span>-<span class="warning">BUKAVU</span></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li ><a href="../index.php" class="page-scroll"><i class="fa fa-home"></i> Accueil</a></li>
            
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
       
  <!-- [MAIN GALLERY ]
=============================================================================================================================-->

  <section   id="home" class="main-gall">
    <div class="overl">
      <div class="container">
          <div class="row">
  		<div class="col-md-offset-3 col-md-6">
        <?php 
          if (isset($_GET['sms']) AND $_GET['sms'] == 1) { ?>
            <div class="alert alert-danger alert-dismissible" id="msg" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4>Cet étudiant existe déjà</h4>
                  </div>
          <?php }else if (isset($_GET['sms']) AND $_GET['sms'] == 2){ ?>
            <div class="alert alert-success alert-dismissible" id="msg" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4>Votre enregistrement a reussi</h4>
                  </div>
          <?php }else if (isset($_GET['sms']) AND $_GET['sms'] == 3){ ?>
            <div class="alert alert-danger alert-dismissible" id="msg" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4>Erreur d'enregistrement</h4>
                  </div>
          <?php }else if (isset($_GET['sms']) AND $_GET['sms'] == 4){ ?>
            <div class="alert alert-danger alert-dismissible" id="msg" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4>Certans champs sont vides</h4>
                  </div>
           <?php }
        ?>
              <div class="panel panel-danger">
  				<div class="panel-heading">
  					<center><h4>ENREGISTREMENT<span class="text-capitalize"></span></h4></center>
  				</div>
                  <div class="panel-body text-center">
  				
  					<form role="form" method="post" action="../access/register_student.php" class="was-validated">
                          
  						<input name="nom" class="form-control" type="text" placeholder="Nom Etudiant" required /><br>		
              <input name="postnom" class="form-control" type="text" placeholder="Postnom Etudiant" required /><br /> 
              <input name="prenom" class="form-control" type="text" placeholder="Prenom Etudiant" required /><br /> 
  						<select class="form-control" name="sexe" required="">
  							<option value="" selected="" >Sexe</option>
  							<option value="masculin">Masculin</option>
  							<option value="feminin">Féminin</option>
  						</select>	<br>
              <input name="matricule" class="form-control" type="text" placeholder="N° Matricule" required /><br /> 
              <input name="tel" class="form-control" type="text" placeholder="N° Téléphone" required /><br /> 
              <input name="login" class="form-control" type="text" placeholder="Login" required /><br /> 
              <input name="password" class="form-control" type="password" placeholder="Mot de passe" required /><br /> 
              
  						<input type="submit" class="btn btn-danger" name="register" value="S'inscrire" />

              <a href="login.php"><span class="btn btn-primary">Se Connecter</span></a>
  						        
  					</form><br>
  					
  				</div>
  			</div>
  	   </div>
  	 </div>
      </div>
    </div>
      
  </section>
  

 <!-- [FOOTER]
=============================================================================================================================-->
 <!-- [FOOTER]
=============================================================================================================================-->
 <footer class="footer sub-footer" >
  
          <div class="container">
            <div class="footer-info col-md-12 text-center">
              <ul>
                <li><a href="#">Adresse: Av. ISTM, No. 02, Q. Mosala</a></li>
                <li><a href="#">Tél: +243 97 7408425</a></li>
                <li><a href="mailto:istmbukavu@gmail.com">istmbukavu@gmail.com"</a></li>
              </ul>
            </div>
            
                        <div class="footer-social-icons col-md-12 text-center">
              <ul>
                <li><a target="_blank" href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
                <li><a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
                <li><a target="_blank" href="http://www.google.com"><i class="fa fa-google-plus"></i></a></li>
                <li><a target="_blank" href="http://www.rss.com"><i class="fa fa-rss"></i></a></li>
              </ul>
            </div>
          </div>
    
            </footer>
 <!-- [/FOOTER]
=============================================================================================================================-->
 

</div>
 

<!-- [ /WRAPPER ]
=============================================================================================================================-->

  <!-- [ DEFAULT SCRIPT ] -->
  <script src="../public/bootstrap3/library/modernizr.custom.97074.js"></script>
  <script src="../public/bootstrap3/library/jquery-1.11.3.min.js"></script>
        <script src="../public/bootstrap3/library/bootstrap/js/bootstrap.js"></script>
  <script type="../public/bootstrap3/text/javascript" src="js/jquery.easing.1.3.js"></script>
        <script src="../public/bootstrap3/library/vegas/vegas.min.js"></script>
  <!-- [ PLUGIN SCRIPT ] -->
        
  <script src="../public/bootstrap3/js/plugins.js"></script>
        <script src="../public/bootstrap3/js/fappear.js"></script>
       <script src="../public/bootstrap3/js/jquery.countTo.js"></script>
  <script src="../public/bootstrap3/js/scrollreveal.js"></script>
         <!-- [ COMMON SCRIPT ] -->
  <script src="../public/bootstrap3/js/common.js"></script>



  
</body>


</html>