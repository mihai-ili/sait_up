<?php
session_start();
require_once('connect.php');

$id_user = $_SESSION['id'];
$id_kvest = $_GET['id_k']; 
$date = $_POST['date'];
$so = $_POST['so'];

$query = "INSERT INTO `zakaz`(`id_user`, `id_kvest`, `data`, `sop`)  VALUES ('$id_user','$id_kvest','$date','$so')";

if ($link->query($query) === true) {
    echo "<script>alert(\"Вы записаны, следите в личном кабинете за статусом заявки.\");</script>";
    echo "<script>window.location.href='../lk.php'</script>";
} else {
    echo "<script>alert(\"Ошибка\")</script>";
    echo "<script>window.location.href='../okvest.php?id=$id_kvest'</script>";
}
?>