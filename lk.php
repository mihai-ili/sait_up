<?php
session_start();
include('header.php');
$id_u = $_SESSION['id'];
if(isset($_SESSION['role']) && $_SESSION['role'] === 'user'){
?>
<div class="container my-4">
    <h1 class="text-center mb-4">Привет, <?php echo $_SESSION['name'];?>! Вот твои заявки</h1>
    
    <!-- Таблица заявок с горизонтальной прокруткой на мобильных -->
    <div class="table-responsive mb-5">
        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th scope="col">Название квеста</th>
                    <th scope="col">Цена</th>
                    <th scope="col">Способ оплаты</th>
                    <th scope="col">Дата</th>
                    <th scope="col">Статус</th>
                    <th scope="col">Отзыв</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $sql = "SELECT * FROM zakaz  
                INNER JOIN kvest ON kvest.id_kvest = zakaz.id_kvest 
                INNER JOIN kateg ON kvest.id_kat = kateg.id_kat 
                WHERE zakaz.id_user = $id_u";
                $result = mysqli_query($link, $sql) or die(mysqli_error($link));
                while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <th scope="row"><?php echo $row['name_k'];?></th>
                    <td><?php echo $row['cena'];?></td>
                    <td><?php echo $row['sop'];?></td>
                    <td><?php echo $row['data'];?></td>
                    <td><?php echo $row['status'];?></td>
                        <?php if($row['status']=="Посетил квест"){ ?>
                        <td>
                        <form method="POST" action="project/otzv.php" class="d-flex flex-column">
                            <input type="hidden" name="id" value="<?php echo $row['id_kvest']; ?>" />
                            <input type="hidden" name="id_zakaz" value="<?php echo $row['id_zakaz']; ?>" />
                            <textarea class="form-control mb-2" placeholder="Оставьте отзыв" name="otzv" required></textarea>
                            <button class="btn btn-outline-success btn-sm" type="submit">Отправить</button>
                        </form>
                         </td>
                        <?php }else{ ?>
                        <td>Поле отзыва будет доступно после посещения квеста </td> 
                        <?php } ?>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

    <h1 class="text-center mb-4">Отклики</h1>
    <!-- Таблица откликов с горизонтальной прокруткой -->
    <div class="table-responsive mb-5">
        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th scope="col">Вакансия</th>
                    <th scope="col">Ваш телефон</th>
                    <th scope="col">Ваш email</th>
                    <th scope="col">Статус</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $sql = "SELECT * FROM otk_v 
                INNER JOIN vakans ON vakans.id_v = otk_v.id_v 
                INNER JOIN users ON otk_v.id_user = users.id_user
                WHERE users.id_user=$id_u";
                $result1 = mysqli_query($link, $sql) or die(mysqli_error($link));
                while ($row1 = $result1->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row1['name_v'];?></td>
                    <td><?php echo $row1['phone'];?></td>
                    <td><?php echo $row1['email'];?></td>
                    <td><?php echo $row1['status_o'];?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php
}else{
    echo "<script>window.location.href='index.php'</script>";
}
include('footer.php');
?>