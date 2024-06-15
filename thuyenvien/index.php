<?php 
    require_once "include/header.php";
?>

<section id="sliderSection">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="slick_slider">

        <!-- adding carousel -------------------------------------------------------------------------->
        <?php
            for ($i = 1; $i <= 5; $i++) {
                ?>
                <div class="single_iteam"><img src="upload/show_images/<?php echo $i; ?>.jpg" ></div><?php
            }
            ?>
  <!-- end carousel----------------------------------------------------------------------------------------- -->
        </div>
      </div>
    </div>
</section>
<section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_post_content">
           <?php

              // selecting category Name-----------------------------------------------
            $select_cat = "SELECT * FROM danhmuc";
            $result = mysqli_query($conn , $select_cat);

            if($result){
              while( $rows = mysqli_fetch_assoc($result) ){
                $cat_name =  $rows["tendanhmuc"];
            echo   "<h2><span> $cat_name </span></h2>";

            // selecting category latest 1 news-------------------------------------------------
             if($cat_name ){

              $select_news = "SELECT * FROM baiviet WHERE danhmuc = '$cat_name' ORDER BY thoigian DESC  LIMIT 1 ";
              $result_news = mysqli_query( $conn , $select_news );
              if( $result_news ){
                $n = 0;
                  while( $rows_news= mysqli_fetch_assoc($result_news) ){
                    $news_thumb = $rows_news["anhmota"];
                    $news_heading = $rows_news["tieude"];
                   $news_description = $rows_news["motangan"];
                  $id_n = $rows_news["id"];
                 ?>

                    <!-- Display big news left side -->
                <div class="row">  
                    <div class="col-lg-6 col-md-6 col-sm-12">      
                        <ul class="wow fadeInDown">
                            <li>
                            <a href="read-post.php?id=<?php echo $id_n ?>" > 
                            <?php
                            $default_news_thumb = '661e103226e768.11335933.jpg'; // Đường dẫn đến hình ảnh mặc định

                            if (!empty($news_thumb)) {
                                echo '<img alt="" style="height:300px;" class="img-fluid img-responsive" src="upload/thumbnail/' . htmlspecialchars($news_thumb, ENT_QUOTES, 'UTF-8') . '">';
                            } else {
                                echo '<img alt="" style="height:300px;" class="img-fluid img-responsive" src="upload/thumbnail/' . htmlspecialchars($default_news_thumb, ENT_QUOTES, 'UTF-8') . '">';
                            }
                            ?>

                          
                          </a>
                                <div> <a href="read-post.php?id=<?php echo $id_n ?>" > <h3> <?php echo ucwords($news_heading); ?> </h3> </a> </div>
                                <div> <a href="read-post.php?id=<?php echo $id_n ?>" > <?php echo ucwords($news_description); ?>  </a> </div>        
                            </li>
                        </ul>      
                    </div>
                    <?php 
                        }
                    }

                    $select_small_news =  "SELECT * FROM baiviet WHERE danhmuc = '$cat_name' ORDER BY thoigian DESC  LIMIT 5 OFFSET 1  ";
                    $small_news_result = mysqli_query($conn , $select_small_news);
                    if( $small_news_result ){
                        while( $small_rows = mysqli_fetch_assoc($small_news_result) ){
                            $small_headline = $small_rows["tieude"];
                            $small_thumb = $small_rows["anhmota"];
                            $id_n = $small_rows["id"];
                            $small_cat = $small_rows["danhmuc"];
                           ?>
                           
                           <!-- adding 5 small news right side -->

                           <div  class=" d-flex flex-row justify-content-start"> 
                         <div class=" col-lg-2 col-md-2 col-sm-6">  
                            <ul class="wow fadeInDown">
                             <li>
                                  <div> <a href="read-post.php?id=<?php echo $id_n ?>" >
                                  <?php
                                  $default_small_thumb = '661e103226e768.11335933.jpg'; // Đường dẫn đến hình ảnh mặc định

                                  if (!empty($small_thumb)) {
                                      echo '<img style="height:60px;" class="img-fluid img-responsive" src="upload/thumbnail/' . htmlspecialchars($small_thumb, ENT_QUOTES, 'UTF-8') . '">';
                                  } else {
                                      echo '<img style="height:60px;" class="img-fluid img-responsive" src="upload/thumbnail/' . htmlspecialchars($default_small_thumb, ENT_QUOTES, 'UTF-8') . '">';
                                  }
                                  ?>
 
                                  
                                  </a>
                                  </div>
                             </li>
                           </ul>
                         </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <ul class="wow fadeInDown">
                              <li>
                                  <div> <a href="read-post.php?id=<?php echo $id_n ?>" > <?php echo ucwords($small_headline); ?>  </a> </div>
                                  <br>
                              </li>
                             </ul>
                        </div>
                        &nbsp;
                    </div>
                            <?php 
                        }
                    }
                    ?>

                    </div>
                      <!-- see more -->
                    <div style="position: relative;"> 
                        <a href="read-category.php?category=<?php echo$cat_name; ?>" style="position: absolute; bottom: 8px; right: 16px; color:blue;">see more...</a> 
                    </div>
                    <!-- end see more -->
                 <?php
             }
          }
        }
      ?>

          </div> 
        </div> 
    </div>



<?php 
  require_once "include/footer.php";
?>