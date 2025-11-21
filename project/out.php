<?php
session_start(); // запускаем сессию
session_unset(); // очищаем все переменные сессии
session_destroy(); // уничтожаем сессию

// перенаправляем пользователя на страницу входа или главную
header("Location: ../index.php");
exit();
?>