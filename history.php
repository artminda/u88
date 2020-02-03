<!DOCTYPE HTML>
<html>
	<head>
<?php $this -> load -> view("www/includes/head.php")?>
        <link rel="stylesheet" href="<?php echo ASSETS_URL?>/www/css/member.css" />

		<script type="text/javascript">
			$(function(){
				$('.payment').click(function(){
					$('#down-alert').hide();
					if($(this).attr('data-payment')=='Credit'){
						$("#down-alert").fadeToggle();
						$('#depositForm').prop('target','_blank');
					}else{
						$('#depositForm').prop('target','_self');
					}
				});
				
			});
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
                	
                	<div class="register_bg">
                    <div class="registerBg"></div>
						<div class="registerTitle"><img src="<?php echo ASSETS_URL?>/www/images/member/deposit_history_title.png" width="100%"/></div>
                        <table class="table table-striped history">
                            <thead>
                              <tr>
                                <th class="green-bg">儲值時間</th>
                                <th class="green-bg">儲值方式</th>
                                <th class="green-bg">儲值金額</th>
                                <th class="green-bg">處理結果</th>
                              </tr>
                            </thead>
                            <tbody>                                  
                                <?php if(isset($result)):?>
                                <?php foreach($result as $row):?>             
                                <tr>
                                    <td><?php echo $row["buildtime"]?></td>
                                    <td>
                                         <p class="Stored-value">儲值方式： <?php echo inNumberString($paymentType,$row["payment"])?></p>
                                         <?php if($row["payment"]!='Credit'):?>
											 <?php if($row['pay_mode']==3):?>
                                                 <?php if($row["payment"]=='ATM'):?>
                                                 <p class="w1">銀行代碼： 012</p>
                                                 <p class="w1">銀行帳號： <?php echo $row["payInfo"]["ACID"]?></p>
                                                 <?php else:?>
                                                 <p class="w1">繳費代碼：<?php echo $row["payInfo"]["StoreCode"]?></p>
                                                 <?php endif;?>
                                             <?php elseif($row['pay_mode']==1):	//綠界?>
                                                 <?php if($row["payment"]=='ATM'):?>
                                                 <p class="w1">銀行代碼： <?php echo $row["payInfo"]["BankCode"]?></p>
                                                 <p class="w1">銀行帳號： <?php echo $row["payInfo"]["vAccount"]?></p>
                                                 <?php else:?>
                                                 <p class="w1">繳費代碼：<?php echo $row["payInfo"]["PaymentNo"]?></p>
                                                 <?php endif;?>
                                                 <p class="w1">繳費期限：<?php echo $row["payInfo"]["ExpireDate"]?></p>
                                             <?php endif;?>
                                        <?php endif;?>
                                    </td>
                                    <td><?php echo number_format($row["amount"],0)?></td>
                                    <td class="<?php echo ($row["keyin2"]==0 ? 'red' : 'text-success')?>"><?php echo $orderKeyin2[$row["keyin2"]]?></td>
                                </tr>
                                <?php endforeach;?>             
                              	<?php endif;?>
                           </tbody>
              </table>                        
					</div>
                    <div class="text-center">
                    <?php echo @$pagination?>                       
                       <!-- <ul class="pagination pagination-sm">
                          <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i></a></li>
                          <li class="page-item"><a class="page-link" href="#">1</a></li>
                          <li class="page-item"><a class="page-link" href="#">2</a></li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                          <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-right"></i></a></li>
                        </ul>-->
                	</div>
                </div>
              </section>
			<div class="frame_bg frame_bg2"></div>
			</div>

		<!-- Footer -->
		<?php $this -> load -> view("www/includes/footer.php")?>

	</body>
</html>