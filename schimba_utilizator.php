<?php 
include 'config/config.php';
include 'libraries/Database.php';
session_start();
$db = new Database();
$dosar = $_POST['dosar'];

if(isset($_POST['schimba'])){
    
    //query pentru a inchide dosarul in tabela istoric (pentru userul care a trimis dosarul)
    $queryinchide= "UPDATE istoric SET inchide = NOW() WHERE nr_dosar = $dosar AND id_user= {$_SESSION['id']} AND inchide IS NULL";
    $rezinchide = mysqli_query($db->link,$queryinchide);
    
    //query pt a identifica id userului caruia i se trimite dosarul
    $nume = $_POST['nume'];
    $cauta_user = "SELECT * FROM useri WHERE username= '$nume'";
    $rezultat = mysqli_query($db->link, $cauta_user);
    $rand= mysqli_fetch_assoc($rezultat);
    
    //se sterge inregistrarea din dosare in lucru
    $query3= "UPDATE dosare SET id_user= 0  WHERE numar= $dosar";
    $rez = mysqli_query($db->link,$query3);
    
    //se insereaza in inboxul primitorului datele dosarului
    $id_sender = $_SESSION['id'];
    $id_receiver = $rand['id'];
    $query2= "INSERT INTO inbox(id_sender,id_receiver,id_dosar)VALUES($id_sender,$id_receiver,$dosar)";
    $rezultat2 = $db->insert($query2);
    
    //se creeaza o inregistrare noua in tabela istoric cu datele noului user
    $querynou= "INSERT INTO istoric (nr_dosar, id_sender, id_user, inbox) VALUES ($dosar, $id_sender, $id_receiver, NOW())";
    $reznou = mysqli_query($db->link,$querynou);
    
    header("Location:index.php");
    exit();
    
    }
 else {       
    header("Location:index.php");
    exit();
 }