<?php include_once '../classes/danhmucsanpham.php'?>
<?php
	$dm = new danhmucsanpham();
	if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$tendm = $_POST['txt_danhmuc'];
			$insertdm = $dm->insert_dm($tendm);
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
                    <h2>Thêm danh mục</h2>
                    

                             
                    <form action="themdanhmuc.php" method="post" style="width:50%">
                        <div class="form-group">
                        <div class="form-group">
                        <label for="fullname">Nhập tên danh mục</label>
                        <input type="text" class="form-control" id="fullname" placeholder="Tên danh mục" name="txt_danhmuc">
                        </div>
                        <div class="has-error">
                            <span> 
                                <?php
                                    if(isset($insertdm))
                                        {
                                            echo $insertdm;
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