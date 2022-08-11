
<?php include 'include/header.php' ?>

<?php 
	$ct = new giohang();
    if(isset($_GET['conformid']))
        {
         
                $id=$_GET['conformid'];
				$time = $_GET['time'];
				$price = $_GET['price'];
				$shifted_conform=$ct->shifted_conform( $id,$time,$price);
        }
?> 
 
<div id="content">
    <div class="container clearpadding" >
        <div>
        </br>
        </br> </br> </br> </br> </br> </br>
        <h4 style="color:SteelBlue; text-align:center"> <strong> CHỌN PHƯƠNG THỨC THANH TOÁN </strong> </h4>
        <div class="panel-body">
        <div class="hinhthucthanhtoan">
        <p><a  href="thanhtoanoffline.php"> Thanh toán khi nhận hàng </a></p>
        <p><a href="thanhtoanonline.php"> Thanh toán online </a></p>
    </div>
    </br>   </br>   </br>   </br>   </br>   </br>   </br>   </br>   </br>   </br>   </br>   </br>   </br>   </br>   </br>
 



	


				
 
<div id="footer">
    <div class='container'>
        <div class="row">
                <div class="col-md-6">
                    <address>
                    <strong>CỬA HÀNG DỤNG CỤ THỂ THAO LIBERTY</strong><br>
              <span class="glyphicon glyphicon-home" aria-hidden="true"></span> Địa chỉ: Nguyễn Thiện Thành - K4 - P5 - TP.Trà Vinh<br>
              <span class="glyphicon glyphicon-phone" aria-hidden="true"></span> Điện thoại: 0326873520<br>
                    </address>
                
        </div>
    </div>
</div>
</div>
<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>