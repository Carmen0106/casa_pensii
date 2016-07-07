<?php 
include 'config/config.php';
include 'libraries/Database.php';
session_start();

$db = new Database();

$query = "UPDATE dosare SET id_user = {$_SESSION['id']} WHERE  numar = {$_GET['dosar']}"; 
mysqli_query($db->link, $query);

header ('location: index.php');
