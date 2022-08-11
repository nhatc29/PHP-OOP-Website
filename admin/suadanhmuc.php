<?php include_once '../classes/danhmucsanpham.php';?>

<?php
        $dm= new danhmucsanpham();

    if(!isset($_GET['madm']) || $_GET['madm'] == NULL )
        {
            echo "<script>window.location='quanlydanhmuc.php'</script>";
        }
    else 
        {            
            $madm= $_GET['madm'];
        }
?> 

<?php 
    if($_SERVER['REQUEST_METHOD'] =='POST')
		{
			$tendm = $_POST['txt_tendm'];
			$updatedm = $dm->update_dm($tendm,$madm);
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
                    <h2 style="text-align:center">SỬA DANH MỤC</h2>

                    
                    <?php
                        $get_tendm = $dm->getmadm($madm);
                        if($get_tendm){
                                while($result=$get_tendm->fetch_assoc()){
                           
                    ?>
                    <form action="" method="POST">

                        <div class="form-group">
                        <label for="fullname">Sửa tên danh mục</label>
                        <input type="text" class="form-control"value="<?php echo $result['tendm']  ;?>" id="fullname" placeholder="Tên danh mục" name="txt_tendm">
                        </div>
                        <div class="has-error">
                            <span> 
                                <?php
                                    if(isset($updatedm))
                                        {
                                            echo $updatedm;
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