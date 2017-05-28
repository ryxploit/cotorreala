<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 14/05/2017
 * Time: 12:12 PM
 */

$servername = "localhost";
$username = "u234618_karlos";
$password = "p38DaazwD7Gr";
$dbname = "u234618_karlosleon";

// create connection
$connect = new mysqli($servername, $username, $password, $dbname);

// check connection
if($connect->connect_error) {
    die("Connection Failed : " . $connect->connect_error);
} else {
    // echo "Successfully Connected";
}
?>
