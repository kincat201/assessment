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
                            <li class="active">
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
            <!-- Input Group -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="card">
                        <div class="header">
                            <h2>
                               <img src="{{url('assets/app/images/proses_simulasi/info.png')}}"  style="width:40px;height:40px;"> Pengumuman
                            </h2>
                        </div>
                 <div class="body">
                @if($statuspengumuman->isEmpty())
                            
                         <div class="row clearfix">
                            <!-- Widget Identitas -->
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-body" style=" background-color: #4C60AC;"><p  align="justify"><font color="white">Pengumuman beasiswa KAI belum dibuka, kami informasikan kepada anggota koperasi yang telah mendaftar beasiswa silahkan cek data anda <a href="{{url('/pendaftaran_beasiswa')}}" class="btn btn-warning" role="button">Di SINI</a> , pastikan lampiran data yang anda isi pada  formulir beasiswa sudah dikirim dengan benar". </font></p></div>
                                </div>
                            </div>
                        </div>
       
                @else 
                            @if($statusterima->isEmpty())
                                 <div class="row clearfix">
                                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="panel panel-default">
                                            <div class="panel-body" style=" background-color: #FB7E6D;">
                                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                                    <img src="{{url('assets/app/images/proses_simulasi/gr.png') }}"  style="width:150px;height:120px;">
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                                                    <center><p><font color="#fffff"><h3>"Mohon maaf untuk anggota yang terhormat, beasiswa anda untuk periode tahun ini belum diterima oleh koperasi ASTRA"</h3></font></p></center>
                                                </div>


                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <div class="card">
                                                       
                                                        <div class="body">
                                                           <p align="justify">
																<b>Terimakasih atas partisipasi anda dalam program beasiswa Koperasi Astra International periode <?php echo date('Y')?> </b>
														   </p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     </div>
                                 </div>
                            @else
                                    <div class="row clearfix">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="panel panel-default">
                                                <div class="panel-body" style=" background-color: #3CC559;">
                                                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                                        <img src="{{url('assets/app/images/proses_simulasi/gr.png')}}"  style="width:150px;height:120px;">
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                                                        <center><p><font color="#fffff"><h3>"Selamat, Beasiswa anda telah diterima oleh koperasi ASTRA, sebagai tanda bukti anda telah diterima silahkan cetak sertifikat anda disini"</h3></font></p></center>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                        <div class="card">
                                                            <div class="header">
                                                                <h2>Informasi KAI</h2>
                                                            </div>
                                                            <div class="body">
                                                               <p align="justify">terimakasih atas partisipasi anda dalam program beasiswa Koperasi Astra tahun <?php echo date("Y"); ?>. Untuk mencetak sertifikat beasiswa silahkan klik tombol dibawah ini. <br><br>
                                                                   <a target="_blank" href="{{ url('/sertifikat') }}" class="btn btn-warning" role="button">SERTIFIKAT (PDF)</a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @foreach($announcements as $announcement)
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                        <div class="card">
                                                            <div class="header">
                                                                <h2>{{ $announcement->title }}</h2>
                                                            </div>
                                                            <div class="body">
                                                                <p align="justify">{{ $announcement->description }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                         </div> 
                                    </div>


                            @endif   
                @endif  

                </div>
            </div>
            </div>
            </div>

    </section>

@endsection

