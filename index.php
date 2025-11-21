<?php
session_start();
include('header.php');
?>
<div class="main">
    <h1 class="centr">"Путешествуй сквозь эпохи — разгадывай тайны прошлого и будущего!"</h1>
    <!-- слайдер -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="img/1.png" class="d-block w-100" alt="фото слайдера">
        </div>
        <div class="carousel-item">
        <img src="img/2.png" class="d-block w-100" alt="фото слайдера">
        </div>
        <div class="carousel-item">
        <img src="img/3.png" class="d-block w-100" alt="фото слайдера">
        </div>
        <div class="carousel-item">
        <img src="img/4.png" class="d-block w-100" alt="фото слайдера">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>
    <div class="fon tb">
        <div class="main">
            <h2 class="centr">Добро пожаловать в мир временного хаоса! Временной хаос - это развлечения в борисоглебске</h2>

            <p>Ты готов погрузиться в захватывающее приключение, где время играет против тебя? В нашем квесте «Временной хаос» ты станешь героем, которому предстоит раскрыть тайны разрушенного времени и восстановить баланс между прошлым, настоящим и будущим.
            <br>
            Что тебя ждет:
            <br>
            <ul>
                <li>Захватывающий сюжет, полный загадок и неожиданных поворотов</li>
                <li>Уникальные задания, связанные с управлением временем</li>
                <li>Атмосферные локации, погружающие в атмосферу временных парадоксов</li>
                <li>Командные квесты</li>
                <li>Осмелишься ли ты вступить в борьбу с временным хаосом?</li>
            </ul>
            <br>
            Собери команду, раскрой тайны и верни время в нужное русло! Погрузись в приключение, которое заставит тебя задуматься о ценности каждого мгновения.
            <br>
            Забронируйте квест прямо сейчас и станьте героем своего времени!</p>
            <div class="d-flex align-items-center">
                <a href="kvest.php" class="btn btn-primary sered">К квестам</a>
            </div> 
                
        </div>
        </div>
        <div class="card mb-3">
            <img src="img/gold-rush.jpg" class="card-img-top" alt="..." style="max-height: 50vh; object-fit: cover;">
            <div class="card-body">
                <h5 class="card-title">Постоянные клиенты становятся частью нашей команды — ТаймТворцами.</h5>
                <p class="card-text">ТаймТворцы — это команда профессионалов, создающих сценарии квестов "Временной хаос", погружающие участников в загадочный мир временных парадоксов и исторических саг. Мы объединяем страсть к истории, инновационные идеи и технологичные решения, чтобы каждый наш проект стал незабываемым путешествием во времени.</p>
            </div>
        </div>
        <div class="fon tb">
        <div class="main">
            <h2 class="centr">Инновационные квесты в Борисоглебске</h2>

            <p>Квесты, разработанные компанией "Временной хаос", представляют собой инновационный формат интерактивного взаимодействия, основанный на принципах нелинейного повествования и когнитивного диссонанса. Эти квесты, как правило, включают в себя элементы временной механики, что позволяет игрокам переживать альтернативные исторические сценарии и альтернативные реальности.
            <br><br>
            Квесты от "Временного хаоса" обладают уникальной способностью к интеграции с мультимедийными технологиями, что значительно обогащает игровой опыт. Использование виртуальной и дополненной реальности, а также искусственного интеллекта, позволяет создавать иммерсивные среды, где игроки могут взаимодействовать с историческими персонажами и событиями на новом уровне.
            <br><br>
            Компания уделяет особое внимание методологической проработке своих квестов, что включает в себя тщательное исследование исторических источников, адаптацию научных концепций и разработку психологически обоснованных сценариев. Это позволяет не только развлекать, но и обучать игроков, стимулируя их к критическому мышлению и расширению исторического кругозора.</p>
                
        </div>
        </div>
        <h2 class="centr">Отзывы</h2>
        <div class="row d-flex flex-wrap">
            <?php
            $sql = "SELECT * FROM otzv 
                    INNER JOIN users ON users.id_user = otzv.id_user 
                    INNER JOIN kvest ON kvest.id_kvest = otzv.id_kv
                    WHERE status = 'Подтвержденно'
                    ORDER BY id_otzv DESC LIMIT 3";
            $result = $link->query($sql);
            while ($row = $result->fetch_assoc()): ?>
                <div class="col-sm-6 mb-3 mb-sm-0 d-flex">
                    <div class="card h-100 w-100 card1">
                        <div class="card-body d-flex flex-column">
                            <h4 class="card-title"><?php echo $row['name'];?></h4>
                            <h5 class="card-title"><?php echo $row['name_k'];?></h5>
                            <p class="card-text"><?php echo $row['text'];?></p>
                            <a href="okvest.php?id=<?php echo $row['id_kv'];?>" class="btn btn-outline-info">О чем это?</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        </div>
<?php
include('footer.php');
?>