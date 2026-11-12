<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>CBHAM</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="<?php echo base_url(); ?>public/assets/fonts/font.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>public/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>public/assets/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>public/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>public/assets/css/style-metro.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>public/assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>public/assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>public/assets/css/themes/blue.css" rel="stylesheet" type="text/css" id="style_color"/>
        <link rel="stylesheet" href="<?php echo base_url();?>public/assets/plugins/colorbox/colorbox.css" />
        <link href="<?php echo base_url(); ?>public/assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/plugins/gritter/css/jquery.gritter.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/plugins/chosen-bootstrap/chosen/chosen.css" />
        <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/plugins/select2/select2_metro.css" /> -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/plugins/jquery-tags-input/jquery.tagsinput.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/plugins/clockface/css/clockface.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/plugins/bootstrap-datepicker/css/datepicker.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/plugins/bootstrap-timepicker/compiled/timepicker.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/plugins/bootstrap-colorpicker/css/colorpicker.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/plugins/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/plugins/bootstrap-datetimepicker/css/datetimepicker.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/plugins/jquery-multi-select/css/multi-select-metro.css" />
        <link href="<?php echo base_url(); ?>public/assets/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>public/assets/css/mystyle.css" rel="stylesheet" type="text/css"/>
        <!-- END PAGE LEVEL STYLES -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>public/assets/logo/yodya.ico" />
        <!--<link rel="stylesheet" href="<?php /*echo base_url();*/?>public/assets/plugins/data-tables/DT_bootstrap.css" /><link rel="stylesheet" href="<?php /*echo base_url();*/?>public/assets/plugins/data-tables/DT_bootstrap.css" />-->
        <link href="<?php echo base_url(); ?>public/assets/plugins/glyphicons/css/glyphicons.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>public/assets/plugins/glyphicons_halflings/css/halflings.css" rel="stylesheet" />
        <script src="<?php echo base_url(); ?>public/assets/scripts/ui-jqueryui.js"></script>
        <script src="<?php echo base_url(); ?>public/assets/plugins/jquery-1.10.1.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>public/assets/scripts/real_time.js"></script>
        <style>
            .golek td {
                vertical-align:top !important;
            }
            .golek .control-label {
                width: 50px;
            }
            .golek .controls {
                margin-left: 70px;
            }
			th.sorting{
				background-color:#57B5E3 !important;
				color:#ffffff !important;
			}
			th.sorting_asc, th.sorting_desc{
				background-color:#3CC051 !important;
				color:#ffffff !important;
			}
            .bootstrap-select .btn, .btn:hover{
                background-color: white;
                border: 1px solid #e5e5e5;
                border-top-color: rgb(229, 229, 229);
                border-top-style: solid;
                border-top-width: 1px;
                border-right-color: rgb(229, 229, 229);
                border-right-style: solid;
                border-right-width: 1px;
                border-bottom-color: rgb(229, 229, 229);
                border-bottom-style: solid;
                border-bottom-width: 1px;
                border-left-color: rgb(229, 229, 229);
                border-left-style: solid;
                border-left-width: 1px;
                border-image-source: initial;
                border-image-slice: initial;
                border-image-width: initial;
                border-image-outset: initial;
                border-image-repeat: initial;
            }
        </style>
        <style type="text/css">
          .ausu-suggestionsBox{
            height: 200px;
            overflow-y: scroll;
          }
        </style>

        <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo base_url(); ?>public/assets/plugins/jquery-1.10.1.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>public/assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
        <!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
        <script src="<?php echo base_url(); ?>public/assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      
        <script src="<?php echo base_url(); ?>public/assets/plugins/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>      
        <script src="<?php echo base_url(); ?>public/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!--[if lt IE 9]>
        <script src="<?php echo base_url(); ?>public/assets/plugins/excanvas.min.js"></script>
        <script src="<?php echo base_url(); ?>public/assets/plugins/respond.min.js"></script>  
        <![endif]-->   
        <script src="<?php echo base_url(); ?>public/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>public/assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>  
        <script src="<?php echo base_url(); ?>public/assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>public/assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/plugins/ckeditor/ckeditor.js"></script>  
        <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/plugins/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/plugins/select2/select2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script> 
        <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/plugins/jquery-tags-input/jquery.tagsinput.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/plugins/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/plugins/clockface/js/clockface.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/plugins/bootstrap-daterangepicker/date.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script> 
        <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>  
        <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>   
        <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/plugins/jquery.input-ip-address-control-1.0.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/plugins/jquery-multi-select/js/jquery.multi-select.js"></script>   
        <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/plugins/jquery.numeric.js"></script>
        <script src="<?php echo base_url(); ?>public/assets/plugins/bootstrap-modal/js/bootstrap-modal.js" type="text/javascript" ></script>
        <script src="<?php echo base_url(); ?>public/assets/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript" ></script> 
        <script type="text/javascript" src="<?php echo base_url();?>public/assets/plugins/colorbox/jquery.colorbox-min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.css"/>
        <!--<script type="text/javascript" src="<?php /*echo base_url();*/?>public/assets/plugins/data-tables/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?php /*echo base_url();*/?>public/assets/plugins/data-tables/DT_bootstrap.js"></script>-->
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url(); ?>public/assets/scripts/app.js"></script>
        <script src="<?php echo base_url(); ?>public/assets/scripts/form-components.js"></script>     
        <script src="<?php echo base_url(); ?>public/assets/scripts/ui-modals.js"></script>
        <script src="<?php echo base_url(); ?>public/assets/scripts/table-advanced.js"></script>

        <!-- autosuggest -->
        <script src="<?php echo base_url(); ?>public/assets/js/jquery.ausu-autosuggest.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/css/style-autocompletex.css"/>

        <!-- Sweet Alert -->
        <script src="<?php echo base_url('public/assets/js/sweetalert.min.js')?>"></script>
        <!-- Sweet Alert -->

        <script src="<?php echo base_url(); ?>public/assets/js/bootstrap-select.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/css/bootstrap-select.css"/>   

        <style type="text/css">
            .bootstrap-select.btn-group .dropdown-menu.inner{
                padding-bottom: 30px;
            }
        </style>
       
        <!-- END PAGE LEVEL SCRIPTS -->
        <script>
            jQuery(document).ready(function() {
                $('.busek').live('click',function() {
                    var url = $(this).attr('data-url');
                    var jenis = $(this).attr('data-jenis');
                    var nama = $(this).attr('data-nama');
                    var answer = confirm('Apakah anda yakin akan menghapus '+jenis+' '+nama+'?');
                    if (answer) {
                        window.location = url;
                    }
                    return false;
                });

                // initiate layout and plugins
                App.init();
                FormComponents.init();
                TableAdvanced.init();

                $('.selectpicker').selectpicker({
                  size: 7,
                  dropupAuto:false
                });

                $('.sidebar-toggler').click();

                $('[data-toggle="popover"]').popover();
                //$('.sidebar-toggler').click(false);
            });

            function back() {
                history.back();
                return false;
            }

            function blockUI(el) {
                lastBlockedUI = el;
                jQuery(el).block({
                    message: '<img src="<?php echo base_url(); ?>public/assets/img/loading.gif" align="absmiddle">',
                    css: {
                        border: 'none',
                        padding: '2px',
                        backgroundColor: 'none'
                    },
                    overlayCSS: {
                        backgroundColor: '#000',
                        opacity: 0.05,
                        cursor: 'wait'
                    }
                });
            }
            
            function unblockUI(el) {
                jQuery(el).unblock({
                    onUnblock: function () {
                        jQuery(el).removeAttr("style");
                    }
                });
            }

            jQuery(document).ready(function() {
                jQuery('.date-picker').datepicker({
                    minDate: new Date(2010, 0, 1),
                    maxDate: new Date(2010, 5, 31),
                    dateFormat: 'DD, MM, d, yy'
                });
            });

            function responseAlert(title,text,icon){
                swal({
                    title: title,
                    text : text,
                    icon: icon,
                    timer: 3000
                });
            }

        </script>
        
        <!-- END JAVASCRIPTS -->
          
    <?php 
        echo $xajax_js;
    ?>


   </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <!-- <body class="page-header-fixed"> -->
    <body class="page-header-fixed page-sidebar-fixed page-sidebar-closed">

        <!-- BEGIN HEADER -->
        <?php echo $_header; ?>
        <!-- END HEADER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container row-fluid">
            <!-- BEGIN SIDEBAR -->
            <?php echo $_menu; ?>
            <!-- END SIDEBAR -->
            <!-- BEGIN PAGE -->  
            <div class="page-content">
                <!-- BEGIN PAGE CONTAINER-->
                <div class="container-fluid">
                    <div class="row-fluid"> 
                        <div class="span12">
                            <h3 class="page-title">
                                <?php echo @$title; ?> <small><?php echo !empty($title_small) ? @$title_small : ''; ?></small>
                            </h3>
                            <ul class="breadcrumb">
                                <i class="icon-home"></i>
                                <?php echo set_breadcrumb(); ?> 
                                <li style="float: right; padding-right: 10px;">
                                    <i class="icon-calendar"></i>
                                    <span id="date_time"></span>
                                    <script type="text/javascript">window.onload = date_time('date_time');</script>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <?php if(@$this->session->flashdata('flash_msg')) { ?>
                    <div class="row-fluid">
                        <div class="span12" >
                            <?php echo @$this->session->flashdata('flash_msg'); ?>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- BEGIN PAGE CONTENT-->
                    <?php echo @$_content; ?>
                    <!-- END PAGE CONTENT-->         
                </div>
                <!-- END PAGE CONTAINER-->
            </div>
            <!-- END PAGE -->  
        </div>
        <!-- END CONTAINER -->

        <!-- BEGIN FOOTER -->
        <?php echo $_footer; ?>
        <!-- END FOOTER -->
    </body>
    <!-- END BODY -->
</html>