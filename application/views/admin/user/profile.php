<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title> Freelancer|Profile</title>
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
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo base_url()?>template/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo base_url()?>template/assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url()?>template/assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?php echo base_url()?>template/assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?php echo base_url()?>template/assets/layouts/layout4/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>template/assets/layouts/layout4/css/themes/light.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?php echo base_url()?>template/assets/layouts/layout4/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo page-md">
        <!-- BEGIN HEADER -->
        <?php $this->load->view("admin/new_header"); ?>
       
        <div class="clearfix"> </div>
       
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
        <?php $this->load->view("admin/new_sidebar");?>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>Freelancer Profile
                                <small></small>
                            </h1>
                        </div>
                        <!-- END PAGE TOOLBAR -->
                    </div>
                    <!-- END PAGE HEAD-->
                    <!-- BEGIN PAGE BREADCRUMB -->
                    <ul class="page-breadcrumb breadcrumb">
                        <li>
                            <a href="<?php echo base_url()?>dashboard">Home</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <a href="<?php echo base_url()?>user">Freelancer</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span class="active">Profile Details</span>
                        </li>
                    </ul>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN PROFILE SIDEBAR -->
                            <div class="profile-sidebar">
                                <!-- PORTLET MAIN -->
                                <div class="portlet light profile-sidebar-portlet bordered">
                                  <!-- SIDEBAR USERPIC -->
                                  <div class="profile-userpic">
                                    <img src="<?php if(!empty($user[0]->user_image)) echo base_url().$user[0]->user_image; else echo base_url().'uploads/user_image/user.png';?>" class="img-responsive" alt=""> 
                                  </div>
                                  <!-- END SIDEBAR USERPIC -->
                                  <!-- SIDEBAR USER TITLE -->
                                  <div class="profile-usertitle">
                                    <div class="profile-usertitle-name"><?php echo $user[0]->user_fname.' '.$user[0]->user_lname;?></div>
                                   
                                    <div class="profile-usertitle-job"> <!-- <i class="fa fa-map-marker"></i> -->
                                  
                                    </div>
                                  </div>
                                  <div class="profile-userbuttons">
                                   
                                    </div>
                                  <!-- END SIDEBAR USER TITLE -->
                                  <!-- SIDEBAR BUTTONS -->
                                  <div class="profile-userbuttons">
                                    <span class="label label-sm label-purple">Registration Date - <?php echo date(" d-m-Y ", strtotime($user[0]->user_reg_date)); ?></span></br>
                                    
                                    <a title="Edit" href="<?php echo base_url('user/edit_user/'.$user[0]->user_id);?>" class="label label-sm label-success">Edit</a>
                                    <a onclick='deletemain("<?php echo $user[0]->user_id;?>");' href="javascript:void(0);" title="Delete" class="label label-sm label-danger">Delete</a>
								  </div>
                                  <!-- END SIDEBAR BUTTONS -->
                                  
                                  <div class="profile-usermenu">
                                    <ul class="nav">
                                    </ul>
                                  </div>
                                  <!-- SIDEBAR MENU -->
                                  <!-- END MENU -->
                                </div>

                                <!-- END PORTLET MAIN -->
                                <!-- PORTLET MAIN -->
                                <div class="portlet light bordered">
                                    <!-- STAT -->
                                    <div class="caption caption-md">
                                                    <i class="icon-globe theme-font hide"></i>
                                                    <span class="caption-subject font-blue-madison bold uppercase">Contact Details</span>
                                                </div>
                                    
                                    <!-- END STAT -->
                                    <div>
                                        <div class="margin-top-20 profile-desc-link">
                                            <i class="fa fa-mobile"></i>
                                            <?php echo $user[0]->user_mobile;?>
                                        </div>
                                        
                                        <div class="margin-top-20 profile-desc-link">
                                            <i class="fa fa-envelope"></i>
                                            <?php echo $user[0]->user_email;?>
                                        </div>
                                    </div>
                                </div>
                                        <!-- BEGIN address -->
                                       
                                        <!-- END address -->
                                <!-- END PORTLET MAIN -->
                            </div>
                            <!-- END BEGIN PROFILE SIDEBAR -->
                            <!-- BEGIN PROFILE CONTENT -->
                            <div class="profile-content">
                            	<div class="row">
                                    <div class="col-md-12">
                                        <!-- BEGIN PORTLET -->
                                        <div class="portlet light bordered">
                                            <div class="portlet-title">
                                                <div class="caption caption-md">
                                                    <i class="icon-bar-chart theme-font hide"></i>
                                                    <span class="caption-subject font-blue-madison bold uppercase">Bidding History</span>
                                                    <span class="caption-helper hide">weekly stats...</span>
                                                </div>
                                                
                                            </div>
                                            <div class="portlet-body">
                                                <div class="table-scrollable table-scrollable-borderless">
                                                    <table class="table table-hover table-light">
                                                        <thead>
                                                            <tr class="uppercase">
                                                            	<th>Project Name</th>
                                                               <!--  <th>Company Details</th> -->
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <?php if(!empty($bid_data)){
                                                              foreach($bid_data as $key_data) 
                                                              { 
                                                         ?>
                                                        <tr>
                                                            <td>
                                                                <a href="<?php echo base_url('projects/profile/'.$key_data->project_id);?>"><?php echo $key_data->project_title?></a>
                                                            </td>
                                                           
                                                            <td>
                                                                <?php if($key_data->project_status==0){ echo '<span class="label label-sm label-primary badge"><big> NEW </big></span>';} else if($key_data->project_status==1){ echo '<span class="label label-sm label-primary badge"><big> Running </big></span>';} else if($key_data->project_status==2){ echo '<span class="label label-sm label-primary badge"><big> Completed </big></span>';} else if($key_data->project_status==3){ echo '<span class="label label-sm label-danger"><big> cancelled </big></span>';} ?>
                                                            </td>
                                                        </tr>
                                                        <?php }} ?>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END PORTLET -->
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
            <!-- BEGIN QUICK SIDEBAR -->
            <a href="javascript:;" class="page-quick-sidebar-toggler">
                <i class="icon-login"></i>
            </a>
          
            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <?php $this->load->view("admin/footer.php"); ?>
        <!-- END FOOTER -->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo base_url()?>template/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url()?>template/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/gmaps/gmaps.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo base_url()?>template/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url()?>template/assets/pages/scripts/profile.min.js" type="text/javascript"></script>
        
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo base_url()?>template/assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
<script type="text/javascript">
function deletemain(id)
{ 
    //alert(id);
    var r = confirm('Are you really want to delete this user ?');
    if(r==true)
    {
        $.ajax({
           url:"<?php echo base_url('user/delete_user')?>/"+id,
           success:function(data)
           { alert(data);
             if(data==1000)
             {
               location.reload();
             }
           }
        });
    }
}
</script>
        
    </body>

</html>