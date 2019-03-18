<!DOCTYPE html>
<html lang="en">
    <!-- BEGIN HEAD -->
    <head>
         <style>
        .error{
            color:#ff3355;
        }
        </style>
        <meta charset="utf-8" />
        <title>Custom|Notification</title>
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
                                                    <i class="fa fa-gift"></i>Custom Notification</div>
                                               
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
                        <label class="control-label col-md-3">Subject<span class="required"> * </span></label>
                        <div class="col-md-7">
                            <input type="text" placeholder="Subject" parsley-required="true" data-parsley-required-message="Subject field required" name="subject" class="form-control" required/>
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="control-label col-md-3">Target Location<span class="required"> * </span></label>
                        <div class="col-md-7">
                              <select class="form-control" name="city" parsley-required="true" data-parsley-required-message="Target Location required" required>
                                    <option value=""> Select city</option>
                                    <option value="0"> All City</option>
                                    <?php if(!empty($city_data)){
                                        foreach($city_data as $city)
                                        { ?>
                                         <option value="<?php echo $city->city_name;?>"><?php echo $city->city_name;?></option>
                                        <?php } } ?>
                             </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Choose Event<span class="required"> * </span></label>
                        <div class="col-md-7">
                             <select class="form-control" parsley-required="true" data-parsley-required-message="Please Choose Event" name="event_id" required>
                                    <option value=""> Select Event</option>
                                 <?php if(!empty($event_data)){
                                    foreach($event_data as $event)
                                    {?>
                                        <option value="<?php echo $event->event_id;?>"><?php echo $event->title;?></option>
                                    <?php } } ?>
                             </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Message<span class="required"> * </span></label>
                         <div class="col-md-7">
                             <textarea class="form-control" name="message" rows="6" cols="5" parsley-required="true" data-parsley-required-message="Message is Required" required=""></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            <input type="submit" class="btn green" value="Submit" >
                            <a href="<?php echo base_url()?>setting/custom_notification"><button type="button" class="btn default">Reset</button></a>
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