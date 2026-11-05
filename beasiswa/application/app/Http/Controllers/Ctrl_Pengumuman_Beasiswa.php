<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Mstcst;
use App\User;
use App\Mstbeasiswa;
use App\Statusbea;

class Ctrl_Pengumuman_Beasiswa extends Controller
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


    public function index()
    {
            $statuspengumuman = Statusbea::where('JUDUL', 'Pengumuman Beasiswa')
            ->where('STATUS', '1')->get();
            $pengummuman = Statusbea::where('JUDUL', 'Pengumuman Beasiswa')->first();
            $isipengumuman = $pengummuman->KETERANGAN;
            $user = Auth::user()->NO_ANGGOTA;
            $statusterima = Mstbeasiswa::where('NO_ANGGOTA', $user)
            ->where('FLAG_TERIMA', '1')->get();
            $announcements = json_decode(Statusbea::where('id', 17)->first()->KETERANGAN);

            return view ('app.pages.pengumuman_beasiswa.pengumuman_beasiswa', array('statuspengumuman' => $statuspengumuman, 'statusterima' => $statusterima, 'isi' => $isipengumuman, 'announcements' => $announcements ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function informasi_beasiswa(){
        $get_informasi = Statusbea::select('*')->where('id', '3')->first();
        $announcements = json_decode(Statusbea::where('id', 17)->first()->KETERANGAN);

        return view('app.pages.pengumuman_beasiswa.informasi_beasiswa',compact('get_informasi','announcements'));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
