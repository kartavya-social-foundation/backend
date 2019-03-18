<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Change Password</title>
    <link href="<?php echo base_url();?>application/views/admin/email_template/css/style.css" rel="stylesheet">
     <link href="<?php echo base_url();?>template/assets/global/css/parsley.css" rel="stylesheet">  
    <link rel="stylesheet">
    <style type="text/css">
        .bg_body{background-color: #f4f4f4;}
.bg{height: 100%;min-height: 660px;position: relative;}
.login {width: 100%; max-width: 400px; position: absolute;top: 50%;left: 50%;transform: translate(-50%,-50%);-webkit-transform:translate(-50%,-50%);
-moz-transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%);-o-transform:translate (-50%,-50%);transform:translate (-50%,-50%);top: 50%;}
.lalaji_heading{width: 100%;position: absolute;top: 50%;left: 50%;transform: translate(-50%,-50%);-webkit-transform:translate(-50%,-50%);
-moz-transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%);-o-transform:translate (-50%,-50%);transform:translate (-50%,-50%);}
.lalaji_heading h3{color:#0d8609;font-size: 38px;font-weight: 600;}
.lalaji_heading span{color:#2f372f;font-size: 38px;font-weight: 600;}
.bposi{ position: relative; }
html,body{ height: 100%; }
.mainLogin{ position: relative; height: 100%;}
.mainLogin .input-field{ margin-top: 0px; }
.boxLoginLogo{ text-align: center; margin-bottom: 40px;}
.mainLogin input[type="submit"]{ width: 100%; }
.input-field input{ margin-bottom: 0px; }
.login ul li + li{ padding-top: 25px;  } 
.switch label input[type="checkbox"]:checked + .lever:after{ background-color:#1bcd6b; }
.switch label input[type="checkbox"]:checked + .lever{ background-color:#1bcd6b; }
.forget_password{ float: right; }
.bottom_btn{padding-top: 30px;}
.login img{padding-right: 15px;}
    </style>
    </head>
    <body class="bodyLogin">
    <section class="mainLogin">           
            <div class="login">
                <div class="boxLoginLogo">
                    <img src="<?php echo base_url();?>uploads/template_img/kartavya.png" alt="" title="logo">
                </div>                
                    <div class="boxForm">
                    <form  id="form11" action="" method="post" data-parsley-validate=''>
                        <ul>
                            <li>
                                <div class="input-field">
                                    <input id="password" name="password" minlength="6" maxlength="10" type="password" class="" required>
                                    <label for="password">New Password</label>
                                </div>
                            </li>
                            <li>
                                <div class="input-field">
                                    <input id="confirm_password" data-parsley-equalto="#password" name="confirm_password" type="password" class="" required>
                                    <label for="password">Confirm Password</label>
                                </div>
                            </li>                                
                            <li><input  class="submit_btn" name="submit" title="submit" type="submit" value="Submit"></li>
                        </ul>
                    </form>
                 </div>           
    
    </div>
    </section>
    <script type="text/javascript" src="<?php echo base_url();?>application/views/admin/email_template/js/jquery.min.js"></script>
    <script src="<?php echo base_url()?>template/assets/global/js/parsley.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>application/views/admin/email_template/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>application/views/admin/email_template/js/materialize.min.js"></script>

<script type="text/javascript">
  $('#form11').parsley();  
</script>
    </body>
    </html>
