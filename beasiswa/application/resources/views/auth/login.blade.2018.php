@if (Auth::guest())
<!DOCTYPE html>
<html>
    <head>

        <!-- /.website title -->
        <title>Koperasi Astra Indonesia</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <!-- Favicon-->
        <link rel="icon" href="favicon.ico" type="image/x-icon">

        <!-- CSS Files -->
        <link href="assets/login/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="assets/login/css/font-awesome.min.css" rel="stylesheet">
        <link href="assets/login/fonts/icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet">
        <link href="assets/login/css/animate.css" rel="stylesheet" media="screen">
        <link href="assets/login/css/owl.theme.css" rel="stylesheet">
        <link href="assets/login/css/owl.carousel.css" rel="stylesheet">

        <!-- Colors -->
        <link href="assets/login/css/css-index.css" rel="stylesheet" media="screen">
        <!-- <link href="css/css-index-green.css" rel="stylesheet" media="screen"> -->
        <!-- <link href="css/css-index-purple.css" rel="stylesheet" media="screen"> -->
        <!-- <link href="css/css-index-red.css" rel="stylesheet" media="screen"> -->
        <!-- <link href="css/css-index-orange.css" rel="stylesheet" media="screen"> -->
        <!-- <link href="css/css-index-yellow.css" rel="stylesheet" media="screen"> -->

        <!-- Google Fonts -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic" />

       <style>
       #map {
        height: 400px;
        width: 100%;
       }
       
       
     
    </style>
    <!-- </head> -->
    </head>

    <body data-spy="scroll" data-target="#navbar-scroll">

        <!-- /.preloader -->
        <div id="preloader"></div>
        <div id="top"></div>

        <!-- /.parallax full screen background image -->
        <div class="fullscreen landing parallax" style="background-image:url('assets/login/images/bg1.jpg');" data-img-width="2000" data-img-height="1333" data-diff="100">

            <div class="overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">

                            <!-- /.logo -->
                            <div class="wow fadeInDown"> <a href=""><img src="assets/login/images/logokai.png" alt="logo"></a></div>

                            <!-- /.main title -->
                            <h1 class="wow fadeInLeft">
                                MEMBANGUN KESEJAHTERAAN BERSAMA
                            </h1>

                            <!-- /.header paragraph -->
                            <div class="landing-text wow fadeInUp">
                                <p>Pendaftaran besiswa anggota KAI periode {{ date('Y') }} telah dibuka, sebelum login dan daftar program beasiswa diharapkan anggota membaca ketentuan ini</p>
                            </div>          

                            <!-- /.header button -->
                            <div class="head-btn wow fadeInLeft">
                                <a href="#intro" class="btn-primary"><i class="fa fa-eye"></i> Baca Ketentuan</a>
                               <!--  <a href="#download" class="btn-default"></a> -->
                            </div>



                        </div> 

                        <!-- /.signup form -->
                        <div class="col-md-5">

                            <div class="signup-header wow fadeInUp">
                                <h3 class="form-title text-center">Login Form</h3>
                                 <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}"><input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                                    
                                    <div class="form-group">
                                        <input id="no_anggota" maxlength="6"  onkeypress="return isNumberKey(event)" type="no_anggota" class="form-control" name="no_anggota" value="{{ old('no_anggota') }}" placeholder="Enter no anggota">
                                            <?php if(isset($message)){ ?>
                                               <span class="help-block">
                                                    <small>{{$message}}</small></font>
                                                </span>
                                            <?php } ?>
                                            @if ($errors->has('no_anggota'))
                                                <span class="help-block">
                                                    <font color="white"><small>{{ $errors->first('no_anggota') }}</small>
                                                    <br>
                                                    <small>Hubungi : 021–65832776 bila ada masalah login atau <br></small></font>
                                                    <a href="#intro">Baca Ketentuan</a>
                                                </span>
                                            @endif
                                    </div>

                                    <div class="form-group">
                                        <input id="password" type="password" class="form-control" name="password" placeholder="Enter password">

                                         @if ($errors->has('password'))
                                            <span class="help-block">
                                                <font color="white">{{ $errors->first('password') }}</font>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group last">
                                        <input type="submit" class="btn btn-warning btn-block btn-lg" value="Login">

                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember"> <code>Remember Me</code>
                                            </label>

                                        </div>
                                    </div>
                                    <p class="privacy text-center">Klik <i>lupa password</i> bila anda  <a  href="{{ url('/password/reset') }}"><font color="#fffff">&nbsp;Lupa Password ?</font></a>.</p>
                                </form>
                            </div>        

                        </div>
                    </div>
                </div> 
            </div> 
        </div>

        <!-- NAVIGATION -->
        <div id="menu">
            <nav class="navbar-wrapper navbar-default" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-backyard">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#top"><img src="assets/login/images/logokai-2.png" alt="logo"></a>
                    </div>

                    <div id="navbar-scroll" class="collapse navbar-collapse navbar-backyard navbar-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#top">Login</a></li>
                            <li><a href="#intro">Ketentuan Beasiswa</a></li>
                            <li><a href="#step">Simulasi Beasiswa</a></li>
                            <li><a href="#contact">Kontak</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <!-- /.intro section -->
        <div id="intro">
            <div class="container">
                <div class="row">

                    <!-- /.intro image -->
                    <div class="col-md-6 intro-pic wow slideInLeft">
                        <img src="assets/login/images/info_beasiswa.jpg" alt="image" class="img-responsive">
                    </div>  

                    <!-- /.intro content -->
                    <div class="col-md-6 wow slideInRight">
                        <h2>Ketentuan Beasiswa KAI (Koperasi Astra International)</h2>
                        <p>Pendaftar beasiswa adalah anggota Koperasi Astra yang sudah terdaftar. Beasiswa diberikan kepada anak anggota Koperasi Astra golongan 1 s.d 3.</p>
                        <p><b>Info :</b> Username diisi dengan nomor anggota dan password diisi dengan nomor anggota + tgl lahir (ddmmyyyy) ,  contoh : username : <b>223344</b> dan password : <b>223344</b>21021884 bila gagal login gunakan tanggal lahir kai sebagai password : <b>22334425061990</b></p>
                        <div class="btn-section"><a href="#beasiswa" class="btn-default">Selengkapnya</a></div>
                    
                    </div>
                    
                     <div class="col-md-12 wow slideInLeft">
                        <center><h3><b>Info Khusus :</b></h3></center>
                        <p>Bagi Anggota yang ingin melakukan pendaftaran beasiswa bila tidak memilki buku tabungan dapat menggunakan template berikut : <a href="{{ url('/DownloadTemplate') }}">DOWNLOAD TEMPLATE</a>. Setelah anda download silahkan cetak dalam bentuk fisik, isi data rekening anda dan sertai tanda tangan lalu foto/scan untuk diupload pada formulir beasiswa online. terimakasih :) </p>
                     </div>
                </div>        
            </div>
        </div>

         <div id="beasiswa">
            <div class="container">
              <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-sm-12 text-center feature-title" id="bea">

                        <!-- /.feature title -->
                        <h2>Persyaratan Beasiswa</h2>
                    </div>
                </div>
                <div class="row row-feat">
                        <center>
                            <div class="feature-img">
                            <img src="assets/login/images/beasiswa.jpg" alt="image" class="img-responsive wow fadeInLeft">
                        </div>
                        </center>
                        <br><br>
                </div>
            </div>
        </div>

        <!-- /.feature section -->
        <div id="step">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-sm-12 text-center feature-title">

                        <!-- /.feature title -->
                        <h2>Step Beasiwa Online KAI</h2>
                        
                    </div>
                </div>
                <div class="row row-feat">
                    <div class="col-md-4 text-center">

                        <!-- /.feature image -->
                        <div class="feature-img">
                            <img src="assets/login/images/step_beasiswa.jpg" alt="image" class="img-responsive wow fadeInLeft">
                        </div>
                    </div>

                    <div class="col-md-8">

                        <!-- /.feature 1 -->
                        <div class="col-sm-6 feat-list">
                            <img src="assets/login/images/1.png" alt="image" class="img-responsive pe-va wow fadeInUp" style="width:30px;height:45px;">
                            <div class="inner">
                                <h4>1. Update Keanggotan</h4>
                                <p>Sebelum isi formulir beasiswa anggota diminta untuk update data keanggotaannya.
                                </p>
                            </div>
                        </div>

                        <!-- /.feature 2 -->
                        <div class="col-sm-6 feat-list">
                            <img src="assets/login/images/2.png" alt="image" class="img-responsive pe-va wow fadeInUp" style="width:30px;height:45px;">
                            <div class="inner">
                                <h4>2. Isi Formulir Beasiswa</h4>
                                <p>Isi formulir beasiswa, lengkapi dan sesuaikan data formulir yang diminta KAI.</p>
                            </div>
                        </div>

                        <!-- /.feature 3 -->
                        <div class="col-sm-6 feat-list">
                            <img src="assets/login/images/3.png" alt="image" class="img-responsive pe-va wow fadeInUp" style="width:30px;height:45px;">
                            <div class="inner">
                                <h4>3. Cek Data Formulir</h4>
                                <p>Cek data formulir, pastikan sudah diisi dengan benar. Bila terdapat kesalahan segera lakukan edit sebelum periode beasiswa ditutup</p>
                            </div>
                        </div>

                        <!-- /.feature 4 -->
                        <div class="col-sm-6 feat-list">
                            <img src="assets/login/images/4.png" alt="image" class="img-responsive pe-va wow fadeInUp" style="width:30px;height:45px;">
                            <div class="inner">
                                <h4>4. Pengumuman Beasiswa</h4>
                                <p>Pengumuman beasiswa akan diinfokan pada akun masing-masing anggota,  anggota dapat melihatnya pada menu beasiswa->pengumuman beasiswa</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- /.feature 2 section -->
        <div id="feature-2">
            <div class="container">
                <div class="row">

                     <!-- /.feature image -->
                    <div class="col-md-12 wow fadeInRight">
                       <center><h2>Keanggotaan KAI</h2></center>
                        <center><img src="assets/login/images/anggota.jpg" alt="macbook" class="img-responsive img2"></center><hr>
                    </div> 

                    <!-- /.feature content -->
                    <div class="col-md-12 wow fadeInLeft">
                      
                        <p align="left"><h4>Prosedur Menjadi Anggota</h4></p>
                        <ul>
                        <li>Karyawan tetap Astra Group</li>
                        <li>Mengisi form keanggotaan Koperasi Astra dengan benar dan lengkap</li>
                        <li>Form Keanggotaan Koperasi Astra bisa didapat di:</li>
                            - Koperasi Unit/HRD perusahaan setempat
                        <br>- Download di www.koperasi-astra.com
                        <li>Melampirkan copy KTP, ID Card & NPWP</li>
                        <li>Disetujui oleh HRD</li>
                        <li>Membayar Simpanan Pokok sebesar Rp. 10.000,- (Sepuluh Ribu Rupiah)
                        Simpanan Pokok dapat disetor langsung ke Koperasi Astra atau transfer melalui:
                        <br>- Bank Permata Cabang Hayam Wuruk, Atas Nama Koperasi Astra International
                        No. Rek: 0.200.162.099</li>
                        Seluruh dokumen persyaratan dan bukti transfer pembayaran dapat dikirim:
                        <br>- Langsung ke Koperasi Astra / upload saat pengisian formulir online
                        <br>- Via Fax (021) 653-5022, Up. Bagian Keanggotaan Telp (021) 6583-2776 Ext. 105/114
                        <br>- Via Kopnit/HRD setempat, untuk kemudian diteruskan ke Bagian Keanggotaan Koperasi Astra
                        <br>- Via E-mail customer.care@koperasi-astra
                        <li>Koperasi Astra akan menerbitkan kartu Anggota dalam waktu 3 hari setelah aplikasi keanggotaan diterima lengkap dan akan dikirim secara kolektif kepada PIC HRD/Personalia perusahaan setempat</li>
                        </ul>
                        
                        <p align="left"><h4>Kewajiban Anggota</h4></p>
                        <ul>
                        <li>Menjaga nama baik Koperasi Astra</li>
                        <li>Turut serta menjaga jiwa persatuan dan kesatuan dalam Koperasi</li>
                        <li>Turut serta berpartisipasi aktif terhadap kegiatan yang diselenggarakan oleh Koperasi Astra</li>
                        </ul>

                        <p align="left"><h4>Hak Anggota</h4></p>
                        <ul>
                        <li>Mendapatkan pelayanan yang disediakan Koperasi Astra</li>
                        <li>Menghadiri Rapat Anggota Tahunan</li>
                        <li>Memperoleh Sisa Hasil Usaha</li>
                        </ul>
                        
                         
                        <div class="btn-section"><a href="http://koperasi-astra.com/" class="btn-default">Info Selengkapnya</a></div>

                    </div>

                            
                </div>        

            </div>
        </div>


        <div id="contact">
            <div class="contact fullscreen parallax" style="background-image:url('assets/login/images/bg1.jpg');" data-img-width="2000" data-img-height="1334" data-diff="100">
                <div class="overlay">
                    <div class="container">
                        <div class="row contact-row">

                            <!-- /.address and contact -->
                            <div class="col-sm-5 contact-left wow fadeInUp">
                                <h2><span class="highlight">Kontak</span> Kami</h2>
                                <ul class="ul-address">
                                    <li><i class="pe-7s-map-marker"></i>Jl. Mitra Sunter Boulevard Blok C2
