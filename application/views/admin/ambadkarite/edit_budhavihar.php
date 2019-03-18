<!DOCTYPE html>
<html lang="en">
<head>
<style>
.wrapper { width: 733px; }
.hidden { display: none; }
#map-canvas { height: 300px; margin: 10px 0;margin-right: -256px; }
</style>
        <meta charset="utf-8" />
        <title>Edit Budhavihar</title>
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
        <link href="<?php echo base_url();?>template/assets/global/css/parsley.css" rel="stylesheet"><!-- Parsley -->
      
        <link href="<?php echo base_url();?>template/assets/global/css/bootstrap-clockpicker.css" rel="stylesheet">
        <link href="<?php echo base_url();?>template/assets/global/css/jquery-clockpicker.css" rel="stylesheet">

        <link rel="shortcut icon" href="favicon.ico" />
         </head>
    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo page-md">
        <!-- BEGIN HEADER -->
       <?php $this->load->view('admin/new_header'); ?>
        
        <div class="clearfix"> </div>
        
        <div class="page-container">
            
           <?php $this->load->view('admin/new_sidebar'); ?>
            
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEAD-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tabbable-line boxless tabbable-reversed">
                <div class="">
                    <div class="tab-pane" id="tab_4">
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption">
                                <i class="fa fa-gift"></i><small>Edit Budhavihar</small> 
                                </div>
                                </div>
            
        <div class="portlet-body form">
        <?php 
          if($this->session->flashdata('success')) { 
            echo "<div class='alert alert-success'>", $this->session->flashdata('success') ,"</div>";
          }else if($this->session->flashdata('failed')){
            echo "<div class='alert alert-danger'>", $this->session->flashdata('failed') ,"</div>";
          } 
          ?>
           <?php if(!empty($budhavihar)){ ?>
            <form  class="form-horizontal form-row-seperated" action="<?php echo base_url().'ambedkarite/Edit_budhavihar/'.$budhavihar->budhavihar_id?>" method="post" id="form11" data-parsley-validate=''>
                <div class="form-body">
                    <div class="form-group">
                        <label class="control-label col-md-3">Budhavihar Name<span class="required"> * </span></label>
                        <div class="col-md-7">
                            <input type="text" placeholder="Budhavihar Name" parsley-required="true" data-parsley-required-message="Budhavihar Name field is required" name="budhavihar_name" class="form-control" value="<?php echo $budhavihar->budhavihar_name;?>" required/>
                        </div>
                    </div>
                    <div class="form-group">
                            <label class="control-label col-md-3">Budhavihar Type<span class="required"> * </span></label>
                            <div class="col-md-7">
                                <input type="text" name="budhavihar_type" placeholder="Budhavihar Type" parsley-required="true" data-parsley-required-message="Budhavihar Type field required"  
                            name="type" class="form-control" value="<?php echo $budhavihar->budhavihar_type;?>" required/>
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Registration No.<span class="required"> * </span></label>
                        <div class="col-md-7">
                            <input type="text" placeholder="Registration No." parsley-required="true" data-parsley-required-message="Registration No. is required" value="<?php echo $budhavihar->registration_no;?>" name="registration_no" class="form-control" required/>
                        </div>
                    </div>
                    <div class="form-group" > 
                        <label class="control-label col-md-3">Founded On<span class="required"> * </span></label>
                        <div class="col-md-7">
                           <input type="name" name="fonded_on" placeholder="Founded on" value="<?php echo $budhavihar->founded_on;?>" id="date1" data-parsley-required-message="Fonded on field is required" class="form-control" required >
                        </div>
                    </div>
                    <div class="form-group" > 
                        <label class="control-label col-md-3">Address<span class="required"> * </span></label>
                        <div class="col-md-7">
                           <input type="name" name="address" value="<?php echo $budhavihar->location;?>" placeholder="Address" data-parsley-required-message="Address field is required" class="form-control" required>
                        </div>
                    </div>
                     <div class="form-group" > 
                        <label class="control-label col-md-3">City<span class="required"> * </span></label>
                        <div class="col-md-7">
                           <input type="name" name="city" value="<?php echo $budhavihar->city;?>" placeholder="City" data-parsley-required-message="City is required" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Contributed By<span class="required"> * </span></label>
                        <div class="col-md-7">
                            <input type="text" name="contributed_by" value="<?php echo $budhavihar->countributed_by;?>" placeholder="Contributed By" parsley-required="true" data-parsley-required-message="Contrybuted is required" name="link" class="form-control" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Activities<span class="required"> * </span></label>
                        <div class="col-md-7">
                            <input type="text" name="activities" value="<?php echo $budhavihar->activities;?>" placeholder="Activities" parsley-required="true" data-parsley-required-message="Activities is required" name="link" class="form-control" required/>
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="control-label col-md-3">Leaders<span class="required"> * </span></label>
                        <div class="col-md-7">
                            <input type="text" name="leader" value="<?php echo $budhavihar->leaders;?>" placeholder="Leaders" parsley-required="true" data-parsley-required-message="Leaders is required" name="link" class="form-control" required/>
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="control-label col-md-3">Contact Details<span class="required"> * </span></label>
                        <div class="col-md-7">
                            <textarea class="form-control" parsley-required="true" data-parsley-required-message="contact Detail is required" name="contact_detail" rows="5" cols="15" name="" required><?php echo $budhavihar->contact_details;?></textarea>
                        </div>
                    </div>
                    <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            <input type="submit" name="submit" class="btn green" value="Submit">
                            <a href="javascript:window.history.go(-1);"><button type="button" class="btn default">Cancel</button></a>
                        </div>
                    </div>
                </div>
            </form>
            <?php } ?>
            <!-- END FORM-->
        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>    
        
     <?php $this->load->view('admin/footer'); ?>
        <script src="<?php echo base_url()?>template/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/js/parsley.min.js"></script>
        <script src="<?php echo base_url()?>template/assets/global/js/jquery-clockpicker.min.js"></script>
        <script src="<?php echo base_url()?>template/assets/global/js/bootstrap-clockpicker.min.js"></script>
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
        
        <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
        
<script type="text/javascript">
 $( function() {
    $( "#date1" ).datepicker({
       changeMonth: true,
       changeYear: true,
    /*   yearRange: '1990:'+(new Date).getFullYear(),*/
       dateFormat:'yy-mm-dd',
       
    });
  } );
 
</script>
<script type="text/javascript">
  $('#form11').parsley();
</script>
        
</body>

</html>