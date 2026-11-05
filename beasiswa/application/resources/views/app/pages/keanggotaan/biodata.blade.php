@extends('app.index')
@section('content')


<style type="text/css">
    .crr{
        color:green;
    }
    .er{
        color:red;


    }
     
    
      .t{
        background-color:#5BB99B;
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

                    <li class="active">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="menu-icon fa fa-list-alt fa-2x"></i>
                            <span><font size='3'>Privasi Anggota</font></span>
                        </a>
                              <ul class="ml-menu">
                                <li class="active">
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
                        <div class="header">
                            <h2>
                               <i class="fa fa-user" style="color:#F7BE59;"></i>&nbsp;&nbsp;BIODATA ANGGOTA
                            </h2>
                        </div>
                 <div class="body">
                 <div class="row clearfix">
                                <!-- Task Info -->
                            @if(Session::has('berhasil'))
                                 <div class="alert alert-info">{{ Session::get('berhasil')}}</div>
                            @endif
                     
                                
                                <div class="col-md-12">
                                            <p align="justify"><font color="black">Harap perbaharui data anda terlebih dahulu, jika ada kesulitan segera hubungi bag. keanggotaan koperasi.<br><small>catatan : - tanda (<font color="red">*</font>) adalah data wajib yang harus diisi setiap anggota</small></font></p><br>
                                            <div class="row">
                                                <div class="col-md-2">No. Anggota</div>
                                                <div class="col-md-10"><b>{{Auth::user()->NO_ANGGOTA}}</b></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-2">Nama Anggota</div>
                                                <div class="col-md-10"><b>{{$cnm}}</b></div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-2">Perusahaan</div>
                                                <div class="col-md-10"><b>{{$datapekerjaan->NMPRS}}</b></div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-2">Golongan</div>
                                                <div class="col-md-10"><b>{{$datapekerjaan->GOLONGAN_JABATAN}}</b></div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-2">No. Telp</div>
                                                <div class="col-md-10">
        
                                                <?php 
                                               
                                                if(!is_null($dataanggota)){
                                                    echo "<b>$dataanggota->PHN</b>";
                                                }else if(!is_null($ambil->PHN)){
                                                    echo "<b>$ambil->PHN</b>";
                                                }else{
                                                    echo "<b>-</b>";
                                                }

                                               

                                                ?>
                                                    
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">No. Handphone <font color="red">*</font></div>
                                                <div class="col-md-10">
                                                <?php 
                                               
                                                if(!is_null($dataanggota)){
                                                    echo "<b>$dataanggota->NOHP</b>";
                                                }else if(!is_null($ambil->NOHP)){
                                                    echo "<b>$ambil->NOHP</b>";
                                                }else{
                                                    echo "<b>-</b>";
                                                }

                                                ?>
                                                    
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-2">Email <font color="red">*</font></div>
                                                <div class="col-md-10">
                                                <?php 
                                                if(!is_null($dataanggota)){
                                                    echo "<b>$dataanggota->EMAIL</b>";
                                                }else{
                                                    echo "<b>-</b>";
                                                }
                                                ?>
                                                    
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-2">Alamat Tinggal <font color="red">*</font></div>
                                                <div class="col-md-10">
                                                
                                                <?php 
                                                if(!is_null($dataanggota)){
                                                    echo "<b>$dataanggota->ALAMAT_LENGKAP</b>";
                                                }else{
                                                    echo "<b>$ambil->AD1</b>";
                                                }
                                                ?>
                                                    
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-10"><a href="{{route('data_anggota.show',Auth::user()->NO_ANGGOTA)}}" class="btn btn-danger" role="button"><i class="fa fa-pencil"></i>  Perbaharui Data</a></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-10"></div>
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
<script type="text/javascript">
    window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove(); 
    });
  }, 2500);
</script>


@endsection
