<?php 
include 'config/config.php';
include 'libraries/Database.php';
session_start();
$db = new Database();
$dosar = $_GET['d'];

if(isset($_GET['schimba'])){
    $nume = $_GET['nume'];
    $cauta_user = "SELECT * FROM useri WHERE username= '$nume'";
    $rezultat = mysqli_query($db->link, $cauta_user);
    $rand= mysqli_fetch_assoc($rezultat);
    
    $id_u = $rand['id'];
    $query= "UPDATE dosare SET id_user= $id_u  WHERE numar= $dosar";
    $rez = mysqli_query($db->link,$query);
    
    header("Location:index.php");
    exit();
}