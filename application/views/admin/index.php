<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>Kartavya | Login</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>template/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>template/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>template/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>template/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>template/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
       
        <link href="<?php echo base_url()?>template/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>template/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
       
        <link href="<?php echo base_url()?>template/assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url()?>template/assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>template/assets/global/css/parsley.css" rel="stylesheet"> 
       
        <link href="<?php echo base_url()?>template/assets/pages/css/login.min.css" rel="stylesheet" type="text/css" />
       
        <link rel="shortcut icon" href="favicon.ico" /></head>
    <!-- END HEAD -->
    <body class=" login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="<?php echo base_url();?>">
               <img src="<?php echo base_url('uploads/logo11.png');?>" height="170px"  width="200px" alt="logo" />
            </a>
        </div>
        
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <form id="form11" class="login-form" action="<?php echo base_url().'login';?>" method="post" data-parsley-validate=''>
                <h3 class="form-title font-green">Sign In</h3>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Enter any username and password. </span>
                </div>
				<?php if($this->session->flashdata('msg')){?>
                	<div class="alert alert-danger">
                        <button class="close" data-close="alert"></button>
                        <span> <?php echo $this->session->flashdata('msg');?></span>
                    </div>
                <?php }?>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off"  placeholder="Email"  name="username" data-parsley-required-message="Please Enter Your Username" data-parsley-type="email" required/> </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" data-parsley-required-message="Please Enter Your Password" required/> </div>
                <div class="form-actions" align="center">
                    <input name="submit" type="submit" class="btn green uppercase" value="Login">
                </div>
                <div class="create-account">
                    <p>
                        <button type="button" class="btn green uppercase" data-toggle="modal"  data-target="#myModal">Forget Password</button>
                    </p>
                </div>
               
            </form>
        </div>
       <div class="container">
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
    
      <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Forget Password</h4>
             <?php if($this->session->flashdata('email_sent') && ($this->session->flashdata('email_sent') == '2000') ){ 
                echo '<span style="color:green;list-style-type: none;font-size: 0.9em;line-height: 0.9em;">Email Has Been Sent!!<span>';
          }?>
            </div>
        <form id="form11" class="login-form" action="<?php echo base_url('forget/forgetpassword')?>" method="post" data-parsley-validate=''>
        <div class="modal-body">
         <div class="form-group">
            <label class="control-label col-md-3">Email<span class="required" > * </span></label>
                 <div class="col-md-7">
                    <input type="text" name="email1" id="email" data-parsley-type="email" required class="form-control"/>
                  <?php if($this->session->flashdata('email_err') && ($this->session->flashdata('email_err') == '1000') ){ 
                echo '<span style="color:red;list-style-type: none;font-size: 0.9em;line-height: 0.9em;">Email Does Not Exist!!<span>';
          }?>
                </div>
         </div>
          <div class="form-group" >
                <div class="col-md-2" style="margin: 19px 0 26px 248px;">
                    <input type="submit" name="submit" value="submit"  class="form-control btn green btn-block"/>
                </div>
          </div>
         </div>  
         </form>         
        <div class="modal-footer">
         <!--  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
        </div>
      </div>
      
    </div>
  </div>
  
</div>
        <div class="copyright"> <?php echo date('Y'); ?> © EngineerBabu. Admin Dashboard. </div>

        <script src="<?php echo base_url()?>template/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/js/parsley.min.js"></script>

        <script src="<?php echo base_url()?>template/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/pages/scripts/login.min.js" type="text/javascript"></script>

<script type="text/javascript">
  $('#form11').parsley();  
</script>
<?php if($this->session->flashdata('email_err') && ($this->session->flashdata('email_err') == '1000') ){ ?>
      <script type="text/javascript">
      jQuery("#myModal").modal('show');
    </script>
    <?php }
    ?>

    <?php if($this->session->flashdata('email_sent') && ($this->session->flashdata('email_sent') == '2000') ){ ?>
      <script type="text/javascript">
      jQuery("#myModal").modal('show');
    </script>
    <?php }
    ?>


    </body>

</html>