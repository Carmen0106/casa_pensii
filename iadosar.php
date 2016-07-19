<?php 
include 'config/config.php';
include 'libraries/Database.php';
session_start();

$db = new Database();

$query = "UPDATE dosare SET id_user = {$_SESSION['id']} WHERE  numar = {$_GET['dosar']}"; 
$rezultat= mysqli_query($db->link, $query);
echo $_GET['dosar'];
//sterge din inbox
$querysterge="DELETE FROM inbox WHERE id_dosar={$_GET['dosar']}";
$sterge= mysqli_query($db->link,$querysterge);

//verificam in istoric daca dosarul este luat din inbox
$queryinbox = "SELECT * FROM istoric WHERE id_user = {$_SESSION['id']} AND inbox IS NOT NULL AND inchide IS NULL"; 
$rezultatinbox= $db->select($queryinbox);

//daca e luat din inbox, facem update in tabelul istoric, daca nu e luat din inbox, introducem in istoric
if ($rezultatinbox) {
    $qupdate = "UPDATE istoric SET lucru = NOW() WHERE nr_dosar = {$_GET['dosar']} AND id_user = {$_SESSION['id']} AND inchide IS NULL"; 
    $rezultatup= mysqli_query($db->link, $qupdate);
    }

else {
    //insert nou in tabela istoric
    $queryistoric = "INSERT INTO istoric (nr_dosar, id_user, lucru) VALUES ('{$_GET['dosar']}', '{$_SESSION['id']}', NOW())"; 
    $rezultatistoric= mysqli_query($db->link, $queryistoric);
    }

header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();
