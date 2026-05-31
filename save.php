<?php
include "connect.php";
if(isset($_GET['distance'])){

    $distance=$_GET['distance'];

    $conn->query("INSERT INTO zoteste(distance)VALUES('$distance')");
}

?>