<!DOCTYPE html>
<html lang="en">
<head>
<style>
.wrapper { width: 733px; }
.hidden { display: none; }
#map-canvas { height: 300px; margin: 10px 0;margin-right: -256px; }
</style>
        <meta charset="utf-8" />
        <title>Add Administrator</title>
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
                    <ul class="page-breadcrumb breadcrumb">
                    </ul>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tabbable-line boxless tabbable-reversed">
                <div class="">
                    <div class="tab-pane" id="tab_4">
                        <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption">
                                <i class="fa fa-gift"></i><small>Add Administrator</small> 
                                </div>
                                </div>
            
        <div class="portlet-body form">
            
        <?php 
          if ($this->session->flashdata('success')) { 
            echo "<div class='alert alert-success'>", $this->session->flashdata('success') ,"</div>";
          }else if($this->session->flashdata('failed')){
            echo "<div class='alert alert-danger'>", $this->session->flashdata('failed') ,"</div>";
          } 
          ?>
            <form  class="form-horizontal form-row-seperated" action="<?php echo base_url().'admin/add_administrator'?>" method="post"  id="form11" data-parsley-validate='' enctype="multipart/form-data">
                <div class="form-body">
                    
                     <div class="form-group">
                        <label class="control-label col-md-3">Role<span class="required"> * </span></label>
                        <div class="col-md-7">
                             <select class="form-control" name="role" data-parsley-required-message="Role is required" required="">
                                 <option value="">Select Role</option>
                                 <option value="2">Administrator</option>
                                 <option value="3">L1-Admin</option>
                             </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Name<span class="required"> * </span></label>
                        <div class="col-md-7">
                            <input type="text" placeholder="Name"  data-parsley-required-message="Name is required" name="name" class="form-control" data-parsley-pattern="^[A-Za-z ]*$" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Email<span class="required"> * </span></label>
                        <div class="col-md-7">
                            <input type="text" id="email" placeholder="Email" data-parsley-required-message="Email field is required" name="email" data-parsley-type="email" class="form-control" required/>
                             <div id="err" style="list-style-type: none;font-size: 0.9em; line-height: 0.9em;"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Image<span class="required"> * </span><br><span> Size (Max 200*150 px, 200kb)</span></label>
                        <div class="col-md-7">
                            <input type="file" name="image" id="inputfile"  class="form-control"/>
                            <span style="color:red;margin-left:440px;list-style-type: none;font-size: 0.9em;line-height: 0.9em;"><?php if($this->session->flashdata('image_error')){ echo $this->session->flashdata('image_error'); }?></span>
                        </div>
                        <span id="file411" style="margin-left: 27%;list-style-type: none;font-size: 0.9em; line-height: 0.9em;"></span>
                    </div>
                     <div class="form-group">
                        <label class="control-label col-md-3">Mobile No.<span class="required"> * </span></label>
                        <div class="col-md-7">
                            <input type="text" placeholder="Mobile No." data-parsley-required-message="MobileNo. is required" name="mobile_no" class="form-control" required/>
                        </div>
                    </div>
                    <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            <input type="submit" class="btn green" name="submit" value="submit" id="submit">
                            <a href="javascript:window.history.go(-1);"><button type="button" class="btn default">Cancel</button></a>
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
        <script src="<?php echo base_url()?>template/ckeditor/ckeditor.js"></script>

<script>
$(document).ready(function(){
    $("#submit").click(function(){ 
        var email  = $("#email").val();
        var str = 0;
             $.ajax({
                    type:'POST',
                    url: '<?php echo base_url();?>admin/check_email',
                    data: "email="+email,
                    async: false,
                    success: function(data){
                        if(data==10000)
                        {
                          str = 1;  
                          $("#err").html('Email already exists').css('color','red');
                        }
                        else
                        { 
                          $("#err").html('');
                        }
                    },
        
                });
             if(str == 1)
             {
                return false;
             }   

        });

});

</script>        
       
<script type="text/javascript">
  $('#form11').parsley();

</script>
<script>
   $("#submit").click(function() {
    var fileExtension = ['jpeg', 'jpg', 'png'];
    var inputfile =  $("#inputfile").val();

   if(inputfile == '') 
   {
      $("#file411").html('Image is required').css("color", "red");
   }
   else if(inputfile != '' && $.inArray($("#inputfile").val().split('.').pop().toLowerCase(), fileExtension) == -1) {
        
        //alert("Only formats are allowed : "+fileExtension.join(', '));
        $("#file411").html('Only formats are allowed :' +fileExtension.join(', ')).css("color", "red");
        return false;
    }
    return true;
  });
 </script>


</body>

</html>