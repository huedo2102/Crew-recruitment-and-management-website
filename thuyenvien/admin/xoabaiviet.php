<?php
include '../include/connection.php';
?>
<?php 

    $p_id = $_GET["id"]; 
    $p_cat = $_GET["category"];


        $select_no_of_post_per_cat = "SELECT * FROM danhmuc WHERE tendanhmuc  = '$p_cat' ";
        $result_post = mysqli_query($conn , $select_no_of_post_per_cat);

        if($result_post){
            while( $rows = mysqli_fetch_assoc($result_post) ){
                $no_of_post = $rows["sobaiviet"];
                $no_of_post -= 1;
            }
            // update no of post in post_category
            $update = "UPDATE danhmuc SET sobaiviet = '$no_of_post' WHERE tendanhmuc = '$p_cat' ";
            $result_update = mysqli_query( $conn , $update);
        }

        $delete_cat = "DELETE FROM baiviet WHERE id = '$p_id' ";
        $result = mysqli_query($conn , $delete_cat);
        if($result ){
            header("Location: quanlytieude.php?delete-success");
        }


?>