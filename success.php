
<?php include 'include/header.php' ?>
<?php
	if(isset($_GET['orderid']) && $_GET['orderid']=='order')
		{
			$user_id=Session::get('user_id');
			$insertorder= $user->insert_order($user_id);
			$del_gh=$ct->delete_all_gh();
			header('Location:success.php');
		}
?>

<div id="content">
    <div class="container clearpadding" >
        <div>
        </br>
        <div class="panel-body">
       
		<h2 style="text-align:center;color:SteelBlue"> Đặt hàng thành công <h2>
            <p style="text-align:center; padding:8px; font-size:20px;">Xem chi tiết đơn hàng của bạn <a href="chitietdonhang.php">tại đây</a> </p> 

								
 


 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <?php include_once 'include/footer.php'?>
<!-- <div id="footer">
    <div class='container'>
        <div class="row">
                <div class="col-md-6">
                    <address>
                    <strong>Cửa hàng máy tính N5</strong><br>
              <span class="glyphicon glyphicon-home" aria-hidden="true"></span> Địa chỉ: Nguyễn Thiện Thành - K4 - P5 - TP.Trà Vinh<br>
              <span class="glyphicon glyphicon-phone" aria-hidden="true"></span> Điện thoại: 0326873520<br>
                    </address>
                
        </div>
    </div>
</div>
</div>
<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html> -->