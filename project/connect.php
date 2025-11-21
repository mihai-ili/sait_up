<!-- подключение к бд -->
<?php
$host = "localhost";
$bd = "aaaabbrp_1";
$user = "aaaabbrp_1";
$password = "aaaabbrp_11";
$link = mysqli_connect($host,$user,$password,$bd);
$query = "set names utf8";
$link->query($query);
?>