<?php include('flightdb.php') ?>
<?php include('loginvalid.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ticket</title>
    <link rel="stylesheet" href="ticket.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500&display=swap" rel="stylesheet">
     <script src="https://kit.fontawesome.com/e4eecd86d3.js"></script>
     <script type="text/javascript">
       function print_ticket(){
         var prtContent = " ";
         var no = document.getElementsByClassName("row").length - 1;
         for(var i = 0; i < no; i++){
          prtContent += document.getElementsByClassName("row")[i].innerHTML;
         }
         var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
         WinPrint.document.write(prtContent);
         WinPrint.document.close();
         WinPrint.focus();
         WinPrint.print();
         WinPrint.close();
       }
     </script>
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
        <a class="nav-link" href="#"><i class="fa fa-question-circle" aria-hidden="true"></i>A propos de nous</a>
      </li>
      <?php if(isset($_SESSION['uname'])): ?>
      <li class="nav-item">
        <a class="nav-link"  href="usersearch.php?searchlogout='1'" ><i class="fa fa-sign-out" aria-hidden="true"></i>Se deconneter</a>
      </li>
      <?php else: ?>
        <li class="nav-item">
          <a class="nav-link" href="signin.php"><i class="fa fa-sign-in" aria-hidden="true"></i>Se connecter</a>
        </li>
      <?php endif ?>
    </ul>
  </div>
</nav>
  </section>
</section>
<section id="php">


<?php
show_ticket();


function show_ticket(){
$paid_by=$_SESSION['uname'];
$db = mysqli_connect('localhost','root','','airlines system') or die("could not connect to database");
$result=mysqli_query($db,"SELECT F.Flight_name,F.Seats,T.Departure,T.Arrival,cp.Price,cl.Cname,C.Departure_time,C.Arrival_time,D.Day,U.Pname,U.paid_by
        FROM flight_info F , travel_info T, cprice_info cp,time C,day_info D,passenger_info U, class cl
        WHERE  F.Flight_ID=T.Flight_ID AND cp.Travel_code=T.Travel_code AND C.Travel_code=T.Travel_code AND D.Day=C.Day AND U.Travel_code=T.Travel_code
         AND C.Time_ID=U.Time_ID AND U.paid_by='$paid_by'
        AND cp.Cno=U.Type AND cp.Cno IN (SELECT DISTINCT  TYPE FROM passenger_info WHERE paid_by='$paid_by')
        AND cl.Cno=Cp.Cno AND cl.Cno IN  (SELECT DISTINCT  TYPE FROM passenger_info WHERE paid_by='$paid_by')
        AND C.Time_ID IN  (SELECT DISTINCT Time_ID FROM passenger_info WHERE paid_by='$paid_by')");


  $count=mysqli_num_rows($result);
 ?>
</section>
<section id="container">
  <div class="container text-center w-100">
      <h1 class="py-4 m-0 bg-primary text-light "><i class="fas fa-receipt"></i>Vos reservations</h1>
  </div>
  <?php if($count>0){ ?>
    <div class="text-center">
    <div class="alert alert-primary" role="alert">
    Bon voyage ! Imprimez vos billets.
    <a href="#" onclick="print_ticket()">ICI.</a>
  </div>
    </div>
  <?php for ($i=0; $i <$count; $i++) { $row=mysqli_fetch_assoc($result);

     ?>
  <div class="row" id="section-to-print" >
  <div class="col-md-6 text-center fname">
  <h1 ><i class="fas fa-plane-departure"></i><?php echo $row['Flight_name']; ?></h1><br>
  <div class="cancel">

  </div>
 </div>
 <div class="col-md-3 content ">
   <p class="lead"><strong>Nom de passager:   </strong><?php echo $row['Pname']; ?></p>
   <p class="lead"><strong>Depart:   </strong><?php echo $row['Departure']; ?></p>
  <p class="lead"><strong>Arrivée:     </strong><?php echo $row['Arrival']; ?></p>
  <p class="lead"><strong>Date de depart:     </strong><?php echo $row['Departure_time']; ?></p>
  <p class="lead"><strong>Date d'arrivée:     </strong><?php echo $row['Arrival_time']; ?></p>
</div>
<div class="col-md-3 content">
  <p class="lead"><strong>Type:     </strong><?php echo $row['Cname']; ?></p>
    <p class="lead"><strong>Date:     </strong><?php echo $row['Day']; ?></p>
    <p class="lead"><strong>Nom de compagnie:     </strong><?php echo $row['Flight_name']; ?></p>
    <p class="lead"><strong>Prix payé:     </strong><i class="fas fa-dollar-sign"  aria-hidden="true"><?php echo $row['Price']; ?></i></strong></p>
    <p class="lead"><strong>payé par:     </strong><?php echo $row['paid_by']; ?></p>

</div>
</div>

<?php
}
?>
<div class="extra text-center">

  <img src="extra.svg" alt="">
</div><?php
 }
 else{
   ?>
   <div class="text-center">
     <div class="alert alert-primary" role="alert">
     Oops!Quel vide. <a href="usersearch.php" class="alert-link">Reservez-maintanant</a> et voyagez avec joie.
</div>
   </div>
   <div class="text-center">
   <div class="space">
<img src="empty.svg" alt="">
   </div>
    </div>
<?php
 }
}
 ?>
</section>


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