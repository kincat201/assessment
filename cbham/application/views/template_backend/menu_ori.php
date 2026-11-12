<?php 
    $loginsession= $this->session->userdata('sess_audit');
?> 
<div class="page-sidebar nav-collapse collapse">
    <!-- BEGIN SIDEBAR MENU -->        
    <ul class="page-sidebar-menu">
        <li>
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <div class="sidebar-toggler hidden-phone"></div>
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        </li>
        <li></span></li>
        <li class="start <?php echo curCname()=='dashboard' ? 'active' : ''; ?>">
            <a href="<?php echo site_url('/'); ?>">
                <i class="icon-home"></i> 
                <span class="title">Dashboard</span>
                <?php echo curCname()=='dashboard' ? '<span class="selected"></span>' : ''; ?>
            </a>
        </li>
        <li class="<?php echo curCname()=='cpassword' ? 'active' : ''; ?>">
            <a href="<?php echo site_url('cpassword');?>">
            <i class="icon-user"></i> 
            <span class="title">Password</span>
            <?php echo curCname()=='cpassword' ? '<span class="selected"></span>' : ''; ?>
            </a>
        </li> 
        <li class="<?php echo curCname()=='data_personal' ? 'active' : ''; ?>">
            <a href="<?php echo site_url('data_personal');?>">
            <i class="icon-user"></i> 
            <span class="title">Data Personal</span>
            <?php echo curCname()=='data_personal' ? '<span class="selected"></span>' : ''; ?>
            </a>
        </li> 
        <li class="<?php echo curCname()=='training' ? 'active' : ''; ?>">
            <a href="<?php echo site_url('training');?>">
            <i class="icon-group"></i> 
            <span class="title">Training</span>
            <?php echo curCname()=='training' ? '<span class="selected"></span>' : ''; ?>
            </a>
        </li> 
        <li class="<?php echo curCname()=='training_type' ? 'active' : ''; ?>">
            <a href="<?php echo site_url('training_type');?>">
            <i class="icon-group"></i> 
            <span class="title">Training Type</span>
            <?php echo curCname()=='training_type' ? '<span class="selected"></span>' : ''; ?>
            </a>
        </li> 
        <li class="<?php echo curCname()=='dashboard' ? 'active' : ''; ?>">
            <a href="<?php echo site_url('dashboard');?>">
            <i class="icon-exclamation-sign"></i> 
            <span class="title">SMK</span>
            <?php echo curCname()=='dashboard' ? '<span class="selected"></span>' : ''; ?>
            </a>
        </li> 
        <li class="<?php echo curCname()=='all_cabin_crew' ? 'active' : ''; ?>">
            <a href="<?php echo site_url('all_cabin_crew');?>">
            <i class="icon-list-alt"></i> 
            <span class="title">Report All Cabin Crew</span>
            <?php echo curCname()=='all_cabin_crew' ? '<span class="selected"></span>' : ''; ?>
            </a>
        </li> 
        <li class="<?php echo curCname()=='check_data_crew' ? 'active' : ''; ?>">
            <a href="<?php echo site_url('check_data_crew');?>">
            <i class="icon-list-alt"></i> 
            <span class="title">Report Check Data Crew</span>
            <?php echo curCname()=='check_data_crew' ? '<span class="selected"></span>' : ''; ?>
            </a>
        </li> 
        <li class="<?php echo curCname()=='rep_summary_data_training' ? 'active' : ''; ?>">
            <a href="<?php echo site_url('rep_summary_data_training');?>">
            <i class="icon-list-alt"></i> 
            <span class="title">Report Summary Data Training</span>
            <?php echo curCname()=='rep_summary_data_training' ? '<span class="selected"></span>' : ''; ?>
            </a>
        </li> 
        <li class="<?php echo curCname()=='fapm' ? 'active' : ''; ?>">
            <a href="<?php echo site_url('fapm');?>">
            <i class="icon-list-alt"></i> 
            <span class="title">FAPM</span>
            <?php echo curCname()=='fapm' ? '<span class="selected"></span>' : ''; ?>
            </a>
        </li>    
        <li class="<?php echo curCname()=='pmc' ? 'active' : ''; ?>">
            <a href="<?php echo site_url('pmc');?>">
            <i class="icon-list-alt"></i> 
            <span class="title">PMC</span>
            <?php echo curCname()=='pmc' ? '<span class="selected"></span>' : ''; ?>
            </a>
        </li>
        <li class="<?php echo curCname()=='ipm' ? 'active' : ''; ?>">
            <a href="<?php echo site_url('ipm');?>">
            <i class="icon-list-alt"></i> 
            <span class="title">IPM</span>
            <?php echo curCname()=='ipm' ? '<span class="selected"></span>' : ''; ?>
            </a>
        </li>   
        
        <?php if($loginsession->author_id == '0'){?>
        <li class="<?php echo curCname()=='tools' ? 'active' : ''; ?>">
            <a href="javascript:;?>">
            <i class="icon-edit"></i> 
            <span class="title">Tools</span>
            <span class="arrow"></span> 
            <?php //echo curCname()=='subcat' ? '<span class="selected"></span>' : ''; ?>
            </a>
            <ul class="sub-menu">
                <li class="<?php echo curCname()=='subcat' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('tools/subcat');?>">
                    <i class="icon-edit"></i> 
                    <span class="title">Sub Category</span>
                    <?php echo curCname()=='subcat' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>
                <li class="<?php echo curCname()=='item' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('tools/item');?>">
                    <i class="icon-edit"></i> 
                    <span class="title">Items</span>
                    <?php echo curCname()=='item' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>
                <li class="<?php echo curCname()=='mapping' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('tools/mapping');?>">
                    <i class="icon-edit"></i> 
                    <span class="title">Mapping</span>
                    <?php echo curCname()=='mapping' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>
                <li class="<?php echo curCname()=='conf_ipm' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('tools/conf_ipm');?>">
                    <i class="icon-edit"></i> 
                    <span class="title">Config IPM</span>
                    <?php echo curCname()=='conf_ipm' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>
                <li class="<?php echo curCname()=='tools/conf_compliment' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('tools/conf_compliment');?>">
                    <i class="icon-edit"></i> 
                    <span class="title">Config Compliment Ext</span>
                    <?php echo curCname()=='tools/conf_compliment' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>
                <li class="<?php echo curCname()=='tools/conf_penugasan' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('tools/conf_penugasan');?>">
                    <i class="icon-edit"></i> 
                    <span class="title">Config Penugasan dg Baik</span>
                    <?php echo curCname()=='tools/conf_penugasan' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>
                <li class="<?php echo curCname()=='tools/conf_training' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('tools/conf_training');?>">
                    <i class="icon-edit"></i> 
                    <span class="title">Config Prestasi Training</span>
                    <?php echo curCname()=='tools/conf_training' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>
                <li class="<?php echo curCname()=='tools/conf_kehadiran' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('tools/conf_kehadiran');?>">
                    <i class="icon-edit"></i> 
                    <span class="title">Config Kehadiran</span>
                    <?php echo curCname()=='tools/conf_kehadiran' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>
                <li class="<?php echo curCname()=='tools/conf_disiplin' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('tools/conf_disiplin');?>">
                    <i class="icon-edit"></i> 
                    <span class="title">Config Disiplin</span>
                    <?php echo curCname()=='tools/conf_disiplin' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>
                <li class="<?php echo curCname()=='tools/conf_update_kehadiran' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('tools/conf_update_kehadiran');?>">
                    <i class="icon-edit"></i> 
                    <span class="title">Config Update Kehadiran</span>
                    <?php echo curCname()=='tools/conf_update_kehadiran' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>
                <li class="<?php echo curCname()=='tools/conf_prosedur' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('tools/conf_prosedur');?>">
                    <i class="icon-edit"></i> 
                    <span class="title">Config Prosedur</span>
                    <?php echo curCname()=='tools/conf_prosedur' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>
                <li class="<?php echo curCname()=='mapping' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('tools/pegawai');?>">
                    <i class="icon-edit"></i> 
                    <span class="title">Pegawai</span>
                    <?php echo curCname()=='mapping' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>
				<li class="<?php echo curCname()=='mapping' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('tools/presentation');?>">
                    <i class="icon-edit"></i> 
                    <span class="title">Presentation</span>
                    <?php echo curCname()=='mapping' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>
            </ul>
        </li>
        <li class="<?php echo curCname()=='subject' ? 'active' : ''; ?>">
            <a href="javascript:;?>">
            <i class="icon-file"></i> 
            <span class="title">Subject</span>
            <span class="arrow"></span> 
            <?php //echo curCname()=='subcat' ? '<span class="selected"></span>' : ''; ?>
            </a>
            <ul class="sub-menu">
                <li class="<?php echo curCname()=='subjectb' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('subject');?>">
                    <i class="icon-file"></i> 
                    <span class="title">Subject</span>
                    <?php echo curCname()=='subject' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>
                <li class="<?php echo curCname()=='subject/subsubject' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('subject/subsubject');?>">
                    <i class="icon-file"></i> 
                    <span class="title">Sub Subject</span>
                    <?php echo curCname()=='subject/subsubject' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>
                <li class="<?php echo curCname()=='mapping' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('subject/mapping');?>">
                    <i class="icon-file"></i> 
                    <span class="title">Mapping</span>
                    <?php echo curCname()=='subject' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>
            </ul>
        </li>
        <li class="<?php echo curCname()=='kehadiran' || curCname()=='compliment' || curCname()=='p_training' || curCname()=='penugasan' || curCname()=='prosedur' || curCname()=='disiplin' || curCname()=='update_kehadiran' ? 'active' : ''; ?>">
            <a href="javascript:;?>">
            <i class="icon-list-alt"></i> 
            <span class="title">Penilaian</span>
            <span class="arrow"></span> 
            <?php //echo curCname()=='subcat' ? '<span class="selected"></span>' : ''; ?>
            </a>
            <ul class="sub-menu">
                 <li class="<?php echo curCname()=='kehadiran' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('kehadiran');?>">
                    <i class="icon-file"></i> 
                    <span class="title">Kehadiran</span>
                    <?php echo curCname()=='kehadiran' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>  
                <li class="<?php echo curCname()=='compliment' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('compliment');?>">
                    <i class="icon-file"></i> 
                    <span class="title">Compliment</span>
                    <?php echo curCname()=='compliment' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>
                <li class="<?php echo curCname()=='p_training' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('p_training');?>">
                    <i class="icon-file"></i> 
                    <span class="title">Training</span>
                    <?php echo curCname()=='p_training' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>
                <li class="<?php echo curCname()=='penugasan' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('penugasan');?>">
                    <i class="icon-file"></i> 
                    <span class="title">Penugasan</span>
                    <?php echo curCname()=='penugasan' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>
                <li class="<?php echo curCname()=='prosedur' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('prosedur');?>">
                    <i class="icon-file"></i> 
                    <span class="title">Prosedur</span>
                    <?php echo curCname()=='prosedur' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>
                <li class="<?php echo curCname()=='disiplin' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('disiplin');?>">
                    <i class="icon-file"></i> 
                    <span class="title">Disiplin</span>
                    <?php echo curCname()=='disiplin' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>
                <li class="<?php echo curCname()=='update_kehadiran' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('update_kehadiran');?>">
                    <i class="icon-file"></i> 
                    <span class="title">Update Kehadiran</span>
                    <?php echo curCname()=='update_kehadiran' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>
            </ul>
        </li>
        <li class="<?php echo curCname()=='master_penugasan' || curCname()=='master_compliment' || curCname()=='master_training' || curCname()=='master_klarifikasi' || curCname()=='master_instruktur' ? 'active' : ''; ?>">
            <a href="javascript:;?>">
            <i class="icon-file"></i> 
            <span class="title">Master</span>
            <span class="arrow"></span> 
            <?php //echo curCname()=='subcat' ? '<span class="selected"></span>' : ''; ?>
            </a>
            <ul class="sub-menu">
                <li class="<?php echo curCname()=='master_penugasan' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('master_penugasan');?>">
                    <i class="icon-file"></i> 
                    <span class="title">Penugasan</span>
                    <?php echo curCname()=='master_penugasan' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>
                <li class="<?php echo curCname()=='master_compliment' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('master_compliment');?>">
                    <i class="icon-file"></i> 
                    <span class="title">Compliment</span>
                    <?php echo curCname()=='master_compliment' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>
                <li class="<?php echo curCname()=='master_training' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('master_training');?>">
                    <i class="icon-file"></i> 
                    <span class="title">Training</span>
                    <?php echo curCname()=='master_training' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>
                 <li class="<?php echo curCname()=='master_klarifikasi' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('master_klarifikasi');?>">
                    <i class="icon-file"></i> 
                    <span class="title">Jenis Klarifikasi</span>
                    <?php echo curCname()=='master_klarifikasi' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>
                <li class="<?php echo curCname()=='master_instruktur' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('master_instruktur');?>">
                    <i class="icon-file"></i> 
                    <span class="title">Instruktur</span>
                    <?php echo curCname()=='master_instruktur' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>
            </ul>
        </li> 
        <?php } ?>
        <li >
            <a href="<?php echo site_url('logout');?>">
            <i class="icon-key"></i> 
            <span class="title">Keluar</span>
            </a>
        </li>

    </ul>
    <!-- END SIDEBAR MENU -->
</div>