<?php

namespace App\Http\Controllers;

use App\Models\notabsen;
use App\Models\Rombel;
use Illuminate\Http\Request;

class NotabsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notabsens = Notabsen::latest()->paginate(5);
    
        return view('notabsens.index',compact('notabsens'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rombels = Rombel::all();
        return view('notabsens.create',compact('rombels', $rombels));
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
            'nama'=>'required',
            'rombel'=>'required',
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
        Notabsen::create([
            'nis'=>$request['nis'],
            'nama'=>$request['nama'],
            'rombel'=>$request['rombel'],
            'keterangan'=>$request['keterangan'],
            'foto'=>$imgName
        ]);

        return redirect('/dashboard4')->with('status','Terima Kasih Telah Mengisi Form');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\notabsen  $notabsen
     * @return \Illuminate\Http\Response
     */
    public function show(notabsen $notabsen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\notabsen  $notabsen
     * @return \Illuminate\Http\Response
     */
    public function edit(notabsen $notabsen)
    {
        $rombels = Rombel::all();
        return view('notabsens.edit',compact('notabsen','rombels', $rombels));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\notabsen  $notabsen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, notabsen $notabsen)
    {
        $imgName=null;
        if($request->foto){
            $imgName=$request->foto->getClientOriginalName() .'-' . time(). '-' . $request->foto->extension();    
            
            //$imgName=$request->foto->getClientOriginalName();
            $request->foto->move(public_path('post-images'),$imgName);
        }
        Notabsen::where('id',$notabsen->id)
        ->update(['nis'=>$request->nis,
        'nama'=>$request->nama,
        'rombel'=>$request->rombel,
        'keterangan'=>$request->keterangan,
        'foto'=>$imgName
        ]);
        return redirect('/notabsens')->with('status', 'Data absen Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\notabsen  $notabsen
     * @return \Illuminate\Http\Response
     */
    public function destroy(notabsen $notabsen)
    {
        Notabsen::destroy($notabsen->id);
        return redirect('notabsens')->with('status','Data Absen Berhasil Dihapus');
    }
}
