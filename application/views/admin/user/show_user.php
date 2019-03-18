<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title> User|Details</title>
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
      
        <link href="<?php echo base_url()?>template/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>template/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
      
        <link href="<?php echo base_url()?>template/assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url()?>template/assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
     
        <link href="<?php echo base_url()?>template/assets/layouts/layout4/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>template/assets/layouts/layout4/css/themes/light.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?php echo base_url()?>template/assets/layouts/layout4/css/custom.min.css" rel="stylesheet" type="text/css" />
       
        <link rel="shortcut icon" href="favicon.ico" />
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">

        </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo page-md">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
           <?php $this->load->view("admin/new_header"); ?>
            <!-- END HEADER INNER -->
        </div>
     
        <div class="clearfix"> </div>
      
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
             <?php $this->load->view("admin/new_sidebar"); ?>
         
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEAD-->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <?php if($this->session->flashdata('error')){?>
                                    <div class="alert alert-danger">
                                        <button class="close" data-close="alert"></button>
                                        <span> <?php echo $this->session->flashdata('error');?></span>
                                    </div>
                                <?php }?>
                                <?php if($this->session->flashdata('success')){?>
                                    <div class="alert alert-success">
                                        <button class="close" data-close="alert"></button>
                                        <span> <?php echo $this->session->flashdata('success');?></span>
                                    </div>
                                <?php }?>
                          
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-globe"></i>Verified User</div>
                                    <div class="actions">

                                        <?php if($this->session->userdata('role') == 1){ ?> 
                                          <a title="click here to delete" type="button" id="delete_records" class="btn green pull-right">Archive<i class="fa fa-trash-o" aria-hidden="true"></i></a>   
                                       <?php } ?>   
                                    </div>    
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_2">
                                        <thead>
                                           <tr>
                                                <?php if($this->session->userdata('role') == 1){ ?>
                                                <th><center>All&nbsp;&nbsp;&nbsp;<input type="checkbox" id="select_all"></center></th>
                                                <?php }else { echo '';} ?>
                                                <th><center>Image</center></th>
                                                <th><center>Name </center></th>
                                                <th><center>Email</center></th>
                                                <th><center>State </center></th>
                                               <!--  <th><center>Status</center></th> -->
                                                <th><center>Action<center></th>
                                             
                                            </tr>
                                        </thead>
                                        <tfoot>
                                           <tr>
                                                <?php if($this->session->userdata('role') == 1){ ?>
                                                <th><center></center></th> 
                                                 <?php }else { echo '';} ?>
                                                <th><center>Image</center></th>
                                                <th><center>Name </center></th>
                                                <th><center>Email</center></th>
                                                <th><center>State</center></th>
                                                <!-- <th><center>Status</center></th> -->
                                                <th><center>Action<center></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php 
                                        //$i=1;
                                        if(!empty($user_data))
                                        {
                                            foreach($user_data as $key)
                                            {
                                               $date1 = $key->create_at/1000;
                                                $date = date("d-m-Y H:i:s", $date1);
                                              ?>
                                                <tr id="xxx<?php echo $key->user_id;?>">

                                                <?php if($this->session->userdata('role') == 1){ ?>
                                                <td><center><input type="checkbox" class="emp_checkbox" data-emp-id="<?php echo $key->user_id; ?>"></center></td>   
                                                 <?php }else { echo '';} ?>    
                                                    <td><center><?php if($key->image){ $image = $key->image;}else{ $image  = 'default-medium.png'; };?>
                                                      <img src="<?php echo base_url('uploads/user_image/'.$image); ?>" width="60px" height="60px" class="img-circle">  

                                                    </center> </td>
                                                    <td><center><?php echo $key->username.' '.$key->user_surname;?><br>
                                                       
                                                        <span class="label label-sm label-success badge"><i class='fa fa-mobile-phone'></i>&nbsp;&nbsp;<?php echo  $key->mobileno;?></span>
                                                     </center></td>
                                                    <td><center><?php echo $key->email;?><br>
                                                     <span class="label label-sm label-success badge"><?php echo 'Date - '. $date;?></span>
                                                    </center> </td>
                                                  
                                                    <td><center><?php echo $key->state_name;?></center></td>
                                                    <td><center><a href="<?php echo base_url('user/edit/'.$key->user_id);?>" title="click here to edit"><span class="label label-sm label-purple"><i class="fa fa-pencil"></i></span></a></center>
                                                      </td>
                                                </tr>

                                                  <?php  //$i++;
                                             } }
                                          else
                                          {?>
                                        <tr class="even pointer">
                                                <td class="" ></td>
                                                <td class="" ></td>
                                                <td class="" ></td>
                                                <td class="" ><?php echo "Record not found";?></td>
                                                <td class=""></td>
                                                <td class=""></td>
                                                
                                        </tr>
                                        <?php
                                        }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
                    <!-- END PAGE BASE CONTENT -->
                </div>
                <!-- END CONTENT BODY -->
            </div>
           <div class="modal fade" id="myModal" role="dialog">
			    <div class="modal-dialog">
			    
			      <!-- Modal content-->
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h4 class="modal-title">Why You Want to Delete this user ?</h4>
			        </div>
			        <div class="modal-body">
			          <form method="post" id ="form1" action="<?php echo base_url()?>user/delete">
                <input type="hidden" id="userid" name="userid" value="">
			            <div class="form-group">
                        <label class="control-label col-md-3"><span class="required"> </span></label>
                        <div class="col-md-9">
                            <textarea id="noticemessage" name="comment" rows="5" cols="35" required=""></textarea>
                        </div>
                    </div>
                     <input type="submit" class="btn green" value="Submit" style="margin-left:48%;">
			          </form>
			        </div>
			      
			      </div>
			      
			    </div>
  			</div>
            <a href="javascript:;" class="page-quick-sidebar-toggler">
                <i class="icon-login"></i>
            </a>
            <!-- END QUICK SIDEBAR -->
        </div>
      
      <?php $this->load->view("admin/footer"); ?>
     
        <script src="<?php echo base_url()?>template/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
      
        <script src="<?php echo base_url()?>template/assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
      
        <script src="<?php echo base_url()?>template/assets/global/scripts/app.js" type="text/javascript"></script>
      
        <script src="<?php echo base_url()?>template/assets/pages/scripts/table-datatables-fixedheader.min.js" type="text/javascript"></script>
     
        <script src="<?php echo base_url()?>template/assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>