Kav. 90 Sunter Jaya</br>
                                        Jakarta 14350
                                    </li>
                                    <li><i class="pe-7s-phone"></i>021 – 65832776 fax : 021 - 65835022</li>
                                    <li><i class="pe-7s-mail"></i><a href="#">customer.care@koperasi-astra.com</a></li>
                                    <li><i class="pe-7s-look"></i><a href="http://koperasi-astra.com/">www.koperasi-astra.com</a></li>
                                </ul> 

                            </div>

                            <!-- /.contact form -->
                            <div class="col-sm-7 contact-right">
                              <div id="map"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- /.footer -->
        <footer id="footer">
            <div class="container">
                <div class="col-sm-4 col-sm-offset-4">
                    <!-- /.social links -->
                    <div class="social text-center">
                        <ul>
                            <li><a class="wow fadeInUp" href="https://twitter.com/koperasi_astra"><i class="fa fa-twitter"></i></a></li>
                            <li><a class="wow fadeInUp" href="https://www.facebook.com/Koperasi-Astra-782872668556424/" data-wow-delay="0.2s"><i class="fa fa-facebook"></i></a></li>
                          
                            <li><a class="wow fadeInUp" href="https://www.instagram.com/koperasiastra/" data-wow-delay="0.6s"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>  
                    <div class="text-center wow fadeInUp" style="font-size: 14px;">Koperasi Astra Internasional<p> {{ date('Y') }}</div>
                    <a href="#" class="scrollToTop"><i class="pe-7s-up-arrow pe-va"></i></a>
                </div>  
            </div>  
        </footer>
    {{--     <div class="modal fade" id="overlay">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
               
                <h4 class="modal-title">Pengumuman</h4>
              </div>
              <div class="modal-body">
                <p align="justify"><strong>Yth Bapak/Ibu,
        Sehubungan dengan telah dibagikannya rapor semester genap. Kami informasikan kembali bahwa lampiran beasiswa online adalah 2(dua) rapor semester sebelumnnya (tidak termasuk rapor yang saat ini dibagikan).Demikian Bapak/Ibu, Selamat berpuasa dan terimakasih atas kerjasama yang diberikan. :)</strong></p>
                
                 <button type="button" class="btn btn-warning btn-xs" data-dismiss="modal" aria-hidden="true">CLOSE</button>
             </div>
              
            </div>
          </div>
        </div> --}}
        <!-- /.javascript files -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdctuxywHtvFRLGBwcWi5BMNeHdFwJOD8"></script>
        <script src="assets/login/js/jquery.js"></script>
        <script src="assets/login/js/bootstrap.min.js"></script>
        <script src="assets/login/js/custom.js"></script>
        <script src="assets/login/js/jquery.sticky.js"></script>
        <script src="assets/login/js/wow.min.js"></script>
        <script src="assets/login/js/owl.carousel.min.js"></script>
     
        <script>
              new WOW().init();

         
        </script>
        <script>
               function isNumberKey(evt){
                   
                    var charCode = (evt.which) ? evt.which : event.keyCode
                    if (charCode > 31 && (charCode < 48 || charCode > 57)){
                        return false;
                    }else{
                      
                    return true;

                   }
                }
               
                  function initMap() {
                    var uluru = {lat: -6.149467, lng: 106.885071};
                    var map = new google.maps.Map(document.getElementById('map'), {
                      zoom: 16,
                      center: uluru
                    });
                    var marker = new google.maps.Marker({
                      position: uluru,
                      map: map
                    });
                  }


            $('#overlay').modal('show');

                setTimeout(function() {
                    $('#overlay').modal('hide');
                }, 20000);

        </script>
        <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdctuxywHtvFRLGBwcWi5BMNeHdFwJOD8&callback=initMap">
        </script>
        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/5b04fc6c13d5ab375e377e2d/default';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
            })();
        </script>
<!--End of Tawk.to Script-->


    <!-- </body></html> -->
    </body>
</html>
 @else

<script type="text/javascript">

                        window.location = "{{ url('/home')}}";//here double curly bracket
</script>



  @endif
