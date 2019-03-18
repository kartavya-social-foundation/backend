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
        <title>Add|Poll</title>
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
                                <ul class="nav nav-tabs">
                                   
                                </ul>
                                <div class="">
                                    <div class="tab-pane" id="tab_4">
                                        <div class="portlet box blue">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-gift"></i>Add Poll</div>
                                               
                                            </div>
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form action="" id="form11" class="form-horizontal form-row-seperated" method="post" enctype="multipart/form-data" data-parsley-validate=''>
                <div class="form-body">
                   <div class="form-group">
                        <label class="control-label col-md-3">Category<span class="required"> * </span></label>
                        <div class="col-md-6">
                        <select class="form-control" name="category_id" required>
                         <option value="">Select Category</option>
                         <?php if(!empty($category)){ 
                            foreach($category as $cat)
                            {?>
                            <option value="<?php echo $cat->category_id;?>"><?php echo $cat->category_name;?> </option>
                        <?php } } ?>
                        </select>
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="control-label col-md-3">Poll Image <br><span> Size (Max 700*500 px, 500kb)</span></label>
                        <div class="col-md-6">
                            <input type="file"  name="image" id="inputfile"  class="form-control " />
                            <span style="color:red;margin-left:440px;list-style-type: none;font-size: 0.9em;line-height: 0.9em;"><?php if($this->session->flashdata('image_error')){ echo $this->session->flashdata('image_error'); }?></span>
                        </div>
                        <span id="file411" style="margin-left: 27%;list-style-type: none;font-size: 0.9em; line-height: 0.9em;"></span>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Question<span class="required"> * </span></label>
                        <div class="col-md-6">
                             <input type="text" name="question" data-parsley-required-message="This field is required" class="form-control" required >
                        </div>
                   </div>
                   <div class="field_wrapper">
                   <input type="hidden" id="no_val" value="3">
                    <div class="form-group">
                        <label class="control-label col-md-3">Answer - option <span class="required"> * </span></label>
                        <div class="col-md-6">
                            <input type="text" placeholder="Answer" parsley-required="true" name="answer[]" id="answer" class="form-control" required/>
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="control-label col-md-3">option <span class="required"> * </span></label>
                        <div class="col-md-6">
                            <input type="text" placeholder="Answer" parsley-required="true" name="answer[]" id="answer" class="form-control" required/>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            <input type="submit" class="btn green" id="submit" value="Submit" >
                            <a href="<?php echo base_url()?>poll/add_poll"><button type="button" class="btn default">Reset</button></a>
                             &nbsp&nbsp&nbsp
                            <button type="button"  name='addmore' class="btn green add_button">Add More Option</button>
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

<script type="text/javascript">
  $('#form11').parsley();  
</script>

<script type="text/javascript">


$(document).ready(function(){
   

    var maxField = 4; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    //var fieldHTML = '<div class="form-group"><div class="form-group"><label class="control-label col-md-3">option ('+i+')<span class="required"> * </span></label> <div class="col-md-6"><input type="text" placeholder="Answer" parsley-required="true" name="answer[]" id="answer" class="form-control" required/></div></div><br/><a href="#" style="margin-top:-25px" class="remove_button control-label col-md-4">Remove</a></div>'; //New input field html 
      
        var x = 1; //Initial field counter is 1
        
        var i = $('#no_val').val();
        $(addButton).click(function(){
         //Once add button is clicked
            if(x < maxField){ //Check maximum number of input fields
                x++;
              
                //Increment field counter
                $(wrapper).append('<div class="form-group"><div class="form-group"><label class="control-label col-md-3">option<span class="required"> * </span></label> <div class="col-md-6"><input type="text" placeholder="Answer" parsley-required="true" name="answer[]" id="answer" class="form-control" required/></div></div><br/><a href="#" style="margin-top:-25px" class="remove_button control-label col-md-4">Remove</a></div>'); // Add field html
            }
           
           //i++;
           //$('#no_val').val(i);
        });

    $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--;//Decrement field counter
        //i--;
        //$('#no_val').val(i); 
    });
        
});
</script>
<script>
   $("#submit").click(function() {
    var fileExtension = ['jpeg', 'jpg', 'png'];
    var inputfile =  $("#inputfile").val();

   if(inputfile != '' && $.inArray($("#inputfile").val().split('.').pop().toLowerCase(), fileExtension) == -1) {
        
            //alert("Only formats are allowed : "+fileExtension.join(', '));
        $("#file411").html('Only formats are allowed :' +fileExtension.join(', ')).css("color", "red");
        return false;
    }
    return true;
  });
 </script>
        
</body>

</html>