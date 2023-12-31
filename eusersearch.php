<?php include('flightdb.php') ?>
<?php include('loginvalid.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Recherche passagers</title>
    <link rel="stylesheet" href="usersearch.css">
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
        <a class="nav-link"  href="esignin.php" ><i class="fa fa-sign-out" aria-hidden="true"></i>Se deconnecter</a>
      </li>

    </ul>
  </div>
</nav>

<section id="box">
  <div class="container text-center ">
    <h1 class="py-4 bg-dark text-light "> <i class="fa fa-search" aria-hidden="true"></i>Recherche des passagers</h1>
    <section id="Alertmsg">
      <div class="alertmsg ">
        <div class="alert alert-info alert-dismissible fade show " role="alert">
        <strong>Salut utilisateur!</strong>N'hésitez pas à laisser vide(s) tout champ de saisie. Notre serveur est convivial pour les utilisateurs.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      </div>
      <script type="text/javascript">
        $('.alert').alert()
      </script>
    </section>
  <div class="d-flex justify-content-center ">
      <form class="w-50" action="" method="post" >
    <div class="row">
      <div class="col">
              <div class="input-group mb-2 ">
          <div class="input-group-prepend">
            <div class="input-group-text bg-warning"><i class="fas fa-plane-departure"></i></div>
          </div>
          <input type="text"  autocomplete="off" name="From" placeholder="De(dapart)" class="form-control" id="inlineFormInputGroup">
        </div>
      </div>
      <div class="col">
              <div class="input-group mb-2 ">
          <div class="input-group-prepend">
            <div class="input-group-text bg-warning"><i class="fas fa-plane-arrival" aria-hidden="true"></i></div>
          </div>
          <input type="text"  autocomplete="off" name="To" placeholder="A(destination)" class="form-control" id="inlineFormInputGroup">
        </div>

      </div>
    </div>
    <div class="row">
      <div class="col">



      <div class="input-group mb-2 ">
      <div class="input-group-prepend">
        <div class="input-group-text bg-warning"><i class="fas fa-male"></i></div>
      </div>
      <input type="text"  autocomplete="off" name="Pname" placeholder="Nom passager" class="form-control" id="inlineFormInputGroup">
    </div>
      </div>
      <div class="col">
    <div class="input-group mb-2 ">
    <div class="input-group-prepend">
      <div class="input-group-text bg-warning"><i class="fa fa-plane" aria-hidden="true"></i></div>
    </div>
    <input type="text"  autocomplete="off" name="Flight_name" placeholder="nom de compagnie" class="form-control" id="inlineFormInputGroup">
  </div>
  </div>
        </div>
    <div class="input-group mb-2  w-50 ">
    <div class="input-group-prepend ">
      <div class="input-group-text bg-warning  "><i class="fas fa-calendar-day" aria-hidden="true"></i></div>
    </div>
      <select class="custom-select" name="Day">
    <option selected disabled>Choosissez la jour</option>
    <option name="Day" value="1">DIMANCHE</option>
    <option name="Day" value="2">LUNDI</option>
    <option name="Day" value="3">MARDI</option>
    <option name="Day" value="4">MERCREDI</option>
    <option name="Day" value="5">JEUDI</option>
    <option name="Day" value="6">VENDREDI</option>
    <option name="Day" value="7">SAMEDI</option>
</select>
  </div>
      <div class="d-flex justify-content-center search">
        <button type="submit" class="btn btn-success w-50" name="Search"><i class="fa fa-search" aria-hidden="true"></i><strong>Rechercher</strong></button>
      </div>
    </form>
        </div>
        <?php
        passenger_search();
        function passenger_search(){
         if(isset($_POST['Search'])){ ?>

                      <?php
                      $db = mysqli_connect('localhost','root','','airlines system') or die("could not connect to database");

                      $Flight_name= mysqli_real_escape_string($db,$_POST['Flight_name']);
                      $Departure= mysqli_real_escape_string($db,$_POST['From']);
                      $Arrival= mysqli_real_escape_string($db,$_POST['To']);
                      $Pname= mysqli_real_escape_string($db,$_POST['Pname']);
                      if(isset($_POST['Day'])){
                          $Day_ID= mysqli_real_escape_string($db,$_POST['Day']);
                      }
                      else{
                        $Day_ID="";

                    }
                      $result=mysqli_query($db,"SELECT F.Flight_name,T.Departure,T.Travel_code,T.Arrival,C.Departure_time,C.Arrival_time,C.Time_ID,D.Day,D.Day_ID,U.Pname,U.paid_by
                              FROM flight_info F , travel_info T,time C,day_info D,passenger_info U  WHERE F.Flight_name
                              LIKE '%$Flight_name%' AND T.Departure LIKE '%$Departure%' AND D.Day_ID LIKE '%$Day_ID%' AND T.Arrival LIKE '%$Arrival%' AND U.Pname LIKE '%$Pname%' AND
                               F.Flight_ID=T.Flight_ID AND C.Travel_code=T.Travel_code AND
                              D.Day=C.Day AND T.Travel_code=U.Travel_code  AND C.Time_ID=U.Time_ID AND  C.Time_ID IN
                               (SELECT DISTINCT Time_ID FROM passenger_info WHERE  Pname LIKE '%$Pname%')
                                 ");


                      $count=mysqli_num_rows($result);
                      if($count==0){?>
                        <div class="modal fade" data-backdrop="false" keyboard="True" id="mymodal" tabindex="-1" role="dialog">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Message</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="alert alert-danger" role="alert">
                                Aucun passager correspondant n'a été trouvé. Essayez de modifier les champs de saisie.
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <script>
                       $(document).ready(function(){
                           $("#mymodal").modal('show');
                       });
                      </script>
                      <div class="alert alert-warning" role="alert">
                      Aucun passager correspondant n'a été trouvé. Essayez de modifier les champs de saisie.
                      </div>
                      <?php
     }
                      else{
                      ?>
                      <div class="alert alert-warning" role="alert">
                        <?php if( $count==1): ?>  1 Passager trouve.
                        <?php else:?>
                          <?php echo $count; ?> Passagers trouves.
                        <?php endif ?>
                      </div>
                      <section id="table1">
                        <div class="table-responsive">
                              <div class="d-flex table-data ">
                                <table class="table table-striped table-light table-hover">
                                  <thead class="thead-dark">
                                    <tr>
                                      <th>Nom Passager</th>
                                      <th>Nom de compagnie</th>
                                      <th>Depart</th>
                                      <th>Arrivee</th>
                                      <th>heure Depart</th>
                                      <th>heure Arrivee</th>
                                      <th>Date</th>
                                    </tr>
                                  </thead>
                                  <tbody id="tbody">
                      <?php
                      while($row=mysqli_fetch_assoc($result)){ ?>
                      <tr>
                        <td><?php echo $row['Pname']; ?></td>
                        <td><?php echo $row['Flight_name']; ?></td>
                        <td><?php echo $row['Departure']; ?></td>
                        <td><?php echo $row['Arrival']; ?></td>
                        <td><?php echo $row['Departure_time']; ?></td>
                        <td><?php echo $row['Arrival_time']; ?></td>
                        <td><?php echo $row['Day']; ?></td>
                    </tr>
                      <?php
                      }
                    }

                      ?>

                    </tbody>

                  </table>
                </div>
                </div>
        </section>
      <?php }
    }?>




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