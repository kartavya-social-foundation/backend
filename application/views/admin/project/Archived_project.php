<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Archived Project|Details</title>
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
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                      Archived Project </div>
                                    <div class="actions">
                                    <a title="click here to delete" type="button" id="delete_records" class="btn green pull-right">Delete<i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                    <a title="click here to Verified" type="button" id="active_records" class="btn green pull-right">Verified<i class="fa fa-toggle-on" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_2">
                                        <thead>
                                           <tr>
                                                <th><center>All&nbsp;&nbsp;<input type="checkbox" id="select_all"></center></th>
                                                <th><center>Title</center> </th>
                                                <th><center>Description</center></th>
                                                <th><center>Status<center></th>
                                                <th><center>Detail<center></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                           <tr>
                                                <th></th>
                                                <th><center>Title</center> </th>
                                                <th><center>Description</center></th>
                                                <th><center>Status<center></th>
                                                <th><center>Detail<center></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php 
                                        $i=1;
                                        if(!empty($project_data))
                                        {
                                            foreach($project_data as $key)
                                            {?>
                                                <tr id="xxx<?php echo $key->project_id;?>">
                                                    <td><center><input type="checkbox" class="emp_checkbox" data-project-id="<?php echo $key->project_id;?>"></center></td>
                                                    <td>
                                                        <?php echo $key->title;?><br>
                                                         <?php                                 
                                                            $sdate = $key->start_date;
                                                            $startdate = substr($sdate,0,10);

                                                            $edate = $key->end_date;
                                                            $enddate = substr($edate,0,10);
                                                            ?>
                                                        <span class="label label-sm label-success badge"><?php echo 'Start Date - '. $startdate;?></span>    
                                                         &nbsp;
                                                        <span class="label label-sm label-success badge"><?php echo 'End Date - '. $enddate;?></span> 
                                                    </td>
                                                    <td><?php echo substr($key->description,0,50)."...";?></td>
                                                    <td width="85px;"><center><?php if($key->admin_status == 2){ echo 'Rejected';}?></center>
                                                    </td>
                                                    <td><center><a href="<?php echo base_url('project/detail/'.$key->project_id); ?>" title="click here to details"><span class="label label-sm label-primary"><i class="fa fa-info-circle"></i></span></a></center>
                                                    </td>
                                                </tr>
                                                  <?php  $i++;
                                             } }
                                          else
                                          {?>
                                      
                                        <tr class="even pointer">
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
        <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>
</html>

<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
   <script type="text/javascript">
        function changestatus(status,id)
        { 
            var str = "project_id="+id+"&status="+status;

            alert(str);
            var r = confirm('Are you really want to change status?');
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

//delete selected records
$('#delete_records').on('click', function(e) {
var project = [];
$(".emp_checkbox:checked").each(function() { 
project.push($(this).data('project-id'));
});
if(project.length <=0) { alert("Please select records."); } else { WRN_PROFILE_DELETE = "Are you sure you want to delete "+(project.length>1?"these":"this")+" row?";
var checked = confirm(WRN_PROFILE_DELETE);
if(checked == true) {
var selected_values = project.join(",");
$.ajax({
type: "POST",
url: "<?php echo base_url('project/delete')?>",
cache:false,
data: 'project_id='+selected_values, 
success: function(response) { 

var project_ids = response.split(",");

            for (var i=0; i < project_ids.length; i++)
            { 
                var str = $.trim(project_ids[i]);
                var idz = "xxx"+str;
                $("#"+idz).hide();
            }

        }

     });

   }
  }
});

$('#active_records').on('click', function(e) {
var project = [];
$(".emp_checkbox:checked").each(function() { 
project.push($(this).data('project-id'));
});
if(project.length <=0) { alert("Please select records."); } else { WRN_PROFILE_DELETE = "Are you sure you want to active "+(project.length>1?"these":"this")+" row?";
var checked = confirm(WRN_PROFILE_DELETE);
if(checked == true) {
var selected_values = project.join(",");
$.ajax({
type: "POST",
url: "<?php echo base_url('project/active_project1')?>",
cache:false,
data: 'project_id='+selected_values,
success: function(response) { 

  var project_ids = response.split(",");

        for (var i=0; i < project_ids.length; i++)
        { 
            var str = $.trim(project_ids[i]);
            var idz = "xxx"+str;
            $("#"+idz).hide();
        }

    }
  
    });

   }
 }
});
</script>

