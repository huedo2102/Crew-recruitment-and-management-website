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

        $category_error = $category =  "";
    if( $_SERVER["REQUEST_METHOD"] == "POST"){
       
        if(empty($_REQUEST["cat_name"])){
            $category_error = "<p style='color:red'> * Vui lòng điền thông tin!</p>";
        }else {
          $category = $_REQUEST["cat_name"];
        }

        if( !empty($category) ){
            // database connection 
            //require_once "include/connection.php";
            $cat_select = "SELECT * FROM danhmuc WHERE tendanhmuc = '$category' ";
            $result = mysqli_query($conn , $cat_select);

            if( mysqli_num_rows($result) > 0 ){
                $category_error =  "<p style='color:red'>* Tên danh mục đã tồn tại! </p>";
            }else{
                $category = ucwords($category);
                $add_cat = "INSERT INTO danhmuc( tendanhmuc ) VALUES( '$category' ) ";
                $add = mysqli_query( $conn , $add_cat );
                if($add){
                    echo "<script>window.location = 'quanlydanhmuc.php';</script>";
                }
            }
        }
    }
?>



<?php include_once 'lib/header.php';?>

<body onload="closeNav()">
<div class="container-fluid">                       
    <h4 >Thêm danh mục bài viết</h4>
    <form method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <div class="form-group">
            <label >Tên danh mục :</label>
            <input type="text" class="form-control"   name="cat_name" >
            <?php echo $category_error; ?>
        </div>
        <button style = "background-color: #2196F3;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;" type="submit" >Thêm</button>
    </form>



<script src="js/script.js"></script>
    </body>
<?php include_once 'lib/footer.php';?>