<?php
include 'config/config.php';
include 'libraries/Database.php';
$db = new Database();

//CREATE QUERY TO DB AND PUT RECEIVED DATA INTO ASSOCIATIVE ARRAY
if (isset($_REQUEST['d'])) {
    $query = $_REQUEST['d'];
    $sql = "SELECT * FROM dosare WHERE numar LIKE '%{$query}%'";
    $result = mysqli_query($db->link, $sql);
	$array = array();        
        while($row = mysqli_fetch_assoc($result)) {
         $array[] = array (
            'value' => $row['numar'],
        );
    }

    //RETURN JSON ARRAY
    echo json_encode ($array);
}