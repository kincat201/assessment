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
                    <li  class="active">
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
            <div class="row clearfix">
                <!-- Widget Identitas -->
                @if($Dataanggota == null)
                 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="body bg-brown-grey">
                            <p>Informasi : Alamat email dan sebagian data anda belum lengkap, untuk menggunakan aplikasi secara penuh anda perlu mengupdate biodata anda </p><a href="{{ url('/step_1') }}" class="btn btn-danger" role="button">Update Biodata</a>
                        </div>
                    </div>
                </div>
                @endif

				 <div class="col-xs-12">
                    @if(Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message')}}.  <a href="{{url('/hubungikami')}}" class="btn btn-warning btn-sm">Kontak Kami</a> </div>
                    @endif
                </div>
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="body bg-gray">
                            <div class="font-bold m-b--30"><h4>Data Keanggotaan</h4></div>
                            <ul class="dashboard-stat-list">

                                <li>
                                    Nama Lengkap
                                    <span class="pull-right"><b>{{ $take->NAMA_LENGKAP }}</b></span>
                                </li>
                                <li>
                                    Terdaftar Sejak
                                    <span class="pull-right"><b><?php echo date('d F Y', strtotime($take->TGLJD_ANGGOTA)); ?></b></span>
                                </li>
								 @if($Dataanggota == null)
                                <li>
                                    Alamat Diri
                                    <span class="pull-right"><b>{{ $take->ALAMAT_LENGKAP }}</b></span>
                                </li>
								@else
								<li>
                                    Alamat Diri
                                    <span class="pull-right"><b>{{ $Dataanggota->ALAMAT_LENGKAP }}</b></span>
                                </li>
								@endif
                                @if($pekerjaan == null)
                                 <li>
                                    Nama Perusahaan
                                    <span class="pull-right"><b>-</b></span>
                                </li>

                                 <li>
                                    Gol. Jabatan
                                    <span class="pull-right"><b>-</b></span>
                                </li>
                                @else
                                <li>
                                    Nama Perusahaan
                                    <span class="pull-right"><b>{{ $pekerjaan->NMPRS }}</b></span>
                                </li>

                                 <li>
                                    Gol. Jabatan
                                    <span class="pull-right"><b>{{ $pekerjaan->GOLONGAN_JABATAN }}</b></span>
                                </li>
                                @endif



                                @if($Dataanggota == null)
                                    <li>
                                        No. Telp
                                        <span class="pull-right"><b>{{ $take->PHN }}</b></span>
                                    </li>
                                    <li>
                                        No. Hp
                                        <span class="pull-right"><b>{{ $take->NOHP }}</b></span>
                                    </li>
                                    <li>
                                        E-Mail
                                        <span class="pull-right"><b>-</b></span>
                                    </li>
                                @else
                                    <li>
                                        No. Telp
                                        <span class="pull-right"><b>{{ $Dataanggota->PHN }}</b></span>
                                    </li>
                                    <li>
                                        No. Hp
                                        <span class="pull-right"><b>{{ $Dataanggota->NOHP }}</b></span>
                                    </li>
                                    <li>
                                        E-Mail
                                        <span class="pull-right"><b>{{ $Dataanggota->EMAIL }}</b></span>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                      {{--   <div class="header">
                            <h2>Informasi Beasiswa</h2>
                        </div> --}}
                         <div class="body">
                             <h3>Status Beasiswa</h3>
                             @if($beasiswa == '')
                                 <div class="alert alert-info">
                                     STATUS PENDAFTARAN : <strong>DATA PENDAFTARAN BELUM DIKIRIM / SUBMIT, SEGERA LENGKAPI PENDAFTARAN BEASISWA ANDA  &nbsp;&nbsp;<a href="{{url('/pendaftaran_beasiswa')}}" class="btn btn-warning">DAFTAR</a></strong>
                                 </div>
                             @elseif($flag_pengumuman->STATUS == 0 && $flag_pengumuman->STATUS != null)

                                 @if($beasiswa->flagsubmit == 0 && $beasiswa->STATUS == 0)
                                     <div class="alert alert-info">
                                         STATUS PENDAFTARAN : <strong>DATA BELUM LENGKAP, SEGERA LENGKAPI PENDAFTARAN BEASISWA ANDA  &nbsp;&nbsp;<a href="{{url('/pendaftaran_beasiswa')}}" class="btn btn-warning">LENGKAPI DATA</a></strong>
                                     </div>
                                 @endif

                                 @if($beasiswa->flagsubmit == 1 && $beasiswa->STATUS == 0)
                                     @if($beasiswa->flagrevisi == 1)
                                         <div class="alert alert-info">
                                             STATUS PENDAFTARAN : <strong>HRD MEMINTA REVISI "{!!  strip_tags(@$beasiswa->KET_SISWA) !!}", SEGERA LENGKAPI PENDAFTARAN BEASISWA ANDA  &nbsp;&nbsp;<a href="{{url('/pendaftaran_beasiswa')}}" class="btn btn-warning">LENGKAPI DATA</a></strong>
                                         </div>
                                     @else
                                         <div class="alert alert-info">
                                             STATUS PENDAFTARAN : <strong>PENDAFTARAN ANDA SEDANG DI CEK OLEH HRD</strong>
                                         </div>
                                     @endif
                                 @endif

                                 @if($beasiswa->flagsubmit == 1 && $beasiswa->STATUS == 1)
                                     <div class="alert alert-info">
                                         STATUS PENDAFTARAN : <strong>PENDAFTARAN SEDANG DI CEK OLEH ADMIN BEASISWA KOPERASI ASTRA</strong>
                                     </div>
                                 @endif

                             @else
                                <div class="alert alert-info">
                                     SUDAH PENGUMUMAN <a class="btn btn-warning" href="{{ url('pengumuman_beasiswa') }}">Lihat Pengumuman</a>
                                </div>
                             @endif
                            <h3>Informasi Beasiswa</h3>
                            <p align="justify">Bagi anggota yang hendak mendaftar program beasiswa KAI
                                diharapkan agar membaca informasi ini, terimakasih.
                                Klik read more untuk lanjut membaca.</p><br>
                             <img src="assets/login/images/guide.png" style="width:130px;height:130px;">&nbsp;&nbsp;&nbsp;&nbsp;
                             <br>
                             <a href="{{url('informasi_beasiswa')}}" class="btn btn-danger"><i class="fa fa-eye"></i> Lanjut Baca</a>
                            <hr>
                        </div>
                    </div>
                </div>

                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header bg-white">
                            <center><h2>Panduan Beasiswa KAI</h2></center>
                        </div>
                        <div class="body">

                            <center><p>Simulasi pendaftaran beasiswa online periode {{ date('Y') }} :</p>
                                @if(\App\Statusbea::find(13)->STATUS == 1)
                                <iframe src="{{env('ADMIN_URL'). '/assets/app/'.\App\Statusbea::find(14)->KETERANGAN}}" style="width:800px; height:1000px;" frameborder="0"></iframe>
                                @else
                                <video width="800" height="500" controls>
                                    <source src="{{ env('ADMIN_URL'). '/assets/app/'.\App\Statusbea::find(15)->KETERANGAN }}" type="video/mp4">
                                </video>
                                @endif
                            </center>
                        </div>
                    </div>
                </div>
            </div>
                <!-- #END# Browser Usage -->
            </div>
       
    </section>
@endsection
@section('scripts')   
{{--   {!!Html::script('assets/app/js/jquery.validate.js')!!} --}}
@endsection
