<?php
require_once "include/header.php";
?>

<?php 

  $id = $_GET["id"];
  $read_news = "SELECT * FROM baiviet WHERE id = '$id' ";
  $read_result = mysqli_query($conn , $read_news);
  if($read_news){
    while( $rows = mysqli_fetch_assoc($read_result) ){
      $heading =  $rows["tieude"];
      $details =  $rows["ndbaiviet"];
       $time = $rows["thoigian"];
      $category = $rows["danhmuc"];
      $img = $rows["anhbaiviet"];
?>
        
  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_page">
            <h1> <?php echo $heading; ?> </h1>
            <div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i>user</a> <span><i class="fa fa-calendar"></i> <?php echo date('d-M-Y ' , $time); ?> </span> <a href="#"><i class="fa fa-tags"></i><?php echo $category; ?></a> </div>
            <div class="single_page_content"> 
            <?php
              if (!empty($img)) {
                  echo '<img class="img-center" style="width:85%; height:300px" src="upload/carousel/' . htmlspecialchars($img, ENT_QUOTES, 'UTF-8') . '" alt="">';
              }
            ?>
              <blockquote> <?php echo $details; ?> </blockquote>
              
            </div>
            <div class="social_link">
              <ul class="sociallink_nav">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
              </ul>
            </div>
            <div class="related_post">
              <h2>Related Post <i class="fa fa-thumbs-o-up"></i></h2>
              <ul class="spost_nav wow fadeInDown animated">
            <?php

              $selet_related_post = "SELECT * FROM baiviet WHERE danhmuc = '$category' ORDER BY RAND() LIMIT 3 ";
              $relted_post = mysqli_query($conn , $selet_related_post);

              if($relted_post){
                while ( $relted_post_row = mysqli_fetch_assoc($relted_post) ){
                  $thumb = $relted_post_row["anhmota"];
                  $related_heading = $relted_post_row["tieude"];
                  $related_id = $relted_post_row["id"];
                  ?>
                <li>
                  <div class="media"> <a class="media-left" href="read-post.php?id=<?php echo $related_id; ?>"> 
                  <?php
                  if (!empty($thumb)) {
                      echo '<img src="upload/thumbnail/' . htmlspecialchars($thumb, ENT_QUOTES, 'UTF-8') . '" >';
                  }else {
                    $default_img = '661e103226e768.11335933.jpg';
                    echo '<img src="upload/thumbnail/' . htmlspecialchars($default_img, ENT_QUOTES, 'UTF-8') . '" >';
                  }
                  ?>

                
                </a>
                    <div class="media-body"> <a class="catg_title" href="read-post.php?id=<?php echo $related_id; ?>""> <?php echo $related_heading; ?> </a> </div>
                  </div>
                </li>
                  <?php
                }
              }
            ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <?php
    }
  }
?>
<?php 
require_once "include/footer.php";
?>