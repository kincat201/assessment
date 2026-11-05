@if (Auth::guest())
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">


	<!-- Touch icons for android and iOS (Bookmark icons) -->
	<link rel="shortcut icon" sizes="196x196" href="assets/login/images/icons/icon-196x196.png">
	<link rel="apple-touch-icon" sizes="144x144" href="assets/login/images/icons/touch-icon-iphone.png">
	<link rel="apple-touch-icon" sizes="76x76" href="assets/login/images/icons/touch-icon-ipad.png">
	<link rel="apple-touch-icon" sizes="120x120" href="assets/login/images/icons/touch-icon-iphone-retina.png">
	<link rel="apple-touch-icon" sizes="152x152" href="assets/login/images/icons/touch-icon-ipad-retina.png">


	<title>Beasiswa Koperasi Astra International {{ date('Y') }}</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,500,600">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="assets/login/css/combined/page-essentials-minimal.min.css" rel="stylesheet" type="text/css">
	<link href="assets/login/css/custom/index-local-minimal.css" rel="stylesheet" type="text/css">
	
</head>
<body>

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
							<img src="http://ratkai-apps.koperasi-astra.com/assets/images/logo-kai.png" alt="Stomp" height="84"/>
						</div> <!-- ## End Logo part ## -->

						<div class="st-desc"> <!-- ## Start Coming Soon Content ## -->
							<h2 class="fw600">BEASISWA KOPERASI ASTRA {{ date('Y') }}</h2>
							<!-- <h2 class="fw600">Launching in<br>
							<span class="st-countdown fw600"></span></h2> -->
							<p>Bersama kami Koperasi Astra International, Membangun Kesejahteraan Untuk Masa Depan yang Lebih Baik.</p>
							<p>
								<a id="mi-btn" href="#main-content" class="st-btn btn-bordered">Daftar Beasiswa</a>
								<a class="st-btn btn-fill" data-toggle="modal" data-target="#subscribe-page">Info Beasiswa</a>
							</p>
						</div> <!-- ## End Coming Soon Content ## -->

						<div class="st-footer"> <!-- ## Start Footer ## -->
							<ul class="social-icons">
								<li><a href="https://www.facebook.com/koperasi.astra.international"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://www.twitter.com/@koperasi_astra"><i class="fa fa-twitter"></i></a></li>
								<li><a href="https://www.instagram.com/koperasiastra"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="https://www.youtube.com/channel/UCYZ2i8qy_qqES1VxVfIQ8dw"><i class="fa fa-youtube-play"></i></a></li>
							</ul>
						</div> <!-- ## End Footer ## -->

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
                                        <input id="no_anggota" maxlength="6"  onkeypress="return isNumberKey(event)" type="no_anggota" class="form-control" name="no_anggota" value="{{ old('no_anggota') }}" placeholder="Enter no anggota">
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
                                        <input id="password" type="password" class="form-control" name="password" placeholder="Enter password">

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

					<section id="the-gallery" class="portfolio"> <!-- ## Start PORTFOLIO section ## -->
						<div class="row">
							<div class="col-xs-12">
								<h3>What's inside</h3>
								<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>

								<div class="st-gallery row" itemscope itemtype="http://schema.org/ImageGallery"><!-- %% Start GALLERY %% -->
									<figure class="col-xs-12 col-sm-6" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
										<a class="ps-link" href="images/local/stomp-1.jpg" itemprop="contentUrl" data-size="1920x1280">
											<img class="ofit gpu-hack lazyload" data-src="assets/login/images/local/stomp-1.jpg" itemprop="thumbnail" alt="Best of both worlds" />
											<p class="pszoom"></p>
										</a>
										<figcaption itemprop="caption description">Best of both worlds</figcaption>
									</figure>
									<figure class="col-xs-12 col-sm-6" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
										<a class="ps-link" href="images/local/stomp-2.jpg" itemprop="contentUrl" data-size="1920x1264">
											<img class="ofit gpu-hack lazyload" data-src="assets/login/images/local/stomp-2.jpg" itemprop="thumbnail" alt="Once in a blue moon" />
											<p class="pszoom"></p>
										</a>
										<figcaption itemprop="caption description">Once in a blue moon</figcaption>
									</figure>
									<figure class="col-xs-12 col-sm-6" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
										<a class="ps-link" href="images/local/stomp-3.jpg" itemprop="contentUrl" data-size="1920x1280">
											<img class="ofit gpu-hack lazyload" data-src="assets/login/images/local/stomp-3.jpg" itemprop="thumbnail" alt="Piece of cake" />
											<p class="pszoom"></p>
										</a>
										<figcaption itemprop="caption description">Piece of cake</figcaption>
									</figure>
									<figure class="col-xs-12 col-sm-6" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
										<a class="ps-link" href="images/local/stomp-4.jpg" itemprop="contentUrl" data-size="1920x1282">
											<img class="ofit gpu-hack lazyload" data-src="assets/login/images/local/stomp-4.jpg" itemprop="thumbnail" alt="Whole nine yards" />
											<p class="pszoom"></p>
										</a>
										<figcaption itemprop="caption description">Whole nine yards</figcaption>
									</figure>
								</div><!-- %% End GALLERY %% -->

							</div>
						</div>
					</section> <!-- ## End PORTFOLIO section ## -->

		

					<a id="close-info"><i class="fa fa-window-close" aria-hidden="true"></i></a>

					<p class="copyright text-center">&copy; 2017 STOMP - THE INTRO</p>
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
							<h3>Daftarkan Email Anda!</h3>
							<p class="sub-desc">Untuk mendapatkan informasi terkait beasiswa Koperasi Astra International setiap tahunnya. Segera daftarkan email anda untuk mendapatkan informasi terkini.</p>
							<p class="subscribe-label sven-message"></p>

							<form id="subscription" class="row" action="php/subscribe.php" method="POST"><!-- %% Start SUBSCRIPTION FORM %% -->
								<div class="col-xs-12">
									<div class="form-group">
										<input type="email" id="userEmail" class="form form-control" placeholder="Email Anda..." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email...'" name="email" required="">
									</div>
								</div>
								<div class="col-xs-12">
									<div class="form-group">
										<button type="submit" id="submit-form" class="st-btn btn-fill">Daftarkan!</button>
									</div>
								</div>
							</form><!-- %% End SUBSCRIPTION FORM %% -->

							<button type="button" class="close close-form" data-dismiss="modal">&times;</button>
						</div> <!-- ## End ABOUT US section ## -->
					</div>

				</div>
			</div>
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
	<script src="assets/login/js/combined/page-essentials-minimal.min.js"></script>
	<script src="assets/login/js/backgrounds/bits.min.js"></script>
	<script src="assets/login/js/main-minimal.js"></script>
	<script type="text/javascript">
		
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

</body>
</html>
 @else

<script type="text/javascript">

                        window.location = "{{ url('/home')}}";//here double curly bracket
</script>



  @endif
