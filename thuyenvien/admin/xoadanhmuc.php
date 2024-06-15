<?php
include '../include/connection.php';
?>
<?php 
    $c_id = $_GET["id"]; 


        $delete_cat = "DELETE FROM danhmuc WHERE id = '$c_id' ";
        $result = mysqli_query($conn , $delete_cat);
        if($result ){
            header("Location: quanlydanhmuc.php?delete-success");
        }


?>