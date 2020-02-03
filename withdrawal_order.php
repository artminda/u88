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
						<div class="registerTitle"><img src="<?php echo ASSETS_URL?>/www/images/member/transfer2_title.png" width="100%"/></div>
                        <div class="memberInfo">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                  <p style="margin-top:1%;">
                                    已成功送出點數轉出申請，<br>此次轉出紀錄請至<a href="<?php echo site_url("History/sell")?>">會員中心--轉出紀錄</a>查詢。
                                 </p>
                                 <button type="button" onClick="location.href='<?php echo site_url("Manger/withdrawal")?>'" class="btn btn-danger">返回</button>
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