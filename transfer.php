<!DOCTYPE HTML>
<html>
	<head>
        <?php $this -> load -> view("www/includes/head.php")?>
        <link rel="stylesheet" href="<?php echo ASSETS_URL?>/www/css/member.css" />
        <script type="text/javascript" src="<?php echo ASSETS_URL?>/www/js/transfer.js"></script>
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
						<div class="registerTitle"><img src="<?php echo ASSETS_URL?>/www/images/member/transfer_title.png" width="100%"/></div>
                        	<form id="transferForm" method="post"  role="form" novalidate>
                            <div class="memberInfo transfer">     
                                <div class="form-group">
                                  <label for="sel1">轉出來源:</label>
                                  
                                  <select name="makers_num_A" id="makers_num_A" class="form-control" required> 
                                    <option value="">請選擇從哪轉出</option>
                                    <option value="0">　　 電子錢包 ............... <?php echo number_format($user_info['WalletTotal'],0)?></option>
                                    <?php if(isset($makers_data)):?>
                                    <?php foreach($makers_data as $row):?>
                                    <option value="<?php echo $row["num"]?>" class="balance_div" data-makersnum="<?php echo $row["num"]?>">　　 <?php echo $row["makers_name"]?></option>
                                    <?php endforeach;?>
                                    <?php endif;?>
                                  </select>
                                  
                                  <br>
                                </div>
                                <div class="form-group">
                                  <label for="sel1">轉入目的:</label>                                  
                                  <select name="makers_num_B" id="makers_num_B" class="form-control" required> 
                                    <option value="">請選擇轉入位置</option>
                                    <?php if(isset($makers_data)):?>
                                    <?php foreach($makers_data as $row):?>
                                    <option value="<?php echo $row["num"]?>" class="balance_div" data-makersnum="<?php echo $row["num"]?>">　　 <?php echo $row["makers_name"]?></option>
                                    <?php endforeach;?>
                                    <?php endif;?>
                                    <option value="0">　　 電子錢包 ............... <?php echo number_format($user_info['WalletTotal'],0)?></option>
                                  </select>
                                  
                                  <br>
                                </div>
                                <div class="form-group">
                                    <label>轉移點數</label>
                                   
                                    <input id="amount" name="amount" type="tel" maxlength="9" class="form-control" placeholder="請輸入轉移點數">                                   
                                </div>
                                <button class="btn btn-md" id="transferBTN" type="button">確認轉移</button>

                          </div> 
                          </form>                      
					</div>                       

                </div>
              </section>
			<div class="frame_bg frame_bg2"></div>
			</div>

		<!-- Footer -->
		<?php $this -> load -> view("www/includes/footer.php")?>

	</body>
</html>