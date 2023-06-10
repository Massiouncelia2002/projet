<?php include('flightdb.php') ?>
<?php include('loginvalid.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Payment</title>
    <link rel="stylesheet" href="paystyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
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
      <?php if(isset($_SESSION['uname'])): ?>
        <a class="nav-link" id="user" href="#"><?php echo "Bienvenue " .$_SESSION['uname']; ?></a>
      <?php endif ?>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="homepage.php"><i class="fa fa-home" aria-hidden="true"></i>Accueil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fa fa-plane" aria-hidden="true"></i>programme des vols</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fa fa-question-circle" aria-hidden="true"></i>A propos de nous</a>
      </li>
    </ul>
  </div>
</nav>
    </section>
    <?php $Price=$_GET['Price']*$_SESSION['num']?>
    <div class="pricemsg text-center">
      <div class="alert alert-info" role="alert">
    <h1>   
Montant à payer. <strong><i class="fas fa-dollar-sign" aria-hidden="true"></i> <?php echo $Price ?> </strong> </h1>
</div>
    </div>
    <section>
      <div class="payment">
        <div class="payment-logo">
          <p>p</p>
        </div>

       <center> <h3>Choisir le type de payment</h3><br><br></center>
      <form  method="post">
        <center>
         <input type="radio" required name="type" value="Debit"> Debit Card <br><br>
         <input type="radio" name="type" value="Credit"> Credit Card <br><br>
         <!-- <input type="radio" name="type" value="netbank"> Net Banking <br><br> -->
       </center>
       <br><br>
          <div class="text-center">
          <button class="btn btn-primary w-50" type="submit" name="pbtn">Procedez</button>
        </div>
          </form>
            <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
      </div>
    </section>
    <?php
    payment_mode();
    function payment_mode(){
    if(isset($_POST['pbtn'])){
      $price = $_GET['Price'];
      if ($_POST['type'] == 'Debit' || $_POST['type'] == 'Credit' )
      header("Location:payment.php?Price=$price");
    }
  }
     ?>
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