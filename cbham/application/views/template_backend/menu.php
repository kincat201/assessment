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

<?php 
   if(getSession('role')=='HCMM'){
?> 

        <li class="<?php echo curCname()=='pegawai' || curCname()=='jabatan' || curCname()=='unit' || curCname()=='masterska'? 'active' : ''; ?>">
            <a href="<?php echo site_url('');?>">
            <i class="icon-list"></i> 
            <span class="title">Master</span>
            <span class="arrow"></span> 
            <?php echo curCname()=='' ? '<span class="selected"></span>' : ''; ?>
            </a>
            <ul class="sub-menu">
                 <li class="<?php echo curCname()=='pegawai' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('pegawai');?>">
                    <i class="icon-list"></i> 
                    <span class="title">Pegawai</span>
                    <?php echo curCM()=='pegawai' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>  		                  
            </ul>
        </li>

<?php
}else{
?>	

<!--============================================================-->
	
        <?php 
        if(getSession('role')=='Admin'){
        ?>	
        <li class="<?php echo curCname()=='pegawai' || curCname()=='jabatan' || curCname()=='unit' || curCname()=='masterska'? 'active' : ''; ?>">
            <a href="<?php echo site_url('');?>">
            <i class="icon-list"></i> 
            <span class="title">Master</span>
            <span class="arrow"></span> 
            <?php echo curCname()=='' ? '<span class="selected"></span>' : ''; ?>
            </a>
            <ul class="sub-menu">
                 <li class="<?php echo curCname()=='pegawai' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('pegawai');?>">
                    <i class="icon-list"></i> 
                    <span class="title">Pegawai</span>
                    <?php echo curCM()=='pegawai' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>
		<li class="<?php echo curCname()=='masterska' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('masterska');?>">
                    <i class="icon-list"></i> 
                    <span class="title">Tabel Sertifikat Keahlian</span>
                    <?php echo curCM()=='masterska' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>       
                <li class="<?php echo curCname()=='kelompok' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('kelompok');?>">
                    <i class="icon-list"></i> 
                    <span class="title">Kelompok</span>
                    <?php echo curCM()=='kelompok' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>                
                <li class="<?php echo curCname()=='jabatan' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('jabatan');?>">
                    <i class="icon-list"></i> 
                    <span class="title">Jabatan</span>
                    <?php echo curCM()=='jabatan' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>
                <li class="<?php echo curCM()=='jabatan/strukturjabatan' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('jabatan/strukturjabatan');?>">
                    <i class="icon-list"></i> 
                    <span class="title">Struktur Jabatan</span>
                    <?php echo curCM()=='jabatan/strukturjabatan' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>
                <li class="<?php echo curCname()=='unit' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('unit');?>">
                    <i class="icon-list"></i> 
                    <span class="title">Unit</span>
                    <?php echo curCM()=='unit' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>
                <li class="<?php echo curCname()=='grade' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('grade');?>">
                    <i class="icon-list"></i> 
                    <span class="title">Grade</span>
                    <?php echo curCM()=='grade' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>                                                
                <li class="<?php echo curCname()=='satuan' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('satuan');?>">
                    <i class="icon-list"></i> 
                    <span class="title">Satuan</span>
                    <?php echo curCM()=='satuan' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>                
                <li class="<?php echo curCname()=='periode' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('periode');?>">
                    <i class="icon-list"></i> 
                    <span class="title">Periode</span>
                    <?php echo curCM()=='periode' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>                                
                <li class="<?php echo curCname()=='polarisasi' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('polarisasi');?>">
                    <i class="icon-list"></i> 
                    <span class="title">Polarisasi</span>
                    <?php echo curCM()=='polarisasi' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>                                                
                <li class="<?php echo curCname()=='rollup' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('rollup');?>">
                    <i class="icon-list"></i> 
                    <span class="title">Rollup</span>
                    <?php echo curCM()=='rollup' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>                                                                
                <li class="<?php echo curCname()=='kpi' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('kpi');?>">
                    <i class="icon-list"></i> 
                    <span class="title">KPI</span>
                    <?php echo curCM()=='kpi' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>
                <li class="<?php echo curCname()=='bobot' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('bobot');?>">
                    <i class="icon-list"></i> 
                    <span class="title">Bobot KPI</span>
                    <?php echo curCM()=='bobot' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>                                
                 <li class="<?php echo curCM()=='skk' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('skk');?>">
                    <i class="icon-list-alt"></i> 
                    <span class="title">Target SKK</span>
                    <?php echo curCM()=='skk' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>                  
            </ul>
        </li>
        <?php
        }
        ?>
        <li class="<?php echo curCname()=='struktur' ? 'active' : ''; ?>">
            <!-- <a href="<?php echo site_url('struktur'); ?>"> -->
            <!-- <a target="_blank" href="<?=base_url()."pdf/StrukturOrganisasi.pdf"?>"> -->
                <a target="_blank" href='https://cloud.yodyakarya.com/cbham/pdf/StrukturOrganisasi.pdf'>
                <i class="icon-list"></i> 
                <span class="title">Struktur Organisasi</span>
                <?php echo curCname()=='struktur' ? '<span class="selected"></span>' : ''; ?>
            </a>
        </li>   
        <li class="<?php echo curCname()=='petugas' ? 'active' : ''; ?>">
            <a href="<?php echo site_url('');?>">
            <i class="icon-list"></i> 
            <span class="title">Kamus Kompetensi</span>
            <span class="arrow"></span> 
            <?php echo curCname()=='' ? '<span class="selected"></span>' : ''; ?>
            </a>
            <ul class="sub-menu">
                 <li class="<?php echo curCM()=='petugas/all' || curCM()=='petugas/add' ? 'active' : ''; ?>">
                    <!-- <a target="_blank" href="<?=base_url()."pdf/KamusKompetensi.docx"?>"> -->
                    <a target="_blank" href='https://cloud.yodyakarya.com/cbham/pdf/KamusKompetensi.docx'>
                    <i class="icon-file"></i> 
                    <span class="title">Kamus Kompetensi</span>
                    <?php echo curCM()=='petugas/all' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>  
                <li class="<?php echo curCM()=='petugas/operasional' ? 'active' : ''; ?>">
                    <a target="_blank" href="<?=base_url()."pdf/Competency Standard & Profile-YK.xls"?>">
                    <i class="icon-list"></i> 
                    <span class="title">Kesetaraan FE-IE-EX</span>
                    <?php echo curCM()=='petugas/operasional' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>
            </ul>
        </li>
        <li class="<?php echo curCname()=='penilaian' ? 'active' : ''; ?>">
            <a href="<?php echo site_url('');?>">
            <i class="icon-list"></i> 
            <span class="title">Standart Kompetensi</span>
            <span class="arrow"></span> 
            <?php echo curCname()=='' ? '<span class="selected"></span>' : ''; ?>
            </a>
            <ul class="sub-menu">
                <li class="<?php echo curCM()=='stdknowhow' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('stdknowhow');?>">
                    <i class="icon-file"></i> 
                    <span class="title">Entry Standart KnowHow</span>
                    <?php echo curCM()=='stdknowhow' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>  
                <li class="<?php echo curCM()=='stdmanagerial' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('stdmanagerial');?>">
                    <i class="icon-list"></i> 
                    <span class="title">Entry Standart Managerial Skill, Individual and People, dan Quality</span>
                    <?php echo curCM()=='stdmanagerial' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>
                <li class="<?php echo curCM()=='outstdkompetensi' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('outstdkompetensi');?>">
                    <i class="icon-list"></i> 
                    <span class="title">Output standart Kompetensi</span>
                    <?php echo curCM()=='outstdkompetensi' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>
            </ul>
        </li>
        <li class="<?php echo curCname()=='master' ? 'active' : ''; ?>">
            <a href="<?php echo site_url('');?>">
            <i class="icon-list"></i> 
            <span class="title">SKK</span>
            <span class="arrow"></span> 
            <?php echo curCname()=='' ? '<span class="selected"></span>' : ''; ?>
            </a>
            <ul class="sub-menu">
                <li class="<?php echo curCM()=='skk/realisasi' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('skk/realisasi');?>">
                    <i class="icon-list-alt"></i> 
                    <span class="title">Realisasi SKK</span>
                    <?php echo curCM()=='skk/realisasi' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>
                <li class="<?php echo curCM()=='skk/hitungskk' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('skk/hitungskk');?>">
                    <i class="icon-list-alt"></i> 
                    <span class="title">Hitung SKK</span>
                    <?php echo curCM()=='skk/hitungskk' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>                
            </ul>
        </li>        
        <li class="<?php echo curCname()=='profilkompetensix' ? 'active' : ''; ?>">
            <a href="<?php echo site_url('profilkompetensix');?>">
            <i class="icon-list"></i> 
            <span class="title">Profil Kompetensi</span>
            <span class="arrow"></span>             
            <?php echo curCname()=='profilkompetensix' ? '<span class="selected"></span>' : ''; ?>
            </a>
            <ul class="sub-menu">
                <li class="<?php echo curCname()=='profilkompetensi' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('profilkompetensi');?>">
                    <i class="icon-list-alt"></i> 
                    <span class="title">Entry Profil Kompetensi</span>
                    <?php echo curCname()=='profilkompetensi' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>
                <li class="<?php echo curCM()=='profilkompetensi/evaluasiprofilkompetensi' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('profilkompetensi/evaluasiprofilkompetensi');?>">
                    <i class="icon-list-alt"></i> 
                    <span class="title">Evaluasi Profil Kompetensi</span>
                    <?php echo curCM()=='profilkompetensi/evaluasiprofilkompetensi' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>                
            </ul>
        </li>
        <li class="<?php echo curCname()=='master' ? 'active' : ''; ?>">
            <a href="<?php echo site_url('');?>">
            <i class="icon-list"></i> 
            <span class="title">Performance Management System</span>
            <span class="arrow"></span> 
            <?php echo curCname()=='' ? '<span class="selected"></span>' : ''; ?>
            </a>
            <ul class="sub-menu">
<!--                  <li class="<?php echo curCM()=='pms' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('pms');?>">
                    <i class="icon-list-alt"></i> 
                    <span class="title">Penilaian Kinerja</span>
                    <?php echo curCM()=='pms' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>   -->
                 <li class="<?php echo curCM()=='pms' ? 'active' : ''; ?>">
                    <a target="_blank" href="<?php echo site_url('pms');?>">
                    <!-- <a href="<?php echo site_url('pms');?>"> -->
                    <i class="icon-list-alt"></i> 
                    <span class="title">Penilaian Kinerja</span>
                    <?php echo curCM()=='pms' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>                                  
                <li class="<?php echo curCM()=='pms/evaluasipms' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('pms/evaluasipms');?>">
                    <i class="icon-list-alt"></i> 
                    <span class="title">Evaluasi Penilaian Kinerja</span>
                    <?php echo curCM()=='pms/evaluasipms' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>
                <li class="<?php echo curCM()=='pms/rekappms' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('pms/rekappms');?>">
                    <i class="icon-list-alt"></i> 
                    <span class="title">Rekap Penilaian Kinerja per Tahun</span>
                    <?php echo curCM()=='pms/rekappms' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>
                <li class="<?php echo curCM()=='pms/resumepms' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('pms/resumepms');?>">
                    <i class="icon-list-alt"></i> 
                    <span class="title">Resume Penilaian Kinerja</span>
                    <?php echo curCM()=='pms/resumepms' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>
            </ul>
        </li>
        <li class="<?php echo curCname()=='master' ? 'active' : ''; ?>">
            <a href="<?php echo site_url('');?>">
            <i class="icon-list"></i> 
            <span class="title">Manpower Planning</span>
            <span class="arrow"></span> 
            <?php echo curCname()=='' ? '<span class="selected"></span>' : ''; ?>
            </a>
            <ul class="sub-menu">
                 <li class="<?php echo curCM()=='mpp' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('mpp');?>">
                    <i class="icon-list-alt"></i> 
                    <span class="title">Rencana Penambahan & Pemenuhan</span>
                    <?php echo curCM()=='mpp' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>  
                <li class="<?php echo curCM()=='mpp/rotasi' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('mpp/rotasi');?>">
                    <i class="icon-list-alt"></i> 
                    <span class="title">Mutasi</span>
                    <?php echo curCM()=='mpp/rotasi' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>
            </ul>
        </li>
        <li class="<?php echo curCname()=='master' ? 'active' : ''; ?>">
            <a href="<?php echo site_url('');?>">
            <i class="icon-list"></i> 
            <span class="title">Pelatihan & Pengembangan</span>
            <span class="arrow"></span> 
            <?php echo curCname()=='' ? '<span class="selected"></span>' : ''; ?>
            </a>
            <ul class="sub-menu">
                 <li class="<?php echo curCM()=='tna' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('tna');?>">
                    <i class="icon-list-alt"></i> 
                    <span class="title">Training Need Analysis</span>
                    <?php echo curCM()=='tna' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>  
                 <li class="<?php echo curCM()=='tna/training' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('tna/training');?>">
                    <i class="icon-list-alt"></i> 
                    <span class="title">Program Training</span>
                    <?php echo curCM()=='tna/training' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>
                <li class="<?php echo curCM()=='tna/realtraining' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('tna/realtraining');?>">
                    <i class="icon-list-alt"></i> 
                    <span class="title">Realisasi Program Training</span>
                    <?php echo curCM()=='tna/realtraining' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>                                    
                <li class="<?php echo curCM()=='tna/evaluasitraining' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('tna/evaluasitraining');?>">
                    <i class="icon-list-alt"></i> 
                    <span class="title">Evaluasi Keefektifan Kinerja</span>
                    <?php echo curCM()=='tna/evaluasitraining' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>
                <li class="<?php echo curCM()=='tna/reportevaluasitraining' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('tna/reportevaluasitraining');?>">
                    <i class="icon-list-alt"></i> 
                    <span class="title">Report Evaluasi Keefektifan Training</span>
                    <?php echo curCM()=='tna/reportevaluasitraining' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>                
            </ul>
        </li>
	<li class="<?php echo curCname()=='master' ? 'active' : ''; ?>">
            <a href="<?php echo site_url('');?>">
            <i class="icon-list"></i> 
            <span class="title">Sertifikat Keahlian (SKA)</span>
            <span class="arrow"></span> 
            <?php echo curCname()=='' ? '<span class="selected"></span>' : ''; ?>
            </a>
            <ul class="sub-menu">
                 <li class="<?php echo curCM()=='updateska' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('updateska');?>">
                    <i class="icon-list-alt"></i> 
                    <span class="title">Update Sertifikat Keahlian (SKA)</span>
                    <?php echo curCM()=='updateska' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>  
            </ul>
        </li>       
        <li class="<?php echo curCname()=='master' ? 'active' : ''; ?>">
            <a href="<?php echo site_url('');?>">
            <i class="icon-list"></i> 
            <span class="title">Update Personal Record</span>
            <span class="arrow"></span> 
            <?php echo curCname()=='' ? '<span class="selected"></span>' : ''; ?>
            </a>
            <ul class="sub-menu">
                 <li class="<?php echo curCM()=='upr' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('upr');?>">
                    <i class="icon-list-alt"></i> 
                    <span class="title">Update Personal Record</span>
                    <?php echo curCM()=='upr' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>  
            </ul>
        </li>
        <li class="<?php echo curCname()=='master' ? 'active' : ''; ?>">
            <a href="<?php echo site_url('');?>">
            <i class="icon-list"></i> 
            <span class="title">Prosedur CBHAM</span>
            <span class="arrow"></span> 
            <?php echo curCname()=='' ? '<span class="selected"></span>' : ''; ?>
            </a>
            <ul class="sub-menu">
                 <li class="<?php echo curCM()=='uploaddok' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('uploaddok');?>">
                    <i class="icon-list-alt"></i> 
                    <span class="title">Upload Dokumen</span>
                    <?php echo curCM()=='uploaddok' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>  
                 <li class="<?php echo curCM()=='uploaddok/downloaddok' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('uploaddok/downloaddok');?>">
                    <i class="icon-list-alt"></i> 
                    <span class="title">Download Dokumen</span>
                    <?php echo curCM()=='uploaddok/downloaddok' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>  
            </ul>
        </li>

<?php
}
?>

