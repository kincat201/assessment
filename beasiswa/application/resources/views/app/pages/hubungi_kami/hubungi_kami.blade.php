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
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                                <i class="menu-icon fa fa-book fa-2x"></i>
                            <span><font size='3'>Beasiswa</font></span>
                        </a>
                        <ul class="ml-menu">
                            <li>
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
                    
                    <li  class="active">
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
            <!-- Input Group -->
            <div class="row clearfix">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="card">
                   <div class="header">
                       <h2>FORM KONTAK</h2>
                   </div>
                   <div class="body">
                       <div class="row clearfix">
                        <!-- Task Info -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <p align="justify"><font color="black">Saat ini form pengaduan belum dapat diakses, untuk sementara anda dapat menghubungi salah satu kontak di bawah ini:</font></p><br>

                            <div class="col-md-2">Telp</div>
                            <div class="col-md-10"><b>021 – 65832776</b></div>

                            <div class="col-md-2">Fax</div>
                            <div class="col-md-10"><b>021 - 65835022</b></div>


                            <div class="col-md-2">E-Mail</div>
                            <div class="col-md-10"><b>customer.care@koperasi-astra.com</b></div>


                            <div class="col-md-2">Website</div>
                            <div class="col-md-10"><b>www.koperasi-astra.com</b></div>


                            <div class="col-md-2">IG (Instagram)</div>
                            <div class="col-md-10"><a href="https://www.instagram.com/koperasiastra/" ><i class="fa fa-instagram fa-2x"></i></a></div>


                            <div class="col-md-2">FB (Facebook)</div>
                            <div class="col-md-10"><a  href="https://www.facebook.com/Koperasi-Astra-782872668556424/" ><i class="fa fa-facebook fa-2x"></i></a></div>


                            <div class="col-md-2">Twitter</div>
                            <div class="col-md-10"><a href="https://twitter.com/koperasi_astra"><i class="fa fa-twitter fa-2x"></i></a></div>

                            <div class="col-md-2">Alamat</div>
                            <div class="col-md-10"><b>Grha Sera
                            Lantai IV, Jl. Mitra Sunter Boulevard Blok C2 Kav. 90 Sunter Jaya, Jakarta 14350</b></div>

                            <div class="col-md-12">
                                <iframe src="http://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.857318205506!2d106.88289231430959!3d-6.149856561993395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f56bcae5a3a9%3A0xbf29b47c2bfd4197!2sGrha+Sera!5e0!3m2!1sid!2sid!4v1551344393846" width="100%" height="40%" frameborder="0" style="border:0" allowfullscreen></iframe></div>
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
