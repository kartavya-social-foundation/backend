<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title> User|Post</title>
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
                            <div class="portlet box blue">
                                <div class="portlet-title">
                                    <div class="caption">
                                       User Post</div>
                                       <div class="actions">
                                        <a title="click here to delete" type="button" id="delete_records" class="btn blue pull-right">Delete<i class="fa fa-trash-o"></i></a>
                                       </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_2">
                                        <thead>
                                            <tr>
                                                <th><center>All&nbsp;&nbsp;&nbsp;<input type="checkbox" id="select_all"></center></th>
                                                <th> Group Title </th>
                                                <th> Post image</th>
                                                <th> Post</th>
                                                <th> Comment</th>
                                               <!--  <th> Action</th> -->
                                            </tr>
                                        </thead>
                                        <tfoot>
                                           <tr>
                                                <th> </th>
                                                <th> Group Title </th>
                                                <th> Post image</th>
                                                <th> Post</th>
                                                <th> Comment</th>
                                                <!-- <th> Action</th> -->
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php 
                                        $i=1;
                                        if(!empty($postdata))
                                        { 
                                            foreach($postdata as $key)
                                            {?>
                                                <tr id="xxx<?php echo $key['post_id'];?>">
                                                    <td><center><input type="checkbox" class="emp_checkbox" data-emp-id="<?php echo $key['post_id']; ?>"></center></td>
                                                    <td>
                                                        <?php echo $key['group_title'];?><br>
                                                        <span class="label label-sm label-success badge"><?php echo 'Date - '. $key['create_at'];?></span>
                                                        <?php $like_count = $this->db->query("SELECT count(user_id) as like_count FROM group_like WHERE post_id = '".$key['post_id']."'")->result();

                                                        if(!empty($like_count)){ $count = $like_count[0]->like_count; }
                                                         ?>
                                                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <a href="<?php echo base_url('group/post_like_user/'.$key['post_id']);?>"><span class="label label-sm label-success badge"><?php echo 'Like - '. $count;?></span>
                                                    </td>
                                                    <td>
                                                    <?php if($key['post_image']){ $image = $key['post_image'];}else { $image = 'image-not-found.gif';} ?>    
                                                    <img src="<?php echo base_url('uploads/post_image/'.$image);?>" width="100 px" height="100px"></td>
                                                    <td><?php echo substr($key['post_message'],0,100);?></td>
                                                    <td><center><a href="<?php echo base_url('group/user_comment/'.$key['post_id']);?>" title="click here to detail"><span class="label label-sm label-purple">Comments</span></a></center></td>
                                                    
                                                </tr>
                                                  <?php  $i++;
                                             } }
                                          else
                                          {?>
                                         <tr class="even pointer">
                                                <td class="" ></td>
                                                <td class="" ></td>
                                                <td class="" ><?php echo "Record not found";?></td>
                                                <td class="" ></td>
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
        
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>
</html>
<script type="text/javascript">
function deletemain(id)
{
    var r = confirm('Are you really want to delete this post?');
    if(r==true)
    {
        $.ajax({
           url:"<?php echo base_url('group/delete_post')?>/"+id,
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
url: "<?php echo base_url('group/delete_post')?>",
cache:false,
data: 'post_id='+selected_values,
success: function(response) {   
var emp_ids = response.split(",");
for (var i=0; i < emp_ids.length; i++)
{ 
    var str = $.trim(emp_ids[i]);
    var idz = "xxx"+str;
   $("#"+idz).hide();
}

        }

     });

   }
 }
})   

</script>
   

