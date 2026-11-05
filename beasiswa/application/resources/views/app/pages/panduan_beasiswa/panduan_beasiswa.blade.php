@extends('app.index')
@section('content')

<section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div>
                    <br><br><br>
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><font color="#b2b3b2"></font></div>
                    <div class="email"><font color="#b2b3b2"></font></div>
                    
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">DAFTAR MENU</li>
                    <li>
                        <a href="{{ url('/home') }}">
                            <i class="menu-icon fa fa-home fa-2x"></i>
                            <span><font size='3'>Home</font></span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="javascript:void(0);" class="menu-toggle">
                                <i class="menu-icon fa fa-book fa-2x"></i>
                            <span><font size='3'>Beasiswa</font></span>
                        </a>
                        <ul class="ml-menu">
                            <li class="active">
                                <a href="{{ url('/panduan_beasiswa') }}">
                                    <i class="menu-icon fa fa-graduation-cap"></i>
                                    <span><font size='3'>Panduan</font></span>
                                </a>
                            </li>
                            
                            <li>
                                <a href="{{ url('/pendaftaran_beasiswa') }}">
                                    <i class="menu-icon fa fa-graduation-cap"></i>
                                    <span><font size='3'>Pendaftaran</font></span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('/pengumuman_beasiswa')}}">
                                    <i class="menu-icon fa fa-graduation-cap"></i>
                                    <span><font size='3'>Pengumuman Beasiswa</font></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="{{url('/hubungikami')}}">
                            <i class="menu-icon fa fa-paper-plane fa-2x"></i>
                            <span><font size='3'>Hubungi Koperasi</font></span>
                        </a>
                    </li>

                    <li>
                        <a href="{{url('/notifikasi')}}">
                            <i class="menu-icon fa fa-envelope fa-2x"></i>
                            <span><font size='3'>Notifikasi {{ \Auth::user()->unreadNotifications()->count() > 0 ? '('.\Auth::user()->unreadNotifications()->count().')' : '' }}</font></span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="menu-icon fa fa-list-alt fa-2x"></i>
                            <span><font size='3'>Privasi Anggota</font></span>
                        </a>
                              <ul class="ml-menu">
                                <li>
                                    <a href="{{ url('/data_anggota') }}">
                                        <i class="menu-icon fa fa-user-circle-o"></i>
                                        <span><font size='3'>Data Anggota</font></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/keamanan') }}">
                                        <i class="menu-icon fa fa-lock"></i>
                                        <span><font size='3'>Keamanan</font></span>
                                    </a>
                                </li>
                            </ul>
                    </li>
                    
                    <li>
                        <a href="{{ url('/logout') }}">
                            <i class="menu-icon fa fa-user-circle fa-2x"></i>
                            <span><font size='3'>Log Out</font></span>
                        </a>
                    </li>

                    <li class="header">KETENTUAN</li>
                    <li>
                       {{--  <a href="javascript:void(0);">
                            <i class="material-icons col-red">donut_large</i>
                            <span>Important</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <i class="material-icons col-amber">donut_large</i>
                            <span>Warning</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <i class="material-icons col-light-blue">donut_large</i>
                            <span>Information</span>
                        </a>
                    </li> --}}
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; {{ date('Y') }} <a href="javascript:void(0);">Koperasi Astra</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
</section>


    <section class="content">
        <div class="container-fluid">
            
            <!-- Color Pickers -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="card">
                        
                 <div class="body">
                    <div class="row clearfix">
                            <center><h4>PANDUAN PROSES PENDAFTARAN BEASISWA</h4><hr></center>
                    </div>

                 <div class="row clearfix">
                                <!-- Task Info -->
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="card" style="border-radius:10px;">
                                        <div class="header">
                                            <h2><img src="{{url('assets/app/images/proses_simulasi/one.png')}}"  style="width:30px;height:30px;">&nbsp; Data Anggota</h2>
                                            
                                        </div>
                                        <div class="body">
                                            <center><img src="{{url('assets/app/images/proses_simulasi/1.png')}}"  style="width:90px;height:120px;"></center>
                                            <br><p align ="center"><strong>Sebelum proses pengisian formulir beasiswa setiap anggota diminta untuk meng-update data diri keanggotaan. Data tersebut diisi sesuai dengan data diri anggota saat ini.</strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="card" style="border-radius:10px;">
                                        <div class="header">
                                            <h2><img src="{{url('assets/app/images/proses_simulasi/two.png')}}"  style="width:30px;height:30px;">&nbsp; Data Formulir</h2>
                                           
                                        </div>
                                        <div class="body">
                                           <center> <img src="{{url('assets/app/images/proses_simulasi/2.png')}}"  style="width:90px;height:120px;"> </center>
                                           <br><p align="center"><strong>Setelah mengisi data anggota, anda akan di alihkan ke halaman formulir pendaftaran beasiswa, lengkapi dan sesuaikan data formulir yang diminta Koperasi.</strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="card" style="border-radius:10px;">
                                        <div class="header">
                                            <h2><img src="{{url('assets/app/images/proses_simulasi/three.png')}}"  style="width:30px;height:30px;">&nbsp; Cek Data</h2>
                                            
                                        </div>
                                        <div class="body">
                                            <center><img src="{{url('assets/app/images/proses_simulasi/3.png')}}"  style="width:90px;height:120px;"> </center>
                                            <br><p align="center"><strong>Bila data anggota dan formulir sudah diisi, anda akan dialihkan ke halaman cek data beasiswa. Bila terdapat kasalahan data harap sesuaikan sebelum tutup tanggal pengeditan.</strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="card" style="border-radius:10px;">
                                        <div class="header">
                                            <h2><img src="{{url('assets/app/images/proses_simulasi/four.png')}}"  style="width:30px;height:30px;">&nbsp;Info Beasiswa</h2>
                                            
                                        </div>
                                        <div class="body">
                                           <center> <img src="{{url('assets/app/images/proses_simulasi/4.png')}}"  style="width:90px;height:120px;"></center>
                                           <br><p align="center"><strong>KAI akan mengumumkan apakah beasiswa anda diterima. Anda bisa melihat di menu pengumuman beasiswa. Bila beasiswa anda diterima silahkan cetak sertifikat.</strong></p>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        </div>
                    </div>
                </div>
            </div>

    </section>

@endsection
@section('scripts')   
{{--   {!!Html::script('assets/app/js/jquery.validate.js')!!} --}}
@endsection
