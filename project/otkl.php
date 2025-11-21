<?php
session_start();
require_once('connect.php');

$id_user = $_SESSION['id'];
$id_v = $_GET['id_v']; 
$phone = $_SESSION['phone'];
$email = $_SESSION['email'];

try {
    $query = "INSERT INTO `otk_v`(`id_v`, `id_user`, `phone`, `email`) VALUES ('$id_v','$id_user','$phone','$email')";
    $link->query($query);
    echo "<script>alert(\"Ваш отклик отправлен.\");</script>";
    echo "<script>window.location.href='../lk.php'</script>";
} catch (mysqli_sql_exception $e) {
    echo "<script>alert(\"Ошибка.\");</script>";
        echo "<script>window.location.href='../vakansy.php'</script>";
}
?>