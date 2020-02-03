<!DOCTYPE HTML>
<html>
	<head>
        <?php $this -> load -> view("www/includes/head.php")?>
        <link rel="stylesheet" href="<?php echo ASSETS_URL?>/www/css/member.css" />
			<script type="text/javascript">
				function printScreen(printlist) 
					{
					  var value = printlist.innerHTML;
					  var printPage = window.open("", "Printing...", "");
					  printPage.document.open();
					  printPage.document.write("<HTML><head></head><BODY onload='window.print();window.close()'>");
					  printPage.document.write("<PRE>");
					  printPage.document.write(value);
					  printPage.document.write("</PRE>");
					  printPage.document.close("</BODY></HTML>");
					}
					
					

			</script>
	</head>
	<body>
	<?php $this -> load -> view("www/includes/header.php")?>


		<!-- Main -->
			<div id="main">
				
              <!-----Solt------------------------------------->
              <section class="wrapper member" id="cha">
              <?php $this -> load -> view("www/includes/member_nav.php")?>
				<div class="inner" id="memberUser">
                	<div class="memberInfo print_parts"> 
                	<div class="register_bg">
                    
						<div class="registerTitle"><h3>儲值繳費代碼</h3></div>
                        <table class="table table-striped">
                          <tbody>
                          	<?php if($pay_mode=='1'):	//綠界?>
                            	<?php if($orderInfo["payment"]=='ATM'):?>
                                <tr>
                                 <td>銀行代碼</td>
                                 <td><?php echo $payInfo['BankCode']?></td>                                
                                </tr>
                                <tr>
                                 <td>銀行帳號</td>
                                 <td><?php echo $payInfo['vAccount']?></td>
                                </tr>
                                <?php else:?>
                                 <td>繳費代碼</td>
                                 <td><?php echo $payInfo['PaymentNo']?></td>
                                <?php endif;?>
                            <?php else: //金恆通?>
                            	<?php if($orderInfo["payment"]=='ATM'):?> 
                                <tr>
                                 <td>銀行代碼</td>
                                 <td><?php echo $payInfo["BankCode"]?></td>                                
                                </tr>
                                <tr>
                                 <td>銀行帳號</td>
                                 <td><?php echo $payInfo['CodeNo']?></td>
                                </tr>
                                <?php else:?>
                                 <td>繳費代碼</td>
                                 <td><?php echo $payInfo['CodeNo']?></td>
                                <?php endif;?>
                            <?php endif;?>                                 
                            <?php /*else: //金恆通?>
                            	<?php if($orderInfo["payment"]=='ATM'):?> 
                                <tr>
                                 <td>銀行代碼</td>
                                 <td>012</td>                                
                                </tr>
                                <tr>
                                 <td>銀行帳號</td>
                                 <td><?php echo $payInfo['ACID']?></td>
                                </tr>
                                <?php else:?>
                                 <td>繳費代碼</td>
                                 <td><?php echo $payInfo['StoreCode']?></td>
                                <?php endif;?>
                            <?php endif;*/?>   
								<tr>
                                 <td>儲值金額</td>
                                 <td>NT<?php echo number_format($orderInfo['amount'],0)?></td>                              
                                </tr>
                          </tbody>
						</table>
                       
                        <div class="text-right"><button type="button" class="btn btn-md" value="取得代碼" onclick="location.href='<?php echo site_url("Manger/deposit")?>'" style="margin-top:1em;">變更儲值方式</button></div>                 
                                                 
                        
                                <!----會員資料---->                 

                                        
                	</div>                              
					</div> 
                                          

                    
                </div>
              </section>
			<div class="frame_bg frame_bg2"></div>
			</div>

		<!-- Footer -->
		<?php $this -> load -> view("www/includes/footer.php")?>

	</body>
</html>