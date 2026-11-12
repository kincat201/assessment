<?php 
    $loginsession= $this->session->userdata('sess_cbham');
?> 
<div class="page-sidebar nav-collapse collapse">
    <!-- BEGIN SIDEBAR MENU -->      
    <!-- <div class="sidebar-toggler hidden-phone"></div>   -->
    <ul class="page-sidebar-menu">
        <li>
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <div class="sidebar-toggler hidden-phone"></div>
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        </li>
    <!-- </ul> -->
        <!-- <li> -->
        <!-- <form class="sidebar-search"> -->
           <!--  <span class="sidebar-search label label-success" style="width: 80%;">
            <table>
                <tr>  -->
                    <!-- style="width: 40%;" -->
                    <!-- <td>Username</td><td style="width: 1px;">:&nbsp;</td>
                    <td><?php echo ucwords($loginsession['user']); ?>
                    </td>
                </tr>
            </table>
            </span> -->
        <!-- </form> -->
    <!-- </li> -->
    <!-- <ul class="page-sidebar-menu"> -->
        <li class="start <?php echo curCname()=='dashboard' ? 'active' : ''; ?>">
            <a href="<?php echo site_url('dashboard'); ?>">
                <i class="icon-home"></i> 
                <span class="title">Dashboard</span>
                <?php echo curCname()=='dashboard' ? '<span class="selected"></span>' : ''; ?>
            </a>
        </li>		
        
        <!-- <li >
            <a href="<?php echo site_url('dashboard');?>">
            <i class="icon-arrow-left"></i> 
            <span class="title">Back</span>
            </a>
        </li> -->
		
        


    </ul>
    <!-- END SIDEBAR MENU -->
</div>