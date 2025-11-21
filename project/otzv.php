<?php
session_start();
require_once('connect.php');

$id_user = $_SESSION['id'];
$id_kvest = $_POST['id']; 
$text = $_POST['otzv'];
$id_zakaz = $_POST['id_zakaz'];

$query = "INSERT INTO `otzv`(`id_user`, `id_kv`, `text`) VALUES ('$id_user','$id_kvest','$text')";
$query1 = "UPDATE `zakaz` SET `status`='Оставлен отзыв' WHERE id_zakaz = $id_zakaz";

$result1 = $link->query($query);
$result2 = $link->query($query1);

if ($result1) {
    // Можно проверить и второй запрос, хотя он не обязательно должен быть успешным для сообщения
    echo "<script>alert('Отзыв отправлен, он появится как только администратор одобрит его.');</script>";
    echo "<script>window.location.href='../lk.php'</script>";
} else {
    echo "<script>alert('Ошибка при отправке отзыва');</script>";
    echo "<script>window.location.href='../lk.php'</script>";
}
?>