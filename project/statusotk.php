    <?php
    session_start();
    require_once('connect.php');
    if(isset($_POST['status'])){ 
        $id=$_GET['id'];
        $status=$_POST['status'];
        

        $query= "UPDATE `otk_v` SET `status_o`='$status' WHERE id_otk = $id";
        if($link ->query($query)===true){
            echo "<script>alert(\"Статус изменен"."\");</script>";
            echo "<script>window.location.href='../admin.php'</script>";  
        }
        else{
            echo "<script>alert(\"Ошибка"."\");</script>";
            echo "<script>window.location.href='../admin.php'</script>"; 
        }
       
        
    }
?>