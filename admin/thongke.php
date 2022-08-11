<?php include_once '../classes/giohang.php';

	
                            $ct = new giohang();

							$tk=$ct->thongke();
							if($tk){ 
											
							while($result=$tk->fetch_assoc())
							{
                                $chart_data[] = array 
                                    (
                                        'date' =>$result['ngaymua'],
                                        'order' =>$result['maorder'],
                                        'sales' =>$result['gia'],
                                        'quantity' =>$result['soluong']
                                    );
                            }}

                            echo $data= json_encode($chart_data); 
													
			?>
                      
            
    