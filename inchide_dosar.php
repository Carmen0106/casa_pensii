<?php 
include 'config/config.php';
include 'libraries/Database.php';
session_start();

$db = new Database();
$dosar = $_POST['d'];
$query = "UPDATE dosare SET id_user = '0' WHERE  numar = $dosar"; 
mysqli_query($db->link, $query);

header ('location: index.php');
