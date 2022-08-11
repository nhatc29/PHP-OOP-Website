
<?php include 'include/header.php'; ?>

 

<?php
     $mauser= Session::get('mand');
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['suathongtin']))
        {
            $update_user = $user->update_user($_POST,$mauser);
        }
?> 

<div id="content">
    <div class="container clearpadding" >
        
            <div class="panel panel-info ">
              <div class="panel-heading">
                <h3 class="panel-title text-left">Cập nhật thông tin người dùng</h3>
              </div>
              <div class="panel-body">

        <?php
        // $mauser= Session::get('user_id');
        $get_user=$user->show_user($mauser);    
        if($get_user){
            while($result=$get_user->fetch_assoc()){
        ?>
                  <form class="form-horizontal" action="" method="POST">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-offset-1 col-sm-2 control-label">Họ tên</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="" name="name" value="<?php echo $result['name'] ?>" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-offset-1 col-sm-2 control-label">Địa chỉ</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="" name="diachi" value="<?php echo $result['diachi'] ?>" >
                    </div>
                    </div>
                  
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-offset-1 col-sm-2 control-label">Số điện thoại</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="" name="phone" value="<?php echo $result['phone'] ?>" >
                    </div>
                    
                  </div>
                  
                  <div class="form-group">

                  <?php
                    if(isset($update_user)) 
                        {
                            echo $update_user;
                        }
                  ?> 
                    <div class="col-sm-offset-3 col-sm-7">
                      <button type="submit" class="btn btn-info" name="suathongtin">Lưu</button>
                    </div>
                  </div>
                </form>		
                <?php } } ?>		  	
              </div>

            </div>

        </div>
    </div>
</div>	
                            </br>
                            </br>
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