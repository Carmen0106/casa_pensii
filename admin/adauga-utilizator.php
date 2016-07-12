<?php 
include '../config/config.php';
include '../libraries/Database.php';
session_start();

if ($_SESSION['tip'] == 2) {
$db = new Database();
$username = $_POST['username'];
$nume = $_POST['nume'];
$prenume = $_POST['prenume'];
$parola = $_POST['parola'];
if (!isset($_POST['tip'])){
$tip = '1';
}
else {$tip = '2';}

$query = "INSERT INTO useri (username, nume, prenume, parola, tip) VALUES ('$username', '$nume', '$prenume', '$parola', '$tip')"; 
mysqli_query($db->link, $query);

header ('location: ../utilizatori.php');
}
else { 
    header ('location: ../index.php');
}