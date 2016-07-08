<?php 
include 'config/config.php';
include 'libraries/Database.php';
session_start();

$db = new Database();
$nume = $_GET['nume'];
$dosar = $_GET['d'];
$query = "SELECT id FROM useri WHERE username = {$nume}"; 
$iduser = mysqli_query($db->link, $query);

while ($row = $iduser->fetch_assoc()) {
$id=$row['id'];
echo $id;
$query2 = "UPDATE dosare SET id_user = $id WHERE numar = $dosar"; 
echo $query2;

mysqli_query($db->link, $query2);
}
//header ('location: index.php');
