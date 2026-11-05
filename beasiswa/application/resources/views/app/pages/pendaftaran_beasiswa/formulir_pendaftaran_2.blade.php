@extends('app.index')
@section('style')
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

.foo {
  float: left;
  width: 20px;
  height: 15px;
  margin: 5px;
  border: 1px solid rgba(0, 0, 0, .2);
}

.blue {
  background: #00b0e4;
}

.green {
  background: #2b982b;
}

.colores { 
    background-color: red; 
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
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
             <div class="card">
                <div class="header">
                    <h2>
                       <i class="fa fa-graduation-cap" style="color:#F7BE59;"></i> FORMULIR BEASISWA
                    </h2>
                    <p align="justify"><br><font color="black">Harap lengkapi lempiran anda</font><br/>JIKA FILE ANDA MELIBIHI 1 MB KOMPRES FILE ANDA DISINI <a href="https://smallpdf.com/id/mengompres-pdf">KOMPRES PDF</a> || <a href="http://compressjpeg.com/id/">KOMPRES JPEG</a></p>
                    <p class="foo green"><p>/ <font color="red">*</font> : Wajib diisi</p></p>
                  {{--   <p class="foo blue"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Tidak wajib</p></p>  --}}
                </div>
                @if(Session::has('message'))
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <div class="alert alert-danger">{{ Session::get('message')}}</div>
                        
                    </div>
                </div>
                @endif
                <div class="body">

                    <div class="modal fade" id="overlay">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                           
                            <h4 class="modal-title">Info Penting</h4>
                          </div>
                          <div class="modal-body">
                            <p align="justify"><strong>Yth Bapak/Ibu lampiran ditahap ke II ini  bersifat wajib sesuai isian yang telah diisi sebelumnya. Pastikan semua lampiran diupload dengan benar, agar tersimpan pada sistem dan pendaftaran berhasil. :)</strong></p>
                            
                             <button type="button" class="btn btn-warning btn-xs" data-dismiss="modal" aria-hidden="true">CLOSE</button>
                         </div>
                          
                        </div>
                      </div>
                    </div>
                Catatan : Masimal size file yang diupload <b>1 Mega byte.</b> <small>(<i>Format file : jpg, png & pdf</i> )</small>
                 <form name="daftarbeasiswa" id="daftarbeasiswa" class="form-horizontal" role="form" method="POST" action ="{{ url('/storelampiranbeasiswa') }}" enctype="multipart/form-data" files ="true">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    

                      <div class="body table-responsive">
                        <table class="table">
                            <thead>
                                <tr style="background-color:#e8f9e0;">
                                    <th width="3%">#</th>
                                    <th width="55%">Dokumen Anak</th>
                                    <th width="40%">Upload</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @if($beasiswa->ST_PEND == 'PT')
                                    <tr>
                                        <th scope="row" width="3%">1</th>
                                        <td width="70%"><font color="red">*</font>&nbsp;1 lembar scan / foto IPK  terakhir</td>
                                        <td width="27%"><input id="1_nilai_a" name="1_nilai_a" type="file" onChange="validate_nilai1(this.value)" class="btn-success" required><font color="red">{{ $errors->insert->first('1_nilai_a') }}</font><p class="1_nilai_a"></p></td>
                                    </tr>
                                @else
                                     <tr>
                                        <th scope="row" width="3%">1</th>
                                        <td width="70%"><font color="red">*</font>&nbsp;1 lembar scan / foto surat keterangan nilai dari sekolah</td>
                                        <td width="27%"><input id="1_nilai_a" name="1_nilai_a" type="file" onChange="validate_nilai1(this.value)" class="btn-success" required><font color="red">{{ $errors->insert->first('1_nilai_a') }}</font><p class="1_nilai_a"></p></td>
                                    </tr>
                                @endif


             

                                @if($beasiswa->K2 == $criteria->umum_7_value_2)
                                <tr>
                                    <th scope="row" width="3%">2</th>
                                    <td width="70%"><font color="red">*</font>&nbsp; 1 lembar scan / foto prestasi non akademik tingkat {{ $criteria->umum_7_label_2 }}</td>
                                    <td width="27%"><input id="surat_akademik" name="surat_akademik" type="file" onChange="validate_surat_akademik(this.value)" class="btn-success"><font color="red">{{ $errors->insert->first('surat_akademik') }}</font><p class="surat_akademik"></p></td>
                                </tr>
                                 <tr>
                                    <th scope="row" width="3%"></th>
                                    <td width="97%" colspan="2"><font color="red">*</font>&nbsp; Keterangan Prestasi Akademik :
                                    <textarea class="form-control" placeholder="Mohon Sertakan Keterangan" id="keterangan_akademik" name="keterangan_akademik" style="width:60%;"></textarea>
                                     <font color="red">{{ $errors->insert->first('keterangan_akademik') }}</font>
                                    </td>
                                </tr>
                                @elseif($beasiswa->K2 == $criteria->umum_7_value_3)
                                <tr>
                                    <th scope="row" width="3%">2</th>
                                    <td width="70%"><font color="red">*</font>&nbsp; 1 lembar scan / foto prestasi non akademik tingkat {{ $criteria->umum_7_label_3 }}</td>
                                    <td width="27%"><input id="surat_akademik" name="surat_akademik" type="file" onChange="validate_surat_akademik(this.value)" class="btn-success"><font color="red">{{ $errors->insert->first('surat_akademik') }}</font><p class="surat_akademik"></p></td>
                                </tr>
                                <tr>
                                    <th scope="row" width="3%"></th>
                                    <td width="97%" colspan="2"><font color="red">*</font>&nbsp; Keterangan Prestasi Akademik :
                                    <textarea class="form-control" placeholder="Mohon Sertakan Keterangan" id="keterangan_akademik" name="keterangan_akademik" style="width:60%;"></textarea>
                                    <font color="red">{{ $errors->insert->first('keterangan_akademik') }}</font>
                                    </td>
                                </tr>
                                @elseif($beasiswa->K2 == $criteria->umum_7_value_4)
                                <tr>
                                    <th scope="row" width="3%">2</th>
                                    <td width="70%"><font color="red">*</font>&nbsp; 1 lembar scan / foto prestasi non akademik tingkat {{ $criteria->umum_7_label_4 }}</td>
                                    <td width="27%"><input id="surat_akademik" name="surat_akademik" type="file" onChange="validate_surat_akademik(this.value)" class="btn-success"><font color="red">{{ $errors->insert->first('surat_akademik') }}</font><p class="surat_akademik"></p></td>
                                </tr>
                                <tr>
                                    <th scope="row" width="3%"></th>
                                    <td width="97%" colspan="2"><font color="red">*</font>&nbsp; Keterangan Prestasi Akademik :
                                    <textarea class="form-control" placeholder="Mohon Sertakan Keterangan" id="keterangan_akademik" name="keterangan_akademik" style="width:60%;"></textarea>
                                    <font color="red">{{ $errors->insert->first('keterangan_akademik') }}</font>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>

                    </div>

                    <div class="body table-responsive">
                        <table class="table">
                            <thead>
                                <tr style="background-color:#e8f9e0;">
                                    <th width="3%">#</th>
                                    <th width="55%">Dokumen Anggota</th>
                                    <th width="40%">Upload</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                <tr>
                                    <th scope="row" width="3%">1</th>
                                    <td width="70%"><font color="red">*</font>&nbsp; 1 lembar scan / foto buku tabungan</td>
                                    <td width="27%"><input id="surat_tabungan" name="surat_tabungan" type="file" onChange="validate_surat_tabungan(this.value)" class="btn-success" required><font color="red">{{ $errors->insert->first('surat_tabungan') }}</font><p class="surat_tabungan"></p></td>
                                </tr>
                                <tr>
                                    <th scope="row" width="3%">2</th>
                                    <td width="70%"><font color="red">*</font>&nbsp; 1 lembar scan / foto KK (Kartu Keluarga)</td>
                                    <td width="27%"><input id="kartu_keluarga" name="kartu_keluarga" type="file" onChange="validate_kartu_keluarga(this.value)" class="btn-success" required><font color="red">{{ $errors->insert->first('kartu_keluarga') }}</font><p class="kartu_keluarga"></p></td>
                                </tr>    

                                @if($beasiswa->U5 == $criteria->umum_6_value_2)
                                <tr>
                                    <th scope="row" width="3%">3</th>
                                    <td width="70%"><font color="red">*</font>&nbsp; 1 lembar scan / foto {{ $criteria->umum_6_label_2 }}</td>
                                    <td width="27%"><input id="prestasi_anggota" name="prestasi_anggota" type="file" onChange="validate_prestasi_anggota(this.value)" class="btn-success"> <font color="red">{{ $errors->insert->first('prestasi_anggota') }}</font><p class="prestasi_anggota"></p></td>
                                </tr>
                                <tr>
                                    <th scope="row" width="3%"></th>
                                    <td width="97%" colspan="2"><font color="red">*</font>&nbsp; Keterangan Sertifikat :
                                    <textarea class="form-control" placeholder="Mohon Sertakan Keterangan" id="keterangan_prestasi" name="keterangan_prestasi" style="width:60%;"></textarea>
                                     <font color="red">{{ $errors->insert->first('keterangan_prestasi') }}</font>
                                    </td>
                                </tr>
                                @elseif($beasiswa->U5 == $criteria->umum_6_value_3)
                                 <tr>
                                    <th scope="row" width="3%">3</th>
                                    <td width="70%"><font color="red">*</font>&nbsp; 1 lembar scan / foto {{ $criteria->umum_6_label_3 }}</td>
                                    <td width="27%"><input id="prestasi_anggota" name="prestasi_anggota" type="file" onChange="validate_prestasi_anggota(this.value)" class="btn-success"> <font color="red">{{ $errors->insert->first('prestasi_anggota') }}</font><p class="prestasi_anggota"></p></td>
                                </tr>
                                 <tr>
                                    <th scope="row" width="3%"></th>
                                    <td width="97%" colspan="2"><font color="red">*</font>&nbsp; Keterangan Sertifikat :
                                    <textarea class="form-control" placeholder="Mohon Sertakan Keterangan" id="keterangan_prestasi" name="keterangan_prestasi" style="width:60%;"></textarea>
                                     <font color="red">{{ $errors->insert->first('keterangan_prestasi') }}</font>
                                    </td>
                                </tr>
                                @elseif($beasiswa->U5 == $criteria->umum_6_value_4)
                                 <tr>
                                    <th scope="row" width="3%">3</th>
                                    <td width="70%"><font color="red">*</font>&nbsp; 1 lembar scan / foto {{ $criteria->umum_6_label_4 }}</td>
                                    <td width="27%"><input id="prestasi_anggota" name="prestasi_anggota" type="file" onChange="validate_prestasi_anggota(this.value)" class="btn-success"> <font color="red">{{ $errors->insert->first('prestasi_anggota') }}</font><p class="prestasi_anggota"></p></td>
                                </tr>
                                 <tr>
                                    <th scope="row" width="3%"></th>
                                    <td width="97%" colspan="2"><font color="red">*</font>&nbsp; Keterangan Prestasi :
                                    <textarea class="form-control" placeholder="Mohon Sertakan Keterangan" id="keterangan_prestasi" name="keterangan_prestasi" style="width:60%;"></textarea>
                                     <font color="red">{{ $errors->insert->first('keterangan_prestasi') }}</font>
                                    </td>
                                </tr>
                                @endif
                                
                            </tbody>
                        </table>

                    </div>

                    


                    <div class="form-group">

                       <div class="col-md-12">
                       
                         <div class="col-md-12">
                            <div class="col-md-5"></div>
                            <div class="col-md-6">
                           <a href="{{ url('/pendaftaran_beasiswa_step_1') }}" class="btn btn-warning" role="button"><i class="fa fa-btn fa-arrow-circle-left"></i>&nbsp;&nbsp;Kembali&nbsp;&nbsp;</a>
                         &nbsp;
                          
                           <button type="button" onclick="validateData();" class="btn btn-primary"><i class="fa fa-btn fa-send"></i>&nbsp;&nbsp;Kirim&nbsp;&nbsp;</button>
                        
                            </div>
                        </div>
                       
                       <!--  <button type="reset" class="btn btn-danger">
                            <i class="fa fa-btn fa-user"></i>Bersihkan
                        </button>  -->
                    </div>

                </div>

            </form>
        </div>
    </div>
