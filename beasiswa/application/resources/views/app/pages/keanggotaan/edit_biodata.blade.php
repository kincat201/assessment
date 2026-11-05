@extends('app.index')
@section('style')
{!!Html::Style('assets/app/swalalert/css/sweetalert.css') !!}
@endsection
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style type="text/css">
    .crr{
        color:green;
    }
    .er{
        color:red;
    }

    .s{
        color:black;
        text-align:left;
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

     @if(Session::has('pesangagal'))
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="card">
                        <div class="header">
                            <h2>
                                Update Biodata Anggota
                            </h2><br>
                         <p align="justify"><font color="black">Harap lengkapi data anda bila kurang lengkap, jika ada kesulitan segera hubungi bag. keanggotaan koperasi.<br><small>catatan : - tanda (<font color="red">*</font>) adalah data wajib yang harus diisi setiap anggota</small></font></p>
                 <div class="body">
                      <form name="privasianggota" id="privasianggota" class="form-horizontal" role="form" method="POST" action ="{{ url('/updatebiodata') }}" enctype="multipart/form-data" files ="true">
                        {{ csrf_field() }}
                         <input type="hidden" readOnly="true" name="no_anggota" class="form-control date" value="{{ Auth::user()->NO_ANGGOTA }}" hidden>
                               @if(Session::has('message'))
                            <div class="alert alert-warning">{{ Session::get('message')}}</div>
                            @endif
                     
                     
                           @if(Session::has('berhasil'))
                          <div class="alert alert-success">{{ Session::get('berhasil')}}</div>
                            @endif
                     
            
                            @if(Session::has('pesangagal'))
                            <div class="alert alert-danger">{{ Session::get('pesangagal')}}</div>
                            @endif
                     
                    


                     <div class="row clearfix">
                        <div class="form-group">
                            <label for="no_anggota" class="col-md-2 control-label">No. Anggota</label>
                                <div class="col-md-2">
                                  
                                        <div class="form-line">
                                            <input type="text" id="no_anggota" name="no_anggota" class="form-control btn-primary"   style="text-transform: uppercase" onkeypress="return isNumberKey(event)" value="&nbsp;{{Auth::user()->NO_ANGGOTA}}" disabled> 
                                        </div>
                                   
                                </div>
                            </div>
                        </div>
                             
                        <div class="row clearfix">
                        <div class="form-group">
                            <label for="nama_anggota" class="col-md-2 control-label">Nama Anggota</label>
                                <div class="col-md-6">
                                  
                                        <div class="form-line">
                                            <input type="text" id="nama_anggota" name="nama_anggota" class="form-control btn-primary"  style="text-transform: uppercase" onkeypress="return isNumberKey(event)" value="&nbsp;{{$mst->NAMA_LENGKAP}}" disabled>
                                        </div>
                                 
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                        <div class="form-group">
                            <label for="perusahaan" class="col-md-2 control-label">Perusahaan</label>
                                <div class="col-md-6">
                                  
                                        <div class="form-line">
                                            <input type="text" id="perusahaan" name="perusahaan" class="form-control btn-primary"   style="text-transform: uppercase" onkeypress="return a(event);" value="&nbsp;{{$datapek->NMPRS}}" disabled>
                                        </div>
                                  
                                </div>
                            </div>
                        </div>

                         <div class="row clearfix">
                        <div class="form-group">
                            <label for="golongan" class="col-md-2 control-label">Golongan</label>
                                <div class="col-md-1">
                                  
                                        <div class="form-line">
                                            <input type="text" id="golongan" name="golongan" class="form-control btn-primary"   style="text-transform: uppercase" onkeypress="return a(event);" value="&nbsp;{{$datapek->GOLONGAN_JABATAN}}" disabled>

                                        </div>
                                     
                                  
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                        <div class="form-group">
                            <label for="npwp" class="col-md-2 control-label">No. NPWP <font color="red">*</font></label>
                                <div class="col-md-3">
                                  
                                        <div class="form-line">
                                            <input type="text" id="npwp" name="npwp" class="form-control date" placeholder="Nomor NPWP"  style="text-transform: uppercase" onkeypress="return isNumberKey(event)" value="{{old('npwp')}}">
                                            <font color="red"> {{ $errors->insert->first('npwp') }} </font>
                                        </div>
                                 
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                        <div class="form-group">
                            <label for="propinsi" class="col-md-2 control-label">Propinsi <font color="red">*</font></label>
                                <div class="col-md-3">
                                        <div class="form-line">
                                              <select class="form-control" name="propinsi" id="propinsi" required>
                                                 <option value="" selected>Pilih Propinsi</option>
                                                 @foreach($propinsi as $item)

                                                        <option value="{{$item->KD_SANDI}}" {{ old('propinsi')=="$item->KD_SANDI" ? 'selected='.'"'.'selected'.'"' : '' }} >{{ $item->KETERANGAN }}</option>
                                                
                                                 @endforeach
                                                 <option value="0000" {{ old('propinsi')=="0000" ? 'selected='.'"'.'selected'.'"' : '' }}>LAINNYA</option>
                                              </select>
                                        </div>
                                  
                                </div>

                                <label for="kota" class="col-md-1 control-label">Kota <font color="red">*</font></label>
                                <div class="col-md-3">
                                  
                                        <div class="form-line">
                                             <select class="form-control" name="kota" id="kota" required>
                                            <?php $kt = Session::get('kota'); 
                                                foreach ($kt as $item) {?>
                                                  <option value="<?php echo $item->KD_SANDI; ?>" {{ old('kota')=="$item->KD_SANDI" ? 'selected='.'"'.'selected'.'"' : '' }} ><?php echo $item->KETERANGAN; ?></option>

                                             <?php  } ?>
                                            ?>
                                             <option value="LAINNYA" {{ old('kota')=="LAINNYA" ? 'selected='.'"'.'selected'.'"' : '' }}>LAINNYA</option>
                                          </select> <font color="red"> {{ $errors->insert->first('kota') }} </font>
                                        </div>
                                  
                                </div>
                              

                            </div>
                        </div>

                         <div class="row clearfix">
                        <div class="form-group">
                            <label for="kecamatan" class="col-md-2 control-label">Kecamatan <font color="red">*</font></label>
                                <div class="col-md-3">
                                        <div class="form-line">
                                              <select class="form-control" name="kecamatan" id="kecamatan" required>
                                                <option value="">Pilih Kecamatan</option>
                                                <option value="{{old('kecamatan')}}" selected>{{old('kecamatan')}}</option>
                                              </select> <font color="red"> {{ $errors->insert->first('kecamatan') }} </font>
                                        </div>
                                  
                                </div>

                                <label for="kelurahan" class="col-md-1 control-label">Kel. <font color="red">*</font></label>
                                <div class="col-md-3">
                                  
                                        <div class="form-line">
                                             <select class="form-control" name="kelurahan" id="kelurahan" onchange="changefocus(this);" required>
                                                <option value="">Pilih Kelurahan</option>
                                                <option value="{{old('kelurahan')}}" selected>{{old('kelurahan')}}</option>
                                          </select> <font color="red"> {{ $errors->insert->first('kelurahan') }} </font>
                                        </div>
                                  
                                </div>

                            </div>
                        </div>

                 
                         <div class="row clearfix">
                        <div class="form-group">
                            <label for="kodepos" class="col-md-2 control-label">Kode Pos <font color="red">*</font></label>
                                <div class="col-md-3">
                                        <div class="form-line">
                                            <input type="text" id="kodepos" name="kodepos" class="form-control date" style="text-transform: uppercase" maxlength="5" onkeypress="return isNumberKey(event);" placeholder="XXXXX" value="{{old('kodepos')}}">
                                             <font color="red"> {{ $errors->insert->first('kodepos') }} </font>
                                        </div>
                                  
                                </div>

                                <label for="rt" class="col-md-1 control-label">RT</label>
                                <div class="col-md-1">
                                  
                                        <div class="form-line">
                                            <input type="text" id="rt" name="rt" maxlength="3" class="form-control date"   style="text-transform: uppercase" onkeypress="return isNumberKey(event);" placeholder="XXX"value="{{old('rt')}}" >
                                             <font color="red"> {{ $errors->insert->first('rt') }} </font>
                                        </div>
                                  
                                </div>

                                <label for="rw" class="col-md-1 control-label">RW</label>
                                <div class="col-md-1">
                                  
                                        <div class="form-line">
                                            <input type="text" id="rw" name="rw" maxlength="3" class="form-control date" style="text-transform: uppercase" onkeypress="return isNumberKey(event);" placeholder="XXX"  value="{{old('rw')}}" > <font color="red"> {{ $errors->insert->first('rw') }} </font>
                                        </div>
                                  
                                </div>
                                  
                                </div>

                        </div>

                        <div class="row clearfix">
                        <div class="form-group">
                            <label for="alamat" class="col-md-2 control-label">Alamat <font color="red">*</font></label>
                                <div class="col-md-6">
                                  
                                        <div class="form-line">
                                            <textarea id="alamat" name="alamat" class="form-control date"  style="text-transform: uppercase" placeholder="Jl. ......" required>{{old('alamat')}}</textarea><font color="red">{{ $errors->insert->first('alamat') }}</font> 
                                        </div>
                                 
                                </div>
                                
                            </div>
                        </div>

                         <div class="row clearfix">
                        <div class="form-group">
                            <label for="nomor_telepon" class="col-md-2 control-label">No. Telepon</label>
                                <div class="col-md-6">
                                    
                                        <div class="form-line">
                                            <input type="text" id="nomor_telepon" name="nomor_telepon" maxlength="15" class="form-control date" placeholder="No. Telp"  style="text-transform: uppercase" onkeypress="return isNumberKey(event)" value="{{old('nomor_telepon')}}" ><font color="red">{{ $errors->insert->first('nomor_telepon') }} </font>
                                        </div>
                                   
                                </div> 
                                
                                
                         </div>
                        </div>

                        <div class="row clearfix">
                        <div class="form-group">
                            <label for="nomor_hp" class="col-md-2 control-label">No. HP <font color="red">*</font></label>
                                <div class="col-md-6">
                                    
                                        <div class="form-line">
                                            <input type="text" id="nomor_hp" name="nomor_hp" maxlength="15" class="form-control date" placeholder="No. Hp"  style="text-transform: uppercase" onkeypress="return isNumberKey(event)" value="{{old('nomor_hp')}}" required><font color="red">{{ $errors->insert->first('nomor_hp') }} </font>
                                        </div>
                                   
                                </div> 
                                
                                
                         </div>
                        </div>

                        <div class="row clearfix">
                        <div class="form-group">
                            <label for="no_rek" class="col-md-2 control-label">Alamat Email <font color="red">*</font></label>
                                <div class="col-md-6">
                                    
                                        <div class="form-line">
                                            <input type="email" id="email" name="email" class="form-control date" placeholder="emailanda@gmail.com"  style="text-transform: uppercase" value="{{old('email')}}" required>
                                            <font color="red"> {{ $errors->insert->first('email') }} </font>
                                        </div>
                                   
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-md-2">
                            </div>
                            <div class="form-group">
                                <button id="simpandata" type="button" onclick = "validateData();" class="btn btn-primary">
                                <i class="fa fa-btn fa-save"></i> Simpan
                                </button> 
                        </div>
                    </div>
                </form>

                </div>
            </div>
            </div>
            </div>
        </div>
        @else

         <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="card">
                        <div class="header">
                            <h2>
                                Update Biodata Anggota
                            </h2><br>
                            
                         <p align="justify"><font color="black">Harap lengkapi data anda bila kurang lengkap, jika ada kesulitan segera hubungi bag. keanggotaan koperasi.<br><small>catatan : - tanda (<font color="red">*</font>) adalah data wajib yang harus diisi setiap anggota</small></font></p>
                       
                 <div class="body">
                 
                      <form name="privasianggota" id="privasianggota" class="form-horizontal" role="form" method="POST" action ="{{ url('/updatebiodata') }}" enctype="multipart/form-data" files ="true">
                     
                       
                        {{ csrf_field() }}
                         <input type="hidden" readOnly="true" name="no_anggota" class="form-control date" value="{{ Auth::user()->NO_ANGGOTA }}" hidden>
               

                   
                        
                            @if(Session::has('message'))
                            <div class="alert alert-warning">{{ Session::get('message')}}</div>
                            @endif
                     
                     
                         
            
                            @if(Session::has('pesangagal'))
                            <div class="alert alert-danger">{{ Session::get('pesangagal')}}</div>
                            @endif
                     
                    


                     <div class="row clearfix">
                        <div class="form-group">
                            <label for="no_anggota" class="col-md-2 control-label">No. Anggota</label>
                                <div class="col-md-2">
                                  
                                        <div class="form-line">
                                            <input type="text" id="no_anggota" name="no_anggota" class="form-control btn-primary"   style="text-transform: uppercase" onkeypress="return isNumberKey(event)" value="&nbsp;{{Auth::user()->NO_ANGGOTA}}" disabled> 
                                          
                                                  
                                            
                                                    <input type="hidden" name="flagproses" value="{{$flagproses}}">       
                                            
                                        </div>
                                   
                                </div>
                            </div>
                        </div>
                             
                        <div class="row clearfix">
                        <div class="form-group">
                            <label for="nama_anggota" class="col-md-2 control-label">Nama Anggota</label>
                                <div class="col-md-6">
                                  
                                        <div class="form-line">
                                            <input type="text" id="nama_anggota" name="nama_anggota" class="form-control btn-primary"  style="text-transform: uppercase" onkeypress="return isNumberKey(event)" value="&nbsp;{{$mst->NAMA_LENGKAP}}" disabled>
                                        </div>
                                 
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                        <div class="form-group">
                            <label for="perusahaan" class="col-md-2 control-label">Perusahaan</label>
                                <div class="col-md-6">
                                  
                                        <div class="form-line">
                                            <input type="text" id="perusahaan" name="perusahaan" class="form-control btn-primary"   style="text-transform: uppercase" onkeypress="return a(event);" value="&nbsp;{{$datapek->NMPRS}}" disabled>
                                        </div>
                                  
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                        <div class="form-group">
                            <label for="golongan" class="col-md-2 control-label">Golongan</label>
                                <div class="col-md-1">
                                  
                                        <div class="form-line">
                                            <input type="text" id="golongan" name="golongan" class="form-control btn-primary"   style="text-transform: uppercase" onkeypress="return a(event);" value="&nbsp;{{$datapek->GOLONGAN_JABATAN}}" disabled>
                                        </div>
                                
                                  
                                </div>
                            </div>
                        </div>
                        @if($dataanggota == null)
                        
                        <div class="row clearfix">
                        <div class="form-group">
                            <label for="npwp" class="col-md-2 control-label">No. NPWP <font color="red">*</font></label>
                                <div class="col-md-3">
                                  
                                        <div class="form-line">
                                            <input type="text" id="npwp" name="npwp" class="form-control date" placeholder="Nomor NPWP"  style="text-transform: uppercase" onkeypress="return isNumberKey(event)" value="{{$mst->NPWP}}">
                                            <font color="red"> {{ $errors->insert->first('no_npwp') }} </font>
                                        </div>
                                 
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="form-group">
                            <label for="propinsi" class="col-md-2 control-label">Propinsi <font color="red">*</font></label>
                                <div class="col-md-3">
                                        <div class="form-line">
                                              <select class="form-control" name="propinsi" id="propinsi"  required>
                                                 <option value="">Pilih Propinsi</option>
                                                 @foreach($propinsi as $item)

                                                        <option value="{{$item->KD_SANDI}}" {{ old('propinsi')=="$item->KD_SANDI" ? 'selected='.'"'.'selected'.'"' : '' }} >{{ $item->KETERANGAN }}</option>
                                                
                                                 @endforeach
                                                 <option value="0000">LAINNYA</option>
                                              </select>
                                        </div>
                                  
                                </div>

                                <label for="kota" class="col-md-1 control-label">Kota <font color="red">*</font></label>
                                <div class="col-md-3">
                                  
                                        <div class="form-line">
                                             <select class="form-control" name="kota" id="kota" required>
                                             <option value="">Pilih Kota</option>
                                          </select>
                                        </div>
                                  
                                </div>
                              

                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="form-group">
                            <label for="kecamatan" class="col-md-2 control-label">Kecamatan <font color="red">*</font></label>
                                <div class="col-md-3">
                                        <div class="form-line">
                                              <select class="form-control" name="kecamatan" id="kecamatan" required>
                                                <option value="">Pilih Kecamatan</option>
                                              </select>
                                        </div>
                                  
                                </div>

                                <label for="kelurahan" class="col-md-1 control-label">Kel. <font color="red">*</font></label>
                                <div class="col-md-3">
                                  
                                        <div class="form-line">
                                             <select class="form-control" name="kelurahan" id="kelurahan" onchange="changefocus(this);" required>
                                                <option value="">Pilih Kelurahan</option>
                                          </select>
                                        </div>
                                  
                                </div>

                            </div>
                        </div>

                        <div class="row clearfix">
                        <div class="form-group">
                            <label for="kodepos" class="col-md-2 control-label">Kode Pos <font color="red">*</font></label>
                                <div class="col-md-3">
                                        <div class="form-line">
                                            <input type="text" id="kodepos" name="kodepos" class="form-control date" style="text-transform: uppercase" maxlength="5" onkeypress="return isNumberKey(event);" placeholder="xxxxx" value="{{old('kodepos')}}">
                                             <font color="red"> {{ $errors->insert->first('kodepos') }} </font>
                                        </div>
                                  
                                </div>

                                <label for="rt" class="col-md-1 control-label">RT</label>
                                <div class="col-md-1">
                                  
                                        <div class="form-line">
                                            <input type="text" id="rt" name="rt" maxlength="3" class="form-control date"   style="text-transform: uppercase" onkeypress="return isNumberKey(event);" placeholder="XXX"value="{{old('rt')}}" >
                                             <font color="red"> {{ $errors->insert->first('rt') }} </font>
                                        </div>
                                  
                                </div>

                                <label for="rw" class="col-md-1 control-label">RW</label>
                                <div class="col-md-1">
                                  
                                        <div class="form-line">
                                            <input type="text" id="rw" name="rw" maxlength="3" class="form-control date" style="text-transform: uppercase" onkeypress="return isNumberKey(event);" placeholder="XXX"  value="{{old('rw')}}" > <font color="red"> {{ $errors->insert->first('rw') }} </font>
                                        </div>
                                  
                                </div>
                                  
                                </div>
                        </div>

                         <div class="row clearfix">
                        <div class="form-group">
                            <label for="alamat" class="col-md-2 control-label">Alamat <font color="red">*</font></label>
                                <div class="col-md-6">
                                  
                                        <div class="form-line">
                                            <textarea id="alamat" name="alamat" class="form-control date"  style="text-transform: uppercase" placeholder="Jl. ......" required>{{$mst->ALAMAT_LENGKAP }}</textarea><font color="red">{{ $errors->insert->first('alamat') }}</font> 
                                        </div>
                                 
                                </div>
                                
                            </div>
                        </div>

                         <div class="row clearfix">
                        <div class="form-group">
                            <label for="nomor_telepon" class="col-md-2 control-label">No. Telepon</label>
                                <div class="col-md-6">
                                    
                                        <div class="form-line">
                                            <input type="text" id="nomor_telepon" maxlength="15" name="nomor_telepon" class="form-control date" placeholder="No. Telp"  style="text-transform: uppercase" onkeypress="return isNumberKey(event)" value="{{$mst->PHN}}" ><font color="red">{{ $errors->insert->first('nomor_telepon') }} </font>
                                        </div>
                                   
                                </div> 
                                
                                
                         </div>
                        </div>

                        <div class="row clearfix">
                        <div class="form-group">
                            <label for="nomor_hp" class="col-md-2 control-label">No. HP <font color="red">*</font></label>
                                <div class="col-md-6">
                                    
                                        <div class="form-line">
                                            <input type="text" id="nomor_hp" name="nomor_hp" maxlength="15" class="form-control date" placeholder="No. Hp"  style="text-transform: uppercase" onkeypress="return isNumberKey(event)" value="{{$mst->NOHP}}" required><font color="red">{{ $errors->insert->first('nomor_hp') }} </font>
                                        </div>
                                   
                                </div> 
                                
                                
                         </div>
                        </div>

                        <div class="row clearfix">
                        <div class="form-group">
                            <label for="no_rek" class="col-md-2 control-label">Alamat Email <font color="red">*</font></label>
                                <div class="col-md-6">
                                    
                                        <div class="form-line">
                                            <input type="email" id="email" name="email" class="form-control date" placeholder="emailanda@gmail.com"  style="text-transform: uppercase" value="{{old('email')}}" required>
                                            <font color="red"> {{ $errors->insert->first('email') }} </font>
                                        </div>
                                   
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-md-2">
                            </div>
                            <div class="form-group">
                                <button id="simpandata" type="button" onclick = "validateData();" class="btn btn-primary">
                                <i class="fa fa-btn fa-save"></i> Simpan
                                </button> 
                        </div>
                        </div>
                        @else
                        
                        <div class="row clearfix">
                        <div class="form-group">
                            <label for="npwp" class="col-md-2 control-label">No. NPWP <font color="red">*</font></label>
                                <div class="col-md-3">
                                  
                                        <div class="form-line">
                                            <input type="text" id="npwp" name="npwp" class="form-control date" placeholder="Nomor NPWP"  style="text-transform: uppercase" onkeypress="return isNumberKey(event)" value="{{$dataanggota->NPWP}}">
                                            <font color="red"> {{ $errors->insert->first('no_npwp') }} </font>
                                        </div>
                                 
                                </div>
                            </div>
                        </div>

                            <div class="row clearfix">
                            <div class="form-group">
                            <label for="propinsi" class="col-md-2 control-label">Propinsi<font color="red">*</font></label>
                                <div class="col-md-3">
                                        <div class="form-line">
                                              <select class="form-control" name="propinsi" id="propinsi"  required>
                                                 <option value="">Pilih Propinsi</option>
                                                 @foreach($propinsi as $item)

                                                        <option value="{{$item->KD_SANDI}}" <?php if($item->KD_SANDI == $dataanggota->PROPINSI){echo "selected";}?> >{{ $item->KETERANGAN }}</option>
                                                
                                                 @endforeach
                                                <option value="0000" <?php if($dataanggota->PROPINSI == "0000"){echo "selected";}?> >LAINNYA</option>
                                              </select>
                                        </div>
                                  
                                </div>

                                <label for="kota" class="col-md-1 control-label">Kota <font color="red">*</font></label>
                                <div class="col-md-3">
                                  
                                        <div class="form-line">
                                             <select class="form-control" name="kota" id="kota" required>
                                             <option value="">Pilih Kota</option>
                                              @foreach($kota as $item)

                                                        <option value="{{$item->KD_SANDI}}" <?php if($item->KD_SANDI == $dataanggota->LOKUSH){echo "selected";}?> >{{ $item->KETERANGAN }}</option>
                                                
                                                 @endforeach
                                             <option value="LAINNYA" <?php if($dataanggota->CTY == "LAINNYA"){echo "selected";}?> >LAINNYA</option>
                                          </select>
                                        </div>
                                  
                                </div>
                              

                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="form-group">
                            <label for="kecamatan" class="col-md-2 control-label">Kecamatan <font color="red">*</font></label>
                                <div class="col-md-3">
                                        <div class="form-line">
                                              <select class="form-control" name="kecamatan" id="kecamatan" required>
                                                <option value="">Pilih Kecamatan</option>
                                              @foreach($kecamatan as $item)

                                                        <option value="{{$item->KECAMATAN}}" <?php if($item->KECAMATAN == $dataanggota->KECAMATAN){echo "selected";}?> >{{ $item->KECAMATAN }}</option>
                                                
                                                 @endforeach

                                                  <option value="LAINNYA" <?php if($dataanggota->KECAMATAN == "LAINNYA"){echo "selected";}?> >LAINNYA</option>
                                              </select>
                                        </div>
                                  
                                </div>

                                <label for="kelurahan" class="col-md-1 control-label">Kel. <font color="red">*</font></label>
                                <div class="col-md-3">
                                  
                                        <div class="form-line">
                                             <select class="form-control" name="kelurahan" id="kelurahan" onchange="changefocus(this);" required>
                                               <option value="">Pilih Kelurahan</option>
                                                @foreach($kelurahan as $item)

                                                        <option value="{{$item->KELURAHAN}}" <?php if($item->KELURAHAN == $dataanggota->KELURAHAN){echo "selected";}?> >{{ $item->KELURAHAN }}</option>
                                                        
                                                 @endforeach
                                                <option value="LAINNYA" <?php if($dataanggota->KELURAHAN == "LAINNYA"){echo "selected";}?> >LAINNYA</option>
                                                
                                          </select>
                                        </div>
                                  
                                </div>

                            </div>
                        </div>

                        <div class="row clearfix">
                        <div class="form-group">
                            <label for="kodepos" class="col-md-2 control-label">Kode Pos <font color="red">*</font></label>
                                <div class="col-md-3">
                                        <div class="form-line">
                                            <input type="text" id="kodepos" name="kodepos" class="form-control date" style="text-transform: uppercase" maxlength="5" onkeypress="return isNumberKey(event);" placeholder="xxxxx" value="{{ $dataanggota->ZCD}}">
                                             <font color="red"> {{ $errors->insert->first('kodepos') }} </font>
                                        </div>
                                  
                                </div>

                                <label for="rt" class="col-md-1 control-label">RT</label>
                                <div class="col-md-1">
                                  
                                        <div class="form-line">
                                            <input type="text" id="rt" name="rt" maxlength="3" class="form-control date"   style="text-transform: uppercase" onkeypress="return isNumberKey(event);" placeholder="XXX" value="{{$dataanggota->RT}}">
                                             <font color="red"> {{ $errors->insert->first('rt') }} </font>
                                        </div>
                                  
                                </div>

                                <label for="rw" class="col-md-1 control-label">RW</label>
                                <div class="col-md-1">
                                  
                                        <div class="form-line">
                                            <input type="text" id="rw" name="rw" maxlength="3" class="form-control date" style="text-transform: uppercase" onkeypress="return isNumberKey(event);" placeholder="XXX"  value="{{$dataanggota->RW}}" > <font color="red"> {{ $errors->insert->first('rw') }} </font>
                                        </div>
                                  
                                </div>
                                  
                                </div>
                        </div>

                         <div class="row clearfix">
                        <div class="form-group">
                            <label for="alamat" class="col-md-2 control-label">Alamat <font color="red">*</font></label>
                                <div class="col-md-6">
                                  
                                        <div class="form-line">
                                            <textarea id="alamat" name="alamat" class="form-control date"  style="text-transform: uppercase" placeholder="Jl. ......" required>{{$dataanggota->ALAMAT_LENGKAP}}</textarea><font color="red">{{ $errors->insert->first('alamat') }}</font> 
                                        </div>
                                 
                                </div>
                                
                            </div>
                        </div>

                         <div class="row clearfix">
                        <div class="form-group">
                            <label for="nomor_telepon" class="col-md-2 control-label">No. Telepon</label>
                                <div class="col-md-6">
                                    
                                        <div class="form-line">
                                            <input type="text" id="nomor_telepon" name="nomor_telepon" maxlength="15" class="form-control date" placeholder="No. Telp"  style="text-transform: uppercase" onkeypress="return isNumberKey(event)" value="{{$dataanggota->PHN}}" ><font color="red">{{ $errors->insert->first('nomor_telepon') }} </font>
                                        </div>
                                   
                                </div> 
                                
                                
                         </div>
                        </div>

                        <div class="row clearfix">
                        <div class="form-group">
                            <label for="nomor_hp" class="col-md-2 control-label">No. HP <font color="red">*</font></label>
                                <div class="col-md-6">
                                    
                                        <div class="form-line">
                                            <input type="text" id="nomor_hp" name="nomor_hp" maxlength="15" class="form-control date" placeholder="No.Hp"  style="text-transform: uppercase" onkeypress="return isNumberKey(event)" value="{{$dataanggota->NOHP}}" required><font color="red">{{ $errors->insert->first('nomor_hp') }} </font>
                                        </div>
                                   
                                </div> 
                                
                                
                         </div>
                        </div>

                        <div class="row clearfix">
                        <div class="form-group">
                            <label for="no_rek" class="col-md-2 control-label">Alamat Email <font color="red">*</font></label>
                                <div class="col-md-6">
                                    
                                        <div class="form-line">
                                            <input type="email" id="email" name="email" class="form-control date" placeholder="emailanda@gmail.com"  style="text-transform: uppercase" value="{{$dataanggota->EMAIL}}" required>
                                            <font color="red"> {{ $errors->insert->first('email') }} </font>
                                        </div>
                                   
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-md-2">
                            </div>
                            <div class="form-group">
                                <button id="simpandata" type="button" onclick = "validateData();" class="btn btn-primary">
                                <i class="fa fa-btn fa-save"></i> Simpan
                                </button> 
                        </div>
                        </div>    
                        @endif
                             
                </form>

                </div>
            </div>
            </div>
            </div>
        </div>

        @endif

          
           
            


    </section>

@endsection


@section('scripts')

            
  {!!Html::script('assets/app/swalalert/js/sweetalert.min.js')!!}
  {!!Html::script('assets/app/js/jquery.maskedinput.js')!!}
      <script>         
                jQuery(function($){
         
                    $("#npwp").mask("99.999.999.9-999.999",{autoclear: false});
                });

                    function validateData(){  
                  
                    
                    if($("#npwp").val() == "")  
                    {  
                       $('#npwp').focus();
                       swal({title: "Oopss...", text: "Kolom nomor npwp wajib diisi <br><br><br>", type:"warning", html:true});
                       return false;  
                       
                    }else if($("#propinsi").val() == "")  
                    {  
                       $('#propinsi').focus();
                       swal({title: "Oopss...", text: "Kolom propinsi wajib diisi <br><br><br>", type:"warning", html:true});
                       return false;  
                       
                    }else if($("#kota").val() == "")  
                    {  
                       $('#kota').focus();
                       swal({title: "Oopss...", text: "Kolom kota wajib diisi <br><br><br>", type:"warning", html:true});
                       return false;  
                       
                    }else if($("#kecamatan").val() == "")  
                    {  
                       $('#kecamatan').focus();
                       swal({title: "Oopss...", text: "Kolom kecamatan wajib diisi <br><br><br>", type:"warning", html:true});
                       return false;  
                       
                    }else if($("#kelurahan").val() == "")  
                    {  
                       $('#kelurahan').focus();
                       swal({title: "Oopss...", text: "Kolom kelurahan wajib diisi <br><br><br>", type:"warning", html:true});
                       return false;  
                       
                    }else if($("#kodepos").val() == "")
                    {
                       $('#kodepos').focus();
                       swal({title: "Oopss...", text: "Kolom kodepos wajib diisi <br><br><br>", type:"warning", html:true});
                       return false; 
                    
                    }else if($("#alamat").val() == "")
                    {
                       $('#alamat').focus();
                       swal({title: "Oopss...", text: "Kolom alamat wajib diisi <br><br><br>", type:"warning", html:true});
                       return false; 
                    
                    }else if($("#nomor_hp").val() == "")  
                    {  
                        $('#nomor_hp').focus();
                        swal({title: "Oopss...", text: "Kolom nomor hp wajib diisi <br><br><br>", type:"warning", html:true});
                        return false;  
                       
                    }else if($("#email").val() == "")
                    {
                       $('#email').focus();
                       swal({title: "Oopss...", text: "Kolom e-mail wajib diisi <br><br><br>", type:"warning", html:true});
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
                           
                              $('form#privasianggota').submit();
                              spinner = Rats.UI.LoadAnimation.start();
                             // Rats.UI.LoadAnimation.stop(spinner);
                              
                        });
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
               


                 $('#propinsi').on('change',function(e){
                    var kdsandi = e.target.value;
                    if(kdsandi == '0000'){
                        $('#kota').empty();
                        $('#kota').append('<option value="LAINNYA">LAINNYA</option>');
                        $('#kecamatan').empty();
                        $('#kecamatan').append('<option value="LAINNYA">LAINNYA</option>');
                        $('#kelurahan').empty();
                        $('#kelurahan').append('<option value="LAINNYA">LAINNYA</option>');
                        $('#kota').focus();
                        return false;
                    }
                    if(kdsandi)
                        {
                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                type: 'GET',
                                url: '{{url('/populatekota')}}/'+kdsandi,
                                dataType: 'json',
                                success: function (response) {
                                        $('#kota').empty();  //kosongkan dulu          
                                        $('#kota').append('<option value="">Pilih Kota</option>'); //isi label paling atas
                                 
                                         $.each(response.kota, function(index, kotaObj){

                                             $('#kota').append('<option value="'+kotaObj.KD_SANDI+'">'+kotaObj.KETERANGAN+'</option>');
                                           
                                         });
                                        $('#kota').append('<option value="LAINNYA">LAINNYA</option>');
                                        $('#kecamatan').empty();
                                        $('#kecamatan').append('<option value="">Pilih Kecamatan</option>');
                                        $('#kelurahan').empty();
                                        $('#kelurahan').append('<option value="">Pilih Kelurahan</option>');
                                        $('#kota').focus();
                                }
                            });
                        }
                        else
                        {
                            $('#kota').empty();
                            $('#kota').append('<option value="">Pilih Kota</option>');
                            $('#kecamatan').empty();
                            $('#kecamatan').append('<option value="">Pilih Kecamatan</option>');
                            $('#kelurahan').empty();   
                            $('#kelurahan').append('<option value="">Pilih Kelurahan</option>');
                            return false;
                        }
                 });

                  $('#kota').on('change',function(e){
                    var kdsandi = e.target.value;
                    if(kdsandi == 'LAINNYA'){
                        $('#kecamatan').empty();
                        $('#kecamatan').append('<option value="LAINNYA">LAINNYA</option>');
                        $('#kelurahan').empty();
                        $('#kelurahan').append('<option value="LAINNYA">LAINNYA</option>');
                        $('#kecamatan').focus();
                        return false;
                    }
                    if(kdsandi)
                        {
                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                type: 'GET',
                                url: '{{url('/populatekecamatan')}}/'+kdsandi,
                                dataType: 'json',
                                success: function (response) {
                                       //succeess data
                                        $('#kecamatan').empty();
                                        $('#kecamatan').append('<option value="">Pilih Kecamatan</option>');
                                        
                                        $.each(response.kecamatan, function(index, kecamatanObj){
                                        $('#kecamatan').append('<option value="'+kecamatanObj.KECAMATAN+'">'+kecamatanObj.KECAMATAN+'</option>');
                                        
                                        });
                                        $('#kecamatan').append('<option value="LAINNYA">LAINNYA</option>');
                                        $('#kelurahan').empty();   
                                        $('#kelurahan').append('<option value="">Pilih Kelurahan</option>');
                                        $('#kecamatan').focus();
                                }
                            });
                        }
                        else
                        {
                            $('#kecamatan').empty();
                            $('#kecamatan').append('<option value="">Pilih Kecamatan</option>');
                            $('#kelurahan').empty();   
                            $('#kelurahan').append('<option value="">Pilih Kelurahan</option>');
                            return false;
                        }
                 });




                  $('#kecamatan').on('change',function(e){
                    var kdsandi = e.target.value;
                     if(kdsandi == 'LAINNYA'){
                        $('#kelurahan').empty();
                        $('#kelurahan').append('<option value="LAINNYA">LAINNYA</option>');
                        $('#kelurahan').focus();
                        return false;
                    }
                    if(kdsandi)
                        {
                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                type: 'GET',
                                url: '{{url('/populatekelurahan')}}/'+kdsandi,
                                dataType: 'json',
                                success: function (response) {
                                        //succeess data
                                        $('#kelurahan').empty();
                                        $('#kelurahan').append('<option value="">Pilih Kelurahan</option>');
                                            $.each(response.kelurahan, function(index, kelurahanObj){
                                            $('#kelurahan').append('<option value="'+kelurahanObj.KELURAHAN+'">'+kelurahanObj.KELURAHAN+'</option>');
                                            });
                                        $('#kelurahan').append('<option value="LAINNYA">LAINNYA</option>');
                                        $('#kelurahan').focus();
                                }
                            });
                        }
                        else
                        {
                            $('#kelurahan').empty();
                            $('#kelurahan').append('<option value="">Pilih Kelurahan</option>');
                            return false;
                        }
                 });

         


               
                  function changefocus(input){
            
                         $('#kodepos').focus();
                }                 
                 </script>

@endsection
