
<div class="alert alert-block alert-info fade in">

    <h4 class="alert-heading">Selamat Datang di Aplikasi CBHAM (Competence Based Human Asset Management) PT. YODYA KARYA</h4>
    <!-- <p> -->
    <!-- Selamat Datang di Aplikasi CBHAM (Competence Base Human Asset Management) PT. YODYA KARYA -->

    <!-- </p> -->
</div>

<div class="alert alert-block alert-danger fade in">
    <marquee><h4><b><?php echo getSession('reminder') ?></b></h4></marquee>
</div>

<div class="row-fluid">
    <div class="span12">
        <!-- <div class="portlet box blue"> -->
        <div class="row-fluid">
            <div class="span4 responsive" data-tablet="span6" data-desktop="span4">
                <div class="dashboard-stat yellow">
                    <div class="visual">
                        <i class="icon-sitemap"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <h3>Struktur Organisasi</h3>
                        </div>
                        <div class="desc">
                            <!-- Master -->
                        </div>
                    </div>
                    <!-- <a class="more" href="dashboard/setting"> -->
                    <a class="more" target="_blank" href="<?=base_url()."pdf/StrukturOrganisasi.pdf"?>">
                        View more <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
            <div class="span4 responsive" data-tablet="span6" data-desktop="span4">
                <div class="dashboard-stat green">
                    <div class="visual">
                        <i class="icon-book"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <h3>Kamus Kompetensi</h3>
                        </div>
                        <div class="desc">
                        </div>
                    </div>
                    <!-- <a class="more" href="dashboard/cbham"> -->
                    <a class="more" target="_blank" href="<?=base_url()."pdf/KamusKompetensi.docx"?>">
                        View more <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
            <div class="span4 responsive" data-tablet="span6" data-desktop="span4">
                <div class="dashboard-stat purple">
                    <div class="visual">
                        <i class="icon-refresh"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <h3>Updating Personal Record</h3>
                        </div>
                        <div class="desc">
                        </div>
                    </div>

                    <?php
                    if(getSession('role')=='HCMM'){
                    ?>
                    <a class="more" href="#">
                        <?php
                        }else{
                        ?>
                        <a class="more" href="upr">
                            <?php
                            }
                            ?>

                            View more <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                </div>
            </div>
            <?php
            if(getSession('role')=='HCMM' and getSession('role')=='Admin' and getSession('role')=='Admin Unit'){
                ?>
                <div class="span4 responsive" data-tablet="span6" data-desktop="span4">
                    <div class="dashboard-stat purple">
                        <div class="visual">
                            <i class="icon-group"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <h3>Profil Kompetensi</h3>
                            </div>
                            <div class="desc">
                            </div>
                        </div>
                        <a class="more" href="profilkompetensi">
                            View more <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>

        <?php
        if(getSession('role')=='HCMM' and getSession('role')=='Admin' and getSession('role')=='Admin Unit'){
            ?>

            <div class="row-fluid">
                <div class="span4 responsive" data-tablet="span6" data-desktop="span4">
                    <div class="dashboard-stat red">
                        <div class="visual">
                            <i class="icon-bar-chart"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <h3>Performance Management</h3>
                            </div>
                            <div class="desc">
                            </div>
                        </div>

                        <?php
                        if(getSession('role')=='HCMM'){
                        ?>
                        <a class="more" href="#">
                            <?php
                            }else{
                            ?>
                            <a class="more" href="pms">
                                <?php
                                }
                                ?>
                                View more <i class="m-icon-swapright m-icon-white"></i>
                            </a>
                    </div>
                </div>
                <div class="span4 responsive" data-tablet="span6" data-desktop="span4">
                    <div class="dashboard-stat blue">
                        <div class="visual">
                            <i class="icon-calendar"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <h3>Realisasi SKK</h3>
                            </div>
                            <div class="desc">
                            </div>
                        </div>

                        <?php
                        if(getSession('role')=='HCMM'){
                        ?>
                        <a class="more" href="#">
                            <?php
                            }else{
                            ?>
                            <a class="more" href="skk/realisasi">
                                <?php
                                }
                                ?>

                                View more <i class="m-icon-swapright m-icon-white"></i>
                            </a>
                    </div>
                </div>
                <div class="span4 responsive" data-tablet="span6" data-desktop="span4">
                    <div class="dashboard-stat yellow">
                        <div class="visual">
                            <i class="icon-list-alt"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <h3>Hitung Realisasi SKK</h3>
                            </div>
                            <div class="desc">
                            </div>
                        </div>

                        <?php
                        if(getSession('role')=='HCMM'){
                        ?>
                        <a class="more" href="#">
                            <?php
                            }else{
                            ?>
                            <a class="more" href="skk/hitungskk">
                                <?php
                                }
                                ?>

                                View more <i class="m-icon-swapright m-icon-white"></i>
                            </a>
                    </div>
                </div>
            </div>

            <div class="row-fluid">
                <div class="span4 responsive" data-tablet="span6" data-desktop="span4">
                    <div class="dashboard-stat green">
                        <div class="visual">
                            <i class="icon-cogs"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <h3>Evaluasi Keefektifan Training</h3>
                            </div>
                            <div class="desc">
                                <!-- Master -->
                            </div>
                        </div>

                        <?php
                        if(getSession('role')=='HCMM'){
                        ?>
                        <a class="more" href="#">
                            <?php
                            }else{
                            ?>
                            <a class="more" href="tna/evaluasitraining">
                                <?php
                                }
                                ?>

                                View more <i class="m-icon-swapright m-icon-white"></i>
                            </a>
                    </div>
                </div>
                <div class="span4 responsive" data-tablet="span6" data-desktop="span4">
                    <div class="dashboard-stat green">
                        <div class="visual">
                            <i class="icon-tags"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <h3>Prosedur CBHAM</h3>
                            </div>
                            <div class="desc">
                            </div>
                        </div>
                        <a class="more" href="dashboard/payroll">
                            View more <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
            </div>

        <?php } ?>

        <!-- </div> -->
    </div>
</div>


