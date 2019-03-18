<!DOCTYPE html>
<html lang="en">
    <!-- BEGIN HEAD -->
    <head>
        <style>
        .error{
            color:#ff3355;
        }
        </style>
        <meta charset="utf-8"/>
        <title>Edit|User</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
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
         <link href="<?php echo base_url();?>template/assets/global/css/parsley.css" rel="stylesheet">    
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <link rel="shortcut icon" href="favicon.ico" /></head>
    <!-- END HEAD -->
    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo page-md">
        <!-- BEGIN HEADER -->
       <?php $this->load->view('admin/new_header'); ?>
       
        <div class="clearfix"> </div>
       
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
           <?php $this->load->view('admin/new_sidebar'); ?>
          
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bg-inverse">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-equalizer font-red-sunglo"></i>
                                    <span class="caption-subject font-red-sunglo bold uppercase">Advance User data</span>
                                   <!--  <span class="caption-helper">demo form...</span> -->
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                                <?php if(!empty($user_data) OR !empty($advanceuser_data)){ ?>
                                <form id="form11" action="<?php echo base_url('user/edit/'.$user_data->user_id);?>" class="horizontal-form" method="post" enctype="multipart/form-data" data-parsley-validate=''>
                                    <div class="form-body">
                                        <h3 class="form-section">Personal Info</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">First Name</label>
                                                    <input type="text" id="firstName" data-parsley-pattern="^[A-Za-z ]*$" name="u_name" class="form-control" placeholder="First Name" value="<?php echo $user_data->username;?>" required>
                                                    <!-- <span class="help-block"> This is inline help </span> -->
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Last Name</label>
                                                    <input type="text" id="lastName" data-parsley-pattern="^[A-Za-z ]*$" name="l_name" class="form-control" placeholder="Last Name" value="<?php echo $user_data->user_surname;?>" required>
                                                    <!-- <span class="help-block"> This field has error. </span> -->
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Gender</label>
                                                    <select class="form-control" name="gender">
                                                        <option value="">Select</option>
                                                        <option value="1"<?php if(isset($user_data->gender)) { if($user_data->gender == '1'){ echo 'selected';}} ?>>Male</option>
                                                        <option value="2"<?php if(isset($user_data->gender)) { if($user_data->gender == '2'){ echo 'selected'; }} ?>>Female</option>
                                                    </select>
                                                    <!-- <span class="help-block"> Select your gender </span> -->
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-3">
                                              <div class="form-group">
                                                    <label class="control-label">Date of Birth</label>
                                                    <input type="text" name="dob" id="dob" class="form-control" placeholder="dd/mm/yyyy" value="<?php if(!empty($user_data->dob)){ echo $user_data->dob;}else{ echo '';} ?>" readonly required> </div>
                                              </div>
                                              <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Age</label>
                                                    <?php 
                                                    $age = '';
                                                    if($user_data->dob != ''){
                                                    $finaldob = str_replace('/', '-',$user_data->dob);    
                                                    $today = date('d-m-Y');
                                                    $age = date_diff(date_create($finaldob), date_create($today))->y;
                                                    }
                                                    else{ if(isset($advanceuser_data->age)) { $age = $advanceuser_data->age;}}  
                                                    ?>
                                                    <input type="text" name="age" id="result" class="form-control" placeholder="Age" value="<?php echo $age;?>" readonly>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Blood Group</label>
                                                    <select class="form-control" name="blood_group" data-placeholder="Choose a Category" tabindex="1">
                                                        <option value="">Select</option>
                                                        <option value="O+"<?php if(isset($advanceuser_data->blood_group)){  if($advanceuser_data->blood_group == 'O+'){ echo 'selected'; }} ?>>O +</option>
                                                        <option value="O-"<?php if(isset($advanceuser_data->blood_group)){ if($advanceuser_data->blood_group == 'O-'){ echo 'selected'; }} ?>>O -</option>
                                                        <option value="A+"<?php if(isset($advanceuser_data->blood_group)){ if($advanceuser_data->blood_group == 'A+'){ echo 'selected'; } }?>>A +</option>
                                                        <option value="A-"<?php if(isset($advanceuser_data->blood_group)){ if($advanceuser_data->blood_group == 'A-'){ echo 'selected'; } } ?>>A -</option>
                                                        <option value="B+"<?php if(isset($advanceuser_data->blood_group)){ if($advanceuser_data->blood_group == 'B+'){ echo 'selected'; } }?>>B +</option>
                                                        <option value="B-"<?php if(isset($advanceuser_data->blood_group)){ if($advanceuser_data->blood_group == 'B-'){ echo 'selected'; }}?>>B -</option>
                                                        <option value="AB+"<?php if(isset($advanceuser_data->blood_group)){ if($advanceuser_data->blood_group == 'AB+'){ echo 'selected'; }} ?>>AB +</option>
                                                        <option value="AB-"<?php if(isset($advanceuser_data->blood_group)){ if($advanceuser_data->blood_group == 'AB-'){ echo 'selected'; } }?>>AB -</option>
                                                       
                                                    </select>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Marital Status</label>
                                                    <div class="radio-list" >
                                                        <label class="radio-inline">
                                                            <input type="radio" name="marital_status" value="Married"<?php if(isset($advanceuser_data->marital_status)){ if($advanceuser_data->marital_status == 'Married'){ echo 'selected'; } }?>>Married </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="marital_status" value="Unmarried"<?php if(isset($advanceuser_data->marital_status)){ if($advanceuser_data->marital_status == 'Unmarried'){ echo 'selected'; } }?> checked> Unmarried</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Height</label>
                                                    <input type="text" id="" name ="height" class="form-control" placeholder="Height in Foot or inch" value="<?php if(isset($advanceuser_data->height)){ echo $advanceuser_data->height; } ?>">
                                                    <!--<span class="help-block"> This is inline help </span> -->
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="control-label">Weight</label>
                                                    <input type="text" id="" name="weight" class="form-control" placeholder="Weigth in kg" value="<?php if(isset($advanceuser_data->weight)){ echo $advanceuser_data->weight;}?>">
                                                    <!--<span class="help-block"> This field has error. </span> -->
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                         <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Body Type</label>
                                                    <!--<input type="text" id="" name = "body_type" class="form-control" placeholder="Body Type" value="<?php //if(isset($advanceuser_data->body_type)){ echo $advanceuser_data->body_type;}?>">-->
                                                    <select class="form-control" name = "body_type" data-placeholder="Choose a Category" tabindex="1">
                                                        <option value="">Select</option>
                                                        <option value="Straight Body"<?php if(isset($advanceuser_data->body_type)){  if($advanceuser_data->body_type == 'Straight Body'){ echo 'selected'; }} ?>>Straight Body</option>
                                                        <option value="Pear Body"<?php if(isset($advanceuser_data->body_type)){ if($advanceuser_data->body_type == 'Pear Body'){ echo 'selected'; }} ?>>Pear Body</option>
                                                        <option value="Spoon Body"<?php if(isset($advanceuser_data->body_type)){ if($advanceuser_data->body_type == 'Spoon Body'){ echo 'selected'; } }?>>Spoon Body</option>
                                                        <option value="Hourglass Body"<?php if(isset($advanceuser_data->body_type)){ if($advanceuser_data->body_type == 'Hourglass Body'){ echo 'selected'; } } ?>>Hourglass Body</option>
                                                        <option value="Top Hourglass Body"<?php if(isset($advanceuser_data->body_type)){ if($advanceuser_data->body_type == 'Top Hourglass Body'){ echo 'selected'; } }?>>Top Hourglass Body</option>
                                                        <option value="Inverted Triangle Body"<?php if(isset($advanceuser_data->body_type)){ if($advanceuser_data->body_type == 'Inverted Triangle Body'){ echo 'selected'; }}?>>Inverted Triangle Body</option>
                                                        <option value="Oval Body"<?php if(isset($advanceuser_data->body_type)){ if($advanceuser_data->body_type == 'Oval Body'){ echo 'selected'; }} ?>>Oval Body</option>
                                                        <option value="Diamond Body"<?php if(isset($advanceuser_data->body_type)){ if($advanceuser_data->body_type == 'Diamond Body'){ echo 'selected'; } }?>>Diamond Body</option>
                                                       
                                                    </select>

                                                    <!--<span class="help-block"> This is inline help </span> -->
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Complexion</label>
                                                    <input type="text" id="" name="complexion" class="form-control" placeholder="Complexion" value="<?php if(isset($advanceuser_data->complexion)){ echo $advanceuser_data->complexion; }?>">
                                                    <!-- <span class="help-block"> This field has error. </span> -->
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                         <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Describe Yourself</label>
                                                   <textarea  name="aboutme" class="form-control"><?php  echo $user_data->about_me;?></textarea>
                                                    <!-- <span class="help-block"> This is inline help </span> -->
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Future Plans</label>
                                                    <textarea name="future_plans" name="future_plans" class="form-control"><?php if(isset($advanceuser_data->future_plans)){ echo $advanceuser_data->future_plans; }?></textarea>
                                                    <!-- <span class="help-block"> This field has error. </span> -->
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Hobbies</label>
                                                    <input id="tags" placeholder="Hobbies" class ="form-control" name="hobby" value="<?php if(isset($advanceuser_data->future_plans)){ echo $advanceuser_data->future_plans;}?>">
                                                   
                                                </div>
                                            </div>
                                          
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Other Hobby</label>
                                                    <input type="text" name="other_hobby" class="form-control" placeholder="Other Hobby" value="<?php if(isset($advanceuser_data->other_hobby)){ echo $advanceuser_data->other_hobby;}?>"> 
                                                    
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <!--for update country state and city!-->
                                        <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                   <label class="control-label">Select Country</label>
                                                    <select class="form-control" name="country" onchange="getstate(this.value)">
                                                        <option value="">Select Country</option>
                                                        <?php if(!empty($country))
                                                              {
                                                                foreach($country as $countries)
                                                                { ?>
                                                                    <option value="<?php echo $countries->CountryId;?>"<?php if($countries->CountryId == $user_data->country_id){ echo 'selected';} ?>><?php echo $countries->Country;?></option>
                                                               <?php }    
                                                               }
                                                         ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                   <label class="control-label">Select State</label>
                                                    <select id="state" class="form-control" onchange="getcity(this.value)" name="state">
                                                        <option value="">Select State</option>
                                                         <?php if(!empty($region))
                                                               {
                                                                foreach($region as $state)
                                                                { ?>
                                                                    <option value="<?php echo $state->RegionId;?>"<?php if($state->RegionId == $user_data->state_id){ echo 'selected';} ?>><?php echo $state->Region ?></option>
                                                          <?php } }  ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="row">
                                         <div class="col-md-6">
                                                <div class="form-group">
                                                   <label class="control-label">Select City</label>
                                                    <select class="form-control" id="city" name="city">
                                                        <option value="">Select City</option>
                                                         <?php if(!empty($city))
                                                               {
                                                                foreach($city as $cities)
                                                                { ?>
                                                                    <option value="<?php echo $cities->CityId;?>"<?php if($cities->CityId == $user_data->city_id){ echo 'selected';} ?>><?php echo $cities->City ?></option>
                                                          <?php } }  ?>
                                                    </select>
                                                </div>
                                            </div>
                                         
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                   <label class="control-label">Zip Code</label>
                                                    <input type="text" name="zip_code" class="form-control" placeholder="Zip Code" value="<?php if(isset($user_data->pincode)){ echo $user_data->pincode;}?>">
                                                </div>
                                           
                                             </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                 <div class="form-group">
                                                    <label class="control-label">Image</label>
                                                    <input type="file" name="image" id="inputfile"/>
                                                    <?php
                                                     if(!empty($user_data->image))   
                                                     {
                                                        $image1 = base_url().'uploads/user_image/'.$user_data->image;
                                                     }else
                                                     { 
                                                        $image1 = base_url().'uploads/user_image/default-medium.png';
                                                     }  
                                                    ?> <img src="<?php echo $image1;?>"height="90px;" width="90px;" class="img-circle">  
                                                  <?php if($this->session->flashdata('error_pic')){ echo "<div style='color:red;list-style-type: none;font-size: 0.9em;line-height: 0.9em;'>",$this->session->flashdata('error_pic'),"</div>"; }?>
                                                    <span class="help-block" id="file411" style='color:red;list-style-type: none;font-size: 0.9em;line-height: 0.9em;'></span>
                                                </div>
                                               
                                            </div>
                                            <div class="col-md-6"">
                                               
                                            </div>
                                         </div>   
                                        <!--/row-->
                                        <h3 class="form-section">Contact Details</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Permanent Address</label>
                                                    <input type="text" name="p_address" class="form-control" placeholder="Permanent Address" value="<?php if(isset($advanceuser_data->permanent_address)){ echo $advanceuser_data->permanent_address;}?>"> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Temporary Address</label>
                                                    <input type="text" name="t_address" class="form-control" placeholder="Temparary Address" value="<?php if(isset($advanceuser_data->temparary_address)){ echo $advanceuser_data->temparary_address;} ?>"> </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                               <div class="form-group">
                                                    <label>Native Place</label>
                                                    <input type="text" name="native_place" class="form-control" placeholder="Native Place" value="<?php if(isset($advanceuser_data->native_place)){ echo $advanceuser_data->native_place; } ?>"> </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Contact No</label>
                                                    <input type="text" name="contact_no" value="<?php if(isset($user_data->mobileno)){ echo $user_data->mobileno;}?>" class="form-control" placeholder="Contact No" required readonly> </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Whatsapp No</label>
                                                    <input type="text" name="whatsapp_no" class="form-control" placeholder="Whatsapp No"  value="<?php if(isset($advanceuser_data->whatsapp_no)){ echo $advanceuser_data->whatsapp_no; } ?>" data-parsley-type="digits"> </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="text" name="email" class="form-control" placeholder="Email" value="<?php if(isset($user_data->email)){ echo $user_data->email;}?>" required readonly> 
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Facebook Url</label>
                                                    <input type="text" name="facebook_id" class="form-control" placeholder="Facebook ID" 
                                                    value="<?php if(isset($advanceuser_data->facebook_id)){ echo $advanceuser_data->facebook_id; }?>"> </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Linkedin Url</label>
                                                    <input type="text" name="linkdin" class="form-control" placeholder="Linkedin ID" value="<?php if(isset($advanceuser_data->linkedin)){ echo $advanceuser_data->linkedin; }?>">
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                         <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Website</label>
                                                    <input type="text" name="website" class="form-control" placeholder="Website" 
                                                    value="<?php if(isset($advanceuser_data->website)){ echo $advanceuser_data->website; }?>" data-parsley-type="url"> </div>
                                            </div>
                                        </div>
                                        <h3 class="form-section">Professional Details</h3>
                                         <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Highest Qualification</label>
                                                     <select class="form-control" name="highest_qualification" data-placeholder="Choose a Category" tabindex="1">
                                                        <option value="">Select </option>
                                                        <?php if($degree){
                                                          foreach($degree as $deg)
                                                          {?>     
                                                          <option value="<?php echo $deg->id;?>"<?php if(isset($advanceuser_data->highest_qualification)){ if($deg->id == $advanceuser_data->highest_qualification) { echo 'selected'; } }  ?>><?php echo $deg->degree_name;?></option>
                                                          <?php } } ?>
                                                        
                                                     </select>   
                                                </div>
                                            </div>
                                            <!--/span-->
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Employ Status</label>
                                                    <div class="radio-list">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="employstatus" id="chkemployed" value="employed"<?php if(isset($advanceuser_data->employ_status)){ if($advanceuser_data->employ_status == 'employed'){ echo 'checked';}}?>>Employed</label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="employstatus" id="chkunemployed" value="unemployed"<?php if(isset($advanceuser_data->employ_status)){ if($advanceuser_data->employ_status == 'unemployed'){ echo 'checked';}}else { echo 'checked'; }?> > Unemployed </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                     <div class="row" id="showforunemployment" <?php if(isset($advanceuser_data->employ_status)){ if($advanceuser_data->employ_status == 'unemployed'){ echo "style='display:block;'";} } ?> style="display:none;">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Reason for Unemployement</label>
                                                    <input type="text" placeholder="Reason for Unemployement" name="Reason_for_unemployment" class="form-control" value="<?php if(isset($advanceuser_data->reason_for_unemployment)){ echo $advanceuser_data->reason_for_unemployment;} ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                   <label class="control-label">Are you Seeking for Job</label>
                                                    <div class="radio-list" >
                                                        <label class="radio-inline">
                                                            <input type="radio" name="Isjobseeker" id="Ifyes" value="1"<?php if(isset($advanceuser_data->seeking_for_job)){ if($advanceuser_data->seeking_for_job == '1'){ echo "checked";}}?>>Yes</label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="Isjobseeker" id="Ifno" value="0"<?php if(isset($advanceuser_data->seeking_for_job)){ if($advanceuser_data->seeking_for_job == '0'){ echo "checked";}}else { echo 'checked'; }?>> No </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                    </div> 
                                    <div class="row" id="showseekerfield" <?php if(isset($advanceuser_data->employ_status)  && isset($advanceuser_data->seeking_for_job)){  if($advanceuser_data->employ_status == 'unemployed' && $advanceuser_data->seeking_for_job == 1){ echo "style='display:block;'";}}?> style="display:none;">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Industry Type</label>
                                                    <select class="form-control" name="industry_type" tabindex="1">
                                                        <option value="">Select</option>
                                                        <option value="Agriculture"<?php if(isset($advanceuser_data->industry_type)){ if($advanceuser_data->industry_type == 'Agriculture'){ echo 'selected'; }} ?>>Agriculture</option>
                                                        <option value="Automobiles"<?php if(isset($advanceuser_data->industry_type)){ if($advanceuser_data->industry_type == 'Automobiles'){ echo 'selected'; }} ?>>Automobiles</option>
                                                        <option value="Auto_Components"<?php if(isset($advanceuser_data->industry_type)){ if($advanceuser_data->industry_type == 'Auto_Components'){ echo 'selected'; } }?>>Auto Components</option>
                                                        <option value="Aviation"<?php if(isset($advanceuser_data->industry_type)){ if($advanceuser_data->industry_type == 'Aviation'){ echo 'selected'; } } ?>>Aviation</option>
                                                        <option value="Banking"<?php if(isset($advanceuser_data->industry_type)){ if($advanceuser_data->industry_type == 'Banking'){ echo 'selected'; } }?>>Banking</option>
                                                        <option value="Biotechnology"<?php if(isset($advanceuser_data->industry_type)){ if($advanceuser_data->industry_type == 'Biotechnology'){ echo 'selected'; }}?>>Biotechnology</option>
                                                        <option value="Consumer_Markets"<?php if(isset($advanceuser_data->industry_type)){ if($advanceuser_data->industry_type == 'Consumer_Markets'){ echo 'selected'; } }?>>Consumer Markets</option>
                                                        <option value="Education_and_Training"<?php if(isset($advanceuser_data->industry_type)){ if($advanceuser_data->industry_type == 'Education_and_Training'){ echo 'selected'; } }?>>Education and Training</option>
                                                        <option value="Engineering"<?php if(isset($advanceuser_data->industry_type)){ if($advanceuser_data->industry_type == 'Engineering'){ echo 'selected'; } }?>>Engineering</option>
                                                        <option value="Financial_Services"<?php if(isset($advanceuser_data->industry_type)){ if($advanceuser_data->industry_type == 'Financial_Services'){ echo 'selected'; } }?>>Financial Services</option>
                                                        <option value="Food_Processing"<?php if(isset($advanceuser_data->industry_type)){ if($advanceuser_data->industry_type == 'Food_Processing'){ echo 'selected'; } }?>>Food Processing</option>
                                                        <option value="Gems_and_Jewellery"<?php if(isset($advanceuser_data->industry_type)){ if($advanceuser_data->industry_type == 'Gems_and_Jewellery'){ echo 'selected'; } }?>>Gems and Jewellery</option>
                                                        <option value="Healthcare"<?php if(isset($advanceuser_data->industry_type)){ if($advanceuser_data->industry_type == 'Healthcare'){ echo 'selected'; } }?>>Healthcare</option>
                                                        <option value="Infrastructure"<?php if(isset($advanceuser_data->industry_type)){ if($advanceuser_data->industry_type == 'Infrastructure'){ echo 'selected'; } }?>>Infrastructure</option>
                                                        <option value="Insurance"<?php if(isset($advanceuser_data->industry_type)){ if($advanceuser_data->industry_type == 'Insurance'){ echo 'selected'; } }?>>Insurance</option>
                                                        <option value="IT_ITeS"<?php if(isset($advanceuser_data->industry_type)){ if($advanceuser_data->industry_type == 'IT_ITeS'){ echo 'selected'; } }?>>IT &ITeS</option>
                                                        <option value="Manufacturing"<?php if(isset($advanceuser_data->industry_type)){ if($advanceuser_data->industry_type == 'Manufacturing'){ echo 'selected'; } }?>>Manufacturing</option>
                                                        <option value="Media_and_Entertainment"<?php if(isset($advanceuser_data->industry_type)){ if($advanceuser_data->industry_type == 'Media_and_Entertainment'){ echo 'selected'; } }?>>Media and Entertainment</option>
                                                        <option value="Oil_and_Gas"<?php if(isset($advanceuser_data->industry_type)){ if($advanceuser_data->industry_type == 'Oil_and_Gas'){ echo 'selected'; } }?>>Oil and Gas</option>
                                                        <option value="Pharmaceuticals"<?php if(isset($advanceuser_data->industry_type)){ if($advanceuser_data->industry_type == 'Pharmaceuticals'){ echo 'selected'; } }?>>Pharmaceuticals</option>
                                                        <option value="Real_Estate"<?php if(isset($advanceuser_data->industry_type)){ if($advanceuser_data->industry_type == 'Real_Estate'){ echo 'selected'; } }?>>Real Estate</option>
                                                        <option value="Research_and_Development"<?php if(isset($advanceuser_data->industry_type)){ if($advanceuser_data->industry_type == 'Research_and_Development'){ echo 'selected'; } }?>>Research and Development</option>
                                                        <option value="Retail"<?php if(isset($advanceuser_data->industry_type)){ if($advanceuser_data->industry_type == 'Retail'){ echo 'selected'; } }?>>Retail</option>
                                                        <option value="Science_and_Technology"<?php if(isset($advanceuser_data->industry_type)){ if($advanceuser_data->industry_type == 'Science_and_Technology'){ echo 'selected'; } }?>>Science and Technology</option>
                                                        <option value="Services"<?php if(isset($advanceuser_data->industry_type)){ if($advanceuser_data->industry_type == 'Services'){ echo 'selected'; } }?>>Services</option>
                                                        <option value="Steel"<?php if(isset($advanceuser_data->industry_type)){ if($advanceuser_data->industry_type == 'Steel'){ echo 'selected'; } }?>>Steel</option>
                                                        <option value="Telecommunications"<?php if(isset($advanceuser_data->industry_type)){ if($advanceuser_data->industry_type == 'Telecommunications'){ echo 'selected'; } }?>>Telecommunications</option>
                                                        <option value="Textiles"<?php if(isset($advanceuser_data->industry_type)){ if($advanceuser_data->industry_type == 'Textiles'){ echo 'selected'; } }?>>Textiles</option>
                                                        <option value="Tourism_and_Hospitality"<?php if(isset($advanceuser_data->industry_type)){ if($advanceuser_data->industry_type == 'Tourism_and_Hospitality'){ echo 'selected'; } }?>>Tourism and Hospitality</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Location</label>
                                                    <input type="text" placeholder="Location" name="location" class="form-control" value="<?php if(isset($advanceuser_data->location)){ echo $advanceuser_data->location;} ?>">
                                                </div>
                                            </div>
                                            <!--/span-->
                                    </div>  
                                     <div class="row" id="showforemployment" <?php if(isset($advanceuser_data->employ_status)) { if($advanceuser_data->employ_status == 'employed'){ echo "style='display:block;'";} else if($advanceuser_data->employ_status == 'unemployed'){ echo "style='display:none;'";}}else { echo "style='display:none;'"; }?> >
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                   <label class="control-label">Sector</label>
                                                    <div class="radio-list" >
                                                        <label class="radio-inline">
                                                            <input type="radio" name="sector" id="ispublic" value="1"<?php if(isset($advanceuser_data->sector)){ if($advanceuser_data->sector == '1'){ echo "checked";}}?> checked>Public
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="sector" id="isprivate" value="2"<?php if(isset($advanceuser_data->sector)){ if($advanceuser_data->sector == '2'){ echo "checked";}}?>>Private
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="sector" id="isgovernment" value="3"<?php if(isset($advanceuser_data->sector)){ if($advanceuser_data->sector == '3'){ echo "checked";}}?>>Government
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="sector" id="isselfemployed" value="4"<?php if(isset($advanceuser_data->sector)){ if($advanceuser_data->sector == '4'){ echo "checked";}}?>>Self Employed
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="sector" id="isunpaid" value="5"<?php if(isset($advanceuser_data->sector)){ if($advanceuser_data->sector == '5'){ echo "checked";}}?>>Unpaid Family Workers
                                                        </label>         
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div> 
                                        <div class="row" id="allsector" <?php if(isset($advanceuser_data->employ_status)) { if($advanceuser_data->employ_status == 'employed'){ echo "style='display:block;'";}else if($advanceuser_data->employ_status == 'unemployed') { echo "style='display:none;'";} } else { echo "style='display:none;'";}?>>
                                        <div class="col-md-6" id="showpublic_company">
                                                <div class="form-group">
                                                   <label class="control-label">Public Company</label>
                                                    <select class="form-control" name="company_name" id="abc">
                                                        <option value="">Select</option>
                                                        <?php if(!empty($public_companies))
                                                              {
                                                                foreach($public_companies as $p_companies)
                                                                { ?>
                                                                    <option value="<?php echo $p_companies->sector_id;?>"<?php if(isset($advanceuser_data->sector)) { if($p_companies->sector_id == $advanceuser_data->sector){ echo 'selected';} }?>><?php echo $p_companies->sector_name ?></option>
                                                               <?php }    
                                                               }
                                                         ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6" style="display:none;" id="showprivate_company">
                                                <div class="form-group">
                                                   <label class="control-label">Private Company</label>
                                                    <select class="form-control" name="company_name1" id="abc1">
                                                        <option value="">Select</option>
                                                         <?php if(!empty($private_companies))
                                                              {
                                                                foreach($private_companies as $pp_companies)
                                                                { ?>
                                                                    <option value="<?php echo $pp_companies->sector_id;?>"<?php if(isset($advanceuser_data->sector)) { if($pp_companies->sector_id == $advanceuser_data->sector){ echo 'selected';} } ?>><?php echo $pp_companies->sector_name ?></option>
                                                               <?php }    
                                                              }
                                                         ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6" style="display:none;" id="showgoverment_company">
                                                <div class="form-group">
                                                   <label class="control-label">Government Sector</label>
                                                    <select class="form-control" name="company_name2" id="abc2">
                                                        <option value="">Select</option>
                                                       <?php if(!empty($government_companies))
                                                              {
                                                                foreach($government_companies as $g_companies)
                                                                { ?>
                                                                    <option value="<?php echo $g_companies->sector_id;?>"<?php if(isset($advanceuser_data->sector)) { if($g_companies->sector_id == $advanceuser_data->sector){ echo 'selected';} } ?>><?php echo $g_companies->sector_name ?></option>
                                                               <?php }    
                                                              }

                                                         ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6" style="display:none;" id="showself_employed">
                                                <div class="form-group">
                                                   <label class="control-label">Profession</label>
                                                    <select class="form-control" name="company_name3" id="abc3">
                                                        <option value="">Select</option>
                                                         <?php if(!empty($self_employed))
                                                               {
                                                                foreach($self_employed as $s_employed)
                                                                { ?>
                                                                    <option value="<?php echo $s_employed->sector_id;?>"<?php if(isset($advanceuser_data->sector)) { if($g_companies->sector_id == $advanceuser_data->sector){ echo 'selected';} }?>><?php echo $s_employed->sector_name ?></option>
                                                               <?php }    
                                                              }
                                                         ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6" style="display:none;" id="showunpaid">
                                                <div class="form-group">
                                                   <label class="control-label">Unpaid Workers</label>
                                                   <input type="text" placeholder="Unpaid Workers" name="unpaid_workers" class="form-control" value="<?php if(isset($advanceuser_data->unpaid_worker)){ echo $advanceuser_data->unpaid_worker;}else { echo ''; } ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6" id="other">
                                                <div class="form-group">
                                                   <label class="control-label">Other</label>
                                                    <input type="text" placeholder="Other" name="other" class="form-control" value="<?php if(isset($advanceuser_data->other)){ 

                                                        echo $advanceuser_data->other;} ?>">
                                                </div>
                                            </div>
                                        </div>
                                    
                                     <div class="row" id="employmentexperience" <?php if(isset($advanceuser_data->employ_status)) {  if($advanceuser_data->employ_status == 'employed'){ echo "style=display:block;";} }else { echo "style=display:none;";}?>>
                                            <!--/span-->
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Emp:- Start Date</label>
                                                     <input type="text" id="emp_start_date" name="emp_start_date" class="form-control" value="<?php if(isset($advanceuser_data->emp_start_date)){ echo $advanceuser_data->emp_start_date;}?>" placeholder="Start Date" readonly>
                                                     <span id="error" style="list-style-type:none;font-size:0.9em;line-height:0.9em;"></span>

                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">End Date</label>
                                                     <input type="text" name="emp_end_date" id="emp_end_date" class="form-control" placeholder="End Date" readonly value="<?php if(isset($advanceuser_data->emp_end_date)){ echo $advanceuser_data->emp_end_date;}?>"> 
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Total Years of Experience</label>
                                                    <input type="text" id="totalexp" name="total_experience" class="form-control" placeholder="Total Experience in Year" value="<?php if(isset($advanceuser_data->total_experience)){ echo $advanceuser_data->total_experience;}?>" readonly>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        
                                        <h3 class="form-section">Family Details</h3>
                                         <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Total Members</label>
                                                    <input type="text" name="total_member" class="form-control" placeholder="Total No of Members" value="<?php if(isset($advanceuser_data->total_member)){ echo $advanceuser_data->total_member;}?>" data-parsley-type="digits">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Earning Members</label>
                                                    <input type="text" name="earning_member" class="form-control" placeholder="Earning Members" value="<?php if(isset($advanceuser_data->earning_member)){ echo $advanceuser_data->earning_member;}?>" data-parsley-type="digits">
                                                </div>
                                            </div>
                                            <!--/span-->
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Head of Family</label>
                                                     <input type="text" name="head_of_family" class="form-control" placeholder="Head of Family" value="<?php if(isset($advanceuser_data->head_of_family)){ echo $advanceuser_data->head_of_family;}?>" data-parsley-pattern="^[A-Za-z ]*$">    
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div> 
                                        <h3 class="form-section">Social</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label">Associated Ambedkarite Organisations</label>
                                                    <input type="text" name="ambedkar_organisation" class="form-control" placeholder="Organization" value="<?php if(isset($advanceuser_data->ambedkarite_organisations)){ echo $advanceuser_data->ambedkarite_organisations;}?>">
                                                </div>
                                            </div>
                                            <!--/span-->
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Nearest Buddhavihar</label>
                                                     <input type="text" class="form-control" name="nearest_budhavihar" placeholder="Nearest Buddhavihar" value="<?php if(isset($advanceuser_data->nearest_buddhavihar)){ echo $advanceuser_data->nearest_buddhavihar;}?>">    
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label">Social Contribution</label>
                                                    <input type="text" class="form-control" placeholder="Social Contribution" name="social_contribution"  value="<?php if(isset($advanceuser_data->social_contibution)){ echo $advanceuser_data->social_contibution;}?>">
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                              <div class="form-group" >
                                                    <label>Would you like to volunteer for social cause?</label>
                                                    <div class="radio-list" >
                                                        <label class="radio-inline">
                                                            <input type="radio" name="isvolunteer" id="chkYes" value="1"<?php if(isset($advanceuser_data->social_cuase_volunteer)){ if($advanceuser_data->social_cuase_volunteer == '1'){ echo "checked";}}?> checked>Yes</label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="isvolunteer" id="chkNo" value="2"<?php if(isset($advanceuser_data->social_cuase_volunteer)){ if($advanceuser_data->social_cuase_volunteer == '2'){ echo "checked";}}?>>No</label>
                                                    </div>
                                               </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group" id="extra" <?php if(isset($advanceuser_data->social_cuase_volunteer)){ if($advanceuser_data->social_cuase_volunteer == '2'){ echo 'style="display:none;"';}else { echo 'style="display:block;"';} } ?> ">
                                                <label class="control-label">Volunteer For</label>
                                                    <select class="form-control" tabindex="1" name="volunteer_period" id="optionv">
                                                        <option value="">Select</option>
                                                        <option value="Daily"<?php if(isset($advanceuser_data->timeperiod_for_volunteer)){ if($advanceuser_data->timeperiod_for_volunteer == 'Daily'){ echo "selected";}} ?>>Daily</option>
                                                        <option value="Weekly"<?php if(isset($advanceuser_data->timeperiod_for_volunteer)){ if($advanceuser_data->timeperiod_for_volunteer == 'Weekly'){ echo "selected";}}?>>Weekly</option>
                                                        <option value="Monthly"<?php if(isset($advanceuser_data->timeperiod_for_volunteer)){ if($advanceuser_data->timeperiod_for_volunteer == 'Monthly'){ echo "selected";}}?>>Monthly</option>
                                                        <option value="Queterly"<?php if(isset($advanceuser_data->timeperiod_for_volunteer)){ if($advanceuser_data->timeperiod_for_volunteer == 'Queterly'){ echo "selected";}}?>>Queterly</option>
                                                        <option value="Halfyearly"<?php if(isset($advanceuser_data->timeperiod_for_volunteer)){ if($advanceuser_data->timeperiod_for_volunteer == 'Halfyearly'){ echo "selected";}} ?>>Halfyearly</option>
                                                        <option value="Yearly"<?php if(isset($advanceuser_data->timeperiod_for_volunteer)){ if($advanceuser_data->timeperiod_for_volunteer == 'Yearly'){ echo "selected";}}?>>Yearly</option>
                                                    </select>
                                                    <span id="er" style="list-style-type:none;font-size:0.9em;line-height:0.9em;"></span>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="form-actions left">
                                        <a href="javascript:window.history.go(-1);"><button type="button" class="btn default" >Cancel</button></a>
                                        <button type="submit" class="btn blue checkbutton" id="submit">
                                        <i class="fa fa-check"></i> Save</button>
                                    </div>
                                </form>
                                <?php } ?>
                                <!-- END FORM-->
                            </div>
                   </div>


                        </div>
                    </div>
                    <!-- END PAGE BASE CONTENT -->
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->

        </div>
     <?php $this->load->view('admin/footer'); ?>
       
          <script src="<?php echo base_url()?>template/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
         <script src="<?php echo base_url()?>template/assets/global/js/parsley.min.js"></script>
        <script src="<?php echo base_url()?>template/assets/global/js/jquery-clockpicker.min.js"></script>
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
       
    </body>
