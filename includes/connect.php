<?php
$user = "root";
$password = "";
$host = "localhost";
$db = "db_ajaxexample";

$conn = mysqli_connect($host, $user, $password, $db);
mysqli_set_charset($conn, 'utf8');

if (!$conn){
    echo "connection didnt work";
    exit;
}

//echo "connected!";

//get all the car data
// $myQuery = "SELECT * FROM mainmodel";

// $result = mysqli_query($conn, $myQuery);

// $rows = array();

// while($row = mysqli_fetch_assoc($result)){
//     $rows[] = $row;
// }

if (isset($_GET["carModel"])){
    $car = $_GET["carModel"];

    $myQuery = "SELECT * FROM mainmodel WHERE model = '$car'";
    $result = mysqli_query($conn, $myQuery);
    $rows = array();

    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
}
//http://localhost/ajaxexample/includes/connect.php?carModel=R58


//send all data asa jason encode
echo json_encode($rows);



?>