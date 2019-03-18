<!DOCTYPE html>
<html lang="en">
<head>
<style>
.wrapper { width: 733px; }
.hidden { display: none; }
#map-canvas { height: 300px; margin: 10px 0;margin-right: -256px; }
.hgg {position: absolute;/* top: 4%; */margin: 1em 0;background: #fff;padding: 0.2em 0.4em;margin: 0px 0px;}
.dev {float: left;margin: 3px 4px;}
</style>
        <meta charset="utf-8" />
        <title>Edit Event</title>
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
        
        <link href="<?php echo base_url()?>template/assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url()?>template/assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
        
        <link href="<?php echo base_url()?>template/assets/layouts/layout4/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>template/assets/layouts/layout4/css/themes/light.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?php echo base_url()?>template/assets/layouts/layout4/css/custom.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>template/assets/global/css/parsley.css" rel="stylesheet"><!-- Parsley -->

        <!-- <link href="<?php //echo base_url();?>template/assets/global/css/jquery.timepicker.css" rel="stylesheet"> -->
        <!-- END THEME LAYOUT STYLES -->
        <link href="<?php echo base_url();?>template/assets/global/css/bootstrap-clockpicker.css" rel="stylesheet">
        <link href="<?php echo base_url();?>template/assets/global/css/jquery-clockpicker.css" rel="stylesheet">

        <link rel="shortcut icon" href="favicon.ico" />
        </head>
        <!-- END HEAD -->
    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo page-md">
        <!-- BEGIN HEADER -->
       <?php $this->load->view('admin/new_header'); ?>
        
        <div class="clearfix"> </div>
        
        <div class="page-container">
            
           <?php $this->load->view('admin/new_sidebar'); ?>
            
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                  
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tabbable-line boxless tabbable-reversed">
                <div class="">
                    <div class="tab-pane" id="tab_4">
                        <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption">
                                <i class="fa fa-gift"></i><small>Edit Event</small> 
                                </div>
                                </div>
            
        <div class="portlet-body form">
        <?php 
          if ($this->session->flashdata('success')) { 
            echo "<div class='alert alert-success'>", $this->session->flashdata('success') ,"</div>";
          }else if($this->session->flashdata('failed')){
            echo "<div class='alert alert-danger'>", $this->session->flashdata('failed') ,"</div>";
          } 
          ?>
           <?php if(!empty($event_data)){  ?>
            <form  class="form-horizontal form-row-seperated" onsubmit="return CKeditor()" action="" method="post"  id="form11" data-parsley-validate='' enctype="multipart/form-data">
                <div class="form-body">
                    
                    <div class="form-group">
                        <label class="control-label col-md-3">Title<span class="required"> * </span></label>
                        <div class="col-md-7">
                            <input type="text" placeholder="Title" parsley-required="true" data-parsley-required-message="Title field is required" name="title" value="<?php echo $event_data->title;?>" class="form-control" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Image<span class="required"> * </span><br><span> Size (Max 700*500 px, 500kb)</span></label>
                        <div class="col-md-7">
                            <input type="file" id="inputfile" name="image[]" multiple/>

                                <?php
                                $length = count($event_image);?>
                                <input type="hidden" id="total_length" value="<?php echo $length;?>">
                                <?php if(!empty($event_image))   
                                 {  
                                    foreach($event_image as $image)
                                    {
                                          $image1 = base_url().'uploads/event_image/'.$image->image;
                                        ?>
                                <div class="dev" id="rmv<?php echo $image->image_id;?>">
                                      <a href='javascript:;' class="hgg" onclick="remove('<?php echo $image->image_id;?>')"><i class="fa fa-times" class="" aria-hidden="true"></i></a>
                                      <img src='<?php echo $image1;?>'height="100px;" width="100px;"> 
                                </div>

                                 <?php }}else { ?> <img src="<?php echo base_url('uploads/event_image/image-not-found.gif');?>" height="100px;" width="100px;"> <?php  }  ?>  
                             <span style="color:red;margin-left:440px;list-style-type: none;font-size: 0.9em;line-height: 0.9em;"><?php if($this->session->flashdata('image_error')){ echo $this->session->flashdata('image_error'); }?></span>
                               <br/><span id="file411" style="list-style-type: none;font-size: 0.9em; line-height: 0.9em;"></span>
                        </div>
                       
                    </div>
                    
                     <div class="form-group">
                        <label class="control-label col-md-3">Description<span class="required"> * </span></label>
                        <div class="col-md-7">
                           <textarea class="control-label col-md-3 ckeditor" id="noticemessage" name="description"><?php echo $event_data->description;?></textarea>
                           <?php echo form_error('description', "<span class='error'>", "</span>"); ?>
                           
                        </div>
                        <span id="ab111" style="color:red;margin-left:270px;list-style-type: none;font-size: 0.9em;line-height: 0.9em;"></span>
                    </div>
                   <div class="wrapper">
                        <div class="form-group" style="margin-left: 12%;">
                            <label class="control-label col-md-3">Type Address<span class="required"> * </span></label>
                            <div class="col-md-7">
                                <input type="text" placeholder="Type Address" parsley-required="true" data-parsley-required-message="Type address field required" id="location" name="address" class="form-control" value="<?php echo $event_data->address;?>" required/>
                            </div>
                        </div>
                       <div id="map-canvas" class="hidden"></div>

                         <div class="form-group" style="margin-left: 34%;">
                           <!--  <label class="control-label col-md-3">Lat</label> -->
                           <div class="col-md-4">                                       
                                <input type="text" placeholder="Lat" parsley-required="true"  id="lat" name="lat" class="form-control" value="<?php echo $event_data->lat;?>" required/>
                               
                            </div>
                            <div class="col-md-4">
                               
                                <input type="text" placeholder="Long" parsley-required="true"  id="lng" name="lng" class="form-control" value="<?php echo $event_data->lng;?>" required/>
                            </div>
                        </div>
                  </div>
                    <div class="form-group" > 
                        <label class="control-label col-md-3">Start Date<span class="required"> * </span></label>
                        <div class="col-md-3">
                         <?php
                                $s = $event_data->start_date_time;
                                $dt = new DateTime($s);

                                $startdate = $dt->format('Y-m-d');
                                $starttime = $dt->format('h:i');
                           ?>      

                           <input type="name" name="start_date" id="date1" readonly="readonly" value="<?php echo $startdate;?>" data-parsley-required-message="This field is required" class="form-control" required >
                                                   
                        </div>
                        <label class="control-label col-md-2">Start Time<span class="required"> * </span></label>
                        <div class="col-md-3">
                        
                         <div class="input-group clockpicker">
                                <input type="text" id="time1" readonly="readonly" name="start_time" value="<?php echo $starttime;?>" class="form-control" data-autoclose="true" required>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                         </div>

                        </div>
                    </div>
                    <div class="form-group" >
                        <label class="control-label col-md-3">End Date<span class="required"> * </span></label>
                        <div class="col-md-3">

                        <?php
                                $s = $event_data->end_date_time;
                                $dt = new DateTime($s);

                                $enddate = $dt->format('Y-m-d');
                                $endtime = $dt->format('h:i');

                           ?>      
                           <input type="text" name="end_date" id="date2" readonly="readonly" value="<?php echo $enddate;?>"  data-parsley-required-message="This field is required" class="form-control" required >
                        </div>
                        <label class="control-label col-md-2">End Time<span class="required"> * </span></label>
                        <div class="col-md-3">
                        <div class="input-group clockpicker">
                                <input type="text" name="end_time" id="time2" readonly="readonly" class="form-control" value="<?php echo $endtime;?>" data-autoclose="true" required >
                                    <span class="input-group-addon" >
                                        <span class="glyphicon glyphicon-time"></span>
                                </span>
                        </div>
                        <span id="ab1" style="color:red;margin-left:0px;list-style-type: none;font-size: 0.9em;line-height: 0.9em;"></span>
                        </div>
                        
                    </div>
                    <span id="ab" style="color:red;margin-left:266px;list-style-type: none;font-size: 0.9em;line-height: 0.9em;"></span>
                     
                     <?php  if ($this->session->flashdata('fff')) { 
                     echo "<div style ='margin-left: 26%;color:red'>", $this->session->flashdata('fff') ,"</div>";}?>
                    
                     <div class="form-group">
                        <label class="control-label col-md-3">Hosted By<span class="required"> * </span></label>
                        <div class="col-md-7">
                            <input type="text" name="hosted_by" placeholder="Hosted By" parsley-required="true" data-parsley-required-message="This field is required" value="<?php echo $event_data->hosted_by;?>" name="link" class="form-control" required/>
                            
                        </div>
                    </div>
                    <!--<div class="form-group" style="padding-left:25%">
                        <div class="col-md-2">
                            <input type="submit" name="submit" value="submit" onclick="return myFunction()"  class="form-control btn blue btn-block"/>
                        </div>
                    </div>-->
                    <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            <input type="submit" id="submit" class="btn green" name="submit" value="Submit" onclick="return myFunction()">
                            <a href="javascript:window.history.go(-1);"><button type="button" class="btn default">Cancel</button></a>
                        </div>
                    </div>
                </div>
            </form>
            <?php  } ?>
            <!-- END FORM-->
        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- END QUICK SIDEBAR -->
    </div>
    </div>    
        
     <?php $this->load->view('admin/footer'); ?>
        <script src="<?php echo base_url()?>template/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/js/parsley.min.js"></script>
        <script src="<?php echo base_url()?>template/assets/global/js/jquery-clockpicker.min.js"></script>
        <!-- <script src="<?php //echo base_url()?>template/assets/global/js/jquery.timepicker.min.js"></script> -->
        <script src="<?php echo base_url()?>template/assets/global/js/bootstrap-clockpicker.min.js"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        
        <script src="<?php echo base_url()?>template/assets/global/scripts/app.min.js" type="text/javascript"></script>
        
        <script src="<?php echo base_url()?>template/assets/pages/scripts/form-samples.min.js" type="text/javascript"></script>
        
        <script src="<?php echo base_url()?>template/assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/ckeditor/ckeditor.js"></script>
        <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
       

        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGkk8INQCpOP0S6gUr7nWWZ8Tp9W-1kCo"></script>

        <script type="text/javascript">

       var mapOptions = {
                center: new google.maps.LatLng(0, 0),
                zoom: 16
            },
            map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions),
            marker = new google.maps.Marker({
                position: map.getCenter(),
                map: map,
                title: 'Drag to set position',
                draggable: true,
                flat: false
            });
         //
          google.maps.event.addListener(map, 'click', function(event) {                
        //Get the location that the user clicked.
        var clickedLocation = event.latLng;
        //If the marker hasn't been added.
        if(marker === false){
            //Create the marker.
            marker = new google.maps.Marker({
                position: clickedLocation,
                map: map,
                draggable: true //make it draggable
            });
            //Listen for drag events!
            google.maps.event.addListener(marker, 'dragend', function(event){
                markerLocation();
            });
        } else{
            //Marker has already been added, so just change its location.
            marker.setPosition(clickedLocation);
        }
        //Get the marker's location.
        markerLocation();
    });
    function markerLocation(){
    //Get location.
    var currentLocation = marker.getPosition();
    //Add lat and lng values to a field that we can save.
    var new_lat = document.getElementById('lat').value = currentLocation.lat(); //latitude
    var new_lng =  document.getElementById('lng').value = currentLocation.lng(); //longitude

    $('#lat').val(new_lat);
    $('#lng').val(new_lng);

}      
    //   
        //get location from address
        $('#location').keyup(function() {
        if ($('#map-canvas').hasClass('hidden')) {
            $('#map-canvas').removeClass('hidden').fadeIn().addClass('show');
            google.maps.event.trigger(map, 'resize');
        }
        var address = $(this).val();
        if (address.length == 0) {
            $('#map-canvas').removeClass('show').fadeOut().addClass('hidden');
        }
        url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' + address + '&sensor=false';
        $.get(url, function(data) {
            if (data.status == 'OK') {
                map.setCenter(data.results[0].geometry.location);
                marker.position=map.getCenter();
                $('#lat').val(new_lat);
                $('#lng').val(new_lng);
 
            }
        });
    }); 
 </script>
