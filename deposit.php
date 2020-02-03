<!DOCTYPE HTML>
<html>
<head>
    <?php $this -> load -> view("www/includes/head.php")?>
    <link rel="stylesheet" href="<?php echo ASSETS_URL?>/www/css/member.css" />
    <!-- 獎金池-->
    <link rel="stylesheet" href="<?php echo ASSETS_URL?>/www/css/counter.css">
    <script src="<?php echo ASSETS_URL?>/www/js/counter.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" src="<?php echo ASSETS_URL?>/www/js/deposit.js"></script>
    <script type="text/javascript">
        $(function(){
            $('.payment').click(function(){
                $('#down-alert').hide();
                if($(this).attr('data-payment')=='Credit'){
                    $("#down-alert").fadeToggle();
                    $('#depositForm').prop('target','_blank');
                }else{
                    if($('#pay_mode').val()==1){	//綠解原視窗
                        $('#depositForm').prop('target','_self');
                    }else{	//中華另開
                        $('#depositForm').prop('target','_blank');
                    }
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
                <div class="registerTitle"><img src="<?php echo ASSETS_URL?>/www/images/member/deposit_title.png" width="100%"/></div>


                <div class="memberInfo">
                    <!----會員資料---->
                    <form id="depositForm" name="depositForm"  role="form" method="post" novalidate>
                        <input type="hidden" name="payment" id="payment" />
                        <input type="hidden" name="pay_mode" id="pay_mode" value="<?php echo $pay_mode?>" />

                        <div class="pay">
                            <a class="payment payicon" data-payment="ATM"><img src="<?php echo ASSETS_URL?>/www/images/member/pay-icon1.png"></a>
                            <!-- <a class="payment payicon" data-payment="Credit"><img src="<?php echo ASSETS_URL?>/www/images/member/pay-icon6.png"></a>-->
                            <?php if($pay_mode==2):	//智付通?>
                                <!--
                                <a class="payment payicon" data-payment="CVS"><img src="<?php echo ASSETS_URL?>/www/images/member/pay-icon2.png"></a>
                                <a class="payment payicon" data-payment="CVS"><img src="<?php echo ASSETS_URL?>/www/images/member/pay-icon3.png"></a>
                                -->
                            <?php elseif($pay_mode==9) :	//萬事達?>
                                <a class="payment payicon" data-payment="CVS"><img src="<?php echo ASSETS_URL?>/www/images/member/pay-icon2.png"></a>
                                <a class="payment payicon" data-payment="IBON"><img src="<?php echo ASSETS_URL?>/www/images/member/pay-icon3.png"></a>
                            <?php else :	//綠界 & 金恆通?>
                                <a class="payment payicon" data-payment="CVS"><img src="<?php echo ASSETS_URL?>/www/images/member/pay-icon2.png"></a>
                                <a class="payment payicon" data-payment="CVS"><img src="<?php echo ASSETS_URL?>/www/images/member/pay-icon3.png"></a>
                            <?php endif;?>
                            <?php if($user_info['m_group']==2):?>
                                <a class="payment payicon" data-payment="bank"><img src="<?php echo ASSETS_URL?>/www/images/member/pay-icon4.png"></a>
                            <?php endif;?>
                        </div>

                        <div class="inputgroup">
                            <div class="group">
                                <label class="control-label col-12">輸入儲值點數:</label>
                                <div class="col-12">
                                    <input type="tel" id="amount" name="amount" maxlength="10" class="form-control" placeholder="請輸入儲值點數">
                                    <div class="text-info" id="down-alert" style="display:none;"><i class="fas fa-exclamation-triangle"></i> 信用卡儲值實拿點數須扣除一成手續費，如儲值1,000實拿點數為900</div>
                                    <div class="text-right"><button type="submit" class="btn btn-md" value="取得代碼"  style="margin-top:1em;"><i class="fas fa-credit-card"></i> 取得代碼</button></div>
                                </div>

                            </div>
                        </div>

                        <div class="alert alert-danger bor-red col-xs-12">
                            <h4 ><i class="fas fa-exclamation-triangle"></i> 注意事項:</h4>
                            <ul>
                                <li>超商代碼繳費，請勿使用 「OK超商」繳費</li>
                                <li>ATM儲值請勿使用無卡存款，若使用無卡存款一律視為詐騙帳號停權處分。</li>
                            </ul>
                        </div>


                    </form>

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
