<?php
include 'config/config.php';
include 'libraries/Database.php';
$db = new Database();


//CREATE QUERY TO DB AND PUT RECEIVED DATA INTO ASSOCIATIVE ARRAY
if (isset($_REQUEST['query'])) {
    $query = $_REQUEST['query'];
    $sql = "SELECT * FROM useri WHERE username LIKE '%{$query}%' AND activ = '1'";
    $result = mysqli_query($db->link, $sql);
	$array = array();        
        while($row = mysqli_fetch_assoc($result)) {
         $array[] = array (
            'value' => $row['username'],
             'id' => $row['id'],
        );
    }
        
  
    //RETURN JSON ARRAY
    echo json_encode ($array);
}