<script>
$( function() {
    var availableTags = [
      "Listening to music",
      "Reading",
      "Singing",
      "Table tennis",
      "Video gaming",
      "Yoga",
      "Fashion",
      "Drawing",
      "Dance",
      "Cooking",
      "Cricket",
      "Football",
      "Basketball",
      "Learning",
      "Photography",
      "Traveling",
      "Handball",
      "Table tennis",
      "Chess",
      "Watching Movie",
      "Road biking",
      "Walking"
    ];
    $( "#tags" ).autocomplete({
      source: availableTags
    });
  } );




$("#emp_end_date").datepicker({
    onSelect: function () {
        var end = $('#emp_end_date').datepicker('getDate');
        var start   = $('#emp_start_date').datepicker('getDate');

        if(start < end )
        {
             if(start){

            var age_year   = Math.floor((end - start)/31536000000);
            //var age_month   = Math.floor(((end - start)% 31536000000)/2628000000);
            //var age_day   = Math.floor((((end - start)% 31536000000) % 2628000000)/86400000);
            //$('#totalexp').val(age_year +' year ' + age_month + ' month ' + age_day + ' day');
            $('#totalexp').val(age_year +' year ');

            }
            else { $("#error").html('Startdate Required').css("color","red");}
        }
        else
        {
            $("#error").html('Start date should be less from end date').css("color","red");
        }      

       
        
    },
    dateFormat: 'dd/mm/yy',
    maxDate: '+0d',     
    yearRange: '1914:2017',
    buttonImageOnly: false,
    changeMonth: true,
    changeYear: true
});
$( function() {
    $( "#emp_start_date").datepicker({
       changeMonth: true,
       changeYear: true,
       //yearRange: '1990:'+(new Date).getFullYear(),
       dateFormat:'dd/mm/yy',
      // minDate: 0 
    });
  } );

