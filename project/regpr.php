<?php
    session_start();
    require_once('connect.php');
    if(isset($_POST['email']) && ($_POST['password'])){ // проверка заполненности полей
        // получение переменых из формы и запись данных в переменые локальные
        $name=$_POST['name'];
        $surname=$_POST['surname'];
        $login=$_POST['login'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        $password =$_POST['password'];

        $query= "INSERT INTO `users`( `name`, `surname`, `login`,`phone`, `email`, `password`) VALUES ('$name','$surname','$login','$phone','$email','$password')";
        if($link ->query($query)===true){
            echo "<script>alert(\"Вы зарегистрированы"."\");</script>";
            echo "<script>window.location.href='../index.php'</script>";  
        }
        else{
            echo "<script>alert(\"Ошибка"."\");</script>";
            echo "<script>window.location.href='../index.php'</script>"; 
        }
       
        
    }
?>