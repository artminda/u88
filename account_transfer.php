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
						<div class="registerTitle"><img src="<?php echo ASSETS_URL?>/www/images/member/transfer2_title.png" width="100%"/></div>
						<div class="memberInfo">     
							<table class="table table-striped accounts">
                  <thead>
                      <tr>
                        <th class="green-bg">時     間</th>
                        <th class="green-bg">類     型</th>
                        <th class="green-bg">金     額 </th> 
                      </tr>
                      
                  </thead>
                 <tbody>
					  <?php if(isset($result)):?>
                      <?php foreach($result as $row):?>
                      <tr>
                         <td><?php echo $row["buildtime"]?></td>
                         <td>
							 <?php echo tb_sql("kind","wallet_kind",$row["kind"])?>
                             <?php if($row['kind'] == 3 || $row['kind']==4):	//轉出轉入遊戲?>
                             <p class="w1"><?php echo ($row['kind']==3 ?'轉入' :'轉出').tb_sql("makers_name","game_makers",$row['makers_num'])?></p>
                             <p class="red">剩餘點數：<?php echo number_format($row["makers_balance"],2,'.',',')?></p>
                             <?php endif;?>
                             
                         </td>
                         <td > <p class="<?php echo ($row["points"] < 0 ?  'red' : 'text-success')?>"> <?php echo number_format($row["points"],0)?> </p></td> 
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

                </div>
              </section>
			<div class="frame_bg frame_bg2"></div>
			</div>

		<!-- Footer -->
		<?php $this -> load -> view("www/includes/footer.php")?>

	</body>
</html>