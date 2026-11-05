@extends('app.index')
@section('style')
    {!!Html::Style('assets/app/swalalert/css/sweetalert.css') !!}
    <style>
        .pagination ul{
            list-style: none;
        }

        .pagination ul li{
            display: inline;
            padding: 10px 10px;
            border:1px solid #e9e9e9;
        }
    </style>
@endsection
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
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="body bg-gray">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 class="page-content-title pull-left pd-top8">Notifikasi</h1>
                                    <button class="btn astra-btn bg-cl1952a1 pull-right" onclick="setReadAll()">Set Terbaca Semua</button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="accordion astra-accordion" id="accordionExample">
                                        @foreach($notification as $notifKey => $notif)
                                            <div class="col-md-12" onclick="setRead({{ $notif->id }})">
                                                <button class="card-header btn btn-default" style="width: 100%" type="button" data-toggle="collapse" data-target="#collapse{{ $notifKey }}" aria-expanded="true" aria-controls="collapse{{ $notifKey }}" id="heading{{ $notifKey }}">
                                                    <span class="pull-left">{{ ucwords($notif->SUBJECT) }}</span>
                                                    <strong class="pull-right unread-message" id="unread-label-{{ $notif->id }}">{{ $notif->STATUS == \App\Util\Constant::NOTIFICATION_STATUS_UNREAD ? 'Belum Dibaca' : '' }}</strong>
                                                </button>

                                                <div id="collapse{{ $notifKey }}" class="collapse" style="background-color:#e9e9e9" aria-labelledby="heading{{ $notifKey }}" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12" style="padding: 20px 30px">
                                                                <strong>Tanggal : {{ \Carbon\Carbon::parse($notif->CREATED_AT)->format('d M Y (H:i)') }}</strong>
                                                                <p>{!! $notif->DESCRIPTION !!}</p>
                                                                <a href="{{ url(\App\Util\Constant::NOTIFICATION_LINK[$notif->TYPES]) }}">Selengkapnya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="pagination justify-content-center mt-30">
                                        <ul>

                                            {{-- Previous Page Link --}}
                                            @if ($notification->onFirstPage())
                                                <li class="disabled page-numbers"><span>«</span></li>
                                            @else
                                                <li><a href="{{ $notification->previousPageUrl() }}" class="page-numbers" rel="prev">«</a></li>
                                            @endif

                                            @if($notification->currentPage() > 3)
                                                <li class="hidden-xs page-numbers"><a href="{{ $notification->url(1) }}" class="page-numbers">1</a></li>
                                            @endif
                                            @if($notification->currentPage() > 4)
                                                <li><span>...</span></li>
                                            @endif
                                            @foreach(range(1, $notification->lastPage()) as $i)
                                                @if($i >= $notification->currentPage() - 2 && $i <= $notification->currentPage() + 2)
                                                    @if ($i == $notification->currentPage())
                                                        <li class="active page-numbers"><span>{{ $i }}</span></li>
                                                    @else
                                                        <li><a href="{{ $notification->url($i) }}" class="page-numbers">{{ $i }}</a></li>
                                                    @endif
                                                @endif
                                            @endforeach
                                            @if($notification->currentPage() < $notification->lastPage() - 3)
                                                <li><span>...</span></li>
                                            @endif
                                            @if($notification->currentPage() < $notification->lastPage() - 2)
                                                <li class="hidden-xs page-numbers"><a href="{{ $notification->url($notification->lastPage()) }}" class="page-numbers">{{ $notification->lastPage() }}</a></li>
                                            @endif

                                            {{-- Next Page Link --}}
                                            @if ($notification->hasMorePages())
                                                <li><a href="{{ $notification->nextPageUrl() }}" rel="next" class="page-numbers">»</a></li>
                                            @else
                                                <li class="disabled page-numbers"><span>»</span></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Browser Usage -->
        </div>

    </section>
@endsection
@section('scripts')

    {!!Html::script('assets/app/swalalert/js/sweetalert.min.js')!!}

    <script>

        function setRead(id) {

            url = "{{url('notificationRead',['id'=>''])}}";

            $.ajax({
                url:url+'/'+id,
                type:'GET',
                success: function(data){
                    if(data.unread && data.uread != 0){
                        $('.unread-message-sidebar').html('<span class="label">'+data.unread+'</span>');
                        $('.unread-message-header').html('('+data.unread+')');
                    }else{
                        $('.unread-message-sidebar').html('');
                        $('.unread-message-header').html('');
                    }
                    $('#unread-label-'+id).html('');
                },
                error: function(jqXHR, textStatus, errorThrown){
                    swal({
                        title: 'System Error',
                        text: errorThrown,
                        icon: 'error',
                        timer: '3000'
                    });
                }
            });
        }

        function setReadAll() {

            swal({
                title: "Yakin Set Terbaca Semua?",
                text: "Semua notifikasi akan di ubah menjadi terbaca",
                showCancelButton: true,
                closeOnConfirm: true,
                confirmButtonText: "Iya",
                confirmButtonColor: "#31E794"
            }, function() {

                url = "{{url('notificationReadAll')}}";

                $.ajax({
                    url:url,
                    type:'GET',
                    success: function(data){
                        $('.unread-message-sidebar').html('');
                        $('.unread-message-header').html('');
                        $('.unread-message').html('');

                        swal({
                            title: 'Berhasil Set Terbaca Semua',
                            text: 'Notifikasi berhasil di set terbaca',
                            icon: 'success',
                            timer: '3000'
                        });
                    },
                    error: function(jqXHR, textStatus, errorThrown){
                        swal({
                            title: 'System Error',
                            text: errorThrown,
                            icon: 'error',
                            timer: '3000'
                        });
                    }
                });
                spinner = Rats.UI.LoadAnimation.start();

            });
        }
    </script>
    {{--   {!!Html::script('assets/app/js/jquery.validate.js')!!} --}}
@endsection
