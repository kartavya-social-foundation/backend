<!DOCTYPE html>
<html lang="en">
    <head>
         <style>
        .error{
            color:#ff3355;
        }
        </style>
        <meta charset="utf-8" />
        <title>Add|Sector</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>template/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>template/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>template/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>template/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>template/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
       
        <link href="<?php echo base_url()?>template/assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url()?>template/assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>template/assets/layouts/layout4/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>template/assets/layouts/layout4/css/themes/light.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?php echo base_url()?>template/assets/layouts/layout4/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!--==partley css==-->
        <link href="<?php echo base_url();?>template/assets/global/css/parsley.css" rel="stylesheet">  
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->
    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo page-md">
       
       <?php $this->load->view('admin/new_header'); ?>
      
        <div class="clearfix"> </div>
      
        <div class="page-container">
           
           <?php $this->load->view('admin/new_sidebar'); ?>
           
            <div class="page-content-wrapper">
                
                <div class="page-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tabbable-line boxless tabbable-reversed">
                                <div class="">
                                    <div class="tab-pane" id="tab_4">
                                        <div class="portlet box blue">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-gift"></i>Add Sector</div>
                                               
                                            </div>
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <?php 
           if($this->session->flashdata('success'))
           {
             echo "<div class='alert alert-success'>",$this->session->flashdata('success'),"</div>"; 
           }else
           {
             echo "<div class='alert alert-danger'>",$this->session->flashdata('failed'),"</div>"; 
           }
           ?>
            <form action="" id="form11" class="form-horizontal form-row-seperated" method="post" data-parsley-validate=''>
                <div class="form-body">
                    <div class="form-group">
                        <label class="control-label col-md-3">Sector Type<span class="required"> * </span></label>
                        <div class="col-md-6">
                            <select class="form-control" name="sector_type" required="">
                                  <option value="">Select</option>
                                  <option value="1">Public</option>
                                  <option value="2">Private</option>
                                  <option value="3">Government</option>
                                  <option value="4">Self Employed</option>
                                  <option value="5">Unpaid Family Workers</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Sector Name<span class="required"> * </span></label>
                        <div class="col-md-6">
                            <input type="text" placeholder="Sector Name" name="sector" class="form-control"  required/>
                        </div>
                    </div>
                    <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            <input type="submit" class="btn green" name="submit" value="Submit">&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="<?php echo base_url()?>setting/sector"><button type="button" class="btn default">Cancel</button></a>
                        </div>
                    </div>
                </div>
            </form>
            <!-- END FORM-->
        </div>
          </div>
            </div>
             </div>
              </div>
                </div>
                  </div>
                    <!-- END PAGE BASE CONTENT -->
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>
     <?php $this->load->view('admin/footer'); ?>
        <script src="<?php echo base_url()?>template/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
         <script src="<?php echo base_url()?>template/assets/global/js/parsley.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
    
        <script src="<?php echo base_url()?>template/assets/global/scripts/app.min.js" type="text/javascript"></script>
     
        <script src="<?php echo base_url()?>template/assets/pages/scripts/form-samples.min.js" type="text/javascript"></script>
      
        <script src="<?php echo base_url()?>template/assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
       
<script type="text/javascript">
  $('#form11').parsley();  
</script>
 
</body>

</html>