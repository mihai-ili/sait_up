<?php
    session_start();
    require_once('connect.php');
    if(isset($_POST['login']) && isset($_POST['password'])){
        // получение переменых из формы и запись данных в переменые локальные
        $login = $_POST['login'];
        $password = $_POST['password'];
        // берем данные из базы
        $query = "SELECT * FROM `users` WHERE `login`='{$login}' AND `password`='{$password}' LIMIT 1";
        // запускаеи выполненипе запроса и результат в переменые
        $sql = mysqli_query($link, $query) or die(mysqli_error());
        if(mysqli_num_rows($sql)==1){
            // формируем массив
            $row = mysqli_fetch_assoc($sql);
            $_SESSION['name'] = $row['name'];
            $_SESSION['surname'] = $row['surname'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['phone'] = $row['phone'];
            $_SESSION['id']= $row['id_user'];
            $_SESSION['login']= $row['login'];
            $_SESSION['role']= $row['role'];
            echo "<script>alert(\"Вы авторизованы"."\");</script>";
            echo "<script>window.location.href='../index.php'</script>";
        }else{
            echo "<script>alert(\"Неправильный логин или пароль попробуйте снова"."\");</script>";
            echo "<script>window.location.href='../index.php'</script>";
        }
    }
?>