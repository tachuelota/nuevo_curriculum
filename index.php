<?php require 'connexion/connexion.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
	$sql = $pdoCV->query(" SELECT * FROM t_utilisateurs WHERE id_utilisateur ='1' ");
	$ligne_utilisateur = $sql->fetch();

	$sql = $pdoCV->query(" SELECT * FROM t_titres_cv WHERE utilisateur_id ='1' ");
	$ligne_titre_cv = $sql->fetch();
	
	$sql = $pdoCV->query(" SELECT * FROM t_competences WHERE utilisateur_id = '1' ORDER BY id_competence ASC");
	$ligne_competence = $sql->fetch();
?>
<title>Portfolio <?php echo $ligne_utilisateur['prenom'].' '.$ligne_utilisateur['nom']; ?></title>

<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap.css">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
  <div class="container">
    <hr>
    <div class="row">
      <div class="col-xs-6">
        <h1><?php echo $ligne_utilisateur['prenom'].' '.$ligne_utilisateur['nom']; ?></h1>
      </div>
      <div class="col-xs-6">
        <p class="text-right"><a href="docs/cv_isola_2016.pdf" target="_blank">Mon Cv papier</a> <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span></p>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-xs-7">
        <div class="media">
          <div class="media-left"> <a href="#"> <img src="images/<?php echo $ligne_utilisateur['avatar']; ?>" alt="..." width="150" height="150" class="media-object img-rounded"> </a> </div>
          <div class="media-body">
            <h2 class="media-heading"><?php echo $ligne_titre_cv['titre_cv']; ?></h2>
            <h4><?php echo $ligne_titre_cv['accroche']; ?></h4>
            </div>
        </div>
      </div>
      <div class="col-xs-5 well">
        <div class="row">
          <div class="col-lg-6">
            <h5><span class="glyphicon glyphicon-phone" aria-hidden="true"></span> <?php echo $ligne_utilisateur['telephone']; ?></h5>
          </div>
          <div class="col-lg-6">
            <h5><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> <?php echo $ligne_utilisateur['email']; ?></h5>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <h4><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> <?php echo $ligne_utilisateur['adresse'].' '.$ligne_utilisateur['code_postal'].' '.$ligne_utilisateur['ville']; ?></h4>
          </div>
</div>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-sm-8 col-lg-7">
        <h2>Formations &amp; diplômes</h2>
        <?php
		  $sql = $pdoCV->prepare(" SELECT * FROM t_experiences WHERE utilisateur_id = '1' ORDER BY id_experience ASC ");// prépare la requête
		  $sql->execute(); // exécute-la
		  $nbr_experiences = $sql->rowCount(); //compte les lignes
			//$ligne_experience = $sql->fetch();
		  ?>
        <hr>
        <?php while ($ligne_experience = $sql->fetch()) { ?>
        <div class="row">
        	<div class="col-xs-6"><h4><?php echo $ligne_experience['titre_e']; ?></h4></div>
        	<div class="col-xs-6">
        	  <h5 class="text-right"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> <?php echo $ligne_experience['dates_e']; ?></h5>
        	</div>
        </div>
        <h4><span class="label label-default"> <?php echo $ligne_experience['sous_titre_e']; ?></span></h4>
        <?php echo $ligne_experience['description_e']; ?>
        <?php } ?>
        
        <h4><span class="label label-default">Masters</span></h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint, recusandae, corporis, tempore nam fugit deleniti sequi excepturi quod repellat laboriosam soluta laudantium amet dicta non ratione distinctio nihil dignissimos esse!</p>
</div>
      <div class="col-sm-4 col-lg-5">
        <h2>Skill Set</h2>
        <hr>
        <!-- Green Progress Bar -->
        <div class="progress">
          <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo $ligne_competence['niveau_c']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $ligne_competence['niveau_c']; ?>%"><?php echo $ligne_competence['competence']; ?></div>
        </div>
        <!-- Blue Progress Bar -->
        <div class="progress">
          <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%"> CSS</div>
        </div>
        <!-- Yellow Progress Bar -->
        <div class="progress">
          <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%"> JAVASCRIPT</div>
        </div>
        <!-- Red Progress Bar -->
        <div class="progress">
          <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%"> PHP</div>
        </div>
        <div class="progress">
          <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="width: 55%"> WORDPRESS</div>
        </div>
        <div class="progress">
          <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%"> PHOTOSHOP</div>
        </div>
        <div class="progress">
          <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%"> ILLUSTRATOR</div>
        </div>
