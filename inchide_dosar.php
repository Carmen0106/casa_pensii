<?php 
include 'config/config.php';
include 'libraries/Database.php';
session_start();

$db = new Database();
$dosar = $_POST['dosar'];
$query = "UPDATE dosare SET id_user = 0 WHERE  numar = $dosar"; 
$inchide_dosar = mysqli_query($db->link, $query);

header ('location: index.php');
