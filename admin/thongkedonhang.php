<?php include_once 'inc/header.php'?>
<?php include_once '../classes/giohang.php';?>



<body id="pa">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include_once 'inc/sidebar.php' ?>

                <!-- End of Topbar --> 

                 <!-- bắt đầu  Nội Dung -->
                 <!-- <form
            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="timkiemthanhvien.php" method="POST">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" name="noidung" placeholder="Tìm kiếm..."
                         aria-label="Search" aria-describedby="basic-addon2">
                     <div class="input-group-append">
                             <button class="btn btn-primary" type="submit" name="timkiemthanhvien" value="Tìm kiếm">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> -->
                <p> Thống kê đơn hàng theo</p>
                              
            
            <div id="myfirstchart" style="height: 250px;"></div>
             
             <script>
                 $(document).ready(function(){
                     thongke1();
               var char= new Morris.Line({
                element: 'myfirstchart',
                xkey: 'date',
                ykeys: ['order','sales','quantity'],
                labels: ['Đơn hàng', 'Doanh thu','Số lượng']
                });





                 function thongke1(){
                     var text = "365 ngày qua";
                     $('#text-date').text(text);
                     $.ajax({
                         url:"thongke.php",
                         method:"POST",
                         dataType:"JSON",
                         success:function(data)
                            {
                                char.setData(data);
                                $('#text-date').text(text);
                            }
                        });
                 }
                });
                </script>
                
                <table  class="table table-hover">
                    <tr >
                        <th> Tổng số lượng sản phẩm </th> 
                        <th> Tổng số lượng bán </th>
                        <th> Tồn kho </th> 
                        <th> Tổng doanh thu  </th>
                    </tr>   



                            <?php 
                                $ct= new giohang();
                                $get_sl = $ct->thongke();
                                $sp_kho = $ct->sanphamtrongkho();
                            
                                $soluong=0;
                                $tongtien=0;
                                $tongsp=0;
                                
                                if($get_sl)
                                { 
                                    while ($result= $get_sl-> fetch_assoc())
                                        {
                                            $tongtien += ( $result['gia']*$result["soluong"]);
                                            $soluong +=$result['soluong'];
                                          
                                        }
                                }
                                else 
                                echo" 0 result ";

                                if($sp_kho)
                                { 
                                    while ($result= $sp_kho-> fetch_assoc())
                                        {
                                            $tongsp +=$result['soluong'];
                                        }
                                }
                                else 
                                echo" 0 result ";
                            
                            ?> 
                            <?php $tonkho = $tongsp-$soluong; ?>
                        <tr>
                        <td ><?php echo $tongsp ?> Sản phẩm </td>                                            
                        <td ><?php echo $soluong ?> Sản phẩm </td> 
                        <td ><?php echo $tonkho ?> Sản phẩm  </td>                                                                                      
                        <td><?php echo number_format($tongtien,0,',','.').'vnđ' ?>  </td>
                            </tr>                   

                        </table>
                
                   

                   <!--  kết thúc Nội Dung -->  
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once 'inc/footer.php' ?>
    