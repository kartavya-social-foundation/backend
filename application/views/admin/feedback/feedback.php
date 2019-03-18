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
        <style>
                .portlet.light {
                padding: 12px 20px 33px;
                background-color: #fff;
        </style>
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
                                         <i class="fa fa-comment-o" aria-hidden="true"></i></i>Feedback</div>
                                </div>
                               <div class="col-md-12 col-sm-12">
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption caption-md">
                                            <i class="icon-bar-chart font-dark hide"></i>
                                            <span class="caption-subject font-dark bold uppercase">Feedback</span>
                                            <!-- <span class="caption-helper">45 pending</span> -->
                                        </div>
                                        <!-- <div class="inputs">
                                          
                                        </div> -->
                                    </div>
                                    <div class="portlet-body">
                                        <div class="scroller" style="height: 338px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
                                            <div class="general-item-list tr">
                                                <?php if(!empty($feedback_data)){

                                                      foreach($feedback_data as $f_data)  
                                                      {  
                                                      ?>
                                                 <div class="item">
                                                    <div class="item-head">
                                                        <div class="item-details">
                                                        <?php if($f_data['userpic']){ $image = $f_data['userpic'];}
                                                        else { $image = 'default-medium.png'; } ?>
                                                        <img class="item-pic rounded" src="<?php echo base_url('uploads/user_image/'.$image);?>" width="40px" height="70px">
                                                            <a href="" class="item-name primary-link"><?php echo $f_data['username']; ?></a>
                                                            <span class="item-label"><?php echo $f_data['feedback_time'];?></span>&nbsp;&nbsp;
                                                            <a class="btn1<?php echo $f_data['feedback_id'];?>" onclick='deletemain("<?php echo $f_data['feedback_id'];?>");' href="javascript:void(0);" title="click here to delete"><i class="fa fa-trash-o"></i></a>
                                                        </div>
                                                        <span class="item-status">
                                                        <!--<span class="badge badge-empty badge-success"></span> --><?php echo  $f_data['categoryname'];?></span>
                                                    </div>
                                                    <div class="item-body"> <?php echo $f_data['feedback'];?> </div>

                                                </div>
                                                <?php } }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
function deletemain(id)
{
    var r = confirm('Are you really want to delete?');
    if(r==true)
    {
        $.ajax({
           url:"<?php echo base_url('setting/delete_feedback')?>/"+id,
           success:function(data)
           {
              if(data==1000)
              {
                  location.reload();
                //$('.btn1'+id).closest('tr').fadeOut("fast");
              }
           }
        });
    }
}
</script>

     


