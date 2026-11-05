@extends('app.index')
@section('style')
{{--  {!!Html::style('assets/app/js/datepicker/jquery-ui.css')!!} --}}
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
{{--     {!!Html::style('assets/app/js/datepicker/jquery-ui.css')!!} --}}
{!!Html::Style('assets/app/swalalert/css/sweetalert.css') !!}
@endsection
@section('content')

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
           {{--  <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="card">
                        <div class="panel panel-warning">
                          <div class="panel-heading"><strong>INFORMASI BEASISWA</strong></div>
                          <div class="panel-body">
                              <p align="justify"><font color="black">{{$isi}}</font></p>
                          </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- #END# Color Pickers -->


            <!-- Input Group -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="card">
                        <div class="header">
                            <h2>
                             <i class="fa fa-graduation-cap" style="color:#F7BE59;"></i> FORMULIR BEASISWA
                         </h2>
                         <p align="justify"><br><font color="black">Harap lengkapi data dengan benar<br><small>catatan : Jika terjadi kesalahan dalam pengisian formulir, kami masih memberikan batas waktu pengeditan formulir hingga batas waktu yang ditentukan.</small></font></p>
                     </div>

                     @if(Session::has('message'))
                     <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <div class="alert alert-danger">{{ Session::get('message')}}</div>

                        </div>
                    </div>
                    @endif

                    @if(Session::has('pesangagal'))
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <div class="alert alert-danger">{{ Session::get('pesangagal')}}</div>

                        </div>
                    </div>
                    @endif

                    <div class="body">
                        <div class="row clearfix" style="background-color:#e0f9e8; border-radius:9px;">
                            <center><h4>DATA ANAK</h4></center>
                        </div>
                        <br>
                        <form name="daftarbeasiswa" id="daftarbeasiswa" class="form-horizontal" role="form" method="POST" action ="{{ url('/storeformbeasiswa') }}" enctype="multipart/form-data" files ="true">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <input type="hidden" readOnly="true" name="no_anggota" class="form-control date" value="{{ Auth::user()->no_anggota }}" hidden>



                            <div class="row clearfix">
                                <div class="form-group">
                                    <label for="no_anggota" class="col-md-2 control-label">Nama Anak</label>
                                    <div class="col-md-8">

                                        <div class="form-line">
                                            <input type="text" maxlength="35" id="nama_anak" name="nama_anak" class="form-control date" placeholder="Nama Lengkap Anak"  value="{{ old('nama_anak') }}" style="text-transform: uppercase" onkeypress="return a(event);"  required>
                                            <font color="red"> {{ $errors->insert->first('nama_anak') }} </font>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="form-group">
                                    <label for="no_anggota" class="col-md-2 control-label">Kota Lahir</label>
                                    <div class="col-md-4">
                                      <div class="form-line">
                                        <input type="text" maxlength="35" id="lahir" name="kota_lahir" class="form-control" placeholder="Tempat Lahir Anak"  value="{{ old('kota_lahir') }}" style="text-transform: uppercase" onkeypress="return a(event);" required >
                                        <font color="red"> {{ $errors->insert->first('kota_lahir') }} </font>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                   <span>
                                    <label>Tgl. Lahir</label>
                                    <div class="form-line">
                                        <input type="text" id="tgl_lahir" placeholder="dd-mm-yyyy" name="tgl_lahir" class="form-control" value="{{ old('tgl_lahir') }}" readonly="true">
                                        <font color="red"> {{ $errors->insert->first('tgl_lahir') }} </font>
                                    </div>
                                </span>
                            </div>
                        </div>
                    </div>


                    <div class="row clearfix">
                        <div class="form-group">
                            <label for="no_anggota" class="col-md-2 control-label">No Kartu Keluarga</label>
                            <div class="col-md-4">
                              <div class="form-line">
                                <input type="text" maxlength="16" id="nomor_kk" name="nomor_kk" class="form-control date"  value="{{ old('nomor_kk') }}" placeholder="NOMOR KK (KARTU KELUARGA)"   onkeypress="return isNumberKey(event)" required>
                                <font color="red"> {{ $errors->insert->first('nomor_kk') }} </font>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row clearfix">
                    <div class="form-group">
                        <label for="no_anggota" class="col-md-2 control-label">Jenis Kelamin</label>
                        <div class="col-md-8">

                            <input type="radio" name="jenis_kelamin" class="with-gap" id="jenkel1" value="LAKI-LAKI" {{ old('jenis_kelamin')=="LAKI-LAKI" ? 'checked='.'"'.'checked'.'"' : '' }}>
                            <label for="jenkel1">Laki-Laki</label>

                            <input type="radio" name="jenis_kelamin" class="with-gap" id="jenkel2" value="PEREMPUAN" {{ old('jenis_kelamin')=="PEREMPUAN" ? 'checked='.'"'.'checked'.'"' : '' }}>
                            <label for="jenkel2">Perempuan</label>
                            &nbsp;&nbsp;&nbsp;<font color="red"> {{ $errors->insert->first('jenis_kelamin') }} </font>
                        </div>

                    </div>
                </div>


                <div class="row clearfix">
                    <div class="form-group">
                        <label for="no_anggota" class="col-md-2 control-label">Nama Sekolah/Univ</label>
                        <div class="col-md-8">
                          <div class="form-line">
                            <input type="text" maxlength="150" name="nama_sekolah" id="nama_sekolah" class="form-control date" placeholder="Nama Sekolah / Universitas" value="{{ old('nama_sekolah') }}" style="text-transform: uppercase" required >
                            <font color="red"> {{ $errors->insert->first('nama_sekolah') }} </font>
                        </div>
                    </div>
                </div>
            </div>


            @if(Session::has('pesangagal'))

            <div class="row clearfix">
                <div class="form-group">
                    <label for="no_anggota" class="col-md-2 control-label">Status Pendidikan <font color="gray"><small>(Saat ini)</small></font></label>
                    <div class="col-md-4">
                     <select class="form-control" name="st_pendidikan" id="st_pendidikan"  required>
                        <option value="">Jenjang</option>
                        <option value="SD"  {{ old('st_pendidikan')=="SD" ? 'selected='.'"'.'selected'.'"' : '' }}>SD</option>
                        <option value="SMP" {{ old('st_pendidikan')=="SMP" ? 'selected='.'"'.'selected'.'"' : '' }}>SMP</option>
                        <option value="SMA" {{ old('st_pendidikan')=="SMA" ? 'selected='.'"'.'selected'.'"' : '' }}>SMA/SMK</option>
                        <option value="PT" {{ old('st_pendidikan')=="PT" ? 'selected='.'"'.'selected'.'"' : '' }}>PERGURUAN TINGGI</option>
                    </select>
                </div> <font color="red"> {{ $errors->insert->first('st_pendidikan') }} </font>

            </div>
        </div>

        <div class="row clearfix">
         <div class="form-group">
            <label for="no_anggota" class="col-md-2 control-label">Kelas / Semester</label>
            <div class="col-md-4">
             <select class="form-control" name="kelas" id="kelas"   required>
                <option value="" >Tingkatan</option>
                <option value="{{old ('kelas') }}" selected>{{ old('kelas') }}</option>
            </select>
        </div> <font color="red"> {{ $errors->insert->first('st_pendidikan') }} </font>
    </div>
</div>

@else
<div class="row clearfix">
    <div class="form-group">
        <label for="no_anggota" class="col-md-2 control-label">Status Pendidikan <font color="gray"><small>(Saat ini)</small></font></label>
        <div class="col-md-4">
         <select class="form-control" name="st_pendidikan" id="st_pendidikan"  required>
            <option value="" selected>Jenjang</option>
            <option value="SD">SD</option>
            <option value="SMP">SMP</option>
            <option value="SMA">SMA/SMK</option>
            <option value="PT">PERGURUAN TINGGI</option>
        </select>
    </div> 

</div>
</div>

<div class="row clearfix">
 <div class="form-group">
    <label for="no_anggota" class="col-md-2 control-label">Kelas / Semester</label>
    <div class="col-md-4">
     <select class="form-control" name="kelas" id="kelas"   required>
        <option value="" selected>Tingkatan</option>
    </select>
</div> 
</div>
</div>

@endif



@if(Session::has('pesangagal'))

<div class="row clearfix">
    <div class="form-group">
        <label for="no_anggota" class="col-md-2 control-label">Lemb. Pendidikan</label>
        <div class="col-md-4">

            <select class="form-control" name="lemb_pendidikan" id="lemb_pendidikan" required>

                <option value="">Status Lembaga</option>
                <option value="NEGERI" {{ old('lemb_pendidikan')=="NEGERI" ? 'selected='.'"'.'selected'.'"' : '' }}>NEGERI</option>
                <option value="SWASTA" {{ old('lemb_pendidikan')=="SWASTA" ? 'selected='.'"'.'selected'.'"' : '' }}>SWASTA</option>
            </select>
            <font color="red"> {{ $errors->insert->first('lemb_pendidikan') }} </font>

        </div>
    </div>
</div>

@else

<div class="row clearfix">
    <div class="form-group">
        <label for="no_anggota" class="col-md-2 control-label">Lemb. Pendidikan</label>
        <div class="col-md-4">

            <select class="form-control" name="lemb_pendidikan" id="lemb_pendidikan" required>

                <option value=""  selected>Status Lembaga</option>
                <option value="NEGERI" >NEGERI</option>
                <option value="SWASTA">SWASTA</option>
            </select>

        </div>
    </div>
</div>

@endif

@if(Session::has('pesangagal'))

<div class="row clearfix">
    <div class="form-group">
        <label for="no_anggota" class="col-md-2 control-label">Provinsi Sekolah</label>
        <div class="col-md-4"> 

            <select class="form-control" name="prov_sekolah" id="prov_sekolah" required >
                <option value="" selected><font color="green"> Provinsi Sekolah/Univ. </font></option>
                <option value = "NANGGRO ACEH DARUSALLAM" {{ old('prov_sekolah')=="NANGGRO ACEH DARUSALLAM" ? 'selected='.'"'.'selected'.'"' : '' }}>NANGGRO ACEH DARUSALLAM</option>
                <option value = "SUMETERA UTARA" {{ old('prov_sekolah')=="SUMETERA UTARA" ? 'selected='.'"'.'selected'.'"' : '' }}>SUMETERA UTARA</option>
                <option value = "SUMATERA BARAT" {{ old('prov_sekolah')=="SUMATERA BARAT" ? 'selected='.'"'.'selected'.'"' : '' }}>SUMATERA BARAT</option>
                <option value = "RIAU - PEKAN BARU" {{ old('prov_sekolah')=="RIAU - PEKAN BARU" ? 'selected='.'"'.'selected'.'"' : '' }}>RIAU - PEKAN BARU</option>
                <option value = "KEPULAUAN RIAU" {{ old('prov_sekolah')=="KEPULAUAN RIAU" ? 'selected='.'"'.'selected'.'"' : '' }}>KEPULAUAN RIAU</option>
                <option value = "JAMBI" {{ old('prov_sekolah')=="JAMBI" ? 'selected='.'"'.'selected'.'"' : '' }}>JAMBI</option>
                <option value = "SUMATERA SELATAN" {{ old('prov_sekolah')=="SUMATERA SELATAN" ? 'selected='.'"'.'selected'.'"' : '' }}>SUMATERA SELATAN</option>
                <option value = "BANGKA BELITUNG" {{ old('prov_sekolah')=="BANGKA BELITUNG" ? 'selected='.'"'.'selected'.'"' : '' }}>BANGKA BELITUNG</option>
                <option value = "BENGKULU" {{ old('prov_sekolah')=="BENGKULU" ? 'selected='.'"'.'selected'.'"' : '' }}>BENGKULU</option>
                <option value = "LAMPUNG" {{ old('prov_sekolah')=="LAMPUNG" ? 'selected='.'"'.'selected'.'"' : '' }}>LAMPUNG</option>
                <option value = "DKI JAKARTA" {{ old('prov_sekolah')=="DKI JAKARTA" ? 'selected='.'"'.'selected'.'"' : '' }}>DKI JAKARTA</option>
                <option value = "JAWA BARAT" {{ old('prov_sekolah')=="JAWA BARAT" ? 'selected='.'"'.'selected'.'"' : '' }}>JAWA BARAT</option>
                <option value = "BANTEN" {{ old('prov_sekolah')=="BANTEN" ? 'selected='.'"'.'selected'.'"' : '' }}>BANTEN</option>
                <option value = "JAWA TENGAH" {{ old('prov_sekolah')=="JAWA TENGAH" ? 'selected='.'"'.'selected'.'"' : '' }}>JAWA TENGAH</option>
                <option value = "DAERAH ISTIMEWA YOGYAKARTA" {{ old('prov_sekolah')=="DAERAH ISTIMEWA YOGYAKARTA" ? 'selected='.'"'.'selected'.'"' : '' }}>DAERAH ISTIMEWA YOGYAKARTA</option>
                <option value = "JAWA TIMUR" {{ old('prov_sekolah')=="JAWA TIMUR" ? 'selected='.'"'.'selected'.'"' : '' }}>JAWA TIMUR</option>
                <option value = "BALI" {{ old('prov_sekolah')=="BALI" ? 'selected='.'"'.'selected'.'"' : '' }}>BALI</option>
                <option value = "NUSA TENGGARA BARAT" {{ old('prov_sekolah')=="NUSA TENGGARA BARAT" ? 'selected='.'"'.'selected'.'"' : '' }}>NUSA TENGGARA BARAT</option>
                <option value = "NUSA TENGGARA TIMUR" {{ old('prov_sekolah')=="NUSA TENGGARA TIMUR" ? 'selected='.'"'.'selected'.'"' : '' }}>NUSA TENGGARA TIMUR</option>
                <option value = "KALIMANTAN BARAT" {{ old('prov_sekolah')=="KALIMANTAN BARAT" ? 'selected='.'"'.'selected'.'"' : '' }}>KALIMANTAN BARAT</option>
                <option value = "KALIMANTAN TENGAH" {{ old('prov_sekolah')=="KALIMANTAN TENGAH" ? 'selected='.'"'.'selected'.'"' : '' }}>KALIMANTAN TENGAH</option>
                <option value = "KALIMANTAN SELATAN" {{ old('prov_sekolah')=="KALIMANTAN SELATAN" ? 'selected='.'"'.'selected'.'"' : '' }}>KALIMANTAN SELATAN</option>
                <option value = "KALIMANTAN TIMUR" {{ old('prov_sekolah')=="KALIMANTAN TIMUR" ? 'selected='.'"'.'selected'.'"' : '' }}>KALIMANTAN TIMUR</option>
                <option value = "KALIMANTAN UTARA" {{ old('prov_sekolah')=="KALIMANTAN UTARA" ? 'selected='.'"'.'selected'.'"' : '' }}>KALIMANTAN UTARA</option>
                <option value = "SULAWESI UTARA" {{ old('prov_sekolah')=="SULAWESI UTARA" ? 'selected='.'"'.'selected'.'"' : '' }}>SULAWESI UTARA</option>
                <option value = "SULAWESI BARAT" {{ old('prov_sekolah')=="SULAWESI BARAT" ? 'selected='.'"'.'selected'.'"' : '' }}>SULAWESI BARAT</option>
                <option value = "SULAWESI TENGAH" {{ old('prov_sekolah')=="SULAWESI TENGAH" ? 'selected='.'"'.'selected'.'"' : '' }}>SULAWESI TENGAH</option>
                <option value = "SULAWESI TENGGARA" {{ old('prov_sekolah')=="SULAWESI TENGGARA" ? 'selected='.'"'.'selected'.'"' : '' }}>SULAWESI TENGGARA</option>
                <option value = "SULAWESI SELATAN" {{ old('prov_sekolah')=="SULAWESI SELATAN" ? 'selected='.'"'.'selected'.'"' : '' }}>SULAWESI SELATAN</option>
                <option value = "GORONTALO" {{ old('prov_sekolah')=="GORONTALO" ? 'selected='.'"'.'selected'.'"' : '' }}>GORONTALO</option>
                <option value = "MALUKU" {{ old('prov_sekolah')=="MALUKU" ? 'selected='.'"'.'selected'.'"' : '' }}>MALUKU</option>
                <option value = "MALUKU UTARA" {{ old('prov_sekolah')=="MALUKU UTARA" ? 'selected='.'"'.'selected'.'"' : '' }}>MALUKU UTARA</option>
                <option value = "PAPUA BARAT" {{ old('prov_sekolah')=="PAPUA BARAT" ? 'selected='.'"'.'selected'.'"' : '' }}>PAPUA BARAT</option>
                <option value = "PAPUA" {{ old('prov_sekolah')=="PAPUA" ? 'selected='.'"'.'selected'.'"' : '' }}>PAPUA</option>

            </select>
            <font color="red"> {{ $errors->insert->first('prov_sekolah') }} </font>
        </div>
    </div>
</div>

@else

<div class="row clearfix">
    <div class="form-group">
        <label for="no_anggota" class="col-md-2 control-label">Provinsi Sekolah</label>
        <div class="col-md-4"> 

            <select class="form-control" name="prov_sekolah" id="prov_sekolah" required >
                <option value="" selected><font color="green"> Provinsi Sekolah/Univ. </font></option>
                <option>NANGGRO ACEH DARUSALLAM</option>
                <option>SUMETERA UTARA</option>
                <option>SUMATERA BARAT</option>
                <option>RIAU - PEKAN BARU</option>
                <option>KEPULAUAN RIAU</option>
                <option>JAMBI</option>
                <option>SUMATERA SELATAN</option>
                <option>BANGKA BELITUNG</option>
                <option>BENGKULU</option>
                <option>LAMPUNG</option>
                <option>DKI JAKARTA</option>
                <option>JAWA BARAT</option>
                <option>BANTEN</option>
                <option>JAWA TENGAH</option>
                <option>DAERAH ISTIMEWA YOGYAKARTA</option>
                <option>JAWA TIMUR</option>
                <option>BALI</option>
                <option>NUSA TENGGARA BARAT</option>
                <option>NUSA TENGGARA TIMUR</option>
                <option>KALIMANTAN BARAT</option>
                <option>KALIMANTAN TENGAH</option>
                <option>KALIMANTAN SELATAN</option>
                <option>KALIMANTAN TIMUR</option>
                <option>KALIMANTAN UTARA</option>
                <option>SULAWESI UTARA</option>
                <option>SULAWESI BARAT</option>
                <option>SULAWESI TENGAH</option>
                <option>SULAWESI TENGGARA</option>
                <option>SULAWESI SELATAN</option>
                <option>GORONTALO</option>
                <option>MALUKU</option>
                <option>MALUKU UTARA</option>
                <option>PAPUA BARAT</option>
                <option>PAPUA</option>

            </select>
        </div>
    </div>
</div>
@endif

<hr>

<div class="row clearfix">
    <label for="khusus_1" class="col-md-12  control-label">
        <span class="pull-left">1. Rata rata nilai raport / IP dua semester terakhir ? </span>
    </label>
    <div class="col-md-12">

        <div class="col-md-3">
            <input type="radio" name="khusus_1" value="{{ $criteria->umum_5_value_1 }}" class="with-gap" id="khusus_1_1" {{ old('khusus_1')==$criteria->umum_5_value_1 ? 'checked='.'"'.'checked'.'"' : '' }}>
            <label for="khusus_1_1">{{ $criteria->umum_5_label_1 }}</label>
        </div>
        <div class="col-md-3">
            <input type="radio" name="khusus_1" value="{{ $criteria->umum_5_value_2 }}" class="with-gap" id="khusus_1_2" {{ old('khusus_1')==$criteria->umum_5_value_2 ? 'checked='.'"'.'checked'.'"' : '' }}>
            <label for="khusus_1_2">{{ $criteria->umum_5_label_2 }}</label>
        </div>
        <div class="col-md-3">
            <input type="radio" name="khusus_1" value="{{ $criteria->umum_5_value_3 }}" class="with-gap" id="khusus_1_3" {{ old('khusus_1')==$criteria->umum_5_value_3 ? 'checked='.'"'.'checked'.'"' : '' }}>
            <label for="khusus_1_3">{{ $criteria->umum_5_label_3 }}</label>
        </div>
    </div>
</div>


<div class="row clearfix">

    <label for="khusus_2" class="col-md-12  control-label">
        <span class="pull-left">2. Rekomendasi sehubungan prestasi non akademik ?</span></label><br>
        <div class="col-md-12">

            <div class="col-md-3">
                <input type="radio" name="khusus_2" value="{{ $criteria->umum_7_value_1 }}" class="with-gap" id="khusus_2_1" {{ old('khusus_2')==$criteria->umum_7_value_1 ? 'checked='.'"'.'checked'.'"' : '' }}>
                <label for="khusus_2_1">{{ $criteria->umum_7_label_1 }}</label>

            </div>

            <div class="col-md-3">
                <input type="radio" name="khusus_2" value="{{ $criteria->umum_7_value_2 }}" class="with-gap" id="khusus_2_2"  {{ old('khusus_2')==$criteria->umum_7_value_2 ? 'checked='.'"'.'checked'.'"' : '' }}>
                <label for="khusus_2_2">{{ $criteria->umum_7_label_2 }}</label>
            </div>

            <div class="col-md-3">
                <input type="radio" name="khusus_2" value="{{ $criteria->umum_7_value_3 }}" class="with-gap" id="khusus_2_3"  {{ old('khusus_2')==$criteria->umum_7_value_3 ? 'checked='.'"'.'checked'.'"' : '' }}>
                <label for="khusus_2_3">{{ $criteria->umum_7_label_3 }}</label>
            </div>

            <div class="col-md-3">
                <input type="radio" name="khusus_2" value="{{ $criteria->umum_7_value_4 }}" class="with-gap" id="khusus_2_4"  {{ old('khusus_2')==$criteria->umum_7_value_4 ? 'checked='.'"'.'checked'.'"' : '' }}>
                <label for="khusus_2_4">{{ $criteria->umum_7_label_4 }}</label>
            </div>


        </div>
        <font color="red"> {{ $errors->insert->first('khusus_2') }} </font>
    </div> 


    <hr>
    <div class="row clearfix" style="background-color:#e0eff9; border-radius:9px;">
        <center><h4>DATA ANGGOTA</h4></center>
    </div>
    <hr>


    <div class="row clearfix">
        <label for="umum_4" class="col-md-12  control-label">
            <span class="pull-left">1. Golongan (Standard PT. Astra International Tbk) ?</span></label><br>
            <div class="col-md-12">

                <div class="col-md-3">     
                    <input type="radio" name="umum_4" value="{{ $criteria->umum_4_value_1 }}" class="with-gap" id="umum_4_1" {{ old('umum_4')==$criteria->umum_4_value_1 ? 'checked='.'"'.'checked'.'"' : '' }}>
                    <label for="umum_4_1">{{ $criteria->umum_4_label_1 }}</label>

                </div>

                <div class="col-md-3">
                    <input type="radio" name="umum_4" value="{{ $criteria->umum_4_value_2 }}" class="with-gap" id="umum_4_2" {{ old('umum_4')==$criteria->umum_4_value_2 ? 'checked='.'"'.'checked'.'"' : '' }}>
                    <label for="umum_4_2">{{ $criteria->umum_4_label_2 }}</label>
                </div>

                <div class="col-md-3">
                    <input type="radio" name="umum_4" value="{{ $criteria->umum_4_value_3 }}" class="with-gap" id="umum_4_3" {{ old('umum_4')==$criteria->umum_4_value_3 ? 'checked='.'"'.'checked'.'"' : '' }}>
                    <label for="umum_4_3">{{ $criteria->umum_4_label_3 }}</label>
                </div>


            </div>
            <font color="red"> {{ $errors->insert->first('umum_4') }} </font>
        </div>




        <div class="row clearfix">      
            <label for="umum_5" class="col-md-12  control-label">
                <span class="pull-left">2. Adakah surat keterangan tambahan / rekomendasi dari HRD (sertifikat prestasi karyawan dll) ? </span></label><br>
                <div class="col-md-12">

                 <div class="col-md-3">               
                    <input type="radio" name="umum_5" value="{{ $criteria->umum_6_value_1 }}" class="with-gap" id="umum_5_1" {{ old('umum_5')==$criteria->umum_6_value_1 ? 'checked='.'"'.'checked'.'"' : '' }}>
                    <label for="umum_5_1">{{ $criteria->umum_6_label_1 }}</label>
                </div>

                <div class="col-md-3">                 
                    <input type="radio" name="umum_5" value="{{ $criteria->umum_6_value_2 }}" class="with-gap" id="umum_5_2"  {{ old('umum_5')==$criteria->umum_6_value_2 ? 'checked='.'"'.'checked'.'"' : '' }}>
                    <label for="umum_5_2">{{ $criteria->umum_6_label_2 }}</label>
                </div>

                <div class="col-md-3">                 
                    <input type="radio" name="umum_5" value="{{ $criteria->umum_6_value_3 }}" class="with-gap" id="umum_5_3"  {{ old('umum_5')==$criteria->umum_6_value_3 ? 'checked='.'"'.'checked'.'"' : '' }}>
                    <label for="umum_5_3">{{ $criteria->umum_6_label_3 }}</label>
                </div>

                <div class="col-md-3">                 
                    <input type="radio" name="umum_5" value="{{ $criteria->umum_6_value_4 }}" class="with-gap" id="umum_5_4"  {{ old('umum_5')==$criteria->umum_6_value_4 ? 'checked='.'"'.'checked'.'"' : '' }}>
                    <label for="umum_5_4">{{ $criteria->umum_6_label_4 }}</label>
                </div>

            </div>
            <font color="red"> {{ $errors->insert->first('umum_5') }} </font>
        </div>

        <hr>
        <!-- REKENING PENERIMA BEASISWA-->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="card">
                    <div class="panel panel-info">
                      <div class="panel-heading"><strong><i class="fa fa-user-circle"></i> Data Anggota ( Rekening<i> Payroll</i> )</strong></div>
                      <div class="panel-body">
                          <p align="justify"><font color="black">Cek dan sesuaikan nomor rekening anda dengan teliti<br><small>catatan : sangat dianjurkan untuk menggunakan rekening payroll</small></font></p>
                      </div>


                      <div class="body">
                        <div class="row clearfix">
                            <div class="form-group">
                                <label for="no_rek" class="col-md-2 control-label">No. Rekening (Payroll / An. Anggota)</label>
                                <div class="col-md-6">

                                    <div class="form-line">
                                        <input type="text" maxlength="20" id="nomor_rekening" name="nomor_rekening" class="form-control date" placeholder="Nomor Rekening"  style="text-transform: uppercase" onkeypress="return isNumberKey(event)"  @if(Session::has('pesangagal')) value="{{old('nomor_rekening')}}" @else <?php if(!is_null($databeasiswa)){ echo "value=$databeasiswa->NO_REKENING"; } else {echo "value='' "; } ?> @endif><font color="red"> {{ $errors->insert->first('nomor_rekening') }} </font>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="form-group">
                                <label for="an" class="col-md-2 control-label">Atas Nama</label>
                                <div class="col-md-6">

                                    <div class="form-line">
                                        <input type="text" maxlength="50" id="atas_nama" name="atas_nama" class="form-control date" placeholder="Atas Nama"  style="text-transform: uppercase" onkeypress="return a(event);"  @if(Session::has('pesangagal')) value="{{old('atas_nama')}}" @else <?php if(!is_null($databeasiswa)){ echo "value=$databeasiswa->ATAS_NAMA"; } else {echo "value='' "; } ?> @endif><font color="red"> {{ $errors->insert->first('atas_nama') }} </font>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="form-group">
                                <label for="nm_bank" class="col-md-2 control-label">Nama Bank</label>
                                <div class="col-md-6">

                                    <div class="form-line">
                                        <input type="text" maxlength="35" id="nama_bank" name="nama_bank" class="form-control date" placeholder="Nama Bank"  style="text-transform: uppercase"  @if(Session::has('pesangagal')) value="{{old('nama_bank')}}" @else <?php if(!is_null($databeasiswa)){ echo "value=$databeasiswa->NAMA_BANK"; } else {echo "value='' "; } ?> @endif><font color="red"> {{ $errors->insert->first('nama_bank') }} </font>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>



                    </div>
                </div>



            </div>
        </div>
    </div>
    <!-- END DATA PENERIMA BEASISWA-->
    <div class="row clearfix">
        <div class="form-group">

           <div class="col-md-12">
            <div class="col-md-12">&nbsp;&nbsp;&nbsp;&nbsp;
               <button type="button" onclick="validateData();" class="btn btn-info col-md-offset-5">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lanjutkan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-btn fa-arrow-right"></i>
            </button>  
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
{!!Html::script('assets/app/js/datepicker/jquery-ui.js')!!}
{!!Html::script('assets/app/swalalert/js/sweetalert.min.js')!!}
{!!Html::script('assets/app/js/jquery.maskedinput.js')!!}


<script>
    jQuery(function($){
        $("#tgl_lahir").datepicker({

            dateFormat: "dd-mm-yy",
            changeMonth: true,
            changeYear: true,
            yearRange: '1990:' +(new Date).getFullYear()
        });

    });


    jQuery(function($){

        $("#nomor_npwp").mask("99.999.999.9-999.999",{autoclear: false});
    });


    function validateData(){  

                if ($("#nama_anak").val() == "")  
                { 
                    $('#nama_anak').focus();
                    swal({title: "Oopss...", text: "Kolom nama anak belum diisi <br><br><br>", type:"warning", html:true});
                    return false;  

                }else if($("#lahir").val() == "")  
                {  
                    $('#lahir').focus();
                    swal({title: "Oopss...", text: "Kolom tampat lahir belum diisi <br><br><br>", type:"warning", html:true});
                    return false;  

                }else if($("#tgl_lahir").val() == "")  
                {  
                   $('#tgl_lahir').focus();
                   swal({title: "Oopss...", text: "Kolom Tgl. lahir belum diisi <br><br><br>", type:"warning", html:true});
                   return false;  

                }else if($("#nomor_kk").val() == "")  
                {  
                 $('#nomor_kk').focus();
                 swal({title: "Oopss...", text: "Kolom nomor KK belum disi <br><br><br>", type:"warning", html:true});
                 return false;  

                }else if($("#kartu_keluarga").val() == "")  
                 {  
                    $('#kartu_keluarga').focus();
                    swal({title: "Oopss...", text: "Upload file KK belum disi <br><br><br>", type:"warning", html:true});
                    return false;  

                }else if($('input[name=jenis_kelamin]:checked').length <= 0)  
                {  
                    $('#jenkel1').focus();
                    swal({title: "Oopss...", text: "Jenis kelamin belum dipilih <br><br><br>", type:"warning", html:true});
                    return false;  

                }else  if($("#nama_sekolah").val() == "")  
                {  
                    $('#nama_sekolah').focus();
                    swal({title: "Oopss...", text: "Kolom nama sekolah belum diisi <br><br><br>", type:"warning", html:true});
                    return false;  

                }else if($("#st_pendidikan").val() == "")  
                {  
                   $('#st_pendidikan').focus();
                   swal({title: "Oopss...", text: "Status pendidikan belum diisi <br><br><br>", type:"warning", html:true});
                   return false;  

               }else if($("#kelas").val() == ""){
                    $('#st_pendidikan').focus();
                    swal({title: "Oopss...", text: "Status tingkatan kelas/semester belum diisi <br><br><br>", type:"warning", html:true});
                    return false;

                }else if($("#lemb_pendidikan").val() == "")  
                {  
                   $('#lemb_pendidikan').focus();
                   swal({title: "Oopss...", text: "Lembaga pendidikan belum diisi <br><br><br>", type:"warning", html:true});
                   return false;  

                }else if($("#prov_sekolah").val() == "")  
                {  
                  $('#prov_sekolah').focus();
                  swal({title: "Oopss...", text: "Provinsi sekolah belum diisi <br><br><br>", type:"warning", html:true});
                  return false;  

                }else if($('input[name=khusus_1]:checked').length <= 0)  
                {  
                  $('#khusus_1_1').focus();
                  swal({title: "Oopss...", text: "Nilai data anak belum dipilih <br><br><br>", type:"warning", html:true});
                  return false;  

                }else if($('input[name=khusus_2]:checked').length <= 0)  
                {  
                    $('#khusus_1_2').focus();
                    swal({title: "Oopss...", text: "Prestasi non akademik belum dipilih <br><br><br>", type:"warning", html:true});
                    return false;  

                } else if($('input[name=umum_4]:checked').length <= 0)  
                {  
                   $('#umum_4_1').focus();
                   swal({title: "Oopss...", text: "Golongan anggota belum dipilih <br><br><br>", type:"warning", html:true});
                   return false;  

                }else if($('input[name=umum_5]:checked').length <= 0)  
                {  
                    $('#umum_5_1').focus();
                    swal({title: "Oopss...", text: "Prestasi / sertifikat anggota belum dipilih <br><br><br>", type:"warning", html:true});
                    return false;  

                }else if($("#nomor_rekening").val() == "")  
                {  
                   $('#nomor_rekening').focus();
                   swal({title: "Oopss...", text: "Nomor rekening anda belum diisi <br><br><br>", type:"warning", html:true});
                   return false;  

                }else if($("#atas_nama").val() == "")  
                {  
                   $('#atas_nama').focus();
                   swal({title: "Oopss...", text: "Atas nama rekening belum diisi <br><br><br>", type:"warning", html:true});
                   return false;  

                }else if($("#nama_bank").val() == "")  
                {  
                   $('#nama_bank').focus();
                   swal({title: "Oopss...", text: "Nama bank anda belum diisi <br><br><br>", type:"warning", html:true});
                   return false;  

                }else{

                     swal({
                      title: "Konfirmasi", 
                      text: "Apakah anda yakin dengan data yang anda isi?", 
                      showCancelButton: true,
                      closeOnConfirm: true,
                      confirmButtonText: "Iya",
                      confirmButtonColor: "#31E794"
                    }, function() {

                      $('form#daftarbeasiswa').submit();
                      spinner = Rats.UI.LoadAnimation.start();

                 });
               //Rats.UI.LoadAnimation.stop(spinner);
               }   



       }



       function a(event){
        var char = event.which;
        if(char > 31 && char != 32 && (char < 65 || char > 90) && (char < 97 || char > 122)){
            return false;
        }
    }


    function isNumberKey(evt){

        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57)){
            return false;
        }else{

            return true;

        }
    }



    $('#st_pendidikan').on('change',function(e){
        console.log(e);
        var jenjang = e.target.value;
        if(jenjang == 'SD'){

            $('#kelas').empty();
            $('#kelas').append('<option value="">Tingkatan</option>');
            $('#kelas').append('<option value="1">1</option>');
            $('#kelas').append('<option value="2">2</option>');
            $('#kelas').append('<option value="3">3</option>');
            $('#kelas').append('<option value="4">4</option>');
            $('#kelas').append('<option value="5">5</option>');
            $('#kelas').append('<option value="6">6</option>');

        }else if(jenjang == 'SMP'){

            $('#kelas').empty();
            $('#kelas').append('<option value="">Tingkatan</option>');
            $('#kelas').append('<option value="1">1</option>');
            $('#kelas').append('<option value="2">2</option>');
            $('#kelas').append('<option value="3">3</option>');

        }else if(jenjang == 'SMA'){

            $('#kelas').empty();
            $('#kelas').append('<option value="">Tingkatan</option>');
            $('#kelas').append('<option value="1">1</option>');
            $('#kelas').append('<option value="2">2</option>');


        }else if(jenjang == 'PT'){

            $('#kelas').empty();
            $('#kelas').append('<option value="">Tingkatan</option>');
            $('#kelas').append('<option value="3">3</option>');
            $('#kelas').append('<option value="4">4</option>');
            $('#kelas').append('<option value="5">5</option>');
            $('#kelas').append('<option value="6">6</option>');

        }else if(jenjang == ''){

            $('#kelas').empty();
            $('#kelas').append('<option value="">Tingkatan</option>');
        }

    });

                 // ------------------------VALIDASI SIZE--------------------------------------//


             </script>

             @endsection
