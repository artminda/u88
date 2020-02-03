<!DOCTYPE HTML>
<html>
    <head>
        <?php $this -> load -> view("www/includes/head.php")?>
        <link rel="stylesheet" href="<?php echo ASSETS_URL?>/www/css/member.css" />
        <!-- 獎金池-->
        <link rel="stylesheet" href="<?php echo ASSETS_URL?>/www/css/counter.css"> 
        <script src="<?php echo ASSETS_URL?>/www/js/counter.js" type="text/javascript" charset="utf-8"></script>
        <script type="text/javascript" src="<?php echo ASSETS_URL?>/www/js/account.js"></script>
    </head>
    <body>
    <?php $this -> load -> view("www/includes/header.php")?>


    <!-- Main -->
      <!-- Main -->
      <div id="main">
        
              <!-----Solt------------------------------------->
              <section class="wrapper member" id="cha">
              <?php $this -> load -> view("www/includes/member_nav.php")?>
        <div class="inner" id="memberUser">
                	<div class="register_bg">
                    <div class="registerBg"></div>
						<div class="registerTitle"><img src="<?php echo ASSETS_URL?>/www/images/member/member_title.png"  class="img-fluid"></div>                        
                        
                        <div class="row memberInfo userBox">     
                        <!----會員資料---->                 
                                <div class="form-inline col-12">
                                  <label for="usr" class="col-md-3">帳號</label>
                                  <div class="col-md-9 col-12">
                                  <?php echo $user_info['u_id']?>
                                  </div>
                                </div>
                                <div class="form-inline col-12">
                                  <label for="usr" class="col-md-3">姓名</label>
                                  <div class="col-md-9 col-12">
                                  <?php echo $rowMember["u_name"]?>
                                  </div>
                                </div>
                            	<div class="form-inline col-12">
                                  <label for="usr" class="col-md-3">LINE ID</label>
                                  <div class="col-md-9 col-12">
                                  <?php echo $rowMember["line"]?>
                                  </div>
                                </div>
                                <div class="form-inline col-12">
                                  <label for="usr" class="col-md-3">手機號碼</label>
                                  <div class="col-md-9 col-12">
                                  <?php echo $rowMember["phone"]?>
                                  </div>                                  
                                </div>
                                <div class="form-inline col-12">
                                  <label for="usr" class="col-md-3">電子錢包</label>
                                  <div class="col-md-3 col-12">
                                  <?php echo number_format($user_info['WalletTotal'],0)?>
                                  </div>
                                  <div class="col-md-3 col-12">
                                  <button class="btn btn-sm" onclick="location.href='<?php echo site_url("Manger/deposit")?>'">前往儲值</button>
                                  </div>                                   
                                </div>
                                <br/>
                                <div class="border"> </div>
                                <!---會員密碼變更---->
                                	
                                    <div class="col-md-6 col-12 change_pwd">
                                    <div class="registerTitle"><h3>變更密碼 <i class="fas fa-angle-down"></i></h3></div>
                                    	<form class="accountForm" data-toggle="validator" role="form" method="post" novalidate style="margin-top:0">
                                        <div class="form-group">
                                          <label>原始密碼</label>
                                          <input type="password" class="form-control" name="u_password" id="u_password" maxlength="15" placeholder="請輸入原始密碼">
                                        </div>
                                        <div class="form-group">
                                          <label>修改密碼</label>
                                          <input type="password" class="form-control" name="new_password" id="new_password" maxlength="15" placeholder="請輸入新密碼">
                                        </div>
                                        <div class="form-group">
                                          <label>確認密碼</label>
                                          <input type="password" class="form-control" name="new_password2" id="new_password2" maxlength="15" placeholder="請再次輸入新密碼">
                                        </div>
                                        <button class="btn btn-sm accountBTN" type="button"><i class="fas fa-check"></i> 確認變更</button>
                                        </form>
                                    </div>
                                    
                                <!---銀行設定---->
                                    <div class="col-md-6 col-12 change_bank">
                                    <div class="registerTitle"><h3>銀行帳戶設定 <i class="fas fa-angle-down"></i></h3></div>
                                    	<form class="bankForm" name="bankForm" data-toggle="validator" role="form" method="post" novalidate>
                                    	<div class="form-group">
                                          <label for="usr">銀行名稱</label>
											  <?php if(@$user_info["bank_num"]==""):?>
                                              <select name="bank_num" id="bank_num" class="form-control">
                                                  <option value="">請選擇</option>
                                                  <?php if(isset($bankList)):?>
                                                  <?php foreach($bankList as $row):?>
                                                  <option value="<?php echo $row["num"]?>"><?php echo $row["bank_code"].$row["bank_name"]?></option>
                                                  <?php endforeach;?>
                                                  <?php endif;?>
                                              </select>
                                              <?php else:?>
                                              <?php echo tb_sql("bank_code","bank_list",$user_info["bank_num"])?>
                                              <?php echo tb_sql("bank_name","bank_list",$user_info["bank_num"])?>
                                              <?php endif;?>
                                        </div>
                                        <div class="form-group">
                                          <label for="usr">分行名稱</label>
											  <?php if(@$user_info["bank_num"]==""):?>
                                              <input name="bank_branch" class="form-control"  placeholder="請填入分行名稱">
                                              <?php else:?>
                                              <?php echo $user_info["bank_branch"]?>
                                              <?php endif;?>
                                        </div>
                                        <div class="form-group">
                                          <label for="usr">銀行帳號</label>
											  <?php if(@$user_info["bank_num"]==""):?>
                                              <input name="bank_account" class="form-control"  placeholder="請填入銀行帳號">
                                              <?php else:?>
                                              <?php echo $user_info["bank_account"]?>
                                              <?php endif;?>
                                        </div>
                                        <div class="form-group">
                                          <label for="usr">銀行戶名</label>
											  <?php if(@$user_info["bank_num"]==""):?>
                                              <input name="account_name" class="form-control"  placeholder="必須與會員名稱及身分證一致">
                                              <?php else:?>
                                              <?php echo $user_info["account_name"]?>
                                              <?php endif;?>
                                        </div>
                                        <?php if(@$user_info["bank_num"]==""):?>
                                        <button class="btn btn-sm bankBTN" type="button"><i class="fas fa-check"></i> 確認儲存</button>
                                        <?php endif;?>
                                        </form>
                                    </div>
                                
                        </div>                        
						
                    </div>
				
                </div>
              </section>

			</div>
<div class="frame_bg frame_bg2"></div>
		<!-- Footer -->
		<?php $this -> load -> view("www/includes/footer.php")?>

	</body>
</html>