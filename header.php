<?php require_once('project/connect.php');?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        if (isset( $page_title)) {
            echo  $page_title;
        } else {
            echo 'Временной Хаос Борисоглебск';
        }
        ?>
    </title>
    <?php
    if (isset($page_title)) {
        switch ($page_title) {
            case 'Временной Хаос Борисоглебск':
                echo '<meta name="keywords" content="Квесты в борисоглебске, Временной хаос борисоглебск, Развлечения в борисоглебске, сценарии квестов Временной хаос, командные квесты, квесты в прошлое, квесты в будущее, квесты машина времени">';
                break;
            case 'Квесты Временной Хаос':
                echo '<meta name="keywords" content="Квесты временной хаос, квесты в прошлое, квесты в будущее, квесты машина времени, Квесты, Временной хаос, Квесты в борисоглебске, Временной хаос борисоглебск, Развлечения в борисоглебске, сценарии квестов Временной хаос, командные квесты, квесты в прошлое, квесты в будущее, квесты машина времени ">';
                break;
            case 'Новости Временной Хаос':
                echo '<meta name="keywords" content="Новости временной хаос, Вакансии временной хаос">';
                break;
            case 'Вакансии Временной Хаос':
                echo '<meta name="keywords" content="Вакансии временной хаос, сценарии квестов Временной хаос">';
                break;
            default:
                echo '<meta name="keywords" content="Квесты в борисоглебске, Временной хаос борисоглебск, Развлечения в борисоглебске, сценарии квестов Временной хаос, командные квесты, квесты в прошлое, квесты в будущее, квесты машина времени">';
                break;
        }
    } else {
        echo '<meta name="keywords" content="Квесты, Временной хаос, Квесты в борисоглебске, Временной хаос борисоглебск, Развлечения в борисоглебске, сценарии квестов Временной хаос, командные квесты, квесты в прошлое, квесты в будущее, квесты машина времени">';
    }
    ?>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function(m,e,t,r,i,k,a){
        m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();
        for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
        k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)
    })(window, document,'script','https://mc.yandex.ru/metrika/tag.js?id=105350756', 'ym');

    ym(105350756, 'init', {ssr:true, webvisor:true, clickmap:true, ecommerce:"dataLayer", accurateTrackBounce:true, trackLinks:true});
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/105350756" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a href="index.php"><img src="img/logo.svg" alt="логотип"></a>
        <a class="navbar-brand margin-left" href="index.php">Временной Хаос</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active margin-left" aria-current="page" href="index.php">Главная</a>
            </li>
            <li class="nav-item">
            <a class="nav-link margin-left" href="kvest.php">Квесты</a>
            </li>
            <li class="nav-item">
            <a class="nav-link margin-left" href="news.php">Новости</a>
            </li>
            <li class="nav-item">
            <a class="nav-link margin-left" href="vakansy.php">Вакансии</a>
            </li>
             <li class="nav-item">
            <a class="nav-link margin-left" href="#cont">Контакты</a>
            </li>
        </ul>
        <?php
                if(isset($_SESSION['role'])){
                 if ($_SESSION['role'] == "user") {?>
                 <form class="d-flex margin-left top" role="search" action="lk.php">
                  <button class="btn btn-outline-success " type="submit">Профиль</button>
                </form>
                 <form class="d-flex margin-left top" role="search" action="project/out.php">
                    <button class="btn btn-outline-success " type="submit">Выход</button>
                </form>
                <?php
              }elseif($_SESSION['role']=="admin") {?>
              <form class="d-flex margin-left top" role="search" action="admin.php">
                  <button class="btn btn-outline-success " type="submit">АДМИН</button>
                </form>
              <form class="d-flex margin-left top" role="search" action="project/out.php">
                    <button class="btn btn-outline-success " type="submit">Выход</button>
                </form>
                <?php }else{
                ?>
              <form class="d-flex margin-left top" role="search" action="project/out.php">
                    <button class="btn btn-outline-success " type="submit">Выход</button>
                </form>
                <form cclass="d-flex margin-left top" role="search" action="admin.php">
                  <button class="btn btn-outline-success " type="submit">Модератор</button>
                  </form>
                <?php
              }
              }else{   ?>
        <form class="d-flex margin-left top" role="search">
            <button class="btn btn-outline-success" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Вход</button>
        </form>
        <form class="d-flex margin-left top" role="search">
            <button class="btn btn-outline-success" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal1">Регистрация</button>
        </form>
         <?php 
                   } ?>
        </div>
    </div>
    </nav>
    <!-- Модальное окно автоизации -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Авторизация</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                        </div>
                        <div class="modal-body">
                        <form action="project/logpr.php" method="POST" >
                           <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Логин</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="login" required>
                            </div>
                          <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Пароль</label>
                              <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                          </div>
                          <button type="submit" class="btn btn-primary knopka">Войти</button>
                        </form>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal1">Создать аккаунт</a> <br>
                        <a href="#" data-bs-toggle="popover" data-bs-title="Забыли пароль?" data-bs-content="Очень-очень жаль :-(">Забыли пароль?</a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Модальное окно аврегистрации -->
                  <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Регистрация</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                        </div>
                        <div class="modal-body">
                        <form action="project/regpr.php" method="POST" >
                             <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Имя</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Фамилия</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="surname" required>
                            </div>
                             <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Логин</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="login" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Телефон</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="phone" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
                                <div id="emailHelp" class="form-text">Мы не сообщвем вашу почту стороним лицам.</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Пароль</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary knopka" name="submit">Зарегистрироваться</button>
                            </form>
                             <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Уже есть аккаунт?</a><br>
                        <a href="#" data-bs-toggle="popover" data-bs-title="Забыли пароль?" data-bs-content="Очень-очень жаль :-(">Забыли пароль?</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <script>
                    document.addEventListener('DOMContentLoaded', function () {
                      var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
                      var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
                        return new bootstrap.Popover(popoverTriggerEl);
                      });
                    });
                  </script>