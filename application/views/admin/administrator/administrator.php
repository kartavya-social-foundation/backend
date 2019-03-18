<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title> Administrator|Details</title>
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
                          
                            <div class="portlet box blue">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-globe"></i>Administrator </div>
                                         <a href="<?php echo base_url()?>admin/add_administrator"><button type="button" class="btn blue delete pull-right"><i class="fa fa-plus"></i><span> ADD ADMINISTRATOR</span></button></a>

                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_2">
                                        <thead>
                                           <tr>
                                                <th><center>S.No. </center></th>
                                                <th><center>Image</center></th>
                                                <th><center>Name </center></th>
                                                <th><center>Email</center></th>
                                                <th><center>Role</center></th>
                                                <th><center>Status</center></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th><center> S.No. </center></th>
                                                <th><center>Image</center></th>
                                                <th><center> Name </center></th>
                                                <th><center> Email</center></th>
                                                <th><center> Role</center></th>
                                                <th><center> Status</center></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php 
                                        $i=1;
                                        if(!empty($administrator_data))
                                        {
                                            foreach($administrator_data as $key)
                                            {?>
                                                <tr>
                                                    <td><center><?php echo $i;?></center> </td>
                                                    <td><center><?php if($key->image){ $image = $key->image;}else { $image = 'default-medium.png'; } ?>
                                                     <img src="<?php echo base_url('uploads/admin_image/'.$image); ?>" width="80px" height="80px" class="img-circle">   
                                                    </center></td>
                                                    <td><center><?php echo $key->name;?> <p class="font-blue"><i class='fa fa-mobile-phone'></i> <?php echo $key->mobile_no;?></p></center></td>
                                                    <td><center><?php echo $key->email;?></center> </td>
                                                    <td><center><?php if($key->role ==1){ echo 'Super Admin';} elseif($key->role ==2){ echo 'Administrator';} else if($key->role ==3) { echo 'L1-Admin';} ?>&nbsp;&nbsp<br><a class="btn1" onclick='changerole("<?php echo $key->admin_id;?>","<?php echo $key->role; ?>");' href="javascript:void(0);" title="change role"><span class="label label-sm label-primary">Change Role</span></a></center></td>

                                                    <td><select style="width:98px;" class="form-control" name="status" onchange="changestatus(this.value,'<?php echo $key->admin_id;?>')">
                                                          <option value="1"<?php if($key->status=='1') echo 'selected';?>>Inactive</option>    
                                                          <option value="0"<?php if($key->status=='0') echo 'selected';?>>Active</option>      
                                                      </select></td>
                                                     <!--<td><a href="<?php echo base_url('user/edit/'.$key->user_id);?>" title="click here to edit"><span class="label label-sm label-purple"><i class="fa fa-pencil"></i></span></a></td> -->
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
       
        <script src="<?php echo base_url()?>template/assets/global/scripts/app.min.js" type="text/javascript"></script>
     
        <script src="<?php echo base_url()?>template/assets/pages/scripts/table-datatables-fixedheader.min.js" type="text/javascript"></script>
     
        <script src="<?php echo base_url()?>template/assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
    </body>
</html>
<script type="text/javascript">
        
function changestatus(status,id)
{ 
  var str = "admin_id="+id+"&status="+status;
  var r = confirm('Are you really want to change status of this Admin?');
  if(r==true)
  {
      $.ajax({
        type:"POST",
         url:"<?php echo base_url('admin/change_status')?>/",
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
        
function changerole(id,role)
{ 
  var str = "admin_id="+id+"&role="+role;
  var r = confirm('Are you really want to change role?');
  if(r==true)
  {
      $.ajax({
        type:"POST",
         url:"<?php echo base_url('admin/change_role')?>/",
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
     


