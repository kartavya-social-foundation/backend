<!DOCTYPE html>
<?php $curdate=date("Y-m-d");?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Kartavya | Dashboard</title>
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
       
        <link href="<?php echo base_url()?>template/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>template/assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>template/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>template/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
       
        <link href="<?php echo base_url()?>template/assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url()?>template/assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
        
        <link href="<?php echo base_url()?>template/assets/layouts/layout4/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>template/assets/layouts/layout4/css/themes/light.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?php echo base_url()?>template/assets/layouts/layout4/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo page-md">
        <!-- BEGIN HEADER -->
        <?php $this->load->view("admin/new_header"); ?>
        
        <div class="clearfix"> </div>
       
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <?php $this->load->view("admin/new_sidebar"); ?>
            
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>Dashboard
                                <small>dashboard & statistics</small>
                            </h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat green">
                                <div class="visual">
                                    <i class="fa fa-user"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="<?php echo $this->common_model->sqlcount('users');?>">0</span>
                                    </div>
                                    <div class="desc"> <b>USERS</b> </div>
                                </div>
                                <a class="more" href="<?php echo base_url()?>user"> View more
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat green">
                                <div class="visual">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="<?php echo $this->common_model->sqlcount('event');?>">0</span> </div>
                                    <div class="desc"> <b>EVENTS</b> </div>
                                </div>
                                <a class="more" href="<?php echo base_url()?>event"> View more
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat green">
                                <div class="visual">
                                    <i class="fa fa-server"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="<?php echo $this->common_model->sqlcount('project');?>">0</span>
                                    </div>
                                    <div class="desc"> <b>PROJECT</b> </div>
                                </div>
                                <a class="more" href="<?php echo base_url()?>project"> View more
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat green">
                                <div class="visual">
                                    <i class="fa fa-server"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                    <span data-counter="counterup" data-value="<?php echo $this->common_model->sqlcount('blog');?>">0</span> </div>
                                    <div class="desc"><b>BLOG</b></div>
                                </div>
                                 <a class="more" href="<?php echo base_url()?>blog"> View more
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <!-- <!-- <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-cursor font-purple"></i>
                                        <span class="caption-subject font-purple bold uppercase">Statistics</span>
                                    </div>
                                    <div class="actions">
                                        <a href="<?php echo base_url()?>admin/dashboard" class="btn btn-sm btn-circle red easy-pie-chart-reload">
                                            <i class="fa fa-repeat"></i> Reload </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="dashboard-stat yellow">
                                                <div class="visual">
                                                    <i class="fa fa-map-marker"></i>
                                                </div>
                                                <div class="details">
                                                    <div class="number">
                                                        <span data-counter="counterup" data-value="<?php //echo $this->common_model->sqlcount('projects',array('project_status'=>'1'));?>">0</span> </div>
                                                    <div class="desc"> <small>Running Projects</small> </div>
                                                </div>
                                                <a class="more" href=""> View more
                                                    <i class="m-icon-swapright m-icon-white"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="margin-bottom-10 visible-sm"> </div>
                                        <div class="col-md-4">
                                            <div class="dashboard-stat red">
                                                <div class="visual">
                                                    <i class="fa fa-map-marker"></i>
                                                </div>
                                                <div class="details">
                                                    <div class="number">
                                                    <?php
                                                    // $query = $this->db->query("select order_id FROM `service_order` where status='0' and center_id!='0'");
                                                    // $unaccepted_order=$query->num_rows();
                                                    ?>
                                                        <span data-counter="counterup" data-value="<?php //echo $this->common_model->sqlcount('projects',array('project_status'=>'3'));?>">0</span> </div>
                                                    <div class="desc"> <small>Cancelled</small></div>
                                                </div>
                                                <a class="more" href=""> View more
                                                    <i class="m-icon-swapright m-icon-white"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="margin-bottom-10 visible-sm"> </div>
                                        <div class="col-md-4">
                                            <div class="dashboard-stat green">
                                                <div class="visual">
                                                    <i class="fa fa-map-marker"></i>
                                                </div>
                                                <div class="details">
                                                    <div class="number">
                                                    <?php
                                                    // $query = $this->db->query("select order_id FROM `service_order` where status IN (0) and center_id='0'");
                                                    // $unassigned_order=$query->num_rows();
                                                    ?>
                                                        <span data-counter="counterup" data-value="<?php //echo $this->common_model->sqlcount('projects',array('project_status'=>'0'));?>">0</span> </div>
                                                    <div class="desc"> <small>New Project</small></div>
                                                </div>
                                                <a class="more" href=""> View more
                                                    <i class="m-icon-swapright m-icon-white"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --> 
                        </div>
                        <div class="col-md-6 col-sm-6">
                           <!--  <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-cursor font-purple"></i>
                                        <span class="caption-subject font-purple bold uppercase">Today Statistics</span>
                                    </div>
                                    <div class="actions">
                                        <a href="<?php echo base_url()?>admin/dashboard" class="btn btn-sm btn-circle red easy-pie-chart-reload">
                                            <i class="fa fa-repeat"></i> Reload </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="dashboard-stat green-jungle">
                                                <div class="visual">
                                                    <i class="fa fa-map-marker"></i>
                                                </div>
                                                <div class="details">
                                                    <div class="number">
                                                   
                                                    <span data-counter="counterup" data-value=""></span> </div>
                                                    <div class="desc"> Today's Project </div>
                                                </div>
                                                <a class="more" href=""> View more
                                                    <i class="m-icon-swapright m-icon-white"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="margin-bottom-10 visible-sm"> </div>
                                        <div class="col-md-4">
                                            <div class="dashboard-stat yellow-gold">
                                                <div class="visual">
                                                    <i class="fa fa-map-marker"></i>
                                                </div>
                                                <div class="details">
                                                    <div class="number">
                                                    
                                                        <span data-counter="counterup" data-value="">0</span>
                                                    </div>
                                                    <div class="desc"> Today Client</div>
                                                </div>
                                                <a class="more" href=""> View more
                                                    <i class="m-icon-swapright m-icon-white"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="margin-bottom-10 visible-sm"> </div>
                                        <div class="col-md-4">
                                            <div class="dashboard-stat purple-medium">
                                                <div class="visual">
                                                    <i class="fa fa-map-marker"></i>
                                                </div>
                                                <div class="details">
                                                    <div class="number">
                                                    
                                                        <span data-counter="counterup" data-value=""></span> </div>
                                                    <div class="desc"> Today Company</div>
                                                </div>
                                                <a class="more" href=""> View more
                                                    <i class="m-icon-swapright m-icon-white"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                          
                        </div>
                        <div class="col-md-6 col-sm-6">
                          
                        </div>
                    </div>
                  
                </div>
                <!-- END CONTENT BODY -->
            </div>
          
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
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url()?>template/assets/global/plugins/moment.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
     
        <script src="<?php echo base_url()?>template/assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
       
        
        <script src="<?php echo base_url()?>template/assets/global/scripts/app.min.js" type="text/javascript"></script>
      
        <script src="<?php echo base_url()?>template/assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>
       
        <script src="<?php echo base_url()?>template/assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        
       
    </body>

</html>