</script>
<script type="text/javascript"> 
// $(document).ready(function() {
//  var fulldate = document.getElementById('dob');
//     var result = document.getElementById('result');
//         $('#dob').keyup(function(){
//         var birthdate = new Date(fulldate.value); 
//         var cur = new Date();
//         var diff = cur-birthdate;
//         var age = Math.floor(diff/31536000000);
//         if(age)
//         {
//           result.value = age;
//         }
//         else{
//             result.value = '';
//         }
//    });
//  });
$("#dob").datepicker({
    onSelect: function () {
        var dob = $('#dob').datepicker('getDate');
        var cur   = new Date();

        var age_year   = Math.floor((cur - dob)/31536000000);
        //var age_month   = Math.floor(((end - start)% 31536000000)/2628000000);
        //var age_day   = Math.floor((((end - start)% 31536000000) % 2628000000)/86400000);
        //$('#totalexp').val(age_year +' year ' + age_month + ' month ' + age_day + ' day');
        $('#result').val(age_year);
    },

    dateFormat: 'dd/mm/yy',
    maxDate: '+0d',     
    yearRange: '1940:',
    buttonImageOnly: false,
    changeMonth: true,
    changeYear: true
});    

</script>
<script type="text/javascript">
$(function () {
    $("input[name='isvolunteer']").click(function () {
        if ($("#chkYes").is(":checked")) {
            $("#extra").show();
             
        } else {
            $("#extra").hide();
            $("#optionv").val();
        }
    });
});

