

<?php 

$server = "localhost";
$user = "root";
$pass = "";
$database = "library";

$set = mysqli_connect($server, $user, $pass, $database);

if (!$set) {
    die("<script>alert('Connection Failed.')</script>");
}

?>