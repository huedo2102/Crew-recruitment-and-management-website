<?php
include '../include/connection.php';
?>
<?php
include 'lib/session.php';
Session::checkSession();
$role_id = Session::get('chucnang');
$taikhoan = Session::get('userId');
// Kiểm tra xem session 'chucnang' có tồn tại không
// Khởi tạo biến flag
$all_ones = false;
if (isset($role_id)) {
    // Lặp qua mảng 'chucnang' và in ra từng giá trị
    foreach ($role_id as $giatri) {
        // Kiểm tra nếu giá trị không phải là 1
        if ($giatri == '1') {
            // Nếu có ít nhất một giá trị là 1, đặt biến flag là false và thoát vòng lặp
            $all_ones = true;
            break;
        }
    }
    if($all_ones == false){
        echo "<script>alert('Bạn không có quyền truy cập vào chức năng này!');window.location = 'index.php';</script>";
    }
} else {
    echo "<script>alert('Bạn không có quyền truy cập vào chức năng này!');window.location = 'index.php';</script>";
}
?>
<?php 

$sql = "SELECT * FROM baiviet ORDER BY id DESC ";
$result = mysqli_query($conn , $sql);

$i = 1;

?>

<?php include_once 'lib/header.php';?>

<style>
table, th, td {
  border: 1px solid black;
  padding: 15px;
}
table {
  border-spacing: 10px;
}
</style>
<div class="container-fluid">
    <div > 
    <div ><h4>Quản lý bài viết</h4></div>
    <form action="themtieude.php" method="get">
        <input class="btn info" style="margin-left: 50px;" type="submit" value="Thêm mới" >
    </form><br>
    <table style="width:100%" >
    <tr >
        <th>STT</th>
        <th>Tiêu đề bài viết</th>
        <th>Mô tả tiêu đề</th>
        <th>Ảnh mô tả</th>
        <th>Nội dung bài viết</th>
        <th>Ảnh nội dung</th>
        <th>Thao tác</th>
    </tr>
    <?php 
    
    if( mysqli_num_rows($result) > 0){
        while( $rows = mysqli_fetch_assoc($result) ){
            $p_heading= $rows["tieude"];
            $p_description = $rows["motangan"];
            $p_thumbnail = $rows["anhmota"];
            $p_id = $rows["id"];
            $p_cat = $rows["danhmuc"];
            $ndbaiviet = $rows["ndbaiviet"];
            $anhbaiviet = $rows["anhbaiviet"];
            ?>
        <tr>
        <td><?php echo "{$i}."; ?></td>
        <td> <?php echo ucwords($p_heading) ; ?></td>
        <td><?php echo $p_description; ?></td>
        <td> 
            <?php
            if (!empty($p_thumbnail)) {
                echo '<img src="../upload/thumbnail/' . htmlspecialchars($p_thumbnail, ENT_QUOTES, 'UTF-8') . '" style="height:70px">';
            } ?>
    
        </td>
        <td>
        <?php 
            if( strlen($ndbaiviet) < 100){
                echo $ndbaiviet;
            }else{
                $add_3_dots = "...";
                $ndbaiviet = substr($ndbaiviet , 0 , 200); 
                echo $ndbaiviet, $add_3_dots ;
            }
        ?>
    
        </td>
        <td>
        <?php
            if (!empty($anhbaiviet)) {
                echo '<img src="../upload/carousel/' . htmlspecialchars($anhbaiviet, ENT_QUOTES, 'UTF-8') . '" style="height:70px">';
            } ?>
        
        
        </td>
        <td>   <?php
                $edit_icon = "<a href='suatieude.php?id={$p_id}' > <span ><i class='fa fa-edit '></i></span> </a>";
                $delete_icon = " <a href='xoabaiviet.php?id={$p_id}&category={$p_cat}' id='bin' onclick='return confirm(\"Bạn có chắc chắn muốn xóa bài viết này không?\")'> <span ><i class='fa fa-trash '></i></span> </a>";
                echo   $delete_icon . $edit_icon;
             ?> 
        </td>   
        
    <?php 
            $i++;
            }
        }else{
        echo "no category found";
        }
    ?>
     </tr>
    </table>
    </div>

<script src="js/script.js"></script>
<script>
   
</script>
<?php include_once 'lib/footer.php';?>