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
                                <li>
                                    <a href="{{ url('/data_anggota') }}">
                                        <i class="menu-icon fa fa-user-circle-o"></i>
                                        <span><font size='3'>Data Anggota</font></span>
                                    </a>
                                </li>
                                <li class="active">
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
    </section>

    <section class="content">
        <div class="container-fluid">
     
             <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="card">
                        <div class="header">
                            <h2>
                               <i class="fa fa-lock" style="color:gold;"></i> Keamanan ( Update Password )
                            </h2>
                        </div>
                 <div class="body">
                 
                      <form name="ubahpassword" id="ubahpassword" class="form-horizontal" role="form" method="POST" action ="{{ url('/updatepassword') }}">
                     
                       
                        {{ csrf_field() }}
                         <input type="hidden" readOnly="true" name="no_anggota" class="form-control date" value="{{ Auth::user()->NO_ANGGOTA }}" hidden>
               

                                        @if(Session::has('message'))
                                        <div class="alert alert-danger">{{ Session::get('message')}}</div>
                                        @endif
                     
                      
                      
                                        @if(Session::has('berhasil'))
                                        <div class="alert alert-info">{{ Session::get('berhasil')}}</div>
                                        @endif
                     
                             
                        <div class="row clearfix">
                        <div class="form-group">
                            <label for="no_hp" class="col-md-2 control-label">Password Lama</label>
                                <div class="col-md-6">
                                  
                                        <div class="form-line">
                                            <input type="password" id="password_lama" name="password_lama"  class="form-control date" value="{{ old('password_lama') }}" autofocus>{{ $errors->insert->first('password_lama') }} 
                                        </div>
                                 
                                </div>
                            </div>
                        </div>


                        <div class="row clearfix">
                        <div class="form-group">
                            <label for="no_hp" class="col-md-2 control-label">Password Baru</label>
                                <div class="col-md-6">
                                  
                                        <div class="form-line">
                                            <input type="Password" id="password_baru" name="password_baru" class="form-control date" value="{{ old('password_baru') }}" ><font color="red"> {{ $errors->insert->first('password_baru') }} </font>
                                        </div>
                                 
                                </div>
                            </div>
                        </div>

         
                        <div class="row clearfix">
                        <div class="form-group">
                            <label for="no_hp" class="col-md-2 control-label">Ulangi Password</label>
                                <div class="col-md-6">
                                  
                                        <div class="form-line">
                                            <input type="Password" id="ulangi_password" name="ulangi_password" class="form-control date"  value="{{ old('ulangi_password') }}"><font color="red"> {{ $errors->insert->first('ulangi_password') }} </font>
                                        </div>
                                 
                                </div>
                            </div>
                        </div>
                        
                        <div class="row clearfix">
                        <div class="form-group">
                            <label for="no_hp" class="col-md-2 control-label"></label>
                                <div class="col-md-6">
                                  
                                    <button id="simpan" type="button" onclick = "validateData();" class="btn btn-primary">
                                        <i class="fa fa-btn fa-save"></i> Simpan
                                    </button> 
                                 
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
  {!!Html::script('assets/app/swalalert/js/sweetalert.min.js')!!}
     <script>
                function validateData(){  
      
                debugger; 
                    if ($("#password_lama").val() == "")  
                    {  
                       $('#password_lama').focus();
                       swal({title: "Oopss...", text: "Kolom password lama belum terisi <br><br><br>", type:"warning", html:true});
                       return false; 
                       
                    }else if($("#password_baru").val() == "")
                    {
                       $('#password_baru').focus();
                       swal({title: "Oopss...", text: "Kolom password baru belum terisi <br><br><br>", type:"warning", html:true});
                       return false; 
                    
                    }else if($("#ulangi_password").val() == "")
                    {
                        $('#ulangi_password').focus();
                       swal({title: "Oopss...", text: "Kolom konfirmasi password belum terisi <br><br><br>", type:"warning", html:true});
                       return false; 
                    
                    }else if($("#password_baru").val() !== $("#ulangi_password").val())
                    {
                    
                       $("#ulangi_password").val("");
                       $('#ulangi_password').focus();
                       swal({title: "Oopss...", text: "Konfirmasi password tidak sesuai <br><br><br>", type:"warning", html:true});
                       return false; 
                    
                    }else{
                   


                    swal({
                          title: "Konfirmasi", 
                          text: "Anda yakin ingin mengubah password?", 
                          showCancelButton: true,
                          closeOnConfirm: true,
                          confirmButtonText: "Iya",
                          confirmButtonColor: "#31E794"
                        }, function() {
                       
                          $('form#ubahpassword').submit();
                          spinner = Rats.UI.LoadAnimation.start();
                         // Rats.UI.LoadAnimation.stop(spinner);
                      
                         });
                    }   
                 
                               
                      
                }
         
    </script>
     <script>
         window.setTimeout(function() { $(".alert").fadeTo(500, 0).slideUp(500, function(){ $(this).remove(); }); }, 3000);
    </script>
@endsection
@section('scripts')   
{{--   {!!Html::script('assets/app/js/jquery.validate.js')!!} --}}
@endsection
