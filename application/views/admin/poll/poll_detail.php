<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title> Event|Details</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta content="" name="description" />
        <meta content="" name="author" />
       
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
           
        </div>
        <div class="clearfix"> </div>
        <div class="page-container">
          
             <?php $this->load->view("admin/new_sidebar"); ?>
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="row">
                        <div class="col-md-12">
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
                                        <i class="fa fa-server"></i>Poll Detail</div>
                                    <div class="actions">
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_2">
                                        <thead>
                                            <tr>
                                                <th><center>S.No.</center></th>
                                                <th><center>Category</center></th>
                                                <th><center>Question</center></th>
                                                <th><center>Answer Option</center></th>
                                                <th><center>Status</center></th>
                                               <!--  <th><center>Action</center></th> -->
                                            </tr>
                                        </thead>
                                        <tfoot>
                                           <tr>
                                                <th><center>S.No.</center></th>
                                                <th><center>Category</center></th>
                                                <th><center>Question</center></th>
                                                <th><center>Answer Option</center></th>
                                                <th><center>Status</center></th>
                                                <!-- <th><center>Action</center></th> -->
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php 
                                       $i=1;
                                        if(!empty($poll_data))
                                        {
                                            foreach($poll_data as $key)
                                            {
                                            	$date = substr($key->create_at,0,10);
                                            	?>
                                                <tr>
                                                    <td><center><?php echo $i;?></center></td>
                                                    <td><center>
                                                    <?php $categorydata = $this->common_model->common_getRow('category',array('category_id'=>$key->category_id));
                                                      echo $categorydata->category_name;
                                                     ?> </center></td>
                                                    <td><center>
                                                        <?php echo $key->poll_question;?><br>
                                                        <span class="label label-sm label-success badge"><?php echo 'Date - '. $date;?></span>
                                                        </center>
                                                    </td>
                                                    <td><center><a href="<?php echo base_url('poll/answer_detail/'.$key->poll_id) ?>" title="click here to detail"><span class="label label-sm label-success badge">Answer Option</span></a></center></td>
                                                     
                                                    <td width="85px;"><select class="form-control" onchange="changestatus(this.value,<?php echo $key->poll_id;?>)" name="" style="width:100%">
                                                           <option value="0"<?php if($key->admin_status == 0){ echo 'selected'; } ?>>Inactive</option>
                                                           <option value="1"<?php if($key->admin_status == 1){ echo 'selected'; }?>>Active</option>
                                                      </select></td>   
                                                   
                                                </tr>
                                                  <?php $i++;
                                             } }
                                          else
                                          {?>
                                         <tr class="even pointer">
                                                <td class="" ></td>
                                                <td class="" ></td>
                                                <td class="" ></td>
                                                <td class="" ><?php echo "Record not found";?></td>
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
<!-- <script type="text/javascript">
function deletemain(id)
{
    var r = confirm('Are you really want to delete?');
    if(r==true)
    {
        $.ajax({
           url:"<?php// echo base_url('event/delete')?>/"+id,
           success:function(data)
           {
              if(data==1000)
              {
                 // location.reload();
                $('.btn1'+id).closest('tr').fadeOut("fast");
              }
           }
        });
    }
}
</script> -->
    <script type="text/javascript">
        function changestatus(status,id)
        { 
            var str = "poll_id="+id+"&status="+status;
            var r = confirm('Are you really want to change status?');
            if(r==true)
            {
                $.ajax({
                  type:"POST",
                   url:"<?php echo base_url('poll/poll_status')?>/",
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
    
