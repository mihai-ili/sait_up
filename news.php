<?php
$page_title = "Новости Временной хаос";
session_start();
include('header.php');
?>
<div class="main">
    <h1 class="color d-flex centr margin-top">Новости "Временной хаос"</h1>
    <!-- запрос и вывод новостей -->
        <?php
      $sql = "SELECT * FROM news ORDER BY id_n DESC";
      $result = $link->query($sql);
      while ($row = $result->fetch_assoc()) {
      ?>
        <div class="card mb-3 margin-top" style="max-width: 1500px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="<?php echo $row['foto']; ?>" class="img-fluid rounded-start" alt="" class="kartimg">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title black"><?php echo $row['name']; ?></h5>
                  <p class="card-text black"><?php echo $row['description']; ?></p>
                </div>
              </div>
            </div>
</div>
<?php } ?>
</div>
<?php
      
include('footer.php');
?>