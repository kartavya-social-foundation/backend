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
                                        <i class="fa fa-globe"></i>Reffered Users by- <?php echo $this->uri->segment(3); ?></div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_2">
                                        <thead>
                                           <tr>
                                                <th><center> Image</center></th>
                                                <th><center> Name </center></th>
                                                <th><center> Email</center></th>
                                                <th><center> State </center></th>
                                                <th><center> Country </center></th>

                                            </tr>
                                        </thead>
                                        <tfoot>
                                           <tr>
                                                <th><center> Image</center></th>
                                                <th><center> Name </center></th>
                                                <th><center> Email</center></th>
                                                <th><center> State </center></th>
                                                <th><center> Country </center></th>

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
                                                <tr>
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
                                                  <?php  //$i++;
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
    
        <script src="<?php echo base_url()?>template/assets/global/scripts/app.min.js" type="text/javascript"></script>
      
        <script src="<?php echo base_url()?>template/assets/pages/scripts/table-datatables-fixedheader.min.js" type="text/javascript"></script>
     
        <script src="<?php echo base_url()?>template/assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>
</html>
<script type="text/javascript">
        
function changestatus(status,id)
{ 
  var str = "user_id="+id+"&status="+status;
  var r = confirm('Are you really want to Verified this user?');
  if(r==true)
  {
      $.ajax({
        type:"POST",
         url:"<?php echo base_url('user/change_status')?>/",
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


function deletemain(id)
{
    var r = confirm('Are you really want to delete?');
    if(r==true)
    {
        $.ajax({
           url:"<?php echo base_url('user/delete')?>/"+id,
           success:function(data)
           {
               if(data==1000)
               {
                    $('.btn1'+id).closest('tr').fadeOut("fast");
               }
           }
        });
    }
}
   
</script>
     