<script type="text/javascript">
 $( function() {
    $( "#date1" ).datepicker({
       changeMonth: true,
       changeYear: true,
    /*   yearRange: '1990:'+(new Date).getFullYear(),*/
       dateFormat:'yy-mm-dd',
       minDate: 0 
    });
  } );

  $( function() {
    $( "#date2" ).datepicker({
       changeMonth: true,
       changeYear: true,
      /* yearRange: '1990:'+(new Date).getFullYear(),*/
       dateFormat:'yy-mm-dd',
       minDate: 0 
    });
  } );

</script>
<script type="text/javascript">
$('.clockpicker').clockpicker({donetext: 'Done'});
</script>

<script type="text/javascript">
  $('#form11').parsley();
</script>
<script>
function myFunction() {
   
   var startdate = document.getElementById("date1").value;
   var enddate = document.getElementById("date2").value;

   var starttime = document.getElementById("time1").value;
   var endtime = document.getElementById("time2").value;

     if(enddate < startdate) {
        $('#ab').html('End date can not less from start date.');
        return false;
    }
    else if(enddate == startdate)
    {
        if(endtime < starttime)    
        {
            $('#ab1').html('End time can not less from start time.');
            return false;
        }    
    }  
}
</script>

<script>
function remove(img_id)
{
  var str = "image_id="+img_id;
   $.ajax({
            type:"POST",
            url:"<?php echo base_url();?>event/remove_img",
            data:str,
           success:function(data)
           {  

              location.reload();
               // var str = $.trim(data);
               // var idz = "rmv"+str; 
               // $("#"+idz).hide();
           }
        });
}
</script>
<script>
function CKeditor() {
   /* Emptyckeditor = document.getElementById("noticemessage").value;*/
   var Emptyckeditor = CKEDITOR.instances['noticemessage'].getData();
    //alert(Emptyckeditor);
    if(Emptyckeditor == "")
    {
        $('#ab111').html('This value is required.');
        return false;
    }
    return true; 
   
}
</script>
<script>
   $("#submit").click(function() {
    var abc = $("#total_length").val();

   var inputfile =  $("#inputfile").val();
   
    if(abc < 1 && inputfile == '')
    {
        $("#file411").html('Image is Required').css("color", "red");
        return false;
    } 
    else if(inputfile != '')
    {
         var fileExtension = ['jpeg', 'jpg', 'png'];
         if($.inArray($("#inputfile").val().split('.').pop().toLowerCase(), fileExtension) == -1) {
            //alert("Only formats are allowed : "+fileExtension.join(', '));
            $("#file411").html('Only formats are allowed :' +fileExtension.join(', ')).css("color", "red");
            return false;
          }
    }
    return true;
   
  });
 </script>
        
    </body>

</html>