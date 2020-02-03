<!DOCTYPE HTML>
<html>
	<head>
        <?php $this -> load -> view("www/includes/head.php")?>
        <link rel="stylesheet" href="<?php echo ASSETS_URL?>/www/css/member.css" />
        <script type="text/javascript" src="<?php echo ASSETS_URL?>/www/js/withdrawal.js"></script>
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
						<div class="registerTitle"><img src="<?php echo ASSETS_URL?>/www/images/member/withdrawal_title.png" width="100%"/></div>
                        <div class="memberInfo">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                    	<form name="withdrawalForm" id="withdrawalForm" method="post"  novalidate>
                                        <div class="form-group">
                                          <label for="sel1">轉出來源:</label>
                                          <div>
                                          <select class="form-control" id="sel1">
                                            <option value="0"> 電子錢包 ............... <?php echo number_format($user_info['WalletTotal'],0)?></option>
                                          </select>
                                          </div>
                                          <br>
                                        </div>
                                        <div class="form-group">
                                            <label>轉出點數</label>
                                            <div>
                                            <input type="tel" name="amount" id="amount" class="form-control" maxlength="10" placeholder="請輸入轉移點數">
                                            <input type="hidden" id="tmpAmount" value="<?php echo $user_info['WalletTotal']?>" />
                                            </div>
                                        </div>
                                        <button class="btn btn-md" id="withdrawalBTN" type="button">確認轉移</button> 
                                        </form>   
                            </div>
                      
                        <!----幣商廣告區-------------------------->
                        <div class="col-md-6 col-12">
                          <ul class="bitcone">
                          	  <?php if(isset($BitCoin)):?>
                              <?php foreach($BitCoin as $row):?>
                              <li><a href="<?php echo ($row["url"] ? $row["url"] : 'javascript:void(0)') ?>" <?php if($row["url"]) echo ' target="_blank"'?>>
                              		<img src="<?php echo UPLOADS_URL?>/coinman/<?php echo $row["pic"]?>" width="300" alt=""/>
                                	</a>
                               </li>
                              <?php endforeach;?>
                              <?php endif;?>
                          </ul>
                        </div>
                        
                    
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