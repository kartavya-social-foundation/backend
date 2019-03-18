<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title> Deleted|Users</title>
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

        <style type="text/css">
        </style>>
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
                          
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-globe"></i>Archive Users</div>
                                        <div class="actions">
                                       <a title="click here to Verified" type="button" id="active_records" class="btn green pull-right">Verified<i class="fa fa-toggle-on" aria-hidden="true"></i></a> 
                                        </div>
                                </div>
                                <div class="portlet-body">
                               <!--  <form class="form validateForm" action="" method="post" name="myform" id="myform"> -->
                                    <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_2">
                                        <thead>
                                           <tr>
                                                <th><center>All &nbsp;&nbsp;&nbsp;<input type="checkbox" id="select_all"></center></th>
                                                <th><center> Image</center></th>
                                                <th><center> Name </center></th>
                                                <th><center> Email</center></th>
                                                <th><center> State </center></th>
                                                <th><center> Country </center></th>
                                               <!--<th><center>Status</center></th>-->
                                            </tr>
                                        </thead>
                                        <tfoot>
                                           <tr>
                                                <th><center></center></th>
                                                <th><center> Image</center></th>
                                                <th><center> Name </center></th>
                                                <th><center> Email</center></th>
                                                <th><center> State</center></th>
                                                <th><center> Country </center></th>
                                               <!--<th><center>Status</center></th>-->
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php 
                                        if(!empty($user_data))
                                        {
                                            foreach($user_data as $key)
                                            {
                                               $date1 = $key->create_at/1000;
                                                $date = date("d-m-Y H:i:s", $date1);
                                              ?>
                                                 <tr id="xxx<?php echo $key->user_id;?>">
                                                 
                                                  <td><center><input type="checkbox" class="emp_checkbox" data-emp-id="<?php echo $key->user_id; ?>"></center></td>
                                                  
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
                                                    <td><center><?php echo $key->country_name;?></center></td>
                                                </tr>
                                                  <?php  
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
                                   <!--  </form> -->
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
                    <!-- END PAGE BASE CONTENT -->
                </div>
                <!-- END CONTENT BODY -->
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

        <script src="<?php echo base_url()?>template/assets/global/scripts/app.js" type="text/javascript"></script>

        <script src="<?php echo base_url()?>template/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>

        <script src="<?php echo base_url()?>template/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
      
        <script src="<?php echo base_url()?>template/assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>

        <script src="<?php echo base_url()?>template/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
      
        
      
        <script src="<?php echo base_url()?>template/assets/pages/scripts/table-datatables-fixedheader.min.js" type="text/javascript"></script>
     
        <script src="<?php echo base_url()?>template/assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>

        <script src="<?php echo base_url()?>template/assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>

        <script src="<?php echo base_url()?>template/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>
</html>
<script>
// function checkAll(formname, checktoggle)
// {
//       var checkboxes = new Array();
//       checkboxes = document[formname].getElementsByTagName('input');
//       //alert(checkboxes.length);
//       for (var i = 0; i < checkboxes.length; i++) {
//           if (checkboxes[i].type === 'checkbox') {
//                checkboxes[i].checked = checktoggle;
//           }
//       }
//       if(checktoggle==true)
//       {
//           document.getElementById('check').style.display='none'
//           document.getElementById('uncheck').style.display=''
//       }
//       else
//       {
//           document.getElementById('uncheck').style.display='none'
//           document.getElementById('check').style.display=''
//       }


// }
// select all checkbox
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
$('#active_records').on('click', function(e) {
var employee = [];
$(".emp_checkbox:checked").each(function() { 
employee.push($(this).data('emp-id'));
});
if(employee.length <=0) { alert("Please select records."); } else { WRN_PROFILE_DELETE = "Are you sure you want to Active "+(employee.length>1?"these":"this")+" row?";
var checked = confirm(WRN_PROFILE_DELETE);
if(checked == true) {
var selected_values = employee.join(",");
var sts = 1;
$.ajax({
type: "POST",
url: "<?php echo base_url('user/activate_user')?>",
cache:false,
data: 'user_id='+selected_values+'&status='+sts,
success: function(response) { 
    /*if(response.status == true)
    {
        document.location.href = response.redirect;
    } 
    else
    {
        confirm(response.error);
    }*/   
	    var emp_ids = response.split(",");

	    for (var i=0; i < emp_ids.length; i++)
	    { 
	        var str = $.trim(emp_ids[i]);
	        var idz = "xxx"+str;
	        $("#"+idz).hide();
	    }

	  // window.location.reload()
     
       }

     });

   }
 }
});
</script>


                                    


