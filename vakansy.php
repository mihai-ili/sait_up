<?php
$page_title = "Вакансии Временной хаос";
session_start();
include('header.php');
?>
<div class="main">
    <h1 class="color d-flex centr margin-top">Вакансии "Временной хаос"</h1>
    <div class="container">
        <div class="row d-flex flex-wrap">
        <?php
        $sql = "SELECT * FROM vakans";
        $result = $link->query($sql);
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="col-md-6 d-flex mb-4">
                <div class="card d-flex flex-column h-100 w-100 card1">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title black"><?php echo $row['name_v']; ?></h5>
                        <p class="card-text black"><?php echo $row['description_v']; ?></p>
                        <h3>ЗП <span class="cena"><?php echo $row['zp']; ?> ₽</span></h3>
                        <?php
                        if(isset($_SESSION['role'])){
                        ?>
                        <a href="project/otkl.php?id_v=<?php echo $row['id_v']; ?>" class="btn btn-info">Откликнутся</a>
                        <?php
                        }else{?>
                           <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Чтобы откликнутся нужно авторизоваться</a>
                        <?php }
                        ?>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
        </div>
    </div>
</div>
<?php
include('footer.php');
?>
