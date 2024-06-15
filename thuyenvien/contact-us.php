<?php
    require_once "include/header.php";
?>



<section id="contentSection">
    <div class="row">

        <div class="col-12">
         <div class="left_content">
          <div class="contact_area">
            <h2> Vị trí </h2>
            <iframe src="https://www.google.com/maps?q=Số 69, Đường Số 4, Khu đô Thị Waterfront, Vĩnh Niệm, Lê Chân, Hải Phòng&output=embed" style="border:3; height:400px; width:100%;" allowfullscreen="" loading="lazy"></iframe>
           </div>
        </div>
        </div>
      <!-- <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="left_content">
          <div class="contact_area">
            <h2>Liên hệ với chúng tôi</h2>
            <form action="#" class="contact_form">
              <input class="form-control" type="text" placeholder="Họ tên*">
              <input class="form-control" type="email" placeholder="Email*">
              <textarea class="form-control" cols="30" style="resize: none;" rows="10" placeholder="Lời nhắn*"></textarea>
              <input type="submit" value="Gửi">
            </form>
          </div>
        </div>
      </div> -->
      <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="left_content" style=" position: relative;">
            <div class="contact_area" style="font-size:20px;" >

              <h2>Thông tin liên hệ</h2>

              <p ><i style="font-size:29px;" class="fa fa-map-marker" aria-hidden="true"></i>
                &nbsp;&nbsp;  
                Address: <span style="text-align: justify; width: 100px;"> Số 69, Đường Số 4, Khu đô Thị Waterfront, Vĩnh Niệm, Lê Chân, Hải Phòng </span>
               </p>

              <p><i style="font-size:29px;" class="fa fa-phone" aria-hidden="true"></i> 
                &nbsp;&nbsp; Phone: <a href="tel:+ 097 5779783"> + 097 5779783 </a> </p>

                
                <p ><i style="font-size:29px;" class="fa fa-location-arrow fa-10x" aria-hidden="true"></i>
                &nbsp; &nbsp; Email: <a href = "mailto:Info@nhatvietsh"> Info@nhatvietsh </a></p>
                
                <p><i class="fa fa-fax" aria-hidden="true"></i>
                &nbsp;&nbsp; Fax: <a href="fax:+913463463546"> +913463463546 </a>
              </p>

            </div>
          </div>
      </div>
      <!-- closing row -->
  </div>
</section>
  <footer id="footer">
    <div class="footer_top">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="footer_widget wow fadeInDown">
            <h2>Danh mục</h2>
            <ul class="tag_nav">
            <!-- <li><a href="#">Log-in / Sign-Up</a></li> -->
               <!-- adding category----------------------------------------------------------------- -->
               <?php 
               
                $get_category = "SELECT * FROM danhmuc";
                $result = mysqli_query($conn , $get_category);
                if($result){
                  while ( $rows =  mysqli_fetch_assoc($result) ){
                    $c_name = $rows["tendanhmuc"]
              ?> 
                <li><a href="read-category.php?category=<?php echo $c_name; ?> "> <?php echo ucwords($c_name); ?></a></li>
                      <?php
                        }
                    }
                  ?>
                <!-- end of adding category---------------------------------------------------------  -->
            </ul>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="footer_widget wow fadeInRightBig">
             
            <h2>Liên hệ</h2>
            <address>
          
              <P> Địa chỉ : Số 69, Đường Số 4, Khu đô Thị Waterfront, Vĩnh Niệm, Lê Chân, Hải Phòng</P>
              <P>  Điện thoại: <a  style="color:rgb(218,218,218);" href="tel:+ 097 5779783"> + 097 5779783 </a></P>
              <p>Email : <a style="color:rgb(218,218,218);" href = "mailto:Info@nhatvietsh"> Info@nhatvietsh </a> </p>
              <p>Fax : <a style="color:rgb(218,218,218);" href="fax:+913463463546"> +913463463546 </a> </p>
            </address>

          </div>
        </div>
      </div>
    </div>
    <div class="footer_bottom">
      <p class="copyright">Copyright &copy; <?php echo date("Y" , strtotime("now") ); ?> <a href="./index.php">NewsFeed</a></p>
      <p class="developer" style="color:white;">Developed By HVH</p>
      <!-- Wpfreeware -->
    </div>
  </footer>
</div>
<script src="assets/js/jquery.min.js"></script> 
<script src="assets/js/wow.min.js"></script> 
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/jquery.li-scroller.1.0.js"></script> 
<script src="assets/js/jquery.newsTicker.min.js"></script> 
<script src="assets/js/jquery.fancybox.pack.js"></script> 
<script src="assets/js/custom.js"></script>
</body>
</html>