<?php include_once '../classes/thuonghieu.php';?>

<?php
        $th= new thuonghieu();

        if(!isset($_GET['math']) || $_GET['math'] == NULL )
        {
            echo "<script>window.location='quanlythuonghieu.php'</script>";
        }
    else 
        {            
            $math= $_GET['math'];
        }
        
?> 

<?php 
    if($_SERVER['REQUEST_METHOD'] =='POST')
		{
			$tenth = $_POST['txt_tenth'];
			$updateth = $th->update_th($tenth,$math);
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
                        $get_tenth = $th->getmath($math);
                        if($get_tenth){
                                while($result=$get_tenth->fetch_assoc()){
                           
                    ?>
                    <form action="" method="POST">

                        <div class="form-group">
                        <label for="fullname">Sửa Tên Thương Hiệu</label>
                        <input type="text" class="form-control"value="<?php echo $result['tenth']  ;?>" id="fullname" placeholder="Tên thương hiệu" name="txt_tenth">
                        </div>
                        <div class="has-error">
                            <span> 
                                <?php
                                    if(isset($updateth))
                                        {
                                            echo $updateth;
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