 <div class="page-sidebar-wrapper">
                <div class="page-sidebar navbar-collapse collapse">
                    <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                        <li class="nav-item start <?php if($this->uri->segment(2)=='dashboard'){ echo 'active';} ?>">
                            <a href="<?php echo base_url().'dashboard'?>" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">Dashboard</span>
                            </a>
                           
                        </li>
                        <?php if($this->session->userdata('role') == 1){ ?>
                         <li class="nav-item <?php if($this->uri->segment(2)=='admin'){ echo 'active';} ?>">
                            <a href="#" class="nav-link nav-toggle">
                                <i class="fa fa-user"></i>
                                <span class="title">Administrator</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/administrator')?>" class="nav-link ">
                                     <i class="fa fa-user"></i>
                                        <span class="title">Administrator List</span>
                                    </a>
                                </li>
                               
                            </ul>
                        </li>
                        <?php } ?>
                         <li class="nav-item <?php if($this->uri->segment(2)=='doctor'){ echo 'active';} ?> ">
                            <a href="#" class="nav-link nav-toggle">
                                <i class="fa fa-user"></i>
                                <span class="title">User</span>
                                <span class="arrow"></span>
                              
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="<?php echo base_url('user')?>" class="nav-link">
                                     <i class="fa fa-user"></i>
                                        <span class="title">Verified User</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('user/unverified_user')?>" class="nav-link ">
                                     <i class="fa fa-user"></i>
                                        <span class="title">Unverified User</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('user/deleted_user')?>" class="nav-link ">
                                     <i class="fa fa-user"></i>
                                        <span class="title">Archive User</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('user/rejected_user')?>" class="nav-link ">
                                     <i class="fa fa-user"></i>
                                        <span class="title">Rejected User</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('user/refferal_tracking')?>" class="nav-link ">
                                     <i class="fa fa-user"></i>
                                        <span class="title">Refferal Tracking</span>
                                    </a>
                                </li>

                            </ul>
                           
                        </li>

                        <li class="nav-item <?php if($this->uri->segment(2)=='analytics'){ echo 'active';} ?> ">
                            <a href="#" class="nav-link nav-toggle">
                                <i class="fa fa-user"></i>
                                <span class="title">User Analytics</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="<?php echo base_url('analytics')?>" class="nav-link">
                                       <i class="fa fa-user"></i>
                                        <span class="title">Analytics</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('analytics/other_filter')?>" class="nav-link">
                                       <i class="fa fa-user"></i>
                                        <span class="title">Blood Group</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('analytics/age_filter')?>" class="nav-link">
                                       <i class="fa fa-user"></i>
                                        <span class="title">Age Group</span>
                                    </a>
                                </li>
                                 <li class="nav-item">
                                    <a href="<?php echo base_url('analytics/education_filter')?>" class="nav-link">
                                       <i class="fa fa-user"></i>
                                        <span class="title">Education</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item <?php if($this->uri->segment(2)=='category'){ echo 'active';} ?> ">
                            <a href="#" class="nav-link nav-toggle">
                                <i class="fa fa-server"></i>
                                <span class="title">Category</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="<?php echo base_url('category')?>" class="nav-link">
                                       <i class="fa fa-server"></i>
                                        <span class="title">Category List</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                       
                         <li class="nav-item <?php if($this->uri->segment(2)=='event'){ echo 'active';} ?> ">
                            <a href="#" class="nav-link nav-toggle">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                <span class="title">Events</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="<?php echo base_url('event/add_event')?>" class="nav-link">
                                       <i class="fa fa-calendar" aria-hidden="true"></i>
                                        <span class="title">Add Event</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php  echo base_url('event')?>" class="nav-link">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                        <span class="title"> Post By Admin </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php  echo base_url('event/user_event')?>" class="nav-link">
                                       <i class="fa fa-calendar" aria-hidden="true"></i>
                                        <span class="title"> Post By User </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php  echo base_url('event/archived_event')?>" class="nav-link">
                                       <i class="fa fa-calendar" aria-hidden="true"></i>
                                        <span class="title"> Archive Event</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                         <li class="nav-item <?php if($this->uri->segment(2)=='news'){ echo 'active';} ?> ">
                            <a href="#" class="nav-link nav-toggle">
                                <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                <span class="title">News</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="<?php echo base_url('news/add_news')?>" class="nav-link">
                                       <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                        <span class="title">Add News</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php  echo base_url('news')?>" class="nav-link">
                                       <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                        <span class="title"> Post By Admin</span>
                                    </a>
                                </li>
                                 <li class="nav-item">
                                    <a href="<?php  echo base_url('news/user_news')?>" class="nav-link">
                                       <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                        <span class="title"> Post By User </span>
                                    </a>
                                </li>
                                 <li class="nav-item">
                                    <a href="<?php  echo base_url('news/archived_news')?>" class="nav-link">
                                       <i class="fa fa-calendar" aria-hidden="true"></i>
                                        <span class="title"> Archive News</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                         <li class="nav-item <?php if($this->uri->segment(2)=='blog'){ echo 'active';} ?> ">
                            <a href="#" class="nav-link nav-toggle">
                                <i class="fa fa-server"></i>
                                <span class="title">Blog</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="<?php echo base_url('blog/add_blog')?>" class="nav-link">
                                        <i class="fa fa-server"></i>
                                        <span class="title">Add Blog</span>
                                    </a>
                                </li>
                                 <li class="nav-item">
                                    <a href="<?php  echo base_url('blog')?>" class="nav-link">
                                       <i class="fa fa-server"></i>
                                        <span class="title"> Post By Admin</span>
                                    </a>
                                </li>
                                 <li class="nav-item">
                                    <a href="<?php  echo base_url('blog/user_blog')?>" class="nav-link">
                                       <i class="fa fa-server"></i>
                                        <span class="title"> Post By user</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php  echo base_url('blog/archived_blog')?>" class="nav-link">
                                       <i class="fa fa-server"></i>
                                        <span class="title">Archived Blog</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                         <li class="nav-item <?php if($this->uri->segment(2)=='blog'){ echo 'active';} ?> ">
                            <a href="#" class="nav-link nav-toggle">
                                <i class="fa fa-server"></i>
                                <span class="title">Project</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="<?php echo base_url('project/add_project')?>" class="nav-link">
                                       <i class="fa fa-server"></i>
                                        <span class="title">Add Project</span>
                                    </a>
                                </li>
                                 <li class="nav-item">
                                    <a href="<?php  echo base_url('project')?>" class="nav-link">
                                       <i class="fa fa-server"></i>
                                        <span class="title"> Post By Admin</span>
                                    </a>
                                </li>
                                 <li class="nav-item">
                                    <a href="<?php  echo base_url('project/user_project')?>" class="nav-link">
                                       <i class="fa fa-server"></i>
                                        <span class="title"> Post By User</span>
                                    </a>
                                </li>
                                 <li class="nav-item">
                                    <a href="<?php  echo base_url('project/archived_project')?>" class="nav-link">
                                       <i class="fa fa-server"></i>
                                        <span class="title">Archived Project</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                         <li class="nav-item <?php if($this->uri->segment(2)=='blog'){ echo 'active';} ?> ">
                            <a href="#" class="nav-link nav-toggle">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <span class="title">Group</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="<?php  echo base_url('group')?>" class="nav-link">
                                       <i class="fa fa-users" aria-hidden="true"></i>
                                        <span class="title"> Group Detail</span>
                                    </a>
                                </li>
                                 <li class="nav-item">
                                    <a href="<?php  echo base_url('group/join_request')?>" class="nav-link">
                                      <i class="fa fa-users" aria-hidden="true"></i>
                                        <span class="title">Request For Join</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php  echo base_url('group/user_post')?>" class="nav-link">
                                      <i class="fa fa-users" aria-hidden="true"></i>
                                        <span class="title">User Post</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php  echo base_url('group/archived_group')?>" class="nav-link">
                                      <i class="fa fa-users" aria-hidden="true"></i>
                                        <span class="title">Archived Group</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                         <li class="nav-item <?php if($this->uri->segment(2)=='blog'){ echo 'active';} ?> ">
                            <a href="#" class="nav-link nav-toggle">
                               <i class="fa fa-tasks" aria-hidden="true"></i>
                                <span class="title">Task </span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="<?php  echo base_url('task')?>" class="nav-link">
                                       <i class="fa fa-tasks" aria-hidden="true"></i>
                                        <span class="title"> Task Detail</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php  echo base_url('task/join_request')?>" class="nav-link">
                                       <i class="fa fa-users" aria-hidden="true"></i>
                                        <span class="title">Request For Join</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php  echo base_url('task/user_post')?>" class="nav-link">
                                      <i class="fa fa-users" aria-hidden="true"></i>
                                        <span class="title">User Post</span>
                                    </a>
                                </li>
                                 <li class="nav-item">
                                    <a href="<?php  echo base_url('task/archived_task')?>" class="nav-link">
                                      <i class="fa fa-users" aria-hidden="true"></i>
                                        <span class="title">Archived Task</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item <?php if($this->uri->segment(2)=='blog'){ echo 'active';} ?> ">
                            <a href="#" class="nav-link nav-toggle">
                               <i class="fa fa-tasks" aria-hidden="true"></i>
                                <span class="title"> Poll & Survey </span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="<?php  echo base_url('poll/add_poll')?>" class="nav-link">
                                       <i class="fa fa-tasks" aria-hidden="true"></i>
                                        <span class="title"> Add Poll</span>
                                    </a>
                                </li>
                                  <li class="nav-item">
                                    <a href="<?php  echo base_url('poll')?>" class="nav-link">
                                       <i class="fa fa-tasks" aria-hidden="true"></i>
                                        <span class="title"> Poll Detail</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item <?php if($this->uri->segment(2)=='blog'){ echo 'active';} ?> ">
                            <a href="#" class="nav-link nav-toggle">
                               <i class="fa fa-tasks" aria-hidden="true"></i>
                                <span class="title">Ambadkarite Center </span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="<?php echo base_url('ambedkarite/organization')?>" class="nav-link">
                                       <i class="fa fa-tasks" aria-hidden="true"></i>
                                        <span class="title">Organization</span>
                                    </a>
                                </li>
                                  <li class="nav-item">
                                    <a href="<?php echo base_url('ambedkarite/budhavihar')?>" class="nav-link">
                                       <i class="fa fa-tasks" aria-hidden="true"></i>
                                        <span class="title"> Buddha Vihar</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <?php //if($this->session->userdata('role') == 1){ ?>
                         <li class="nav-item <?php if($this->uri->segment(2)=='setting'){ echo 'active';} ?> ">
                            <a href="#" class="nav-link nav-toggle">
                                <i class="fa fa-wrench" aria-hidden="true"></i>
                                <span class="title">Setting</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="<?php  echo base_url('Setting')?>" class="nav-link">
                                       <i class="fa fa-server"></i>
                                        <span class="title">Content</span>
                                    </a>
                                </li>
                                 <li class="nav-item">
                                    <a href="<?php  echo base_url('Setting/banner')?>" class="nav-link">
                                      <i class="fa fa-picture-o" aria-hidden="true"></i>
                                        <span class="title">Banner</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php  echo base_url('Setting/feedback')?>" class="nav-link">
                                       <i class="fa fa-comment-o" aria-hidden="true"></i>
                                        <span class="title">Feedback by User</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php  echo base_url('Setting/custom_notification')?>" class="nav-link">
                                       <i class="fa fa-comment-o" aria-hidden="true"></i>
                                        <span class="title">Custom Notification</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php  echo base_url('Setting/sector')?>" class="nav-link">
                                       <i class="fa fa-server" aria-hidden="true"></i>
                                        <span class="title">Sector</span>
                                    </a>
                               </li>
                            </ul>
                        </li>
                        <?php //} ?>
                       

                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>