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
 

$sql = "SELECT * FROM danhmuc";
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
    <div ><h4>Quản lý danh mục bài viết</h4></div>
    <form action="themdanhmuc.php" method="get">
        <input class="btn info" style="margin-left: 50px;" type="submit" value="Thêm mới" >
    </form><br>
    <table style="width:100%" >
    <tr >
        <th>Số TT</th>
        <th>Tên danh mục</th>
        <th>Số bài viết</th>
        <th>Thao tác</th>
    </tr>
    <?php 
    
    if( mysqli_num_rows($result) > 0){
        while( $rows = mysqli_fetch_assoc($result) ){
            $c_name= $rows["tendanhmuc"];
            $no_of_post = $rows["sobaiviet"];
            $c_id = $rows["id"];
            ?>
        <tr>
        <td><?php echo "{$i}"; ?></td>
        <td> <?php echo ucwords($c_name) ; ?></td>
        <td><?php echo $no_of_post; ?></td>
        <td>   <?php
                $edit_icon = "<a href='suadanhmuc.php?id={$c_id}' > <span ><i class='fa fa-edit '></i></span> </a>";
                $delete_icon = " <a href='xoadanhmuc.php?id={$c_id}' id='bin' onclick='return confirm(\"Bạn có chắc chắn muốn xóa danh mục này không?\")'> <span ><i class='fa fa-trash '></i></span> </a>";
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