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

    $category_err = $p_heading_err = $editor_err = $thumbnail_err=  "";
    $category = $p_heading = $editor =  $thumbnail_name = "";

    $heading_err = $detail_err = $thumbnail_err2=  "";
    $heading = $detail =  $thumbnail_name2= "";

    $t = 1;
    if( $_SERVER["REQUEST_METHOD"] == "POST" ){
        
        if( empty($_REQUEST["p_category"])){
            $category_err =  "<p style='color:red'> * Danh mục không được để trống </p>";
        }else {
          $category = $_REQUEST["p_category"];
        }

        if( empty( $_REQUEST["p_heading"] ) ){
            $p_heading_err = "<p style='color:red'> * Tiêu đề bài viết không được để trống </p>";
        }else{
            $p_heading = $_REQUEST["p_heading"];
        }

        if( empty( $_REQUEST["editor"] ) ){
            $editor = "";
        }else{
           $editor = $_REQUEST["editor"];
        }

        if( empty($_FILES["thumbnail"]["name"])){
           $new_file_name = "";
        }else{

          $thumbnail_name = $_FILES["thumbnail"]["name"];
          $thumbnail_temp_loc = $_FILES["thumbnail"]["tmp_name"];

          $temp_extension = explode(".",$thumbnail_name);
          $thumbnail_extension = strtolower( end($temp_extension) );
          $isallowded = array("jpg","png","jpeg" );

          if( in_array( $thumbnail_extension , $isallowded ) ){
            $new_file_name =  uniqid("",true).".".$thumbnail_extension;      
            $location = "../upload/thumbnail/".$new_file_name;  
          
          }else {
            $thumbnail_err = "<p style='color:red'> * Only JPG , JPEG and PNG files accepted </p>";
            $thumbnail_name ="";
          }
        }


        if( empty( $_REQUEST["detail"] ) ){
            $detail_err = "<p style='color:red'> * Nội dung bài viết không được để trống </p>";
        }else{
           $detail = $_REQUEST["detail"];
        }

        if( empty($_FILES["thumbnail2"]["name"])){
           $new_file_name2 = "";
        }else{

           $thumbnail_name2 = $_FILES["thumbnail2"]["name"];
           $thumbnail_temp_loc2 = $_FILES["thumbnail2"]["tmp_name"];

           $temp_extension2 = explode(".",$thumbnail_name2);
           $thumbnail_extension2 = strtolower( end($temp_extension2) );
           $isallowded2 = array("jpg","png","jpeg" );

           if( in_array( $thumbnail_extension2 , $isallowded2 ) ){
             $new_file_name2 =  uniqid("",true).".".$thumbnail_extension2;      
             $location2 = "../upload/carousel/".$new_file_name2;
          
           }else{
             $thumbnail_err2 = "<p style='color:red'> * Only JPG , JPEG and PNG files accepted </p>";
             $thumbnail_name2 = "";
           }
        }

        if( !empty($category) && !empty($p_heading)  && !empty($detail)  ){
            move_uploaded_file($thumbnail_temp_loc2,$location2);
            $current_time  = strtotime("now");
            move_uploaded_file($thumbnail_temp_loc,$location);

            $add_post_description = "INSERT INTO baiviet( tieude , motangan , anhmota , danhmuc, anhbaiviet, ndbaiviet, thoigian) VALUES ( '$p_heading' , '$editor' , '$new_file_name' , '$category', '$new_file_name2', '$detail', '$current_time')";
            $result_add_desc = mysqli_query($conn , $add_post_description);

            if($result_add_desc){
                $category = $p_heading = $editor = "";
                $detail = "";
                echo "<script>window.location = 'quanlytieude.php';</script>";
            }

        }

    }
?>

<!-- ckeditor js -->
<script src="../include/ckeditor/ckeditor.js"></script>
  
<?php include_once 'lib/header.php';?>
<div class="container-fluid">
    <div id="form" >
        <div >
            <div >
                <h4 >Thêm bài viết </h4>
                <form method="POST" enctype="multipart/form-data" action=" <?php htmlspecialchars($_SERVER['PHP_SELF']) ?>"> 
                <div class="form-group">
                        <label >Chọn danh mục bài viết: </label>
                        <select name="p_category" class="form-control" >
                            <option value="">Chọn danh mục: </option>
                            <?php    
                          
                            $get_category = "SELECT * FROM danhmuc";
                            $post_category = mysqli_query($conn , $get_category);

                            if(  mysqli_num_rows($post_category) > 0  ){
                                while( $rows = mysqli_fetch_assoc($post_category) ){
                                    $c_name = ucwords( $rows["tendanhmuc"] ) ;
                                    // echo " <option value='$c_name'  > $c_name </option> ";
                                    ?>
                                    <option value="<?php echo $c_name ?>" <?php if($c_name == $category){ echo 'selected';} ?> > <?php echo $c_name?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                        <?php echo $category_err; ?>
                    </div>           
                    <div class="form-group">
                        <label >Tiêu đề bài viết:</label>
                        <input type="text" class="form-control" value="<?php echo $p_heading; ?>" name="p_heading" > 
                        <?php echo $p_heading_err; ?>                
                    </div>
                    <div class="form-group">
                        <label> Mô tả ngắn tiêu đề: </label>
                        <textarea name="editor" id="editor"  ><?php echo $editor; ?></textarea>
                        <?php echo $editor_err; ?>
                    </div>
                    <div class="form-group">
                        <label> Ảnh mô tả: </label>
                        <input type="file" name="thumbnail" class="form-control"  >
                        <?php echo $thumbnail_err; ?>
                    </div>
                    







         
                   
                    <div class="form-group">
                        <label> Nội dung bài viết: </label>
                        <textarea name="detail" id="detail" ><?php echo $detail; ?></textarea>
                        <?php echo $detail_err; ?>
                    </div>
                    <div class="form-group">
                        <label> Ảnh nội dung: </label>
                        <input type="file" name="thumbnail2" class="form-control"  >
                        <?php echo $thumbnail_err2; ?>
                    </div>
                    <div class="form-group">
                        <input style = "background-color: #2196F3;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;" type="submit" value="Thêm" name="submit_expense" >
                    </div>







                </form>
            </div>
            <!-- ckeditor function call -->
            <script>
                CKEDITOR.replace('editor');
                CKEDITOR.replace('detail');
            </script>
        </div>
    </div>


<script src="js/script.js"></script>
   
<?php include_once 'lib/footer.php';?>