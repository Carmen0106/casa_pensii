<?php 
include '../config/config.php';
include '../libraries/Database.php';
session_start();

if ($_SESSION['tip'] == 2) {
$db = new Database();
$numar = $_POST['numar'];
$nume = $_POST['nume'];
$prenume = $_POST['prenume'];
$cnp = $_POST['cnp'];

$query = "INSERT INTO dosare (numar, nume, prenume, cnp, id_user) VALUES ('$numar', '$nume','$prenume', '$cnp', '0')"; 
mysqli_query($db->link, $query);


header ('location: ../dosare.php');
}
else { 
    header ('location: ../index.php');
}