<?php
session_start();
$hostname = "localhost";
$username = "root";
$pass = "";
$database = 'foodchoices';
$sql = new mysqli($hostname, $username, $pass, $database);
if(mysqli_connect_error()){
    echo "Unable to connect to the database: ".$sql->error;
}


if(isset($_POST[firstname])){
    $firstname = $_POST["firstname"];
    $lastname  = $_POST["lastname"];
    $username  = $_POST["username"];
    $email     = $_POST["email"];
    $password  = $_POST["password"];
}
$userquery = "SELECT * from customerinfo;
WHERE email = '$email'";
$results = $sql->query($userquery);
if($reults->num_of_rows > 0){
    echo "This account already exists";
}

else{
    $signup = "INSERT INTO customerinfo (firstname, lastname, username, email, password) VALUES ('$firstname', '$lastname', '$username', '$email', '$password')";
    if($sql->query($signup)){
        $_SESSION["email"] = $email;
        bind_param("sssss" ,$firstname, $lastname, $username, $email, $password);
        execute();
        echo "you have successfully been registered";
    }
    else{
        echo "registration failed: " .$sql->error;
    }
}
if (isset($_POST['email'])){
    $email = $_POST["email"];
    $password1 = $_POST["password"];
    $userquery = "SELECT * FROM custmerinfo WHERE email = '$email' AND password = '$password'";
    $results = $sql->query($userquery);

    if($results->num_of_rows>0){
        $_SESSION["email"] = $email;
        echo "You're successfully logged in, Welcome";
    }
    else{
        echo "incorrect email or password";
    }
}
include ('signup.html');
include ('signin.html');
?>