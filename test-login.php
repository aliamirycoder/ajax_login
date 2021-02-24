<?php
session_start();
require_once 'connect.php';
$password = "";
$qury = "SELECT * FROM person where code=".$_GET['name'];
mysqli_query($db, "SET NAMES utf8");
$result = $db->query($qury);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_array()) {
        if ($_GET['password'] == $row['password']){
            echo "truepassword";
            $_SESSION['id']=$row['key'];
            $_SESSION['side']=$row['side'];
            $_SESSION['name']=$row['name'];
            $_SESSION['family']=$row['family'];
            $_SESSION['code']=$row['code'];
            $_SESSION['second']=$row['secondsid'];
        }
        else{
             echo "wrongpassword";
        }
    }
}
else{
    echo "no-mojod";
}