<?php //$data['session'] =  $this->session->userdata('isLogin'); ?>
<div class="header navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div style="background-color: #FFFFFF;">
                <div style="float: left; width: 100%; background-color: #FFFFFF;">
                    <a class="" href="#">
                        <!-- <img src="<?php echo base_url(); ?>public/assets/logo/yk3.png" alt="logo" />  -->
                        <img src="<?php echo base_url(); ?>public/assets/logo/LogoHeader.png" alt="logo" />                         
                    </a> 
                    <!-- <font style="float: right; padding-right: 10px; margin: 10px auto; font-size: 15px;"><strong>CBHAM PT. YODYA KARYA</strong></font> -->
                    
                    <ul class="nav pull-right">
                        <li class="dropdown user">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img alt="" src="assets/img/avatar1_small.jpg" />
                            <span class="username"><b><?php echo getSession('role').', '.getSession('user') ?></b></span>
                            <!-- <font color="white"><?php echo getSession('role').', '.getSession('user') ?></font> -->
                            <!-- <span class="username"><font color="white">Bob Nilson</span> -->
                            <i class="icon-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu">
<!--                                 <li><a href="extra_profile.html"><i class="icon-user"></i> My Profile</a></li>
                                <li><a href="page_calendar.html"><i class="icon-calendar"></i> My Calendar</a></li>
                                <li><a href="inbox.html"><i class="icon-envelope"></i> My Inbox(3)</a></li>
                                <li><a href="#"><i class="icon-tasks"></i> My Tasks</a></li>
                                <li class="divider"></li>
                                <li><a href="extra_lock.html"><i class="icon-lock"></i> Lock Screen</a></li> -->
                                <li><a href="<?php echo site_url('setting');?>"><i class="icon-user"></i> Setting</a></li>
                                <li><a href="<?php echo site_url('login/logout');?>"><i class="icon-key"></i> Log Out</a></li>                                
                            </ul>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>