<?php

namespace App\Http\Controllers;
use App\Notification;
use App\Util\Constant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Ctrl_General extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    // public function index()
    // {
    //      return view('app.pages.panduan_beasiswa.panduan_beasiswa'); 
    // }

    public function hubungi_kami(){
    	return view('app.pages.hubungi_kami.hubungi_kami');
}

    public function notifikasi(){
        $data['notification'] = Notification::where('NO_ANGGOTA',\Auth::user()->NO_ANGGOTA)
            ->orderBy('created_at','desc')->paginate(6);
        return view('app.pages.notifikasi.notifikasi',$data);
    }

    public function not_found404(){
        return view('errors.404'); 
    }

    public function notificationRead($id){
        $notification = Notification::find($id);
        $notification->status = Constant::NOTIFICATION_STATUS_READ;
        $status = $notification->save();
        return response()->json([
            'status'=>$notification->save(),
            'unread'=> Notification::where('STATUS',Constant::NOTIFICATION_STATUS_UNREAD)->count(),
            'message' => $status ? 'Success set read' : 'failed set read'
        ]);
    }

    public function notificationReadAll(){
        $notification = Notification::where('NO_ANGGOTA',\Auth::user()->NO_ANGGOTA)->update(['STATUS'=>Constant::NOTIFICATION_STATUS_READ]);
        return response()->json([
            'status'=>$notification,
            'message' => $notification ? 'Success set read all' : 'failed set read all'
        ]);
    }
}
