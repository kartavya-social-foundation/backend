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
        <title>Add|Project</title>
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
                                                    <i class="fa fa-gift"></i>Add Project</div>
                                               
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
            <form action="" id="form11" class="form-horizontal form-row-seperated" onsubmit="return myFunction()"  method="post" enctype="multipart/form-data" data-parsley-validate=''>
                <div class="form-body">
                    <div class="form-group">
                        <label class="control-label col-md-3">Title<span class="required"> * </span></label>
                        <div class="col-md-9">
                            <input type="text" placeholder="Title" name="title" class="form-control"  required/>
                             <?php echo form_error('title', "<span class='error'>", "</span>"); ?>
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="control-label col-md-3">Project Image<span class="required" > * </span><br> <span> Size (Max 700*500 px, 500kb)</span></label>
                        <div class="col-md-9">
                            <input type="file"  name="image[]" placeholder=""  class="form-control " multiple required/>
                            <span style="color:red;margin-left:440px;list-style-type: none;font-size: 0.9em;line-height: 0.9em;"><?php if($this->session->flashdata('image_error')){ echo $this->session->flashdata('image_error'); }?></span>
                           
                        </div>
                        <div id="abc" style="color:red;margin-left: 253px;"></div>
                    </div>
                    <div class="form-group" > 
                        <label class="control-label col-md-3">Start Date<span class="required"> * </span></label>
                        <div class="col-md-3">
                           <input type="text" name="start_date" readonly="readonly" id="date1" data-parsley-required-message="This field is required" class="form-control" required >
                                                   
                        </div>
                        <label class="control-label col-md-2">End Date<span class="required"> * </span></label>
                        <div class="col-md-3">
                        
                         <div class="input-group clockpicker">
                             <input type="text" name="end_date" readonly="readonly" id="date2" data-parsley-required-message="This field is required" class="form-control" required >
                         </div>

                        </div>
                        <span id="ab" style="color:red;margin-left:266px;list-style-type: none;font-size: 0.9em;line-height: 0.9em;"></span> 
                    </div>
                    
                   <div class="form-group">
                        <label class="control-label col-md-3">Address<span class="required"> * </span></label>
                        <div class="col-md-9">
                             <input type="text" name="address" data-parsley-required-message="This field is required" class="form-control" required >
                        </div>
                   </div>
                   <div class="form-group">
                        <label class="control-label col-md-3">Brief Description<span class="required"> * </span></label>
                        <div class="col-md-9">
                             <textarea  class="form-control" name="brief_description" cols="10" rows="5" data-parsley-maxlength="160" data-parsley-error-message="This field can not contain more than 160 characters!" data-parsley-required></textarea>
                        </div>
                   </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-3">Description<span class="required"> * </span></label>
                        <div class="col-md-9">
                         
                            <textarea class="ckeditor"  id="noticemessage" name="description" required></textarea>
                           
                            <?php echo form_error('description', "<span class='error'>", "</span>"); ?>
                            
                        </div>
                         <div id="ab1" style="color:red;margin-left: 304px;"></div>
                    </div>
                     <div class="form-group">
                        <label class="control-label col-md-3">Hosted By<span class="required"> * </span></label>
                        <div class="col-md-9">
                            <input type="text" name="hosted_by" placeholder="Hosted By" parsley-required="true" data-parsley-required-message="This field is required" name="link" class="form-control" required/>
                        </div>
                    </div>
                    
                </div>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            <input type="submit" class="btn green" value="Submit">
                            <a href="<?php echo base_url()?>project/add_project"><button type="button" class="btn default">Reset</button></a>
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
        <script src="<?php echo base_url()?>template/ckeditor/ckeditor.js"></script>

        <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
       
       
<script type="text/javascript">
  $('#form11').parsley();  
</script>

<script type="text/javascript">
 $( function() {
    $( "#date1" ).datepicker({
       changeMonth: true,
       changeYear: true,
       dateFormat:'yy-mm-dd',
       minDate: 0 
    });
  } );

  $( function() {
    $( "#date2" ).datepicker({
       changeMonth: true,
       changeYear: true,
       dateFormat:'yy-mm-dd',
       minDate: 0 
    });
  });
 
</script>
 
<script>
function myFunction() { 
   
   var startdate = document.getElementById("date1").value;
   var enddate = document.getElementById("date2").value;
  
     if(enddate < startdate) {
        $('#ab').html('End date should not be less from start date.');
        return false;
    }
}
</script>
</body>

</html>