<?php 
include 'config/config.php';
include 'libraries/Database.php';
session_start();

$db = new Database();
$dosar = $_POST['dosar'];
$query = "UPDATE dosare SET id_user = 0 WHERE  numar = $dosar"; 
$inchide_dosar = mysqli_query($db->link, $query);

//query pentru a inchide dosarul in tabela istoric (pentru userul care a trimis dosarul)
$queryinchide= "UPDATE istoric SET inchide = NOW() WHERE nr_dosar = $dosar AND id_user= {$_SESSION['id']} AND inchide IS NULL";
$rezinchide = mysqli_query($db->link,$queryinchide);

header ('location: index.php');
