<?php include_once '../classes/thuonghieu.php'?>
<?php
	$th = new thuonghieu();
	if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$tenth = $_POST['txt_thuonghieu'];
			$insertth = $th->insert_th($tenth);
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

<div class="container">
                    <h2>Thêm Thương Hiệu</h2>
                    

                             
                    <form action="themthuonghieu.php" method="post" style="width:50%">
                        <div class="form-group">
                        <div class="form-group">
                        <label for="fullname">Nhập tên thương hiệu</label>
                        <input type="text" class="form-control" id="fullname" placeholder="Tên thương hiệu" name="txt_thuonghieu">
                        </div>
                        <div class="has-error">
                            <span> 
                                <?php
                                    if(isset($insertth))
                                        {
                                            echo $insertth;
                                        }
                                ?> 
                            </span>
                        </div>
                                <br>
                        <button type="submit" class="btn btn-primary">Thêm</button>

                        
                    </form>
                    </div>           
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once 'inc/footer.php' ?>