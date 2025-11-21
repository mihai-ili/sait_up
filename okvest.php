<?php
session_start();
include('header.php');
$id= $_GET['id'];
$sql = "SELECT * FROM kvest INNER JOIN kateg ON kvest.id_kat = kateg.id_kat WHERE `id_kvest` = $id";
$result = mysqli_query($link, $sql) or die(mysqli_error($link));
 while ($row = $result->fetch_assoc()) {
?>
<div class="main margin-top">
    <h1 class="color d-flex centr margin-top"><?php echo $row['name_k']; ?></h1>
    <div class="kvest-layout margin-top">
            <div class="kvest-layout-card">
                <?php
                    $category_colors = [
                    '1' => 'rgba(200, 212, 63, 1)',
                    '2' => 'rgba(3, 159, 133, 1)',
                    '3' => 'rgba(22, 184, 254, 1)',
                    '4' => 'rgba(0, 133, 18, 1)',
                    '5' => 'rgba(154, 16, 204, 1)',
                    '6' => 'rgba(255, 0, 238, 1)',
                    ];

                    $category_type = $row['id_kat']; 
                    $color = $category_colors[$category_type] ?? 'black'; ?>
                    <div class="card kvest-card">
                <img src="<?php echo $row['foto']; ?>" class="card-img-top" alt="...">
                <div class="card-body kvest-card-body">
                    <h6 class="kateg" style="background-color: <?php echo $color; ?>;">
                        <?php echo $row['name_kt']; ?>
                    </h6>
                    <p class="card-text"><?php echo $row['description']; ?></p>
                    <div style="margin-top:auto;">
                    <h3>Цена <span class="cena"><?php echo $row['cena']; ?> ₽</span></h3>
                     <?php
                        if(isset($_SESSION['role'])){
                        ?>
                    <a href="okvest.php?id=<?php echo $row['id_kvest'];?>" class="btn btn-outline-success" type="button" data-bs-toggle="modal" data-bs-target="#zakaz">Записаться</a>
                     <?php
                        }else{?>
                           <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Чтобы записаться нужно авторизоваться</a>
                        <?php }
                        ?>
                    </div>
                </div>
                </div>
                
            </div>
                <div class="kvest-layout-description">
                  <p><?php echo $row['more'];?></p>
                </div>
                <!-- Модальное окно записи -->
                  <div class="modal fade" id="zakaz" tabindex="-1" aria-labelledby="zakaz" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Запись на квест <?php echo $row['name_k']; ?></h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                        </div>
                        <div class="modal-body">
                        <form action="project/zakaz.php?id_k=<?php echo $id; ?>" method="POST" >
                           <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Выберите дату</label>
                                <input type="date" class="form-control" id="exampleInputPassword1" name="date" required>
                            </div>
                            <label for="exampleInputPassword1" class="form-label">Способ оплаты</label>
                            <select class="form-select" aria-label="Default select example" name="so">
                              <option value="Наличными">Наличными</option>
                              <option value="Переводом">Переводом</option>
                            </select>
                          <button type="submit" class="btn btn-primary knopka margin-top">Записаться</button>
                        </form>
                        </div>
                      </div>
                    </div>
                  </div>
<!-- конец окна  -->
                <?php } ?>
            <div>
            </div>
    </div>
        <h2 class="centr">Отзывы</h2>
            <div class="row">
                <?php
                        $sql = "SELECT * FROM otzv 
                        INNER JOIN users ON users.id_user = otzv.id_user 
                        INNER JOIN kvest ON kvest.id_kvest = otzv.id_kv
                        WHERE status = 'Подтвержденно' AND `id_kv` = $id";
                        $result = $link->query($sql);
                        while ($row = $result->fetch_assoc()): ?>
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $row['name'];?></h4>
                        <h5 class="card-title"><?php echo $row['name_k'];?></h5>
                        <p class="card-text"><?php echo $row['text'];?></p>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
    </div> 
</div>



<?php
include('footer.php');
?>