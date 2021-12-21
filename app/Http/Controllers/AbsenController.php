<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absens = Absen::latest()->paginate(5);
    
        return view('absens.index',compact('absens'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('absens.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis'=>'required',
            'jam_kedatangan'=>'required',
            'jam_kepulangan'=>'required',
            'keterangan'=>'required',
            'foto'=>'image|file|max:2048'
        ]);

        $imgName=null;
        if($request->foto){
            $imgName=$request->foto->getClientOriginalName() .'-' . time(). '-' . $request->foto->extension();    
            
            //$imgName=$request->foto->getClientOriginalName();
            $request->foto->move(public_path('post-images'),$imgName);
        }


        //dokter::create($request->all());
        Absen::create([
            'nis'=>$request['nis'],
            'jam_kedatangan'=>$request['jam_kedatangan'],
            'jam_kepulangan'=>$request['jam_kepulangan'],
            'keterangan'=>$request['keterangan'],
            'foto'=>$imgName
        ]);

        return redirect('/dashboard3')->with('status','Data Absen Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function show(Absen $absen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function edit(Absen $absen)
    {
        return view('absens.edit', compact('absen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absen $absen)
    {
        $imgName=null;
        if($request->foto){
            $imgName=$request->foto->getClientOriginalName() .'-' . time(). '-' . $request->foto->extension();    
            
            //$imgName=$request->foto->getClientOriginalName();
            $request->foto->move(public_path('post-images'),$imgName);
        }
        Absen::where('id',$absen->id)
        ->update(['nis'=>$request->nis,
        'jam_kedatangan'=>$request->jam_kedatangan,
        'jam_kepulangan'=>$request->jam_kepulangan,
        'keterangan'=>$request->keterangan,
        'foto'=>$imgName
        ]);
        return redirect('/absens')->with('status', 'Data absen Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absen $absen)
    {
        Absen::destroy($absen->id);
        return redirect('absens')->with('status','Data Absen Berhasil Dihapus');
    }
}
