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

        $db= new Database();
        $fm= new Format();
        $ct= new giohang();
        $dm=new danhmucsanpham();
        $sp=new sanpham();
        $th=new thuonghieu();
        $user = new user();
?>
<?php
    if(isset($_GET['user_id']))
        {
            $del_gh=$ct->delete_all_gh();
            Session::destroy();
            
        }
?> 

        <style >
            .hinhthucthanhtoan{
                
               width:550px;
               height:100px;
               margin:0 auto;
               border: 1px solid #336699;
               padding 20px;
               background: #C0C0C0;
            }

            .hinhthucthanhtoan p {
                
               text-align:center;
               padding: 10px;
               border: 1px solid;
               margin: 5px;
               background:#FFFFFF;
               
               
             }

             .vnpay
             {
               text-align:center;
               padding: 10px;
               margin: 5px;
             }
        </style>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cửa hàng bán sản phẩm hỗ trợ nuôi trồng thủy sản</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="js/jquery-3.1.1.js" type="text/javascript"></script>
    <script src="../js/jquery.jcarousel.pack.js" type="text/javascript"></script>
    <script src="../js/jquery-func.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <style>
    p.gia_sanpham {
        text-align: center;
        color: red;
        font-size: 15px;
        font-weight: bold;
    }
    .list_trang{
        padding:0;
        margin:0;
        list-style:none;
    }

    ul.list_trang li {
       float:left;
       padding:5px;
       margin:5px;
       background:lightblue;
    }
    .chitietsanpham
			{
				height:auto;
				width:90%;
				margin: 0 auto;
			}
		.hinhanh_ctsanpham
			{
				float:left; 
				width:50%;
			}
		.ctsp
			{
				float:right;
				width:45%;
			

			}


    </style>
</head>

<body>
    <div class="container">
        <div class="row" style="margin-top: 3px;height: 125px">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 clearpadding">
                <a href="#"><img src="upload/logo.jpg" alt="" class="img-responsive"></a>
            </div>
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 clearpadding">
                <a href="#"><img src="upload/banner1.jpg" alt="" class="img-responsive"></a>
            </div>
        </div>
        <div class="row">
            <nav class="navbar navbar-info re-navbar">
                <div class="container-fluid re-container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">--- Menu ---</a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse re-navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"
                                        aria-hidden="true"></span> Trang Chủ<span class="sr-only">(current)</span></a>
                            </li>
                                                       
                            <?php
                            $showdm_fe=$dm->show_dm_frontend();
                            if($showdm_fe) {
                             while($row_danhmuc=$showdm_fe->fetch_assoc()	) {
                            ?>
                                <li><a href="sanphamtheodanhmuc.php?madm=<?php echo $row_danhmuc['madm'] ?>"><?php  echo $row_danhmuc['tendm']?></a></li>
                           
                            <?php } }
                           ?>
              
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <?php
                            $login_check=Session::get('login');
                            if($login_check==false){ ?>
                                <li><a href="login.php">Đăng nhập</a></li>
                                <li><a href="dangky.php">Đăng ký</a></li>
                         <?php   } else { ?>
                                <li>
                                    <a href="cart.php" class="dropdown-toggle"  role="button"
                                        aria-haspopup="true" aria-expanded="false"> <span
                                            class="glyphicon glyphicon-shopping-cart"></span>
                                        Giỏ Hàng</span></a>
                                </li>                                    

                                    <li>
                                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="mr-2 d-none d-lg-inline text-gray-600 "><?php echo Session::get('name')?>   </span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                            aria-labelledby="userDropdown">
                                            <a class="dropdown-item" href="profile.php">
                                                Thông tin người dùng
                                            </a> <br>
                                            <a class="dropdown-item" href="?user_id=<?php echo Session::get('mand')?>">
                                                Đăng Xuất
                                            </a>
                                                <br>
                                           
                                        </div>
                                </li>


                                <?php }?>

			            </ul>

                        
                        
                    </div><!-- /.navbar-collapse -->

                </div><!-- /.container-fluid -->
            </nav>
        </div>