<?php
$conn=mysqli_connect("localhost","root","","mblezege");
$id=$_GET['id'];
$conn->query("DELETE FROM zoteste WHERE id='$id'");
header("location:dashboard.php");
?>