$(function () {
    $("input[name='employstatus']").click(function () { 
        if($("#chkemployed").is(":checked")) {

            $("#allsector").show();
            $("#showforemployment").show();
            $("#showforunemployment").hide();
             $("#showseekerfield").hide();
            $("#employmentexperience").show();
             
        } else if($("#chkunemployed").is(":checked")) { 
           $("#showforunemployment").show();
           $("#showforemployment").hide();
           $("#employmentexperience").hide();
            $("#allsector").hide();
        }
    });
});

$(function () {
    $("input[name='Isjobseeker']").click(function () {
        if ($("#Ifyes").is(":checked")) {
            $("#showseekerfield").show();
             
        }else {
            $("#showseekerfield").hide();
        }
    });
});

$(function () {
    $("input[name='sector']").click(function () { 
        if ($("#ispublic").is(":checked")) { 
            $("#showpublic_company").show();
            $("#showprivate_company").hide();
            $("#showgoverment_company").hide();
            $("#showself_employed").hide();
            $("#showunpaid").hide();
            $("#other").show();
            $('select#abc1 option').removeAttr("selected");
            $('select#abc2 option').removeAttr("selected");
            $('select#abc3 option').removeAttr("selected");
            $("#employmentexperience").show();
             
        }else if($("#isprivate").is(":checked")) {
            $("#showprivate_company").show();
            $("#showpublic_company").hide();
            $("#showgoverment_company").hide();
            $("#showself_employed").hide();
            $("#showunpaid").hide();
            $("#other").show();
            $('select#abc option').removeAttr("selected");
            $('select#abc2 option').removeAttr("selected");
            $('select#abc3 option').removeAttr("selected");
            $("#employmentexperience").show();
        }
        else if($("#isgovernment").is(":checked")) {
            $("#showgoverment_company").show();
            $("#showprivate_company").hide();
            $("#showpublic_company").hide();
            $("#showself_employed").hide();
            $("#showunpaid").hide();   
            $("#other").show();
            $('select#abc option').removeAttr("selected");
            $('select#abc1 option').removeAttr("selected");
            $('select#abc3 option').removeAttr("selected");
            $("#employmentexperience").show();

        }
        else if($("#isselfemployed").is(":checked")) {
            $("#showself_employed").show();
            $("#showgoverment_company").hide();
            $("#showprivate_company").hide();
            $("#showpublic_company").hide();
            $("#showunpaid").hide(); 
            $("#other").show();
            $('select#abc option').removeAttr("selected");
            $('select#abc1 option').removeAttr("selected");
            $('select#abc2 option').removeAttr("selected");
            $("#employmentexperience").show();
           
        }
         else if($("#isunpaid").is(":checked")) {
            $("#showunpaid").show();
            $("#showgoverment_company").hide();
            $("#showprivate_company").hide();
            $("#showpublic_company").hide();
            $("#showself_employed").hide();
            $("#other").hide();
            $("#employmentexperience").hide();
            $('select#abc option').removeAttr("selected");
            $('select#abc1 option').removeAttr("selected");
            $('select#abc2 option').removeAttr("selected");
            $('select#abc3 option').removeAttr("selected");

        }
    });
});

