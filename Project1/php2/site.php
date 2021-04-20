<?php
session_start();
$hostname = "localhost:3305";
$username = "root";
$pass = "";
$database = foodchoices;
$sql = new mysqli($hostname, $username, $pass, $database);
if(mysqli_connect_error()) {
    echo "Unable to connect to $database : ".$sql->error;
}
if(isset($_SESSION["email"])){
    header("location:../signup.html");
}else{
    $email = $_SESSION["emaail"];
    $details = "SELECT * FROM customerinfo WHERE email = '$email'";
    $detailsresult = $sql->query($details);
    if($detailsresult->num_of_rows>o){
        while($info = $detailsresult->fetch_assoc()){
            $firstname = $info["firstname"];
            $lastname = $info["lastname"];
            $email = $info["email"];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <p>registered</p>
    <p>First name: <?php echo $firstname ?></p>
    <p>Last name: <?php echo $lastname ?></p>
    <p>email: <?php echo $email ?></p>

    <br>

    <button onclick = "window.location = '.../php/mylogout.php';">Log out</button>
</body>
</html>