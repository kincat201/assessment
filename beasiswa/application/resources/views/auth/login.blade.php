@if (Auth::guest())
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">

	<link rel="icon" href="{{ url('favicon.ico') }}" type="image/x-icon">
	<!-- Touch icons for android and iOS (Bookmark icons) -->
	<link rel="shortcut icon" sizes="196x196" href="{{ url('assets/login/images/icons/icon-196x196.png') }}">
	<link rel="apple-touch-icon" sizes="144x144" href="{{ url('assets/login/images/icons/touch-icon-iphone.png') }}">
	<link rel="apple-touch-icon" sizes="76x76" href="{{ url('assets/login/images/icons/touch-icon-ipad.png') }}">
	<link rel="apple-touch-icon" sizes="120x120" href="{{ url('assets/login/images/icons/touch-icon-iphone-retina.png') }}">
	<link rel="apple-touch-icon" sizes="152x152" href="{{ url('assets/login/images/icons/touch-icon-ipad-retina.png') }}">


	<title>Beasiswa Koperasi Astra International {{ date('Y') }}</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,500,600">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="{{ url('assets/login/css/combined/page-essentials-minimal.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ url('assets/login/css/custom/index-local-minimal.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ url('assets/login/css/popup-styles.css') }}" rel="stylesheet" type="text/css">

</head>
<body>
{{--<!-- Chatra {literal} -->
<script>
    (function(d, w, c) {
        w.ChatraID = 'CJwzgMXby4eDn8rBp';
        var s = d.createElement('script');
        w[c] = w[c] || function() {
            (w[c].q = w[c].q || []).push(arguments);
        };
        s.async = true;
        s.src = 'https://call.chatra.io/chatra.js';
        if (d.head) d.head.appendChild(s);
    })(document, window, 'Chatra');
</script>
<!-- /Chatra {/literal} -->--}}

	<!--Start of Tawk.to Script-->
	<script type="text/javascript">
		var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
		(function(){
			var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
			s1.async=true;
			s1.src='https://embed.tawk.to/5e8416d535bcbb0c9aac765d/default';
			s1.charset='UTF-8';
			s1.setAttribute('crossorigin','*');
			s0.parentNode.insertBefore(s1,s0);
		})();
	</script>
	<!--End of Tawk.to Script-->

	<!-- =================================================================
	Main Page Content
	================================================================== -->
	<div id="main-wrapper" class="split-container abs-fs">
		<div class="container-fluid">
			<div class="row">
				<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
				Left Section
				~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
				<div class="side-left bg-cover">
					<div id="intro-content" class="col-lg-6 vflow bg-cover">

						<div id="ambient-bg"> <!-- ## Start Ambient BG (Particles Animations) ## -->
							<canvas id="bits"></canvas>
						</div><!-- ## End Ambient BG (Particles Animations) ## -->

						<div class="st-logo"> <!-- ## Start Logo part ## -->
							<a href="http://koperasi-astra.com">
							<img src="{{ url('assets/logo/logo1.png') }}" alt="Stomp" height="84"/>
							</a>
						</div> <!-- ## End Logo part ## -->

						<div class="st-desc"> <!-- ## Start Coming Soon Content ## -->
							<h2 class="fw600">BEASISWA KOPERASI ASTRA {{ date('Y') }}</h2>
							<!-- <h2 class="fw600">Launching in<br>
							<span class="st-countdown fw600"></span></h2> -->
							<p>Bersama kami Koperasi Astra International, Membangun Kesejahteraan Untuk Masa Depan yang Lebih Baik.</p>
							<p>
								<a id="mi-btn" href="#main-content" class="st-btn btn-bordered">Daftar Beasiswa</a>
								<!--<a class="st-btn btn-fill" data-toggle="modal" data-target="#subscribe-page"> -->
								<a data-toggle="modal" data-target="#subscribe-page" class="st-btn btn-fill">Download Panduan</a>
							</p>
						</div> <!-- ## End Coming Soon Content ## -->

						<div class="st-footer"> <!-- ## Start Footer ## -->
							<ul class="social-icons">
								<li><a href="https://www.facebook.com/koperasi.astra.international"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://www.twitter.com/@koperasi_astra"><i class="fa fa-twitter"></i></a></li>
								<li><a href="https://www.instagram.com/koperasiastra"><i class="fa fa-instagram"></i></a></li>
								<li><a href="https://www.youtube.com/channel/UCYZ2i8qy_qqES1VxVfIQ8dw"><i class="fa fa-youtube-play"></i></a></li>
							</ul>
						</div> <!-- ## End Footer ## -->

						<div class="st-poster"><!-- ## Start Poster ## -->
						<br><br>
						<a href="{{ env('ADMIN_URL').'/assets/app/'.\App\Statusbea::find(9)->KETERANGAN }}" target="_blank">
						Download Poster</a>
						</div>
						<!-- ## End Footer ## -->

					</div>
				</div>

				<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
				Right Section
				~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
				<div id="main-content" class="side-right col-xs-12 col-lg-offset-6 col-lg-6 vflow">

					<section id="loginform"> <!-- ## Start LOGIN US section ## -->
						<div class="row">
							<h3>LOGIN</h3>
							<div class="col-xs-12">

								<!-- <p></p> -->
								{{-- <p class="contact-label sven-message"></p> --}}
  <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}"><input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="form-group">
                                        <input id="no_anggota" maxlength="6"  onkeypress="return isNumberKey(event)" type="no_anggota" class="form-control" name="no_anggota" value="{{ old('no_anggota') }}" placeholder="Enter no anggota" required>
                                            <?php if(isset($message)){ ?>
                                               <span class="help-block">
                                                    <small>{{$message}}</small></font>
                                                </span>
                                            <?php } ?>
                                            @if ($errors->has('no_anggota'))
                                                <span class="help-block">
                                                    <font color="red"><small>{{ $errors->first('no_anggota') }}</small>
                                                    <br>
                                                    <small>Hubungi : 021–65832776 bila ada masalah login atau <br></small></font>
                                                    <a href="#ketentuan">Baca Ketentuan</a>
                                                </span>
                                            @endif
                                    </div>

                                    <div class="form-group">
                                        <input id="password" type="password" class="form-control" name="password" placeholder="Enter password" required>

                                         @if ($errors->has('password'))
                                            <span class="help-block">
                                                <font color="red">{{ $errors->first('password') }}</font>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group last">
                                        <input type="submit" class="btn btn-info  btn-lg" value="Login">

                                        <div>
                                          {{--   <label>
                                                <input type="checkbox" name="remember"> <code>Remember Me</code>
                                            </label> --}}

                                        </div>
                                    </div>
                                    <p class="privacy text-center">Klik <i>lupa password</i> bila anda  <a  href="{{ url('/password/reset') }}">&nbsp;Lupa Password ?</a>.</p>
                                </form>
							</div>
						</div>
					</section> <!-- ## End ABOUT US section ## -->

					<section id="ketentuan" class="about-us"> <!-- ## Start ABOUT US section ## -->
						<div class="row">
							<div class="col-xs-12">
								<h3>KETENTUAN PENDAFTARAN</h3>
								<p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pendaftaran besiswa anggota KAI periode {{ date('Y') }} telah dibuka, sebelum login dan daftar program beasiswa diharapkan anggota membaca ketentuan berikut:
								<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ketentuan Beasiswa KAI (Koperasi Astra International) Pendaftar beasiswa adalah anggota Koperasi Astra yang sudah terdaftar. Beasiswa diberikan kepada anak anggota Koperasi Astra golongan 1 s.d 3.
								<br>&nbsp;&nbsp;&nbsp;&nbsp;<b>Info Penting</b> : Username diisi dengan nomor anggota dan password diisi dengan nomor anggota + tgl lahir (ddmmyyyy) , contoh : username : 223344 dan password : 22334421021884 bila gagal login gunakan tanggal lahir kai sebagai password : 22334425061990
								</p>
							</div>
						</div>
					</section> <!-- ## End ABOUT US section ## -->

					<a id="close-info"><i class="fa fa-window-close" aria-hidden="true"></i></a>

					<p class="copyright text-center">&copy; {{ date('Y') }} Koperasi Astra</p>
				</div>
			</div>
		</div>
	</div>

	<!-- =================================================================
	Preloader Instance
	================================================================== -->
	<div class="loader-container">
		<div class="abs-center">
			<div class="sk-double-bounce">
				<div class="sk-child sk-double-bounce1"></div>
				<div class="sk-child sk-double-bounce2"></div>
			</div>
		</div>
	</div>

	<!-- =================================================================
	Subscribe Modal
	================================================================== -->
	<div id="subscribe-page" class="sven-modal modal fade vflow" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body sub-bg bg-cover">

					<div class="row">
						<div class="col-xs-12 notify-sec"> <!-- ## Start SUBSCRIPTION section ## -->
							<p class="sub-desc">Download dokumen yang anda butuhkan untuk melengkapi pendaftaran Beasiswa</p>
							<div style="width:100%; ">

							<div style="width:33%; float:left; height:150px; margin-top:10px;">
							<div style='width:100%; height:130px; float:left; background-size:contain; background:url(http://repo.koperasi-astra.com/repository/bank/KAI/ASSETS/document.png) no-repeat center'></div>
							<a class="new-box-button" target="_blank" href="{{ env('ADMIN_URL').'/assets/app/'.\App\Statusbea::find(10)->KETERANGAN }}" style='width:100%; height:20px; float:left; margin-top: 20px;text-align:center; color:#FFF; line-height:20px'>Panduan Pendaftaran</a>
							</div>

							<div style="width:33%; float:left; height:150px; margin-top:10px;">
							<div style='width:100%; height:130px; float:left; background-size:contain; background:url(http://repo.koperasi-astra.com/repository/bank/KAI/ASSETS/document.png) no-repeat center'></div>
							<a class="new-box-button" target="_blank" href="{{ env('ADMIN_URL').'/assets/app/'.\App\Statusbea::find(11)->KETERANGAN }}" style='width:100%; height:20px; float:left; line-height: unset; margin-top: 20px;text-align:center; color:#FFF; line-height:20px'>Surat Keterangan Nilai</a>


							</div>
							<div style="width:33%; float:left; height:150px; margin-top:10px;">
							<div style='width:100%; height:130px; float:left; background-size:contain; background:url(http://repo.koperasi-astra.com/repository/bank/KAI/ASSETS/document.png) no-repeat center'></div>
							<a class="new-box-button" target="_blank" href="{{ env('ADMIN_URL').'/assets/app/'.\App\Statusbea::find(12)->KETERANGAN }}" style='width:100%; height:20px; float:left; line-height: unset; margin-top: 20px;text-align:center; color:#FFF; line-height:20px'>Template Rekening Bank</a>
							</div>


							</div>


							<button type="button" class="close close-form" onclick="closeModal()" data-dismiss="modal">&times;</button>
						</div> <!-- ## End ABOUT US section ## -->
					</div>

				</div>
			</div>
		</div>
	</div>
	<!-- =================================================================
	Popup Warning!
	================================================================== -->
	<div class='popup' id="popup">
	<div class='cnt223'>
		@if(!empty(session('error')))
		<h1 style='text-align:center'>OOPS TERJADI KESALAHAN! </br>
			</br>
			<b style='color:red;'>{{ session('error') }}</b></h1>
		<p>
		<br/>
		<br/>
		@elseif(\App\Statusbea::find(2)->MULAI < \Carbon\Carbon::now() && \App\Statusbea::find(2)->AKHIR > \Carbon\Carbon::now() )
		<!-- ================================================================= -->
		<h1>MOHON PERHATIAN! </br>
		<b style='color:red;'>PENDAFTARAN SAMPAI {{ \App\Statusbea::find(2)->AKHIR }}</b></h1>
		<p>
		<p class='mobileview-show' style='display:none'> Perhatikan:</p>
		<p class='mobileview-none'>Bagi Anggota yang akan mendaftar Beasiswa harap memperhatikan poin-poin sebagai berikut:</p>
		<ol>
		<li>Silahkan klik <b>"DOWNLOAD PANDUAN"</b> untuk mengunduh dokumen tata cara pendaftaran, mohon baca secara seksama.</li>
		<li>Silahkan klik <b>"DAFTAR BEASISWA"</b> dan melakukan login ke sistem untuk memulai proses pendaftaran.</li>
		<li class='mobileview-show' style='display:none'> <b>"Untuk mendaftar silahkan akses web melalui PC atau LAPTOP agar resolusi web beasiswa optimal"</b></li>
		<li class='mobileview-none'>Bentuk keseriusan Anggota mengikuti aturan dalam upaya mendaftarkan Beasiswa Koperasi Astra menjadi nilai apresiasi kami. Perhatikan secara seksama informasi diri dan lampiran dokumen, sistem tidak bisa mentolerir kesalahan. Jika data salah terancam gagal secara administratif.</li>
		<li class='mobileview-none'>sistem akan mengakumulasi jenjang sekolah 1 tingkat secara otomatis, jadi pastikan memasukan jenjang sekolah sebelum kenaikan kelas</li>
		</ol>
		<br/>
		<br/>
		<!-- ================================================================== -->
		@else
		<h1 style='text-align:center'>BEASISWA TELAH DITUTUP! </br>
			</br>
			<b style='color:red;'>TERIMA KASIH ATAS PARTISIPASINYA</b></h1>
		<p>
		<br/>
		<br/>
		@endif
		<a href='' class='close' id="exit_modal">KELUAR</a>
		<br/>
		<br/>
		</p>
	</div>
	</div>


	<!-- =================================================================
	Root Element of PhotoSwipe
	================================================================== -->
	<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true"><div class="pswp__bg"></div><div class="pswp__scroll-wrap"><div class="pswp__container"><div class="pswp__item"></div><div class="pswp__item"></div><div class="pswp__item"></div></div><div class="pswp__ui pswp__ui--hidden"><div class="pswp__top-bar"><div class="pswp__counter"></div><button class="pswp__button pswp__button--close" title="Close (Esc)"></button><button class="pswp__button pswp__button--share" title="Share"></button><button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button><button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button><div class="pswp__preloader"><div class="pswp__preloader__icn"><div class="pswp__preloader__cut"><div class="pswp__preloader__donut"></div></div></div></div></div><div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap"><div class="pswp__share-tooltip"></div></div><button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"> </button><button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"> </button><div class="pswp__caption"><div class="pswp__caption__center"></div></div></div></div></div>

	<!-- =================================================================
	Compiled JS plugins
	================================================================== -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="{{ url('assets/login/js/combined/page-essentials-minimal.min.js') }}"></script>
	{{--<script src="{{ url('assets/login/js/backgrounds/bits.min.js') }}"></script>--}}
	<script src="{{ url('assets/login/js/main-minimal.js') }}"></script>
	<script src="{{ url('assets/login/js/popup.j') }}s"></script>
	<script type="text/javascript">
				function closeModal(){
					$('#subscribe-page').modal('hide');
				}
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


            $('#overlay').modal('hide');

                setTimeout(function() {
                    $('#overlay').modal('hide');
                }, 20000);

    	var error = "{{ json_encode($errors->all()) }}"
	</script>
	@if ($errors->has('no_anggota'))

		@if ($errors->first('no_anggota'))
			<script type="text/javascript">
				$(function() {
					$("#main-wrapper").toggleClass("split-active");
					document.getElementById('exit_modal').click();
				});
            </script>
		@endif

    @endif
	@if ($errors->has('password'))

		@if ($errors->first('password'))
			<script type="text/javascript">
				$(function() {
					$("#main-wrapper").toggleClass("split-active");
					document.getElementById('exit_modal').click();
				});
            </script>
		@endif

	@endif
</body>
</html>
 @else

<script type="text/javascript">
	window.location = "{{ url('/home')}}";//here double curly bracket
</script>



  @endif
