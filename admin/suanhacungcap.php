<?php include_once '../classes/nhacungcap.php';?>

<?php
        $ncc= new nhacungcap();

        if(!isset($_GET['mancc']) || $_GET['mancc'] == NULL )
        {
            echo "<script>window.location='danhsachnhacungcap.php'</script>";
        }
    else 
        {            
            $mancc= $_GET['mancc'];
        }
        
?> 

<?php 
    if($_SERVER['REQUEST_METHOD'] =='POST')
		{
			$tenncc = $_POST['txt_tenncc'];
            $diachi = $_POST['txt_diachincc'];
			$sdt = $_POST['txt_sdtncc'];
			$updatencc = $ncc->update_ncc($tenncc,$diachi, $sdt, $mancc);
		}

?>

<?php include_once 'inc/header.php'?>
<style> 
    .has-error{
        color:red
    }
    </style> 

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->

        <?php include_once 'inc/sidebar.php' ?>

        <!-- End of Sidebar -->



        <!-- Content Wrapper -->
        

                <!-- End of Topbar --> 

                 <!-- bắt đầu  Nội Dung -->
   
         <div class="container" style="width:50%">
                    <h2 style="text-align:center">SỬA NHÀ CUNG CẤP</h2>

                    
                    <?php
                        $get_tenncc = $ncc->getmancc($mancc);
                        if($get_tenncc){
                                while($result=$get_tenncc->fetch_assoc()){
                           
                    ?>
                    <form action="" method="POST">

                        <div class="form-group">
                        <label for="fullname">Sửa tên Nhà cung cấp</label>
                        <input type="text" class="form-control"value="<?php echo $result['tenncc']  ;?>" id="fullname" placeholder="Tên Nhà cung cấp" name="txt_tenncc">
                        </div>

                        <div class="form-group">
                        <label for="fullname">Sửa địa chỉ Nhà cung cấp</label>
                        <input type="text" class="form-control"value="<?php echo $result['diachincc']  ;?>" id="fullname" placeholder="Địa chỉ Nhà cung cấp" name="txt_diachincc">
                        </div>

                        <div class="form-group">
                        <label for="fullname">Sửa số điện thoại Nhà cung cấp</label>
                        <input type="text" class="form-control"value="<?php echo $result['sdtncc']  ;?>" id="fullname" placeholder="Số điện thoại nhà cung cấp" name="txt_sdtncc">
                        </div>
                        <div class="has-error">
                            <span> 
                                <?php
                                    if(isset($updatencc))
                                        {
                                            echo $updatencc;
                                        }
                               ?> </span> 
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary" name="btsua">Sửa</button>
                    </form>
                    <?php          
                                }
                            }
                    ?> 
            </div>            
            <?php include_once 'inc/footer.php' ?>