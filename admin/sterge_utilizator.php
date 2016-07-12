<?php 
include '../config/config.php';
include '../libraries/Database.php';
session_start();

if ($_SESSION['tip'] == 2) {
$db = new Database();
$userid = $_GET['user'];

$query = "DELETE FROM useri WHERE id = '$userid'"; 
mysqli_query($db->link, $query);
$query2 = "UPDATE dosare SET id_user = '0' WHERE id_user = '$userid'"; 
mysqli_query($db->link, $query2);


header ('location: ../utilizatori.php');
}
else { 
    header ('location: ../index.php');
}