</div>
    </div>
    <hr>
    <h2>Expériences pro</h2>
    <?php
		  $sql = $pdoCV->prepare(" SELECT * FROM t_experiences WHERE utilisateur_id = '1' ORDER BY id_experience ASC ");// prépare la requête
		  $sql->execute(); // exécute-la
		  $nbr_experiences = $sql->rowCount(); //compte les lignes
			//$ligne_experience = $sql->fetch();
		  ?>
<hr>
    <div class="row">
      <?php while ($ligne_experience = $sql->fetch()) { ?>
      <div class="col-lg-6">
        <div class="row">
          <div class="col-xs-5">
            <h4><?php echo $ligne_experience['titre_e']; ?></h4>
          </div>
<div class="col-xs-5">
            <h4 class="text-right"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> <?php echo $ligne_experience['dates_e']; ?></h4>
          </div>
        </div>
        <h4><span class="label label-default"><?php echo $ligne_experience['sous_titre_e']; ?></span></h4>
        <?php echo $ligne_experience['description_e']; ?>
      </div>
      <?php } ?>
    </div>
    <hr>
    <h2>Portfolio</h2>
    <hr>
    <div class="container">
    	<div class="row">
    		<div class="col-lg-4 col-sm-6 col-xs-6"><img src="images/300X200.gif" alt=""><hr class="hidden-lg"></div>
    		<div class="col-lg-4 col-sm-6 col-xs-6"><img src="images/300X200.gif" alt=""><hr class="hidden-lg"></div>
    		<div class="col-lg-4 col-sm-6 col-xs-6"><img src="images/300X200.gif" alt=""></div>
    		<div class="col-lg-4 col-sm-6 col-xs-6 hidden-lg"><img src="images/300X200.gif" alt=""></div>
    	</div>
        <hr>
        <div class="row">
    		<div class="col-lg-4 col-sm-6 col-xs-6"><img src="images/300X200.gif" alt=""><hr class="hidden-lg"></div>
    		<div class="col-lg-4 col-sm-6 col-xs-6"><img src="images/300X200.gif" alt=""><hr class="hidden-lg"></div>
    		<div class="col-lg-4 col-sm-6 col-xs-6"><img src="images/300X200.gif" alt=""></div>
    		<div class="col-lg-4 col-sm-6 col-xs-6 hidden-lg"><img src="images/300X200.gif" alt=""></div>
    	</div>
    </div>
    <hr>
    <h2>Contact</h2>
    <hr>
  </div>
  <div class="container">
  <div class="row">
    <div class="col-lg-offset-3 col-xs-12 col-lg-6">
      <div class="jumbotron">
        <div class="row text-center">
          <div class="text-center col-xs-12 col-sm-12 col-md-12 col-lg-12"> </div>
          <div class="text-center col-lg-12"> 
            <!-- CONTACT FORM https://github.com/jonmbake/bootstrap3-contact-form -->
            <form role="form" id="feedbackForm" class="text-center">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                <span class="help-block" style="display: none;">Please enter your name.</span></div>
              <div class="form-group">
                <label for="email">E-Mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
                <span class="help-block" style="display: none;">Please enter a valid e-mail address.</span></div>
              <div class="form-group">
                <label for="message">Message</label>
                <textarea rows="10" cols="100" class="form-control" id="message" name="message" placeholder="Message"></textarea>
                <span class="help-block" style="display: none;">Please enter a message.</span></div>
              <span class="help-block" style="display: none;">Please enter a the security code.</span>
              <button type="submit" id="feedbackSubmit" class="btn btn-primary btn-lg" style=" margin-top: 10px;"> Send</button>
            </form>
            <!-- END CONTACT FORM --> 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<hr>
<footer class="text-center">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <p>Copyright © Patrick Isola - Tous droits réservés</p>
        <p><a href="admin/index.php">Espace privé</a></p>
      </div>
    </div>
  </div>
</footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-1.11.3.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>
</body>
</html>
