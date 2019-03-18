<div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                   <a href="<?php echo base_url('dashboard');?>">
                     <img src="<?php echo base_url('uploads/kartavyawhite.png');?>" style="width: 135px;
    height: auto;
    margin-top: -19px;" alt="logo" /></a>
                       <!-- <span style="color:white;margin-top:20px;"><h3><b>KARTAVYA</b></h3></span> --> 
                   <!--  <div class="menu-toggler sidebar-toggler">
                    </div> -->
                </div>
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
               
                <div class="page-top">
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <li class="separator hide"> </li>
                           
                            <li class="dropdown dropdown-extended dropdown-notification dropdown-dark" id="header_notification_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="icon-bell"></i>
                                    <span class="badge badge-success"> <?php $count = $this->db->query("SELECT count(notify_id) as totalrow FROM notification WHERE counter_status = 0 AND type IN('15',16,17,18,19,20,21)")->row();print_r($count->totalrow);?> </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="external">
                                        <h3>
                                            <span class="bold">All</span> notifications</h3>
                                    </li>
                                    <li>
                                        <ul class="dropdown-menu-list" data-handle-color="#637283">
                                          <?php 
                                          $types = array('15','16','17','18','19','20','21');
                                          $this->db->select('notify_id,sender_id,type,receiver_id,msg,counter_status,create_at');
                                          $this->db->from('notification');
                                          $this->db->where('counter_status',0);
                                          $this->db->where_in('type',$types);
                                          $this->db->order_by('notify_id','desc');
                                          $query = $this->db->get();
                                          $data = $query->result();

                                               if(!empty($data))
                                               { 
                                                  foreach($data as $getnotification)
                                                  { 
                                                    ?> 
                                                        <li>
                                                        <a href="<?php echo base_url('notification/index/'.$getnotification->notify_id.'/'.$getnotification->type);  ?>">
                                                            <span class="time"><?php $seconds = $getnotification->create_at/1000; 
                                                              $date = date("Y-m-d H:i:s", $seconds);
                                                             echo $this->common_model->king_time($date);?></span>
                                                            <span class="details">
                                                              <span class="label label-sm label-icon label-success">
                                                            <i class="fa fa-plus"></i>
                                                             </span> <?php echo $getnotification->msg;?> </span>
                                                          </a>
                                                        </li>
                                            <?php } } ?>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <!-- END NOTIFICATION DROPDOWN -->
                            <li class="separator hide"> </li>
                           
                            <!-- END INBOX DROPDOWN -->
                            <li class="separator hide"> </li>
                          
                            <li class="dropdown dropdown-extended dropdown-tasks dropdown-dark" id="header_task_bar">
                               
                            </li>
                           
                            <li class="dropdown dropdown-user dropdown-dark">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <?php  $admin_data = $this->common_model->common_getRow('admin_tb',array('admin_id'=>$this->session->userdata('admin_id')));
                                 if(!empty($admin_data->image))
                                 {
                                      $image = $admin_data->image;
                                 }else{ $image = 'default-medium.png';}  
                                ?>
                                    <img alt="" class="img-circle" src="<?php echo base_url('uploads/admin_image/'.$image);?>" width="40px" height="40px" />
                                    <span class="username username-hide-on-mobile"> <?php if(isset($admin_data->name)) echo $admin_data->name;?></span>
                                   </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li class="divider"> </li>
                                     <li>
                                        <a href="<?php echo base_url('profile');?>">
                                            <i class="icon-key"></i> Profile </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('logout');?>">
                                            <i class="icon-key"></i> Log Out </a>
                                    </li>
                                </ul>
                            </li>
                           
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END PAGE TOP -->
            </div>
            <!-- END HEADER INNER -->
        </div>