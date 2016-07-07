<?php
include 'config/config.php';
include 'libraries/Database.php';
$db = new Database();
//$servername = "localhost";
//$username = "root";
//$password = "root";
//$dbname = "casa_pensii";

// Create connection
//$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
//if (!$conn) {
 //   die("Connection failed: " . mysqli_connect_error());
//}

//CREATE QUERY TO DB AND PUT RECEIVED DATA INTO ASSOCIATIVE ARRAY
if (isset($_REQUEST['query'])) {
    $query = $_REQUEST['query'];
    $sql = "SELECT * FROM useri WHERE username LIKE '%{$query}%'";
    $result = mysqli_query($db->link, $sql);
	$array = array();        
        while($row = mysqli_fetch_assoc($result)) {
         $array[] = array (
            'value' => $row['username'],
        );
    }
        
  //      while($row = $sql->fetch_assoc()) {
  //       $array[] = array (
  //          'value' => $row['username'],
 //       );
 //   }
        
        
//    while ($row = mysql_fetch_array($sql)) {
  //      $array[] = array (
  //          'value' => $row['username'],
 //       );
 //   }
    //RETURN JSON ARRAY
    echo json_encode ($array);
}