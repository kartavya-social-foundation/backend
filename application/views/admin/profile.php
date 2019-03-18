<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Edit | Profile</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>template/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>template/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>template/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>template/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>template/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
      
        <link href="<?php echo base_url()?>template/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
       
        <link href="<?php echo base_url()?>template/assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url()?>template/assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
       
        <link href="<?php echo base_url()?>template/assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />
      
        <link href="<?php echo base_url()?>template/assets/layouts/layout4/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>template/assets/layouts/layout4/css/themes/light.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?php echo base_url()?>template/assets/layouts/layout4/css/custom.min.css" rel="stylesheet" type="text/css" />
        <style type="text/css">
            .profile-userpic img{ max-width: 120px; }
        </style>
        <!-- END THEME LAYOUT STYLES -->

          <link href="<?php echo base_url();?>template/assets/global/css/parsley.css" rel="stylesheet">
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo page-md">
        <!-- BEGIN HEADER -->
        <?php $this->load->view('admin/new_header'); ?>
       
        <div class="clearfix"> </div>
       
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
             <?php $this->load->view('admin/new_sidebar'); ?>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>Admin Profile
                            </h1>
                        </div>
                    </div>
                    <ul class="page-breadcrumb breadcrumb">
                        <?php if(!empty($this->session->flashdata('success'))){echo "<span style='color:green'>".$this->session->flashdata('success')."</span>"; }?>
                    </ul>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN PROFILE SIDEBAR -->
                            <div class="profile-sidebar">
                                <!-- PORTLET MAIN -->
                                <div class="portlet light profile-sidebar-portlet bordered">
                                    <!-- SIDEBAR USERPIC -->
                                    <div class="profile-userpic">
                                   <?php  
                                       if(!empty($admin_data->image))
                                       {
                                         $image = $admin_data->image;
                                      }else{ $image = 'default-medium.png';}
                                     ?>    

                                        <img  src="<?php echo base_url('uploads/admin_image/'.$image);?>" class="img-responsive img-circle" alt="" width="30px" height="30px"> </div>
                                    <div class="profile-usertitle">
                                        <div class="profile-usertitle-name"> <?php if(isset($admin_data->name)){echo $admin_data->name;}?> </div>
                                       
                                    </div>
                                </div>
                                <div class="portlet light bordered">
                                    <div class="caption caption-md">
                                        <i class="icon-globe theme-font hide"></i>
                                        <span class="caption-subject font-blue-madison bold uppercase">Contact Details</span>
                                    </div>
                                    <div>
                                        <div class="margin-top-20 profile-desc-link">
                                            <i class="fa fa-envelope-o"></i>
                                            <?php if(isset($admin_data->email)){ echo $admin_data->email; } ?>
                                        </div>
                                       <!--  <div class="margin-top-20 profile-desc-link">
                                            <i class="fa fa-envelope"></i>
                                            
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="profile-content">
                            	<div class="row">
                                    <div class="col-md-6">
                                        <div class="portlet light bordered">
                                            <div class="portlet-title">
                                                <div class="caption caption-md">
                                                    <i class="icon-bar-chart theme-font hide"></i>
                                                    <span class="caption-subject font-blue-madison bold uppercase">Update Information</span>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="table-scrollable table-scrollable-borderless">
                                                    <form id="login-form" action="<?php echo base_url('profile/edit');?>" method="post" id="profile_form" data-parsley-validate="" enctype="multipart/form-data" >
                                                    <input type="hidden" name="admin_id1" valu="<?php if($admin_data){echo $admin_data->admin_id;}?>">
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <input class="form-control" name="name" type="text" placeholder="Name" value="<?php if($admin_data){echo $admin_data->name;}?>" data-parsley-pattern="^[A-Za-z ]*$" required>
                                                            </div>
                                                            <div class="form-group">
                                                              <?php if($admin_data->role == 2 || $admin_data->role == 3)
                                                                    {
                                                                        $readonly = 'readonly';
                                                                    }else { $readonly = ''; } ?>
                                                                <input class="form-control" data-parsley-type="email" name="email" type="text" placeholder="Email" data-parsley-type="email" value="<?php if($admin_data){echo $admin_data->email;}?>" required <?php echo $readonly;?>>
                                                            </div>
                                                            <div class="form-group">
                                                                <input class="form-control" name="admin_img" type="file" >
                                                               <?php if($this->session->flashdata('error_pic')){ echo "<div style='color:red;list-style-type: none;font-size: 0.9em;line-height: 0.9em;'>",$this->session->flashdata('error_pic'),"</div>"; }?>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                        <input  type="submit" name="submit" class="btn btn-primary" value="Submit">

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="portlet light bordered">
                                            <div class="portlet-title">
                                                <div class="caption caption-md">
                                                    <i class="icon-bar-chart theme-font hide"></i>
                                                    <span class="caption-subject font-blue-madison bold uppercase">Update password</span>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="table-scrollable table-scrollable-borderless">
                                                    <form id="login_form" action="<?php echo base_url('profile/edit');?>" method="post" data-parsley-validate="">
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <input class="form-control" id="old_password" name="O_password" type="password" placeholder="Old Password" required>
                                                                <?php if(!empty($this->session->flashdata('fail'))){echo "<span style='color:red'>".$this->session->flashdata('fail')."</span>"; }?>
                                                            </div>
                                                            <div class="form-group">
                                                                <input class="form-control" id="password" name="password" type="password" minlength="6" maxlength="10" placeholder="New Password" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <input class="form-control" data-parsley-equalto="#password" name="c_password" type="password" placeholder="Confirm Password" required>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                        <input  type="submit" name="submit1" class="btn btn-primary" value="Submit">

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                             
                            </div>
                            <!-- END PROFILE CONTENT -->
                        </div>
                    </div>
                    <!-- END PAGE BASE CONTENT -->
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
           
        </div>
      
        <?php $this->load->view('admin/footer');?>
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo base_url()?>template/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
         <script src="<?php echo base_url()?>template/assets/global/js/parsley.min.js"></script>
         <script src="<?php echo base_url(); ?>template/parsley/parsley.min.js"> </script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
      
        <script src="<?php echo base_url()?>template/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
      
        <script src="<?php echo base_url()?>template/assets/global/scripts/app.min.js" type="text/javascript"></script>
       
        <script src="<?php echo base_url()?>template/assets/pages/scripts/profile.min.js" type="text/javascript"></script>
       
       
        <script src="<?php echo base_url()?>template/assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
        <!-- <script src="assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script> -->
        <!-- END THEME LAYOUT SCRIPTS -->
        <script type="text/javascript">
  $('#profile_form').parsley();
  $('#login_form').parsley();
</script>
<script>
</script>  

    </body>

</html>