</div>
</div>
</div>

</section>

@endsection

@section('scripts')
  {!!Html::script('assets/app/swalalert/js/sweetalert.min.js')!!}

<script>
$('#overlay').modal('show');
    setTimeout(function() {
        $('#overlay').modal('hide');
    }, 20000);

    function validateData(){  
     //  debugger; 
       if($("#surat_tabungan").val() == "")  
       {  
           $('#surat_tabungan').focus();
           swal({title: "Oopss...", text: "Lampiran buku tabungan belum diisi <br><br><br>", type:"warning", html:true});
           return false;  

       }else if($("#kartu_keluarga").val() == "")  
       {  
            $('#kartu_keluarga').focus();
           swal({title: "Oopss...", text: "Lampiran kartu keluarga belum diisi <br><br><br>", type:"warning", html:true});
           return false;  

       }else if($("#prestasi_anggota").val() == "") 
       {  
            $('#prestasi_anggota').focus();
           swal({title: "Oopss...", text: "Lampiran prestasi / sertifikat anggota belum diisi <br><br><br>", type:"warning", html:true});
           return false;  

       }else if($("#keterangan_prestasi").val() == "")  
       {  
        $('#keterangan_prestasi').focus();
           swal({title: "Oopss...", text: "Keterangan prestasi/sertifikat anggota belum diisi <br><br><br>", type:"warning", html:true});
          return false;
           

       }else if($("#1_nilai_a").val() == "")  
       {  
           $('#1_nilai_a').focus();
           swal({title: "Oopss...", text: "Lampiran surat keterangan nilai belum diisi <br><br><br>", type:"warning", html:true});
           return false;  

       }else if($("#surat_akademik").val() == "")  
       {  
           $('#surat_akademik').focus();
           swal({title: "Oopss...", text: "Lampiran prestasi/sertifikat non akademik belum diisi <br><br><br>", type:"warning", html:true});
           return false;  
       }else if($("#keterangan_akademik").val() == "")  
       {  
            $('#keterangan_akademik').focus();
           swal({title: "Oopss...", text: "Keterangan prestasi/sertifikat non akademik belum diisi <br><br><br>", type:"warning", html:true});
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
                     // Rats.UI.LoadAnimation.stop(spinner);
                      
                });
              
      
    }   

}

     // ------------------------VALIDASI SIZE--------------------------------------//
    function validate_surat_tabungan(file){
        if($('#surat_tabungan').val() !== ""){
            var ext=file.substr(file.lastIndexOf('.')+1);
            var allow=["jpg","jpeg","png","bmp","pdf","JPG","JPEG","PNG","BMP","PDF"];
            var file_size = $('#surat_tabungan')[0].files[0].size;
             if(file_size>1000000){
                 $(".surat_tabungan").html("Maksimum File 1 MB").addClass("er").removeClass("crr");
                 $("#surat_tabungan").val("");
            }else if(allow.lastIndexOf(ext) == -1){
                $(".surat_tabungan").html("Jenis file tidak mendukung").addClass("er").removeClass("crr");
                $("#surat_tabungan").val("");
            }else{    
                $(".surat_tabungan").empty();
            }
        }else{
            return false;
        }
    
    }

    function validate_kartu_keluarga(file){
       if($('#kartu_keluarga').val() !== ""){
            var ext=file.substr(file.lastIndexOf('.')+1);
            var allow=["jpg","jpeg","png","bmp","pdf","JPG","JPEG","PNG","BMP","PDF"];
            var file_size = $('#kartu_keluarga')[0].files[0].size;
        
             if(file_size>1000000){
                     $(".kartu_keluarga").html("Maksimum File 1 MB").addClass("er").removeClass("crr");
                     $("#kartu_keluarga").val("");
            }else if(allow.lastIndexOf(ext) == -1){
                $(".kartu_keluarga").html("Jenis file tidak mendukung").addClass("er").removeClass("crr");
                $("#kartu_keluarga").val("");
            }else{
                $(".kartu_keluarga").empty();
            }
         }else{
            return false;
        }

    }

     function validate_prestasi_anggota(file){
        if($('#prestasi_anggota').val() !== ""){
            var ext=file.substr(file.lastIndexOf('.')+1);
            var allow=["jpg","jpeg","png","bmp","pdf","JPG","JPEG","PNG","BMP","PDF"];
            var file_size = $('#prestasi_anggota')[0].files[0].size;
        
             if(file_size>1000000){
                     $(".prestasi_anggota").html("Maksimum File 1 MB").addClass("er").removeClass("crr");
                     $("#prestasi_anggota").val("");
            }else if(allow.lastIndexOf(ext) == -1){
                $(".prestasi_anggota").html("Jenis file tidak mendukung").addClass("er").removeClass("crr");
                $("#prestasi_anggota").val("");
            }else{
                $(".prestasi_anggota").empty();
            }
        }else{
            return false;
        }
    }



    function validate_nilai1(file){
     if($('#1_nilai_a').val() !== ""){
                var ext=file.substr(file.lastIndexOf('.')+1);
                var allow=["jpg","jpeg","png","bmp","pdf","JPG","JPEG","PNG","BMP","PDF"];
                var file_size = $('#1_nilai_a')[0].files[0].size;
            
                 if(file_size>2000000){
                         $(".1_nilai_a").html("Maksimum File 1 MB").addClass("er").removeClass("crr");
                         $("#1_nilai_a").val("");
                }else if(allow.lastIndexOf(ext) == -1){
                    $(".1_nilai_a").html("Jenis file tidak mendukung").addClass("er").removeClass("crr");
                    $("#1_nilai_a").val("");
                }else{
                    $(".1_nilai_a").empty();
                }
         }else{
            return false;
        }
    }

    function validate_surat_akademik(file){

     if($('#surat_akademik').val() !== ""){
            var ext=file.substr(file.lastIndexOf('.')+1);
            var allow=["jpg","jpeg","png","bmp","pdf","JPG","JPEG","PNG","BMP","PDF"];
            var file_size = $('#surat_akademik')[0].files[0].size;
        
             if(file_size>1000000){
                     $(".surat_akademik").html("Maksimum File 1 MB").addClass("er").removeClass("crr");
                     $("#surat_akademik").val("");
            }else if(allow.lastIndexOf(ext) == -1){
                $(".surat_akademik").html("Jenis file tidak mendukung").addClass("er").removeClass("crr");
                $("#surat_akademik").val("");
            }else{
                $(".surat_akademik").empty();
            }
        }else{
            return false;
        }
    }


 

 </script>

@endsection
