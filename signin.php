<!DOCTYPE html>
<?php include('loginvalid.php'); ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Se connecter</title>
    <link rel="stylesheet" href="signin.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>

    <section id="nav-bar">
      <nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="#"><img class="img" src="travel.png">BetterFly</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="homepage.php"><i class="fa fa-home" aria-hidden="true"></i>accueil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fa fa-plane" aria-hidden="true"></i>Programme des vols</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fa fa-question-circle" aria-hidden="true"></i>A propos de nous</a>
      </li>
    </ul>
  </div>
</nav>
    </section>
    <section>
      <div class="page-wrap">
        <div class="left-panel">
          <div class="illustration">
            <img src="regist.svg"  alt="">
          </div>
        </div>
        <div class="right-panel">
          <div class="animated-form">
            <h3>connectez-vous a votre compte</h3>
            <form class="form" method="post">
              <?php if(isset($_SESSION['register'])): ?>
              <div class="alert alert-success" role="alert">
               <?php echo $_SESSION['register'];
              unset($_SESSION['register']);
              session_destroy();?>
              </div>
            <?php endif ?>
            <?php include('uerrors.php'); ?>
              <div class="form-group">
                <label for="uname"><i class="fa fa-user" aria-hidden="true"></i>Nom d'utilisateur</label>
              <input type="text" id="uname" name="uname" required >
              </div>
            <div class="form-group">
              <label for="password"><i class="fa fa-unlock-alt" aria-hidden="true"></i>Mot de passe</label>
              <input type="password" id="password" name="password" required class="password" />
              </div>
              <div class="form-group flex-end">
                <button type="submit" class="button" name="button">Se connecter</button>
              </div>
              <div class="No-account">
                <a href="signup.php" class="link">Vous ne possedez pas encore un compte? S'inscrire</a>
              </div>
              <div class="change-pwd">
                <a href="changepassword.php" class="link">mot de passe oublié?</a>
              </div>
              </form>

          </div>
        </div>
      </div>

      </section>
<section class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-3 footer-info">
        <div class="ftitle">
        <h3> BetterFly système de réservations en ligne.</h3>
      </div>
        <p>Notre site offre bien plus qu'une simple réservation de vols. Nous nous engageons à vous offrir un service de première classe, en veillant à ce que chaque détail de votre voyage soit pris en compte.</p>
      </div>
      <div class="col-md-3 footer-links">
        <h3>Menu</h3>
        <ul>
          <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">accueil</a></li>
          <li><i class="fa fa-ticket" aria-hidden="true"></i><a href="usersearch.php">reservation billets</a></li>
          <li><i class="fa fa-plane" aria-hidden="true"></i><a href="#">programme des vols</a></li>
          <li><i class="fa fa-question-circle" aria-hidden="true"></i><a href="#">a propos de nous</a></li>
          <li><i class="fa fa-phone" aria-hidden="true"></i><a href="contactus.html">Contactez nous</a></li>
        </ul>
      </div>
      <div class="col-md-3 footer-social">
        <h3>suivez-nouz</h3>
        <p>suivez-nous sur les reseaux sociaux pour plus d'informations.</p>

          <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
          <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
          <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
          <a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
          <a href="#"><i class="fa fa-tumblr" aria-hidden="true"></i></a>
      </div>
      <div class="col-md-3 Newsletter">
        <h3>notre messagerie</h3>
        <p>vous avez des problemes ou des comentaires n'hesitez pas de nous contacter.</p>
        <form class=""  method="post">
          <input type="email" class="email" name="" placeholder="Email">
          <input type="submit" class="submit" name="" value="envoyer">
        </form>
      </div>
    </div>

  </div>
  <div class="box">
    <div class="copyright">
      &copy; copyright <strong>Airline Reservation system</strong>.All rights reserved.
        Designed with <i class="fa fa-heart" aria-hidden="true"></i> by 19CE1105 & 19BCE1460
  </div>
  </div>
</section>

  </body>
</html>