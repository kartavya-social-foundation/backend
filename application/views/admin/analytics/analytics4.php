<!DOCTYPE html>
<?php $curdate=date("Y-m-d");?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>User|Analytics</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>template/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>template/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>template/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>template/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>template/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
       
        <link href="<?php echo base_url()?>template/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>template/assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo base_url()?>template/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
      
        <link href="<?php echo base_url()?>template/assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url()?>template/assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>template/assets/layouts/layout4/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>template/assets/layouts/layout4/css/themes/light.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?php echo base_url()?>template/assets/layouts/layout4/css/custom.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
        <link rel="shortcut icon" href="favicon.ico" /> 
        <style>
    #chartdiv {
  width: 100%;
  height: 500px;
}
.amcharts-export-menu-top-right {
  top: 10px;
  right: 0;
}
    </style>
    </head>
    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo page-md">
        <!-- BEGIN HEADER -->
        <?php $this->load->view("admin/new_header"); ?>
        <div class="clearfix"> </div>
        <div class="page-container">
            <?php $this->load->view("admin/new_sidebar"); ?>
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-head">
                         <div class="page-title">
                            <h1>Education Analytics</h1>
                        </div>
                    </div>
                   <div class="row">
                        <div class="col-lg-12 col-xs-12 col-sm-12">
                            <div class="portlet light "style="border: 1px solid #84b4ad">
                                <div class="portlet-title">
                                    <div class="caption col-md-12">
                                       
                                        <div class="col-md-12">
                                        <form class="pull-right" method="post" action="<?php echo base_url().'analytics/education_filter';?>" onsubmit="return check_value()">

                                         <select id="mon" name="education" class="btn btn-default btn-circle btn-outline">

                                            <option value="">Select Qualification</option>

                                            <?php $year = $this->db->query("SELECT * FROM degree")->result();
                                                  if(!empty($year)) 
                                                  {
                                                       foreach($year as $y)
                                                       { ?>
                                                            <option value="<?php echo $y->id;?>"<?php if($education == $y->id){ echo 'selected';} ?>><?php echo $y->degree_name;?></option>

                                                <?php } } ?>
                                           
                                        </select>    
                                        <select name="years" id="yer" class="btn btn-default btn-circle btn-outline">
                                            <option value="">Select Year</option>
                                            <?php 
                                            $year = $this->db->query("SELECT DISTINCT(year) FROM users ")->result();

                                            if(!empty($year))
                                            {
                                                foreach ($year as $values) {  
                                                        $saal = $values->year;
                                                    ?>  
                                                    <option value="<?php echo $saal;?>"<?php if($yearss == $saal){ echo 'selected';} ?>><?php echo $saal; ?></option>
                                                <?php }
                                            }
                                            ?>
                                        </select>
                                            <button type="submit" name="submit" style="background-color:#006454; color:white" class="btn green btn-default m-icon m-icon-only btn-circle">Submit<i class="m-icon-swapleft m-icon-white"></i></button>
                                        </form>
                                    </div>
                                    </div>
                                    <div id="error" class="pull-right"  style="color:red; margin-right:20%"></div>
                                    <div id="chartdiv"></div>   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
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
        <script src="<?php echo base_url()?>template/assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/amcharts/amcharts/radar.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/amcharts/amcharts/themes/patterns.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/amcharts/amcharts/themes/chalk.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/amcharts/ammap/ammap.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/amcharts/ammap/maps/js/worldLow.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/amcharts/amstockcharts/amstock.js" type="text/javascript"></script>
        <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
        <script src="https://www.amcharts.com/lib/3/serial.js"></script>

        <script src="<?php echo base_url()?>template/assets/global/plugins/amcharts/amcharts/plugins/export/export.min.js"></script>
        <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
       
        <script type="text/javascript">
            $(document).ready(function(){
                $('#activity_table').DataTable();
                $('#frel_table').DataTable();

            });

function check_value()
{ 
   var m = document.getElementById('mon').value;
   var y = document.getElementById('yer').value;
   if(m == '')
   {
        document.getElementById('error').innerHTML ='Qualification and Year required';
        return false;
   }
   else if(y == '')
   {
        document.getElementById('error').innerHTML ='Qualification and Year required';
        return false;
   }
}

var chart = AmCharts.makeChart("chartdiv", {
  "type": "serial",
  "theme": "light",
  "marginRight": 80,
  "dataProvider": [
  <?php 
    $colorarr[] = array('#F44336','#E91E63','#9C27B0','#673AB7','#3F51B5','#2196F3','#03A9F4','#00BCD4',
                                '#009688','#4CAF50','#8BC34A','#CDDC39','#FFEB3B','#FFC107','#FF9800','#FF5722','#795548','#9E9E9E','#607D8B');

    $mons = array(0 => "Jan", 1 => "Feb", 2 => "Mar", 3 => "Apr", 4 => "May", 5 => "Jun", 6 => "Jul", 7 => "Aug", 8 => "Sep", 9 => "Oct", 10 => "Nov", 11 => "Dec");
    // print_r($blood_group); 
    for ($i=0; $i < 12 ; $i++) { 
        $d = $mons[$i];
        $color = '#990000';
        if($i==0 || $i < 2){ $img = "https://www.amcharts.com/lib/images/faces/A04.png";}
        elseif($i==2 || $i < 4){ $img = "https://www.amcharts.com/lib/images/faces/C02.png"; }
        elseif($i==4 || $i < 7){ $img = "https://www.amcharts.com/lib/images/faces/D02.png"; }
        else{ $img = "https://www.amcharts.com/lib/images/faces/E01.png"; }
        if(isset($colorarr[0][$i])){ $color = $colorarr[0][$i]; }

        if(isset($education_count[$i]))
        {  
            ?>{ 
            "date": "<?php echo $d;?>",
            "visits":"<?php echo $education_count[$i];?>",
            "color": "<?php echo $color; ?>",
            "bullet":"<?php echo $img; ?>"
            },
        <?php }else
        { ?>{
              
            "date": "<?php echo $d; ?>",
            "visits": '0',
            "color": "<?php echo $color; ?>",
            "bullet": "<?php echo $img; ?>" 
            },
       <?php } 

    }
  ?>
],
  "valueAxes": [{
    "axisAlpha": 0,
    "position": "left",
    "title": "Registered User",
     "minimum": 0
   }],
  "startDuration": 1,
  "graphs": [{
    "balloonText": "<b>[[category]]: [[value]]</b>",
    "bulletOffset": 10,
    "bulletSize": 30,
    "fillColorsField": "color",
    "customBulletField": "bullet",
    "fillAlphas": 0.9,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "visits"
  }],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "date",
  "categoryAxis": {
    "gridPosition": "start",
    "labelRotation": 45,
    "title":"Age Group"
  },
  "export": {
    "enabled": false
  }
  });
</script>
     </body>
</html>