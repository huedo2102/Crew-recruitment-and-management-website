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



<section style="background-color: #fff; padding: 40px; border-radius: 10px; box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);">

  <h2 style="font-family: 'Arial', sans-serif; color: #333; text-align: center; margin-top: 20px;margin-bottom: 20px;">GIỚI THIỆU VỀ CHÚNG TÔI</h2>
  <br><br><br>
  <center><div style="font-family: 'Arial', sans-serif; color: #555; display: flex;">
    <div style="flex: 5;">
      <h3 style="text-align: justify;font-weight: bold; color: red;">NHẬT VIỆT SHIPPING</h3>
      <p style="text-align: justify;">
        <span style="font-weight: bold; color: blue;">TẠO DỰNG NIỀM TIN, HỢP TÁC PHÁT TRIỂN</span><br>
      </p>
      <p style="text-align: justify;">
        <span style="max-width: 100%; height: auto;">Công ty cổ phần vận tải biển và XNK Nhật Việt chuyên dịch vụ cung ứng thuyền viên, dịch vụ đại lý hàng hải và vận tải hàng hóa viễn dương. Ngoài ra, công ty cung cấp dầu nhờn, dầu đốt cho các đơn vị vận tải tại Hải Phòng và các tỉnh lân cận. Với phương châm: Tạo dựng niềm tin - gắn bó phát triển, Nhật Việt nỗ lực đáp ứng nhu cầu khách hàng, đem lại sự hài lòng tối đa.</span>
      </p>
    </div>
    <div style="margin-left: 20px;flex: 20;">
      <img src="upload/1.PNG" style="max-width: 100%; height: auto;" >
    </div>
  </div></center>
  <br><br><br>
  <center><img src="upload/2.PNG" style="max-width: 100%; height: auto;" ></center>
  <center><img src="upload/Screenshot 2024-04-16 103842.png" style="max-width: 100%; height: auto;" ></center>

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
                // require_once "connection.php";

                $get_category = "SELECT * FROM danhmuc";
                $result = mysqli_query($conn , $get_category);
                if($result){
                  while ( $rows =  mysqli_fetch_assoc($result) ){
                    $c_name = $rows["tendanhmuc"];
                   
              ?> 
                <li><a href="read-category.php?category=<?php echo $c_name; ?> "> <?php echo ucwords($c_name); ?> </a></li>
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
              <p>Fax : <a style="color:rgb(218,218,218);" href="fax: +913463463546"> +913463463546 </a> </p>
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