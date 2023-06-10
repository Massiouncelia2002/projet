<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
$errors = array();
add_into_database();

function add_into_database() {
    $db = mysqli_connect('localhost', 'root', '', 'airlines system') or die("Could not connect to database");

    if (isset($_POST['signup'])) {
        $username = mysqli_real_escape_string($db, $_POST['name']);
        $uname = mysqli_real_escape_string($db, $_POST['uname']);
        $dob = mysqli_real_escape_string($db, $_POST['dob']);
        $eid = mysqli_real_escape_string($db, $_POST['eid']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $cpassword = mysqli_real_escape_string($db, $_POST['cpassword']);

        $checkuni = "SELECT * FROM us WHERE uname='$uname' LIMIT 1";
        $results = mysqli_query($db, $checkuni);
        $user = mysqli_fetch_assoc($results);

        if ($user) {
            if ($user['uname'] === $uname) {
                array_push($GLOBALS['errors'], "utilisateur existe deja");
            }
        }

        if ($password != $cpassword) {
            array_push($GLOBALS['errors'], "mot de passe ne convient pas");
        }

        if (count($GLOBALS['errors']) == 0) {
            $query = "INSERT INTO us (name, uname, dob, eid, password) VALUES ('$username', '$uname', '$dob', '$eid', '$password')";
            mysqli_query($db, $query);
            $_SESSION['register'] = "inscription avec succes! connectez-vous.";
            sendmail();
            header("Location: signin.php");
            exit();
        }
    }
}

function sendmail() {
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: irctc12102020@gmail.com' . "\r\n";
    $bodymsg = "Registration Successful!!";
    mail('imenemez9@gmail.com', "Registration Successful!!", $bodymsg, $headers);
}
?>