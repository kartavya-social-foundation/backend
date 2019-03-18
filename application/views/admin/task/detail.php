<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Task | Details</title>
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
      
        <link href="<?php echo base_url()?>template/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
       
        <link href="<?php echo base_url()?>template/assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url()?>template/assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
      
        <link href="<?php echo base_url()?>template/assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />
        
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
      <?php $this->load->view("admin/new_sidebar"); ?>
      <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
          <!-- BEGIN PAGE HEAD-->
          <div class="page-head">
          </div>
          <div class="row">
            <div class="col-md-12">
            </div>
            <div class="col-md-12">
              <div class="portlet box green">
                <div class="portlet-title">
                  <div class="caption">Task Details</div>
                </div>
                <div class="portlet-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                     <tbody>
                        <tr>
                          <th width="30%"> Title </th>
                          <td style="text-align:center"><button type="button" class="btn green"> <?php echo $task_data->title;?> </button></td>
                        </tr>
                         <tr>
                          <th width="30%"> Image </th>
                           <td colspan="2" style="text-align:center"> 
                            <?php if($task_data->image!=''){?>
                            <br><img src="<?php echo base_url('uploads/task_image/'.$task_data->image);?>" width="120px" hieght="120px">
                            <?php } else echo "<strong> - No image found!</strong>";?>
                            </td>
                        </tr>
                        <tr>
                          <th width="30%"> Description </th>
                          <td><p><?php echo strip_tags($task_data->description);?> </p></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
           
        </div>
        <!-- END PAGE BASE CONTENT -->
      </div>
      <!-- END CONTENT BODY -->
    </div>
    <a href="javascript:;" class="page-quick-sidebar-toggler"> <i class="icon-login"></i> </a>
    <?php $this->load->view("admin/footer"); ?>
        <script src="<?php echo base_url()?>template/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>template/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>template/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>template/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>template/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>template/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>template/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>template/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
   
    <script src="<?php echo base_url()?>template/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>template/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
    <script src="<?php echo base_url()?>template/assets/global/plugins/gmaps/gmaps.min.js" type="text/javascript"></script>
   
    <script src="<?php echo base_url()?>template/assets/global/scripts/app.min.js" type="text/javascript"></script>
   
    <script src="<?php echo base_url()?>template/assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>template/assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>template/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
   
    </body>

</html>