</html>
<script type="text/javascript">
$('#select_all').on('click', function(e) {
if($(this).is(':checked',true)) {
$(".emp_checkbox").prop('checked', true);
}
else {
$(".emp_checkbox").prop('checked',false);
}
// set all checked checkbox count
$("#select_count").html($("input.emp_checkbox:checked").length+" Selected");
});
// set particular checked checkbox count
$(".emp_checkbox").on('click', function(e) {
$("#select_count").html($("input.emp_checkbox:checked").length+" Selected");
});
</script>

<script>
    // delete selected records
$('#delete_records').on('click', function(e) {
var employee = [];
$(".emp_checkbox:checked").each(function() { 
employee.push($(this).data('emp-id'));
});
if(employee.length <=0) { alert("Please select records."); } else { WRN_PROFILE_DELETE = "Are you sure you want to delete "+(employee.length>1?"these":"this")+" row?";
var checked = confirm(WRN_PROFILE_DELETE);
if(checked == true) {
var selected_values = employee.join(",");
$.ajax({
type: "POST",
url: "<?php echo base_url('user/delete_user')?>",
cache:false,
data: 'emp_id='+selected_values,
success: function(response) {
// remove deleted employee rows
var emp_ids = response.split(",");

for (var i=0; i < emp_ids.length; i++)
{ 
    var str = $.trim(emp_ids[i]);
    var idz = "xxx"+str;
   // $("#"+idz).css("display", "none");
   $("#"+idz).hide();
}

        }

     });

   }
 }
});

</script>



     


