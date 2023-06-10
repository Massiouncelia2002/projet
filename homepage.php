<!DOCTYPE html>
  <?php include('loginvalid.php'); ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Bienvenue à BetterFly système de réservations en ligne</title>
    <link rel="stylesheet" href="homestyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <script src="https://kit.fontawesome.com/e4eecd86d3.js"></script>
   </head>
  <body>
  <section class="header">
    <section id="nav-bar">
      <nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="#"><img class="img" src="travel.png">BetterFly</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
      <?php if(isset($_SESSION['uname'])): ?>
        <a class="nav-link" id="user" href="#"><?php echo "Welcome " .$_SESSION['uname']; ?></a>
      <?php endif ?>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="homepage.php"><i class="fa fa-home" aria-hidden="true"></i>accueil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="usersearch.php"><i class="fa fa-plane" aria-hidden="true"></i>programme des vols</a>
      </li>
      <li class="nav-item">
            <a class="nav-link" href="contactpage.html"><i class="fa fa-phone" aria-hidden="true"></i>Contactez-nous</a>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fa fa-question-circle" aria-hidden="true"></i>A propos de nous</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="esignin.php"><i class="fa fa-sign-in" aria-hidden="true"></i>Admin</a>
      </li>

      <?php if(isset($_SESSION['uname'])): ?>
        <li class="nav-item">
          <a class="nav-link" href="ticket.php"><i class="fas fa-receipt" aria-hidden="true"></i>Vos reservations</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="user profile.php"><i class="fa fa-address-card" aria-hidden="true"></i>votre profile</a>
        </li>
      <li class="nav-item">
        <a class="nav-link"  href="homepage.php?homelogout='1'" ><i class="fa fa-sign-out" aria-hidden="true"></i>Se deconnecter</a>
      </li>
      <?php else: ?>
        <li class="nav-item">
          <a class="nav-link" href="signin.php"><i class="fa fa-sign-in" aria-hidden="true"></i>S'inscrire</a>
        </li>
      <?php endif ?>
    </ul>
  </div>
</nav>
    </section>
    <video  autoplay loop class="video-bg" muted plays-inline>
      <source src="vid1.mp4" type="video/mp4">
    </video>
    
    <div class="welcome-msg">
      <h1>Bienvenue à BetterFly système de réservations en ligne</h1>
      <p>Bienvenue sur notre plateforme de réservation de vols en ligne, où l'élégance rencontre la commodité pour créer une expérience de voyage inoubliable. Que vous planifiez des vacances exotiques, un voyage d'affaires ou une escapade spontanée, nous sommes là pour vous accompagner à chaque étape.</p>
      <a href="usersearch.php" class="btn btn-book">Réservez maintenant</a>
    </div>
   
  </section>
  <section id="services">
    <div class="container">
    <div class="row">
    <div class="col-md-3">
    <div class="icon">
      <i class="fa fa-money" aria-hidden="true"></i>
    </div>
    <h4>transaction sans tracas</h4>
    <p>Dans notre système de réservation des vols en ligne, nous avons simplifié le processus de transaction pour vous offrir une expérience sans tracas. Grâce à notre interface conviviale et intuitive, vous pouvez facilement rechercher, sélectionner et réserver vos vols en quelques clics seulement. </p>
    </div>
    <div class="col-md-3">
    <div class="icon">
      <i class="fa fa-shield" aria-hidden="true"></i>
    </div>
    <h4>Securite</h4>
    <p>La sécurité de notre système de réservation des vols en ligne est notre priorité absolue. Nous avons mis en place une série de mesures robustes pour protéger les données sensibles de nos clients et assurer des transactions sécurisées.</p>
    </div>
    <div class="col-md-3">
    <div class="icon">
      <i class="fa fa-credit-card" aria-hidden="true"></i>
    </div>
    <h4>Remboursements faciles</h4>
    <p>notre système de réservation de vols en ligne est conçu pour offrir des remboursements faciles. Si vous devez annuler ou modifier votre vol, nous simplifions le processus en mettant à votre disposition une interface conviviale qui vous permet de gérer facilement vos réservations.</p>
    </div>
    <div class="col-md-3">
    <div class="icon">
      <i class="fa fa-user-secret" aria-hidden="true"></i>
    </div>
    <h4>confidentialite des utilisateurs</h4>
    <p>Nous accordons une grande importance à la protection des informations personnelles que nos utilisateurs nous confient. Toutes les données que vous partagez avec nous, telles que vos informations de contact, vos préférences de voyage et vos données financières, sont traitées de manière sécurisée et confidentielle.</p>
    </div>
    </div>
    </div>
  </section>
  <section id="carousel">
    <div class="car">
      <h3 >Offres difficile à refuse</h3>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="header.jpg" class="img">
    </div>
    <div class="carousel-item">
      <img src="promo1.webp" class="img">
    </div>
    <div class="carousel-item">
      <img src="promo2.webp" class="img">
    </div>
    <div class="carousel-item">
      <img src="pro1.webp" class="img">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">avant</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">aprés</span>
  </a>
</div>
  </div>
  </section>
  <section id=bestsellers>
    <h3>Meilleurs offres</h3>
    <div class="row justify-content-center">
      <div class="col-md-3">
        <div class="card shadow style="width:20rem"; >
          <div class="inner">
          <img class="card-img-top" src="paris.jpg" alt="" height="350px">
          </div>
          <div class="card-body text-center">
            <h5>PARIS</h5>
           
            <a href="usersearch.php" class="btn btn-primary">Réservez maintenant</a>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card shadow style="width:20rem"; >
          <div class="inner">
          <img class="card-img-top" src="istanbul.jpg" alt="" height="350px">
          </div>
          <div class="card-body text-center">
            <h5>ISTANBUL</h5>
           
            <a href="Usersearch.php" class="btn btn-primary">Réservez maintenant</a>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card shadow style="width:20rem"; >
          <div class="inner">
          <img class="card-img-top" src="dubai.png" alt="" height="350px">
        </div>
          <div class="card-body text-center">
            <h5>DUBAI</h5>
            
            <a href="Usersearch.php" class="btn btn-primary">Réservez maintenant</a>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card shadow style="width:20rem"; >
          <div class="inner">
          <img class="card-img-top" src="london.jpg" alt="" height="350px">
          </div>
          <div class="card-body text-center">
            <h5>LONDRES</h5> 
            <a href="Usersearch.php" class="btn btn-primary">Réservez maintenant</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="promo">
    <div class="text">
      <i class="fas fa-plane-departure"></i>
      <p><strong>Come.<br>Fall in love at First Flight</strong></p>
    </div>
    <div class="promotion">
    <video autoplay loop class="vid" muted plays-inline>
      <source src="plane.mp4" type="video/mp4">

    </video>
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
          <li><i class="fa fa-phone" aria-hidden="true"></i><a href="contactpage.html">Contactez nous</a></li>
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