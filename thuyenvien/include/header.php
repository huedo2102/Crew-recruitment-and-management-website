<!DOCTYPE html>
<html>
<head>
<title>CÔNG TY CỔ PHẦN VẬN TẢI BIỂN VÀ XNK NHẬT VIỆT</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="assets/css/font.css">
<link rel="stylesheet" type="text/css" href="assets/css/li-scroller.css">
<link rel="stylesheet" type="text/css" href="assets/css/slick.css">
<link rel="stylesheet" type="text/css" href="assets/css/jquery.fancybox.css">
<link rel="stylesheet" type="text/css" href="assets/css/theme.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<link rel="icon" type="image/png" href="upload/233logo.png">
</head>
<body>
  <div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
  <header id="header">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_top">
          <div class="header_top_left">
            <ul class="top_nav ">
              <li><a href="./index.php">Trang chủ</a></li>
              <li> <a href="all-posts.php">Tất cả</a>  </li>
              <li><a href="./about-us.php">Giới thiệu</a></li>
              <?php 
            require_once "connection.php";

            $get_category = "SELECT * FROM danhmuc";
            $result = mysqli_query($conn , $get_category);
            if($result){
              while ( $rows =  mysqli_fetch_assoc($result) ){
                $c_name = $rows["tendanhmuc"]
          ?> 
            <li><a href="read-category.php?category=<?php echo $c_name; ?> "><?php echo $c_name; ?></a></li>
    <?php
          }
       }
    ?>
              <li><a href="./contact-us.php">Liên hệ</a></li>
              <li><a href="./dangkythuyenvien.php">Đăng ký thuyền viên</a></li>

            </ul>
          </div>
          <div class="header_top_right">
            <p> <?php echo date("l, F d, Y" , strtotime("now") ); ?> </p>
          </div>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_bottom ">
          <div class="logo_area"><a href="index.php" class="logo"><img src="./upload/Picture2.png" alt=""></a></div>
        </div>
      </div>
    </div>
  </header>
  
  <!-- <section id="newsSection">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="latest_newsarea"> <span>Latest News</span>
          <ul id="ticker01" class="news_sticker">
          
            <?php 
            
            $latest = "SELECT * FROM baiviet ORDER BY thoigian DESC";
            $latest_n = mysqli_query($conn , $latest);
            if($latest_n){
              $i = 1;
              while( $rows = mysqli_fetch_assoc($latest_n) ){
                $heading = $rows["tieude"];
                $img = $rows["anhmota"];
                $id = $rows["id"];
              
                ?>
               <li><a href='read-post.php?id=<?php echo $id; ?>'><img   src="./upload/thumbnail/<?php echo $img; ?>"> <?php echo $heading ?> </a></li>
                <?php
                if( $i > 4 ){
                  break;
                }
                $i++;

              }
            }
            ?>
        </div>
      </div>
    </div>
  </section> -->
 

      
