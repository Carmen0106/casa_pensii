<?php 
include '../config/config.php';
include '../libraries/Database.php';
session_start();

if ($_SESSION['tip'] == 2) {
$db = new Database();
$numar = $_POST['numar'];
$nume = $_POST['nume'];
$cnp = $_POST['cnp'];

$query = "INSERT INTO dosare (numar, nume, cnp, id_user) VALUES ('$numar', '$nume', '$cnp', '0')"; 
mysqli_query($db->link, $query);


header ('location: ../dosare.php');
}
else { 
    header ('location: ../index.php');
}