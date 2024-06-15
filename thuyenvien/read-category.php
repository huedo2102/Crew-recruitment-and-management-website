<?php 
require_once "include/header.php";
?>

<?php

 $category = ucwords($_GET["category"]);
?>

<section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_post_content">
                <h2><span> <?php echo $category ?></span> </h2>

                <!-- adding all news of selected category -->
                <?php
                
                $select_cat_news = "SELECT * FROM baiviet WHERE danhmuc = '$category' ORDER BY thoigian DESC ";
                $result_cat_news = mysqli_query($conn , $select_cat_news);

                if($result_cat_news){
                    while ( $cat_news_rows = mysqli_fetch_assoc($result_cat_news) ){
                     $post_thumb = $cat_news_rows["anhmota"];
                      $post_heading = $cat_news_rows["tieude"];
                      $post_id = $cat_news_rows["id"];
                      $post_desc = $cat_news_rows["motangan"];
                      $post_id = $cat_news_rows["id"];
             ?>

                <!-- inner card row -->

               <div class="row">
                      <div class="card">
                        <div class="col-lg-4">
                        <?php
                        if (!empty($post_thumb)) {
                            echo '<a href="read-post.php?id=' . htmlspecialchars($post_id, ENT_QUOTES, 'UTF-8') . '">';
                            echo '<img style="height:150px; width:100%;" class="card-img img-fluid img-responsive" src="upload/thumbnail/' . htmlspecialchars($post_thumb, ENT_QUOTES, 'UTF-8') . '">';
                            echo '</a>';
                        } else {
                          $default_img = '661e103226e768.11335933.jpg';
                          echo '<img style="height:150px; width:100%;" class="card-img img-fluid img-responsive" src="upload/thumbnail/' . htmlspecialchars($default_img, ENT_QUOTES, 'UTF-8') . '">';
                          echo '</a>';
                        }
                        ?>

                        </div>
                          <div class="card-body">
                             <div class="card-text"> <a href="read-post.php?id=<?php echo $post_id; ?>" > <h3> <?php echo ucwords($post_heading); ?> </h3> </a> </div>
                             <div class="card-text"> <a href="read-post.php?id=<?php echo $post_id ?>" ><?php echo ucwords($post_desc); ?> </a> </div>
                        </div>
                    </div>
               </div>

                  <?php
                  }
                }
                        
                ?>
               <!-- inner row end -->
               
          </div>
        </div>
      </div>


<?php
require_once "include/footer.php";
?>