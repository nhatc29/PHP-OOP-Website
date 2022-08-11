<?php
    include 'lib/session.php';
    Session::init();   
    
?> 
<?php
ob_start();
    include_once 'lib/database.php';
    include_once 'helpers/format.php';
  
    spl_autoload_register(function($className)
        {
            include_once "classes/".$className.".php";
        });
        $user = new user();
?>
<?php
    $user = new user();
	if($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['dangky']))
		{
			$insertuser = $user->insert_user($_POST);
		}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Forms</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
    <style> 
    .error{
        color:red
    }
    </style> 

</head>

<body>
	
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Đăng Ký Tài Khoản</div>
				<div class="panel-body">
					<form action = "" method="POST" role="form">
						<fieldset>
                        <div class="form-group">
								<input class="form-control" placeholder="Họ và tên" name="name" type="text" autofocus="">
                                <div class="has-error">
                                    <span> <?php echo (isset($err['name']))?$err['name']:'' ?> </span>
                                </div>
							</div>

                            <div class="form-group">
								<input class="form-control" placeholder="Địa chỉ" name="diachi" type="text" value="">
                                <div class="has-error">
                                <span> <?php echo (isset($err['diachi']))?$err['diachi']:'' ?> </span>
                                </div>
							</div>
                            <div class="form-group">
								<input class="form-control" placeholder="Số điện thoại" name="phone" type="text" value="">
                                <div class="has-error">
                                <span> <?php echo (isset($err['phone']))?$err['phone']:'' ?> </span>
                                </div>
							</div>

                            <div class="form-group">
								<input class="form-control" placeholder="Tên đăng nhập" name="username" type="text" autofocus="">
                                <div class="has-error">
                                <span> <?php echo (isset($err['username']))?$err['username']:'' ?> </span>
                                
                                </div>
							</div>

							<div class="form-group">
								<input class="form-control" placeholder="Mật khẩu" name="password" type="password" value="">
                                <div class="has-error">
                                <span> <?php echo (isset($err['password']))?$err['password']:'' ?> </span>
                                </div>
							</div>

                            <div class="form-group">
								<input class="form-control" placeholder="Nhập lại mật khẩu" name="repassword" type="password" value="">
                                <div class="has-error">
                                <span> <?php echo (isset($err['repassword']))?$err['repassword']:'' ?> </span>
                                </div>
							</div>
                                <?php
                                    if(isset($insertuser))
                                        {
                                            echo $insertuser;
                                        }

                                ?> <br> <br>
                          
                            <button type="submit" class="btn btn-primary" name="dangky">Đăng Ký</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="login.php"> <u>Trở lại </u> </a> <br>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	
		

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
