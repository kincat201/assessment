@extends('app.index')
@section('content')
<?php 
    function tgl_indo($tanggal){
        $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);
        
        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun
     
        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }
 
?>
<style type="text/css">
    .crr{
        color:green;
    }
    .er{
        color:red;
    }
</style>
 
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
                            
                            <li class="active">
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
                        <div class="panel panel-warning">
                          <div class="panel-heading"><strong>Informasi</strong></div>
                          <div class="panel-body">
                              <p align="justify"><font color="black"> Terima kasih untuk anggota {{ Auth::user()->NO_ANGGOTA}}, data formulir beasiswa anda telah kami terima. Pengumuman beasiswa akan diumumkan pada halaman beranda beasiswa. <br/><i class="fa fa-info-circle" style="color:red;"></i><small> Info : Pastikan data anda telah diisi dengan benar.</small> </font></p>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Color Pickers -->
          
          
            <!-- Input Group -->
            <div class="row clearfix">
             

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Data Formulir Anda
                            </h2>
                        </div>
                 <div class="body">
            

                      

                    @if(Session::has('berhasil'))
                                        <div class="alert alert-info">{{ Session::get('berhasil')}}</div>
                    @endif

                    @if(Session::has('gagal'))
                                        <div class="alert alert-warning">{{ Session::get('gagal')}}</div>
                    @endif
                     
                     <form name="daftarbeasiswa" id="daftarbeasiswa" class="form-horizontal" role="form">
                            <!-- <h4>
                               No. Registrasi : {{$ambil->id}}
                            </h4> -->
                   <div class="row clearfix">

                       <div class="col-md-12">
                            @if($kelengkapan == 1)
                                    <p align="justify" style="background-color:#9DFBBE; padding:5px;"><br><font color="black">&nbsp;&nbsp;Oops, sepertinya anda belum melengkapi berkas yang harus dilampirkan, silahkan lampirkan berkas untuk syarat pendaftaran beasiswa</font>&nbsp;&nbsp;<a href="{{url('/kelengkapandokumen')}}" class="btn btn-danger">Lengkapi</a><br><br></p>
                            @endif
                             
                            {{--@if($flagtanggaledit == 1)--}}
                            <small>Catatan</small>  
                             <p>Pengeditan formulir & Lampiran hanya dapat dilakukan sebelum tanggal <b><?php echo tgl_indo($ambil->TGL_BATAS_EDIT); ?></b>, <br> formulir tidak dapat diedit apabila telah disetujui oleh HRD.</p>
                             <a href="{{url('/editformulirbeasiswa')}}" class="btn btn-grey"><img src="{{url('assets/app/images/formulir.png')}}"  style="width:50px;height:60px;" alt="editformulir"><br><small>Edit Formulir</small></a> &nbsp;&nbsp;
                             <a href="{{url('/editlampiranbeasiswa')}}" class="btn btn-grey"><img src="{{url('assets/app/images/file.png')}}"  style="width:50px;height:60px;"><br><small>Edit Lampiran</small></a>

                            {{--@endif--}}
                            
                         </div>
                         <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                           <div class="card">
                            <div class="body bg-cyan hover-expand-effect" style="border-radius: 8px;">
                            <div class="font-bold m-b--30"> <center><h4>Data Keanggotaan</h4><hr></center></div>
                            <ul class="dashboard-stat-list">
                           
                                <li>
                                    Nomor Anggota
                                    <span class="pull-right">{{$ambil->NO_ANGGOTA}}</span>
                                </li>
                                <li>
                                    Nama Anggota
                                    <span class="pull-right">{{$ambil->NM_ANGGOTA}}</span>
                                </li>
                               
                                <li>
                                    Terdaftar Sejak
                                    <span class="pull-right"><?php echo tgl_indo($ambil->TGLMSK_KAI); ?></span>
                                </li>
                                <li>
                                    Alamat 
                                    <span class="pull-right">{{$ambil->ALAMAT_RUMAH}}</span>
                                </li>
                                 <li>
                                    Kota
                                    <span class="pull-right">{{$ambil->KOTA}}</span>
                                </li>
                                <li>
                                    No. HP
                                    <span class="pull-right">{{$ambil->NOHP}}</span>
                                </li>   
                            </ul>
                        </div>
                    </div>
                </div>

                   <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                         <div class="card">
                        <div class="body bg-light-green hover-expand-effect" style="border-radius: 8px;">
                            <div class="font-bold m-b--30"> <center><h4>Data Beasiswa</h4><hr></center></div>
                            <ul class="dashboard-stat-list">
                               
                                <li>
                                    Nama Anak
                                    <span class="pull-right">{{$ambil->NM_ANAK}}</span>
                                </li>
                                <li>
                                    Kota Lahir
                                    <span class="pull-right">{{$ambil->KT_LAHIR}}</span>
                                </li>
                               
                                <li>
                                    Tanggal Lahir
                                    <span class="pull-right"><?php echo tgl_indo($ambil->TTL); ?></span>
                                </li>
                                <li>
                                    Nama Sekolah
                                    <span class="pull-right">{{$ambil->NM_SKL}}</span>
                                </li>
                                 <li>
                                    Pendidikan Beasiswa
                                    <span class="pull-right">{{$ambil->ST_PEND}}</span>
                                </li>
                                <li>
                                    Provinsi Sekolah
                                    <span class="pull-right">{{$ambil->PROV_SKL}}</span>
                                </li>   
                            </ul>
                        </div>
                    </div>
                </div>
                         
                         
            </div>


                      </form>

                        </div>
                    </div>
                </div>
            </div>

    </section>



@endsection

@section('scripts')

  {!!Html::script('assets/app/js/jquery.validate.js')!!}
  <script>
 window.setTimeout(function() { $(".alert-info").fadeTo(500, 0).slideUp(500, function(){ $(this).remove(); }); }, 3000);
</script>
@endsection
