<?php
$page_title = "Квесты Временной хаос";
session_start();
include('header.php');


$sql = "SELECT * FROM kvest INNER JOIN kateg ON kvest.id_kat = kateg.id_kat";
$result = mysqli_query($link, $sql) or die(mysqli_error($link));
?>
<div class="main margin-top">
  <h1 class="color d-flex centr margin-top">Квесты "Временной хаос"</h1>
<div class="cards-container ьфшт">
   <?php while ($row = $result->fetch_assoc()) {
    $category_colors = [
    '1' => '#FFA500', // ярко-оранжевый
    '2' => '#00FF7F', // ярко-зеленый
    '3' => '#FF69B4', // ярко-розовый
    '4' => '#FF4500', // оранжево-красный
    '5' => '#FF1493', // ярко-розовый фуксия
    '6' => '#1E90FF'  // ярко-синий
    ];

    $category_type = $row['id_kat']; 
    $color = $category_colors[$category_type] ?? 'black'; // черный по умолчанию ?>
    <div class="card" style="width: 23rem; display:flex; flex-direction:column; height:100%;">
  <img src="<?php echo $row['foto']; ?>" class="card-img-top" alt="...">
  <div class="card-body" style="flex:1; display:flex; flex-direction:column;">
    <h4 class="card-title"><?php echo $row['name_k']; ?></h4>
    <h6 class="kateg" style="background-color: <?php echo $color; ?>; ?>;">
        <?php echo $row['name_kt']; ?>
    </h6>
    <p class="card-text"><?php echo $row['description']; ?></p>
    <div style="margin-top:auto;">
      <h3>Цена <span class="cena"><?php echo $row['cena']; ?> ₽</span></h3>
      <a href="okvest.php?id=<?php echo $row['id_kvest'];?>" class="btn btn-info">Подробнее</a>
    </div>
  </div>
</div>
   <?php } ?>
</div>
</div>
<?php
include('footer.php');
?>