<?php
session_start();
include('header.php');
$id_u = $_SESSION['id'];
if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin'){
?>
<div class="main">
    <h1 class="centr">АДМИН ПАНЕЛЬ</h1>
    <h1 class="centr">Заявки</h1>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Название квеста</th>
            <th scope="col">Участник</th>
             <th scope="col">Почта</th>
            <th scope="col">Цена</th>
            <th scope="col">Способ оплаты</th>
            <th scope="col">Дата</th>
            <th scope="col">Статаус</th>
            <th scope="col">Изменение</th>
            </tr>
        </thead>
        <tbody>
<?php
    $sql = "SELECT * FROM zakaz  
    INNER JOIN kvest ON kvest.id_kvest = zakaz.id_kvest 
    INNER JOIN kateg ON kvest.id_kat = kateg.id_kat
    INNER JOIN users ON users.id_user = zakaz.id_user
    WHERE status != 'Отклонено'";
    $result = mysqli_query($link, $sql) or die(mysqli_error($link));
    while ($row = $result->fetch_assoc()) { ?>
            <tr>
            <th scope="row"><?php echo $row['name_k'];?></th>
           <td><?php echo $row['surname'].' '.$row['name'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['cena'];?></td>
            <td><?php echo $row['sop'];?></td>
            <td><?php echo $row['data'];?></td>
            <td><?php echo $row['status'];?></td>
            <?php $id_z =  $row['id_zakaz'];?>
              <td class="d-flex">
                    <form class="d-flex " role="search" method="POST" action="project/status.php?id=<?php echo $id_z; ?>">
                        <select class="form-select" aria-label="Default select example" name="status">
                            <option value="Записан">Записан</option>
                            <option value="Отклонено">Отклонено</option>
                            <option value="Посетил квест">Посетил квест</option>
                        </select>
                        <button class="btn btn-outline-success margin-left" type="submit">Изменить</button>
                    </form>
                </td>
            </tr>
    <?php
    }
    ?>
        </tbody>
        </table>

 <h1 class="centr">Отзывы на проверку</h1>
        <table class="table">
        <thead>
            <tr>
            <th scope="col">Участник</th>
            <th scope="col">Название квеста</th>
            <th scope="col">Отзыв</th>
            <th scope="col">Статус</th>
            <th scope="col">Изменить</th>
            </tr>
        </thead>
        <tbody>
<?php
    $sql = "SELECT * FROM otzv 
    INNER JOIN users ON users.id_user = otzv.id_user 
    INNER JOIN kvest ON kvest.id_kvest = otzv.id_kv
    WHERE status != 'Отклонено'";
    $result1 = mysqli_query($link, $sql) or die(mysqli_error($link));
    while ($row1 = $result1->fetch_assoc()) { ?>
            <tr>
            <th scope="row"><?php echo $row1['name'];?></th>
            <td><?php echo $row1['name_k'];?></td>
            <td style="width: 800px;"><?php echo $row1['text'];?></td>
            <td><?php echo $row1['status'];?></td>
            <?php $id_o =  $row1['id_otzv'];?>
              <td class="d-flex">
                    <form class="d-flex " role="search" method="POST" action="project/otzvstatus.php?id=<?php echo $id_o; ?>">
                        <select class="form-select" aria-label="Default select example" name="status">
                            <option value="Подтвержденно">Подтвержденно</option>
                            <option value="Отклонено">Отклонено</option>
                        </select>
                        <button class="btn btn-outline-success margin-left" type="submit">Изменить</button>
                    </form>
                </td>
            </tr>
    <?php
    }
    ?>
        </tbody>
        </table>

        <h1 class="centr">Отклики</h1>
        <table class="table">
        <thead>
            <tr>
            <th scope="col">Имя</th>
            <th scope="col">Вакансия</th>
            <th scope="col">Телефон</th>
            <th scope="col">Email</th>
            <th scope="col">Статус</th>
            <th scope="col">Изменить</th>
            </tr>
        </thead>
        <tbody>
<?php
    $sql = "SELECT * FROM otk_v 
    INNER JOIN vakans ON vakans.id_v = otk_v.id_v 
    INNER JOIN users ON otk_v.id_user = users.id_user
    WHERE status_o != 'Отклонено'";
    $result1 = mysqli_query($link, $sql) or die(mysqli_error($link));
    while ($row1 = $result1->fetch_assoc()) { ?>
            <tr>
            <th scope="row"><?php echo $row1['name'];?></th>
            <td><?php echo $row1['name_v'];?></td>
            <td><?php echo $row1['phone'];?></td>
            <td><?php echo $row1['email'];?></td>
            <td><?php echo $row1['status_o'];?></td>
            <?php $id_o =  $row1['id_otk'];?>
              <td class="d-flex">
                    <form class="d-flex " role="search" method="POST" action="project/statusotk.php?id=<?php echo $id_o; ?>">
                        <select class="form-select" aria-label="Default select example" name="status">
                            <option value="Отклонено">Отклонено</option>
                            <option value="Приглашение на собеседование">Приглашение на собеседование</option>
                        </select>
                        <button class="btn btn-outline-success margin-left" type="submit">Изменить</button>
                    </form>
                </td>
            </tr>
    <?php
    }
    ?>
        </tbody>
        </table>
</div>
<?php
}else{
     echo "<script>window.location.href='index.php'</script>";
}
include('footer.php');
?>