$(".checkbutton").click(function () {
 
 if($("#chkYes").is(":checked")){
    if($('#optionv').val() === ''){
        $('#er').html('Volunteer Periode Required').css("color","red");
        return false;
    }
    else
    {
        $('#er').html('');
        return true;
    }    

  }
});
</script>
<script type="text/javascript">
  $('#form11').parsley();  
</script>

<script>
   $("#submit").click(function() {

    var fileExtension = ['jpeg', 'jpg', 'png'];
    if($("#inputfile").val() == '')
    {
       return true;
    } 
    else if($.inArray($("#inputfile").val().split('.').pop().toLowerCase(), fileExtension) == -1) {
        //alert("Only formats are allowed : "+fileExtension.join(', '));
        $("#file411").html('Only formats are allowed :' +fileExtension.join(', ')).css("color", "red");
        return false;
      }
    return true;
  });
 </script>

 <script>

     function getstate(country_id)
     {
        var str = "country_id="+country_id;
  
        $.ajax({
            type:"POST",
            url:"<?php echo base_url();?>user/get_state/",
            data:str,
            success:function(data)
            {    
              $('#state').empty();
              $('#state').append(data);          
           },
            
        });
     }


    function getcity(state_id)
    {
        var str = "state_id="+state_id;
  
        $.ajax({
            type:"POST",
            url:"<?php echo base_url();?>user/get_city/",
            data:str,
            success:function(data)
            {    
              $('#city').empty();
              $('#city').append(data);          
           },
            
        });
     }

 </script>

</html>