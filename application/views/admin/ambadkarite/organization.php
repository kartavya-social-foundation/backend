<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title> organization|Details</title>
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
        <!-- END THEME LAYOUT STYLES -->
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
                                       Organization List</div>
                                        <a href="<?php echo base_url('ambedkarite/add_organization');?>" title="click here to Unverified" type="button" id="reject_records" class="btn green pull-right">Add Organization<i class="fa fa-plus" aria-hidden="true"></i></a>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_2">
                                        <thead>
                                           <tr>
                                                <th><center>Organization Name</center></th>
                                                <th><center>Organization Type</center></th>
                                                <th><center>Address<center></th>
                                                <th><center>Leader<center></th>
                                                <th><center>Contact Detail<center></th>
                                                <th><center>Action</center></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th><center>Organization Name</center></th>
                                                <th><center>Organization Type</center></th>
                                                <th><center>Address<center></th>
                                                <th><center>Leader<center></th>
                                                <th><center>Contact Detail<center></th>
                                                <th><center>Action</center></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php 
                                        $i=1;
                                        if(!empty($organization))
                                        {
                                            foreach($organization as $key)
                                            {?>
                                                <tr id="xxx<?php echo $key->organization_id;?>">
                                                    <td><center><?php echo $key->organization_name; ?>
                                                        <span class="label label-sm label-success badge"><?php echo 'Registration No - '. $key->registration_no;?></span>    

                                                    </center> </td>
                                                    <td><?php echo $key->organization_type;?> <br>
                                                        <span class="label label-sm label-success badge"><?php echo 'Founded on  - '. $key->founded_on;?></span>    
                                                         &nbsp;
                                                        
                                                    </td>
                                                     <td><center> <?php echo $key->location;?></center></td>
                                                     <td><center><?php echo $key->leaders;?></center></td>
                                                    <td><center><?php  echo $key->contact_details;?></center></td>
                                                    <td><center><a href="<?php echo base_url('ambedkarite/edit_organization/'.$key->organization_id);?>" title="click here to edit"><span class="label label-sm label-purple"><i class="fa fa-pencil"></i></span></a></center></td>
                                                </tr>
                                                  <?php  $i++;
                                             } }
                                          else
                                          {?>
                                      
                                         <tr class="even pointer">
                                                <td class="" ></td>
                                                <td class="" ></td>
                                                <td class=""></td>  
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
           
            <a href="javascript:;" class="page-quick-sidebar-toggler">
                <i class="icon-login"></i>
            </a>
            
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
        <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
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

<script type="text/javascript">
        function deletemain(id,status)
        { 
            var str = "project_id="+id+"&status="+status;
            var r = confirm('Are you really want to delete?');
            if(r==true)
            {
                $.ajax({
                   type:"POST", 
                   url:"<?php echo base_url('project/delete')?>/",
                   data:str,
                   success:function(data)
                   {
                       if(data==1000)
                       {
                            location.reload();
                       }
                   }
                });
            }
        }
    </script>
     <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
   <script type="text/javascript">
        function changestatus(status,id)
        { 
            var str = "project_id="+id+"&status="+status;
            var r = confirm('Are you really want to change status?');
            if(r==true)
            {
                $.ajax({
                   type:"POST",
                   url:"<?php echo base_url('project/project_status')?>/",
                   data:str,
                   success:function(data)
                   {  
                       if(data==1000)
                       {
                            location.reload();
                       }
                   }
                });
            }
        }
    </script>

