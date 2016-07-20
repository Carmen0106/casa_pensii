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

$query = "UPDATE useri SET username='$username', nume='$nume', prenume='$prenume', parola='$parola'  WHERE id={$_POST['iduser']}"; 
mysqli_query($db->link, $query);

header ('location: ../utilizatori.php');
}
else { 
    header ('location: ../index.php');
}