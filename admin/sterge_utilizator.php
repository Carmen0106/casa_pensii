<?php 
include '../config/config.php';
include '../libraries/Database.php';
session_start();

if ($_SESSION['tip'] == 2) {
$db = new Database();
$userid = $_POST['iduser'];
$queryuser = "SELECT activ FROM useri WHERE id = '{$userid}'"; 
$userul = $db->select($queryuser);
$row = $userul->fetch_assoc();

if ($row['activ']==1) {
    //trecem activ pe 0
    $query1 = "UPDATE useri SET activ = '0' WHERE id = '$userid'"; 
    mysqli_query($db->link, $query1);
    
    //eliberam dosarele pe care le avea in lucru - in tabelul dosare
    $query2 = "UPDATE dosare SET id_user = '0' WHERE id_user = '$userid'"; 
    mysqli_query($db->link, $query2);
    
    //stergem inboxul lui
    $query5 = "DELETE FROM inbox WHERE id_receiver = {$userid}"; 
    mysqli_query($db->link, $query5);
    
    //inchidem dosarele deschise in tabelul istoric
    $query3 = "UPDATE istoric SET inchide = NOW() WHERE id_user= {$userid} AND inchide IS NULL"; 
    mysqli_query($db->link, $query3);   
}
else { //daca activam userul
    //trecem activ pe 0
    $query4 = "UPDATE useri SET activ = '1' WHERE id = '$userid'"; 
    mysqli_query($db->link, $query4);
}

header ('location: ../utilizatori.php');
}
else { 
    header ('location: ../index.php');
}