<!--         <li class="<?php echo curCname()=='master' ? 'active' : ''; ?>">
            <a href="<?php echo site_url('');?>">
            <i class="icon-list"></i> 
            <span class="title">Rotasi Promosi</span>
            <span class="arrow"></span> 
            <?php echo curCname()=='' ? '<span class="selected"></span>' : ''; ?>
            </a>
            <ul class="sub-menu">
                 <li class="<?php echo curCM()=='master/station' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('master/station');?>">
                    <i class="icon-list-alt"></i> 
                    <span class="title">Penilaian Kinerja</span>
                    <?php echo curCM()=='master/station' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>  
                <li class="<?php echo curCM()=='master/lokasi' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('master/lokasi');?>">
                    <i class="icon-list-alt"></i> 
                    <span class="title">Evaluasi Penilaian Kinerja</span>
                    <?php echo curCM()=='master/lokasi' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>
            </ul>
        </li>
        <li class="<?php echo curCname()=='master' ? 'active' : ''; ?>">
            <a href="<?php echo site_url('');?>">
            <i class="icon-list"></i> 
            <span class="title">Reward</span>
            <span class="arrow"></span> 
            <?php echo curCname()=='' ? '<span class="selected"></span>' : ''; ?>
            </a>
            <ul class="sub-menu">
                 <li class="<?php echo curCM()=='master/station' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('master/station');?>">
                    <i class="icon-list-alt"></i> 
                    <span class="title">Penilaian Kinerja</span>
                    <?php echo curCM()=='master/station' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>  
                <li class="<?php echo curCM()=='master/lokasi' ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('master/lokasi');?>">
                    <i class="icon-list-alt"></i> 
                    <span class="title">Evaluasi Penilaian Kinerja</span>
                    <?php echo curCM()=='master/lokasi' ? '<span class="selected"></span>' : ''; ?>
                    </a>
                </li>
            </ul>
        </li> -->

<!--         <li class="<?php echo curCname()=='search' ? 'active' : ''; ?>">
            <a href="<?php echo site_url('search');?>">
            <i class="icon-list"></i> 
            <span class="title">Setting</span>
            <?php echo curCname()=='search' ? '<span class="selected"></span>' : ''; ?>
            </a>
        </li> -->
        
<!--         <li >
            <a href="<?php echo site_url('login/logout');?>">
            <i class="icon-key"></i> 
            <span class="title">Logout</span>
            </a>
        </li> -->
       
        <!-- <li class="<?php echo curCname()=='search' ? 'active' : ''; ?>">
            <a href="<?php echo site_url('search');?>">
            <i class="icon-list"></i> 
            <span class="title">Setting</span>
            <?php echo curCname()=='search' ? '<span class="selected"></span>' : ''; ?>
            </a>
        </li> -->
        
        <!-- <li >
            <a href="<?php echo site_url('login/logout');?>">
            <i class="icon-arrow-left"></i>  
            <span class="title">Back</span>
            </a>
        </li> -->
		
        


    </ul>
    <!-- END SIDEBAR MENU -->
</div>